<?php
	class DefPagesGrid extends Grid
	{
		function DefPagesGrid($obj)
		{			
			$this->setName('pages');
			$this->setPrefix('pages_');
			$this->setPageParam('page');
			$this->setSortParam('sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			
			$this->addSorting ('id', 'id asc');			
		}
		
		function column_code($row)
		{
			return '<div class="level'.$row['level'].'"><a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a></div>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['sorting'] = ' tree asc, pages.ord asc';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('pages', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>