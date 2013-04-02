<?php
	class DefContractsGrid extends Grid
	{
		function DefContractsGrid($obj)
		{			
			$this->setName('contracts');
			$this->setPrefix('contracts_');
			$this->setPageParam('contracts_page');
			$this->setSortParam('contracts_sort');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageSize(20);
			
			$this->addColumn ('code', '', 'column_code');
			$this->addColumn ('user', '', 'column_user');
			$this->addColumn ('doc', '', 'column_doc');
			$this->addColumn ('ve', '', 'column_ve');
			//$this->addColumn ('vp', '', 'column_vp');
			$this->addColumn ('delete', '', 'column_delete');
			
			$this->addSorting ('id', 'id asc');
		}
		
		function column_code($row)
		{
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.$row['code'].'</a>';
		}

		function column_user($row)
		{
			return $row['user_name'];
		}
		
		function column_doc($row)
		{
			return '<a href="' . $row['code'].'.rtf' . '" target="_blank">'.tr('contracts_doc_link').'</a>';
		}
		
		function column_ve($row)
		{
			return '<a href="' . $row['code'].'-voucher-electronic.pdf' . '" target="VE">VE</a>';
		}

		function column_vp($row)
		{
			return '<a href="' . $row['code'].'-voucher-print.pdf' . '" target="VP">VP</a>';
		}
		
		function column_delete($row)
		{
			return '<a href="' . url(OBJ, 'delete', array('id'=>$row['id'])) . '" >'.tr('contracts_delete_link').'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['text'] = $this->obj->text;
			$set['sorting'] = '';
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			
			$response = Bus::call('contracts', 'getArray', $set);
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
	}
?>