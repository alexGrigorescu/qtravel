<?php
	class DefBussesGrid extends Grid
	{
		function DefBussesGrid($obj)
		{			
			$this->setName('busses');
			$this->setPrefix('busses_');
			$this->setPageParam('page');
			$this->setSortParam('sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('flight_type_title', '');
			$this->addColumn ('start', '', 'column_start');
			$this->addColumn ('end', '', 'column_end');
			$this->addColumn ('special1', '', 'column_special1');
			$this->addColumn ('special2', '', 'column_special2');
			$this->addColumn ('delete', '', 'column_delete');
			
			$this->addSorting ('id', 'id asc');
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}
		
		function column_start($row)
		{
			return $row['start_region_title'].', '.$row['start_country_title'];
		}
		
		function column_end($row)
		{
			return $row['end_region_title'].', '.$row['end_country_title'];
		}
		
		function column_special1($row)
		{
			return '<a href="' . url(OBJ, 'special1', array('id'=>$row['id'])) . '" >'.tr('busses_special1_link_'.$row['special1']).'</a>';
		}
		
		function column_special2($row)
		{
			return '<a href="' . url(OBJ, 'special2', array('id'=>$row['id'])) . '" >'.tr('busses_special2_link_'.$row['special2']).'</a>';
		}
		
		function column_delete($row)
		{
			return '<a href="' . url(OBJ, 'delete', array('id'=>$row['id'])) . '" >'.tr('busses_delete_link').'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['start_continent_id'] = $this->obj->start_continent_id;
			$set['start_country_id'] = $this->obj->start_country_id;
			$set['start_region_id'] = $this->obj->start_region_id;
			$set['end_continent_id'] = $this->obj->end_continent_id;
			$set['end_country_id'] = $this->obj->end_country_id;
			$set['end_region_id'] = $this->obj->end_region_id;
			$set['special1'] = $this->obj->special1;
			$set['special2'] = $this->obj->special2;
			$set['sorting'] = '';
			$set['page'] = $this->page;
			
			$response = Bus::call('busses', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>