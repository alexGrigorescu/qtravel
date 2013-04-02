<?
	class BusPics extends BusTable
	{	
		function BusPics()
		{
			$this->setTable('pics');
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);	
			$set['page_size'] = elementNr($set['page_size'], 100);	
			$set['type'] = elementStr($set['type'], 'pages');
			$set['target_id'] = elementNr($set['target_id'], 0);
			$set['thumb'] = elementNr($set['thumb']);
			$set['thumb_width'] = elementNr($set['thumb_width'], 100);
			$set['thumb_height'] = elementNr($set['thumb_height'], 100);
			
			$folder = self::path (array('target_id'=>$set['target_id'], 'type'=>$set['type']));
			$url = self::url (array('target_id'=>$set['target_id'], 'type'=>$set['type']));
			$b = new picture ($folder, '', $url);
			$files = $b->getFiles();
			$count = count($files);
			$files = array_slice($files, $set['page'] * $set['page_size'], $set['page_size']);
			
			$data = array();
			foreach ($files as $k=>$v)
			{
				$a = array();
				$a['file'] = $v;
				$a['target_id'] = $set['target_id'];
				$a['ext'] = $b->getExt($v);
				$a['size']  = filesize ($folder.$v);
				
				if ($set['thumb'] == 1)
				{
					$path = Bus::call('pics', 'path', array('type'=>'locations', 'target_id'=>$set['target_id']));
					$url = Bus::call('pics', 'url', array('type'=>'locations', 'target_id'=>$set['target_id']));
					$picture = new picture($path, '', $url);
					$alt = ' alt="'.$a['file'].'" title="'.$a['file'].'"';
					$a['thumb'] = $picture->getTag($v, $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					$thumb = $picture->getThumb($a['file'], 500, 500, 1, 1);
					$a['thumb_url'] = $url.$thumb['pic'];
					$thumb = $picture->getThumb($a['file'], 442, 331, 1, 0);
					$a['thumb_url_vacancy'] = $url.$thumb['pic'];
					$thumb = $picture->getThumb($a['file'], $set['thumb_width'], $set['thumb_height'], 1, 0);
					$a['thumb_vacancy'] = $url.$thumb['pic'];
				}
				
				$data[] = $a;
			}
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			
			return $response;
		}
		
		function exists($set)
		{
			$w = '';
			$set['type'] = elementStr($set['type'], 'pages');
			$set['target_id'] = elementNr($set['target_id'], 0);
			$set['file'] = elementStr($set['file'], 0);
			
			$folder = self::path (array('target_id'=>$set['target_id'], 'type'=>$set['type']));
			
			if (file_exists($folder.$set['file']))
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		function path ($set)
		{
			$set['target_id'] = elementNr($set['target_id']);
			$set['type'] = elementStr($set['type'], 'pages');
			$set['trail'] = elementStr($set['trail'], '/');
			$path = USR_PATH.'pics/';
			if (!file_exists($path))
			{
				mkdir($path, 0777);
				chmod($path, 0777);
			}
			$path = USR_PATH.'pics/'.$set['type'].'/';
			if (!file_exists($path))
			{
				mkdir($path, 0777);
				chmod($path, 0777);
			}
			$path = USR_PATH.'pics/'.$set['type'].'/'.$set['target_id'].$set['trail'];
			if (!file_exists($path))
			{
				mkdir($path, 0777);
				chmod($path, 0777);
			}
			return $path;
		}
		
		function url ($set)
		{
			$set['target_id'] = elementNr($set['target_id']);
			$set['type'] = elementStr($set['type'], 'pages');
			$set['trail'] = elementStr($set['trail'], '/');
			$url = USR_URL.'pics/'.$set['type'].'/'.$set['target_id'].$set['trail'];
			return $url;
		}
		
		function delete($set)
		{
			$path = Bus::call('pics', 'path', $set);
			if (file_exists($path.$set['file']))
			{
				@unlink($path.$set['file']);
				$b = new browse ($path.'thumbs/');
				$b->deleteFiles();
			}
		}
	}
?>