<?php
	class DefPicsGrid extends Grid
	{
	   function DefPicsGrid($obj)
		{
			$this->setName('pics');
			$this->setObj($obj);
			$this->setPage(0);
			$this->setPageSize(100);
			
			$this->addColumn ('count', '', 'column_count', '', 'width: 50px;');
			$this->addColumn ('file', '', 'column_file', '', 'width: 80%;');
			$this->addColumn ('size', '', 'column_size', 'text-align:right;', 'width: 50px;');
			$this->addColumn ('delete', '', 'column_delete', '', 'width: 50px;');
				
			$this->addSorting ("code", "code asc");
		}
		
		function column_file($row)
		{
			$str = '';
			$path = LOCAL_PATH.'systems/'.SYSTEM.'/templates/'.SECTION.'/img/icons/';
			$url = LOCAL_URL.'systems/'.SYSTEM.'/templates/'.SECTION.'/img/icons/';
			$icon = 'icon.default.gif';
			if (strlen(trim($row['ext'])) > 0)
			{
				if (file_exists($path.'icon'.$row['ext'].'.gif'))
				{
					$icon = 'icon'.$row['ext'].'.gif';
				}
			}
			$str .= '<img src="'.$url.$icon.'" style="width:16px;height:16px;" align="absmiddle"/>&nbsp;'.$row['file'];
			return $str;
		}
		
		function column_count($row)
		{
			return ($this->row_count++).'.';
		}
		
		function column_size($row)
		{
			return sprintf('%.2f', $row['size']/1024) .'kb';
		}
		
		function column_delete($row)
		{
			return '<a href="#" onClick="picsDelete(\''.$row['file'].'\', \''.$this->obj->id.'\'); return false;">'.tr('pics_link_delete').'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			if($this->sorting > '')
			{	
				$set['order_by'] = $this->sorting;
			}
			$set['target_id'] = $this->obj->id;
			$set['type'] = $this->obj->type;
			$response = Bus::call('pics', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>