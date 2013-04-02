<?php
	class DefAccommodationTypesGrid extends Grid
	{
		function DefAccommodationTypesGrid($obj)
		{			
			$this->setName('accommodation_types');
			$this->setPrefix('accommodation_types_');
			$this->setPageParam('page');
			$this->setSortParam('sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('title', '');
			$this->addColumn ('stars', '');
			
			$this->addSorting ('code', 'code asc');
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['sorting'] = ' accommodation_types.code asc';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('accommodationTypes', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>