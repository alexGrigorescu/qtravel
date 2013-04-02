<?php
	class DefFlightOperatorsGrid extends Grid
	{
		function DefFlightOperatorsGrid($obj)
		{			
			$this->setName('flight_operators');
			$this->setPrefix('flight_operators_');
			$this->setPageParam('flight_operators_page');
			$this->setSortParam('sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('title', '');
			$this->addColumn ('delete', '', 'column_delete');
			
			$this->addSorting ('id', 'id asc');			
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}
		
		function column_delete($row)
		{
			return '<a href="#" onClick="deleteFlightOperator(\''.$row['id'].'\'); return false;" >'.tr('flights_operators_filter_delete_link').'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['sorting'] = ' flight_operators.title asc';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('flightOperators', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>