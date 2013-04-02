<?
	class BusDomains extends BusTable
	{	
		function BusDomains()
		{
			$this->setTable(TBL_DOMAINS);
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = strtolower(elementStr($set['text']));
			$set['domain'] = strtolower(elementStr($set['domain']));
			$set['thumb'] = elementNr($set['thumb']);
			$set['thumb_width'] = elementNr($set['thumb_width'], 100);
			$set['thumb_height'] = elementNr($set['thumb_height'], 100);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['domain'])) > 0) $w .= ' and (LOWER(domain) =\'%'.encode($set['domain']).'%\')';
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(title) like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' domains.title asc';
			
			$sql  = 
			'
			select domains.* from '.TBL_DOMAINS.' domains
			where domains.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			if ($set['thumb'] == 1)
			{
				foreach ($data as $k=>&$v)
				{
					if (strlen(trim($v['picture'])) > 0)
					{
						$path = Bus::call('pics', 'path', array('type'=>'domains', 'target_id'=>$v['id']));
						$url = Bus::call('pics', 'url', array('type'=>'domains', 'target_id'=>$v['id']));
						$picture = new picture($path, '', $url);
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$v['thumb'] = $picture->getTag($v['picture'], $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
					else 
					{
						$path = USR_PATH.'default/';
						$url = USR_URL.'default/';
						$picture = new picture($path, '', $url);
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$v['thumb'] = $picture->getTag('default.jpg', $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
				}
			}
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function getList($set)
		{
			$w = '';
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' domains.domain asc';
			
			$sql  = 
			'
			select domains.id, domains.domain from '.TBL_DOMAINS.' domains
			where domains.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			$q = new Query($sql);
			$count = $q->getCount();	
			$data = $q->getAssocArray('id', 'domain');
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function load ()
		{
			$rec = array();
			$a = self::getArray($rec);
			
			$HOST = trim($_SERVER['HTTP_HOST']);
			$DOMAIN = '';
			$WWW = '';
			foreach($a['data'] as $k=>$v)
			{
				if (strpos($HOST, $v['domain']) !== false && strlen(trim($DOMAIN)) == 0)
				{
					$DOMAIN = $v['domain'];
				}
				
				$types = split (',', $v['type']);
				if($v['type'] == 'main')
				{
					$WWW = $v['domain'];
					$GLOBALS['DOMAINS']['www'] = $v;
					$GLOBALS['DOMAINS'][$v['domain']] = $v;	
				}
				else 
				{
					$param1 = trim($v['param1']);
					foreach($types as $type)
					{
						if (strlen(trim($type)) > 0)
						{
							$v['type'] = $type;
							if (!isset($GLOBALS['DOMAINS'][$v['domain']]))
							{
								$GLOBALS['DOMAINS'][$v['domain']] = $v;							
							}
							if (strlen(trim($v['param1'])) > 0)
							{
								$GLOBALS['DOMAINS'][$type][$v['param1']] = $v;
							}
							else 
							{
								$GLOBALS['DOMAINS'][$type] = $v;
							}
						}
					}	
				}			
			}
			
			if (strlen(trim($DOMAIN)) > 0)
			{
				define ('DOMAIN', $DOMAIN);
				define ('WWW', $WWW);
			}
			else 
			{
				echo ('Domain:'.$HOST.' not mapped!');
				die();
			}
		}
		
		function readByCode($set)
		{
			$sql = 'select * from '.TBL_DOMAINS.' where code=\''.encode($set['code']).'\'';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function readByDomain($set)
		{
			$sql = 'select * from '.TBL_DOMAINS.' where domain=\''.encode($set['domain']).'\'';
			$q = new Query($sql);
			return $q->fetch();
		}
	}
?>
