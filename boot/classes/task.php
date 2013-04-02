<?php
class task
{
	private $__counter = 0;
	private $__urls_feed = array();
	
	function index()
	{
		$this->rss_reader();
	}
	
	function crawl_sites ()
	{
		$this->__counter_max = 1000;
		$this->__deep_max = 1;
		$this->__urls_domain  = array();
		$this->__urls_crawled  = array();
		
		$response = soap::call ('sites', 'readLast');
		
		if (isset($response['extra']['count'])  && $response['extra']['count'] > 0)
    	{
    		$domain = $response['data'][0];
    		echo_br ('domain start: '.$domain['domain']);	
    		echo_ln ();
    		flush();
    		if (isset($domain['domain_base']))
    		{
    			$url_base = 'http://'.$domain['domain_base'];
    		}
    		else 
    		{
    			$url_base = 'http://'.$domain['domain'];
    		}
    		    		
			$url = 'http://'.$domain['domain'];
			$this->__crawl_get_sites($url, $url_base, 0);
			
			foreach ($this->__urls_domain as $k=>$url_domain)
			{
				echo_br ('url domain: '.$url_domain);
				flush();
				
				$domainByCode = soap::call ('sites', 'getArray', array('page'=>0, 'page_size'=>1, 'domain'=>$url_domain));
					
				if(!isset($domainByCode['extra']))
				{
					//print_p($domainByCode);
					//print_p($GLOBALS['SoapClient']->__getLastResponse());
					//flush();
				}
				elseif ($domainByCode['extra']['count'] == 0)
				{
					$set = array();
					$html = '';
	        		$length = 900000;
	        		$f = @fopen ('http://'.$url_domain, 'r');
	        		if ($f)
        			{
		        		while(!feof($f)) 
		        		{	                
                			$html .= fgets($f, $length); // Read file...
	        			} 
	        			fclose ($f);
        			}
	        				        		
	        		if (strlen(trim($html)) > 0)
	        		{
    					$set['domain'] = $url_domain;
						$set['html'] = iso2utf8($html, 'UTF-8');
    					$set['sanit'] = mb_convert_encoding (iso2ascii (rss_strip_tags_sanit ($html)), 'ASCII');
    					$set['dater'] = $set['dateu'] = null;				
						$response = soap::call ('sites', 'insert', $set);
						echo_br ('domain inserted: '.$url_domain);
						flush();	        		
	        		}
	        		else 
	        		{
	        			echo_br ('domain incorect: '.$url_domain);
						flush();
	        		}
				}
				else
				{
					echo_br ('domain exists: '.$url_domain);
					flush();
				}
			}
    	}
    	
    	redirectToUrl('task.crawl_sites.html');
	}
	
	function __crawl_get_sites($url, $url_base, $deep)
	{
		if (isset($this->__urls_crawled[md5($url)])) return false;		
		if ($this->__counter_max < count($this->__urls_crawled)) return false;
		$this->__urls_crawled[md5($url)]  = $url;
		
		$html = $this->__crawl_get_html($url);
		$urls_draft = $this->__crawl_get_urls($html);
		$urls_clean = $this->__crawl_get_clean_urls($urls_draft, $url, $url_base);
		$urls_extern = $this->__crawl_get_extern_urls($html, $url, $url_base);
		
		echo_br('__crawl_get_sites: '.$url);
		flush();
		
		foreach ($urls_extern as $url_md5=>$url_extern)
		{
			$this->__urls_domain[$url_md5]  = $url_extern;
		}
		
		foreach ($urls_clean as $url_md5=>$url_clean)
		{
			if ($deep < $this->__deep_max) 
			{
				$this->__crawl_get_sites($url_clean, $url_base, $deep+1);
			}
		}
	}
	
	function crawl_feeds()
	{
		$this->__counter_max = 1000;
		$this->__deep_max = 10;
		$this->__urls_feed  = array();
		$this->__urls_crawled  = array();
		
		$response = soap::call ('sites', 'readLastFeed');
		if (isset($response['extra']['count'])  && $response['extra']['count'] > 0)
    	{
    		$domain = $response['data'][0];
    		echo_br ('domain start: '.$domain['domain']);	
    		echo_ln ();
    		flush();
    		if (isset($domain['domain_base']))
    		{
    			$url_base = 'http://'.$domain['domain_base'];
    		}
    		else 
    		{
    			$url_base = 'http://'.$domain['domain'];
    		}
    		    		
			$url = 'http://'.$domain['domain'];
			$this->__crawl_get_feeds($url, $url_base, 0);
		}
		redirectToUrl('task.crawl_feeds.html');
	}
	
	function __crawl_get_feeds($url, $url_base, $deep)
	{
		if (isset($this->__urls_crawled[md5($url)])) return false;		
		if ($this->__counter_max < count($this->__urls_crawled)) return false;
		$this->__urls_crawled[md5($url)]  = $url;
		
		$html = $this->__crawl_get_html($url);
		$urls_draft = $this->__crawl_get_urls($html);
		$urls_clean = $this->__crawl_get_clean_urls($urls_draft, $url, $url_base);
		
		foreach ($urls_clean as $url_md5=>$url_clean)
		{
			if (isset($this->__urls_feed[md5($url_clean)])) continue;
			if ($this->__crawl_is_feed ($url_clean))
			{
				$this->__urls_feed[$url_md5] = $url_clean;
				$set = array();
				$set['url'] = $url_clean;
				$set['title'] = str_replace('http://', '', $url_clean);
				$response = soap::call ('feeds', 'insert', $set);
				
				echo_br ('feed:'.$url_clean);
				echo_ln();
				flush();
			}
			elseif ($deep < $this->__deep_max) 
			{
				echo_br ('html:'.$url_clean);
				echo_ln();
				flush();
				$this->__crawl_get_feeds($url_clean, $url_base, $deep+1);
			}
		}
	}
	
	function __crawl_get_html($url)
	{
		$html = '';
		$matches = array();
		$f = @fopen ($url, 'r');
		if ($f)
		{			
			$length = 90000;
			$i = 0;
    		while(!feof($f)) 
    		{	                
    			if ($i++ > 1000) break;
    			$html .= fgets($f, $length); // Read file...
			} 
			fclose ($f);
		}
		
		return $html;
	}
	
	function __crawl_get_urls($html)
	{
		$url_pattern = "/\s+href\s*=\s*[\"\']?([^\s\"\']+)[\"\'\s]+/ims";
		preg_match_all ($url_pattern, $html, $matches, PREG_PATTERN_ORDER);
		return $matches[1];
	}
	
	function __crawl_get_extern_urls($html, $current_url, $base_url)
	{
		$urls_clean = array();
		
		$url_pattern = "/http:\/\/[a-z0-9\.]*\.ro/ims";
		preg_match_all ($url_pattern, $html, $matches, PREG_PATTERN_ORDER);
		$urls_draft = $matches[0];
		print_p($urls_draft);
		
		foreach($urls_draft as $id => $url)
		{
			$a = 1;
			$url = str_replace ('http://', '', $url, $a);
			if (strpos($url, '.ro') !== false)
			{
				$urls_clean[md5($url)] = $url;
			}
		}
		
		return $urls_clean;
	}
	
	function __crawl_get_clean_urls($urls_draft, $current_url, $base_url)
	{
		$urls_clean = array();
	
		foreach($urls_draft as $id => $url)
		{
			$url = $this->__crawl_set_qualified_url($url, $current_url, $base_url);
			
			$pos = 
				strpos ($url, $base_url) !== false && 
				//strpos ($url, 'rss') !== false && 
				strpos ($url, '/javascript') == false &&
				strpos ($url, '/css') == false &&
				strpos ($url, '/images') == false &&
				strpos ($url, '/img') == false &&
				strpos ($url, '/comentarii') == false &&
				strpos ($url, '@') == false &&
				strpos ($url, '#') == false &&
				strpos ($url, 'mailto') == false &&
				strpos ($url, '.htm/') == false &&
				strpos ($url, '.html/') == false
			;
			
			if ($pos === false) continue;
			$urls_clean[md5($url)] = $url;
		}
		
		return $urls_clean;
	
	}
	
	function __crawl_set_qualified_url($url_draft, $current_url, $base_url)
	{
		if (strpos ($url_draft, "://") != 0 && substr($url_draft, 0, 7) != "http://") return false;
		if (substr($url_draft, 0, 1) != "/" && substr($url_draft, 0, 7) != "http://") $url_draft = $current_url . "/" . $url_draft;
		if (substr($url_draft, 0, 7) != "http://") $url_draft = $base_url . "/" . $url_draft;
		$url_draft = str_replace("/./", "/", $url_draft);
		$url_draft = preg_replace("/\/[\/]+/i", "/", $url_draft);
		$url_draft = str_replace("http:/", "http://", $url_draft);
		$url_draft = str_replace("&amp;", "&", $url_draft);
	
		$url_draft = preg_replace("/sid=[\w\d]+/i", "", $url_draft);
		return $url_draft;
	}
	
	function __crawl_is_feed ($url)
	{
		sleep (5);
		$file = new SimplePie_File($url);
		$test = new SimplePie_Locator($file);
		$is_feed = $test->is_feed($file);
		if (strpos ($url, 'sitemap') !== false) $is_feed = false;
		if ($is_feed)
		{
		      return true;
		}
		else
		{
			return false;
		}
	}
	
	function rss_reader()
    {
    	$response = soap::call ('feeds', 'readLast');
    	$news = array();
    	if (isset($response['extra']['count'])  && $response['extra']['count'] > 0)
    	{
    		$feed = $response['data'][0];
    		
    		
    		echo_br ($feed['url']);
    		echo_ln ();
			$news_items = $this->__get_news_items ($feed);
			
			if (count($news_items) > 0)
			{
				foreach ($news_items as $news_item)
				{
					$newsByCode = soap::call ('news', 'getArray', array('page'=>0, 'page_size'=>1, 'feed_id'=>$feed['id'],'code'=>$news_item['code'], 'permalink'=>$news_item['permalink'], 'rethtml'=>true));
					
					
					if(!isset($newsByCode['extra']))
					{
						print_p($newsByCode);
						print_p($GLOBALS['SoapClient']->__getLastResponse());
					} 					
					elseif ($newsByCode['extra']['count'] == 0)
	    			{
		        		sleep (1);
	    				$html = '';
		        		$length = 900000;
		        		$f = @fopen ($news_item['permalink'], 'r');
		        		if ($f)
	        			{
			        		while(!feof($f)) 
			        		{	                
	                			$html .= fgets($f, $length); // Read file...
		        			} 
		        			fclose ($f);
	        			}
		        				        		
		        		if (strlen(trim($html)) > 0)
		        		{
	    					//$news_item['html'] = iso2utf8($html, 'UTF-8');
	    					$news_item['html'] = '';
	    					$news_item['sanit'] = mb_convert_encoding (iso2ascii (rss_strip_tags_sanit ($html)), 'ASCII');
	    					
	    					$newsInsert = soap::call ('news', 'insert', $news_item);
			        		echo_br ('code inserted: '.$news_item['code']);		        		
		        		}
		        		else 
		        		{
		        			echo_br ('permalink invalid: '.$news_item['permalink']);
		        			flush();
		        		}
	    			}
	    			else 
	    			{
	    				echo_br ('code exists: '.$news_item['code']);
	    				flush();
						
	    			}
				}
			}
			else 
			{
				$updateLast = soap::call ('feeds', 'updateLast', array('id'=>$feed['id']));
    			echo_br('no news for feed');
    			flush();
			}
		}
		else 
    	{
    		echo_br('no feeds');
    		flush();
    	}
    	
    	redirectToUrl('task.index.html');
	}
	
	function __get_news_items ($feed)
	{
		$news = array();
		$SimplePie = new SimplePie();
		$SimplePie->enable_cache(false);
		$SimplePie->set_feed_url($feed['url']);
		$success = $SimplePie->init();
		$items = $SimplePie->get_items();
		if (count($items) > 0)
		{
			foreach ($items as $kitem=>$pie_item)
			{
				$feed_item['title'] = mb_convert_encoding(iso2ascii($pie_item->get_title()), 'ASCII');
				if (strlen(trim($pie_item->get_date('Y-m-d H:i:s'))) > 0)
				{
					$feed_item['date'] = $pie_item->get_date('Y-m-d H:i:s');
				}
				else 
				{
					$feed_item['date'] = date('Y-m-d H:i:s');
				}
				
				$feed_item['permalink'] = $pie_item->get_permalink();
				$author = $pie_item->get_author();
				
				if (is_object($author))
				{
					$feed_item['author'] = $author->get_name();
				}
				else 
				{
					$feed_item['author'] = '';
				}
				$category = $pie_item->get_category();
				if (is_object($category))
				{
					$feed_item['category'] = $category->get_term();
				}
				else 
				{
					$feed_item['category'] = '';
				}
				$feed_item['link'] = $SimplePie->get_link();
				$feed_item['content'] = mb_convert_encoding(iso2ascii($pie_item->get_content()), 'ASCII');
				$feed_item['description'] = mb_convert_encoding(iso2ascii($pie_item->get_description()), 'ASCII');

				$set = array();
				$set['feed_id'] = $feed['id'];
				
				if (isset($feed_item['title']))
				{
					$set['code'] = code(iso2ascii($feed_item['title']));
					$set['title'] = $feed_item['title'];
				}
				else 
				{
					echo_br ('title does not exists');
					flush();
					continue;
				}
				
				if (strlen(trim($feed_item['content'])) > 1 && strlen(trim($feed_item['description'])) > 1 )
				{
					$set['content'] = rss_strip_tags($feed_item['content']);
					$set['description'] = rss_strip_tags($feed_item['description']);
				}
				elseif (strlen(trim($feed_item['content'])) > 1)
				{
					$set['content'] = rss_strip_tags($feed_item['content']);
					$set['description'] = smart_crop(rss_strip_tags($feed_item['content']), 500);
				}
				elseif (strlen(trim($feed_item['description'])) > 1)
				{
					$set['description'] = $set['content'] = smart_crop(rss_strip_tags($feed_item['description']), 500);
				}
				else 
				{
					echo_br ('content does not exists:'.$set['code']);
					flush();
					continue;
				}
				
				$set['author'] = $feed_item['author'];
				$set['permalink'] = $feed_item['permalink'];
				$set['domain'] = '';
				$set['date'] = date('Y-m-d H:i:s', strtotime($feed_item['date']));
				$set['datec'] = date('Y-m-d H:i:s');
				$set['category'] = $feed_item['category'];
				
				$news[] = $set;
			}
			return $news;			
		}				
	}
}
?>