<?php
	class DefSpecialsGrid extends Grid
	{
		function DefSpecialsGrid($obj)
		{			
			$this->setName('specials');
			$this->setPrefix('specials_');
			$this->setPageParam('specials_filter_page');
			$this->setSortParam('specials_filter_sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(1000);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('title', '');
			$this->addColumn ('type', '', 'column_type');
			$this->addColumn ('domain_domain', '', '');
			$this->addColumn ('special1', '', 'column_special1');
			$this->addColumn ('special2', '', 'column_special2');
			
			$this->addSorting ('title', 'title asc');			
		}
		
		function column_code($row)
		{
			$result = '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
			return $result;
		}
		
		function column_special1($row)
		{
			return '<a href="' . url(OBJ, 'special1', array('id'=>$row['id'])) . '" >'.tr('specials_special1_link_'.$row['special1']).'</a>';
		}
		
		function column_special2($row)
		{
			return '<a href="' . url(OBJ, 'special2', array('id'=>$row['id'])) . '" >'.tr('specials_special2_link_'.$row['special2']).'</a>';
		}
		
		function column_type($row)
		{
			return tr('specials_type_'.$row['type']);
		}
		
		function getData()
		{
			$this->data = array();
			$this->records_count = 0;
			$set['special1'] = $this->obj->special1;
			$set['type'] = $this->obj->type;
			$set['text'] = $this->obj->text;
			$set['sorting'] = ' specials.title asc';
			$response = Bus::call('specials', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>