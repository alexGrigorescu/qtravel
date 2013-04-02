<?php
	class spider
    {
    	function admin()
        {
        	echo ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body>');
        	$feeds = Bus::call('feeds', 'getArray', array());
    		foreach ($feeds['data'] as $feed)
    		{
    			$sql = 'delete from news where feed_id = '.$feed['id'];
				$q = new Query($sql);
				//$q->execute();
					
    			echo_br ($feed['url']);
    			$SimplePie = new SimplePie();
    			$SimplePie->enable_cache(false);
    			$SimplePie->set_feed_url($feed['url']);
    			$success = $SimplePie->init();
    			$items = $SimplePie->get_items();
    			
    			foreach ($items as $kitem=>$pie_item)
				{
					$feed_item['title'] = iso2ascii($pie_item->get_title());
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
					if (is_object($author))
					{
						$feed_item['category'] = $category->get_term();
					}
					else 
					{
						$feed_item['category'] = '';
					}
					$feed_item['link'] = $SimplePie->get_link();
					$feed_item['content'] = iso2ascii($pie_item->get_content());
					$feed_item['description'] = iso2ascii($pie_item->get_description());

					$set = array();
					$set['feed_id'] = $feed['id'];
					$set['active'] = 1;
					$set['datec'] = date('Y-m-d H:i:s');
					$set['datem'] = date('Y-m-d H:i:s');
					
					if (isset($feed_item['title']))
					{
						$set['code'] = code('rss '.date('ym', strtotime($feed_item['date'])).'-'.iso2ascii($feed_item['title']));
						$set['title'] = $feed_item['title'];
					}
					else 
					{
						echo_br ('title does not exists');
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
						continue;
					}
					
					$set['author'] = $feed_item['author'];
					$set['permalink'] = $feed_item['permalink'];
					$set['date'] = date('Y-m-d H:i:s', strtotime($feed_item['date']));
					$set['category'] = $feed_item['category'];
					
					$newsByCode = Bus::call('news', 'codeExists', array('code'=>$set['code'], 'title'=>$set['title'], 'permalink'=>$set['permalink'], 'id'=>0));
					
					if (!isset($newsByCode['id']))
        			{
		        		$this->id = Bus::call('news', 'insert', $set);
			        	echo_br ('code inserted: '.$set['code']);
        			}
        			else 
        			{
        				echo_br ('code exists: '.$set['code']);
        			}
				}
    		}
        }
        
        function tags($id)
        {
        	echo ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body>');
        	$news = Bus::call('news', 'read', array('id'=>$id));
        	$content = $news['title'].' '.$news['content'];
			$words = match_words($content);
			
			foreach ($words[0] as $k=>$v)
			{
				print_p($v);
				if (strlen(trim($v)) > 4)
				{
					$word = trim($v);
					$set = array();					
					$set['active'] = 1;
					$set['title'] = $word;
					$set['code'] = code(iso2ascii($word));
					$set['views'] = 0;
					$set['news'] = 0;
					
					$tagByCode = Bus::call('tags', 'codeExists', array('code'=>$set['code'], 'title'=>$set['title'], 'id'=>0));
					if (!isset($tagByCode['id']))
        			{
		        		$tag_id = Bus::call('tags', 'insert', $set);
			        	echo_br ('code inserted: '.$set['code']);
			        	
			        	$set2 = array();
			        	$set2['news_id'] = $id;
			        	$set2['tag_id'] = $tag_id;
			        	$this->id = Bus::call('newsTags', 'insert', $set2);
        			}
        			else 
        			{
        				echo_br ('code exists: '.$set['code']);
        			}
					
					print_p($set);
				}
			}
			print_p($words);
        	die();
        }
    }
?>