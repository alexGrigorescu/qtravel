<?php
	class DefUsersGrid extends Grid
	{
		function DefUsersGrid($obj)
		{			
			$this->setName('users');
			$this->setObj($obj);
			$this->setPage($this->obj->page);
			$this->setPageParam('users_page');
			$this->setPageSize(20);
			
			$this->addColumn ('user_name', '');
			$this->addColumn ('email', '');
			
			$this->addColumn ('active', '', 'column_active');
			$this->addColumn ('edit', '', 'column_edit');
			
			$this->addSorting ("id", "id desc");
			$this->addSorting ("user_name", "user_name asc");
			$this->addSorting ("email", "email desc");
		}
		
		function column_edit($row)
		{			
			return '<a href="' . url(OBJ, 'edit', array('id'=>$row['id'])) . '">'.tr('users_link_edit').'</a>';
		}
		
		function column_active($row)
		{
			$text = ($row['active'] > 0)?tr('users_link_yes'):tr('users_link_no');
			return '<a href="'.url(OBJ, 'active', array('id'=>$row['id'])).'">'.$text.'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['page'] = $this->page;
			$set['page_size'] = $this->page_size;
			$set['user_type'] = $this->obj->user_type;
			$set['text'] = $this->obj->text;
			$set['sorting'] = $this->sorting;
			
			$response = Bus::call('users', 'getArray', $set);
					
			$this->data = $response['data'];
			$this->records_count = $response['count'];
		}
		
		function getFilterImage ()
		{
			$t = new Template(TEMPLATE."/adm_filter");
			$t->form = new AdmUsersFilterForm ();											
			$t->form->LoadFromRequest();
			return $t->get();
		}
	}
?>