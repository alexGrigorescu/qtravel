<?php
	class DefCountriesGrid extends Grid
	{
		function DefCountriesGrid($obj)
		{			
			$this->setName('countries');
			$this->setPrefix('countries_');
			$this->setPageParam('countries_filter_page');
			$this->setSortParam('sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('title', '');
			$this->addColumn ('continent_title', '');
			$this->addColumn ('special1', '', 'column_special1', 'text-align:center;', 'text-align:center;');
			$this->addColumn ('special2', '', 'column_special2', 'text-align:center;', 'text-align:center;');
			$this->addColumn ('delete', '', 'column_delete');
			
			$this->addSorting ('id', 'id asc');			
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}
		
		function column_special1($row)
		{
			return '<a href="' . url(OBJ, 'special1', array('id'=>$row['id'])) . '" >'.tr('countries_special1_link_'.$row['special1']).'</a>';
		}
		
		function column_special2($row)
		{
			return '<a href="' . url(OBJ, 'special2', array('id'=>$row['id'])) . '" >'.tr('countries_special2_link_'.$row['special2']).'</a>';
		}
		
		function column_delete($row)
		{
			return '<a href="#" onClick="deleteCountry(\''.$row['id'].'\'); return false;" >'.tr('countries_delete_link').'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['continent_id'] = $this->obj->continent_id;
			$set['special1'] = $this->obj->special1;
			$set['special2'] = $this->obj->special2;
			$set['buble_offer_vacancy'] = $this->obj->buble_offer_vacancy;
			$set['sorting'] = ' continents.title asc, countries.title asc';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('countries', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>