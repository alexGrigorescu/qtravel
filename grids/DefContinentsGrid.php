<?php
	class DefContinentsGrid extends Grid
	{
		function DefContinentsGrid($obj)
		{			
			$this->setName('continents');
			$this->setPrefix('continents_');
			$this->setPageParam('continents_filter_page');
			$this->setSortParam('continents_filter_sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('title', '');
			$this->addColumn ('special1', '', 'column_special1');
			$this->addColumn ('special2', '', 'column_special2');
			$this->addColumn ('delete', '', 'column_delete');
			
			$this->addSorting ('id', 'id asc');			
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}
		
		function column_special1($row)
		{
			return '<a href="' . url(OBJ, 'special1', array('id'=>$row['id'])) . '" >'.tr('continents_special1_link_'.$row['special1']).'</a>';
		}
		
		function column_special2($row)
		{
			return '<a href="' . url(OBJ, 'special2', array('id'=>$row['id'])) . '" >'.tr('continents_special2_link_'.$row['special2']).'</a>';
		}
		
		function column_delete($row)
		{
			return '<a href="#" onClick="deleteContinent(\''.$row['id'].'\'); return false;" >'.tr('continents_delete_link').'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['sorting'] = ' continents.title asc';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('continents', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>