<?
	class BusSitemap extends BusTable
	{	
		function BusSitemap()
		{
			$this->setTable(TBL_SITEMAP);
		}

		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 10000);
			$set['domain'] = strtolower(elementStr($set['domain']));
			
			$sql  = 
			'
			SELECT * FROM `'.TBL_SITEMAP.'`  
			WHERE url like \'%'.encode($set['domain']).'%\'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();
			$data = $q->getArray($set['page'], $set['page_size']);
			
			foreach ($data as &$item)
			{
				$item['url'] = str_replace ('&', '&amp;', $item['url']);
				$item['rank'] = 0.9-$item['depth']/20;
				$last_crawled = strtotime($item['last_crawled']);
				//$item['last_crawled_format'] = date('Y-m-d', $last_crawled).'T'. date('H:i:s', $last_crawled).'+00:00';
				$item['last_crawled_format'] = date('Y-m-d', $last_crawled);
			}
			
			$response = array();
		    $response['count'] = $count;
		    $response['data'] = $data;
		    
		    return $response;
		}
		
		function insert($set)
		{
			$id = 0;
			$t = new Table ($this->table);
			if(array_key_exists('url', $set) && array_key_exists('url_title', $set)
				&& strlen(trim($set['url'])) > 0 && strlen(trim($set['url_title'])) > 0) {
				$id = $t->insert($set);
			}

			return $id;
		}
	}
?>