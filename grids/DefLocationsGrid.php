<?php
	class DefLocationsGrid extends Grid
	{
		function DefLocationsGrid($obj)
		{			
			$this->setName('locations');
			$this->setPrefix('locations_filter_');
			$this->setPageParam('locations_filter_page');
			$this->setSortParam('sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('region_title', '');
			$this->addColumn ('country_title', '');
			$this->addColumn ('continent_title', '');
			$this->addColumn ('special1', '', 'column_special1');
			$this->addColumn ('special2', '', 'column_special2');
			$this->addColumn ('accommodation_type_stars', '', '');
			$this->addColumn ('delete', '', 'column_delete');
			
			$this->addSorting ('id', 'id asc');			
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}
		
		function column_special1($row)
		{
			return '<a href="' . url(OBJ, 'special1', array('id'=>$row['id'])) . '" >'.tr('locations_filter_special1_link_'.$row['special1']).'</a>';
		}
		
		function column_special2($row)
		{
			return '<a href="' . url(OBJ, 'special2', array('id'=>$row['id'])) . '" >'.tr('locations_filter_special2_link_'.$row['special2']).'</a>';
		}
		
		function column_delete($row)
		{
			return '<a href="#" onClick="deleteLocation(\''.$row['id'].'\'); return false;" >'.tr('locations_filter_delete_link').'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['region_id'] = $this->obj->region_id;
			$set['continent_id'] = $this->obj->continent_id;
			$set['country_id'] = $this->obj->country_id;
			$set['accommodation_type_id'] = $this->obj->accommodation_type_id;
			$set['sorting'] = ' continents.title asc, countries.title asc, regions.title asc, locations.title asc';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('locations', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>