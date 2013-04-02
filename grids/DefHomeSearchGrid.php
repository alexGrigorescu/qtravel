<?php
	class DefHomeSearchGrid extends Grid
	{
		function DefHomeSearchGrid($obj)
		{			
			$this->setName('home_search');
			$this->setObj($obj);
			$this->setPageSize(30);
			
			$this->addColumn ('group', '');
			$this->addColumn ('code', '');
			$this->addColumn ('title', '');
			$this->addColumn ('status', '', 'column_status');
		}

		function column_status($row)
		{
			return ($row['status']==1)?'Activ':'Inactiv';
		}
		
		function getData()
		{
			$set = array();
			$set['page'] = 0;
			$set['page_size'] = 30;
			$set['group'] = 'search_home';
			$set['sorting'] = 'id asc';

			$response = Bus::call('vacancyOfferAdmin', 'getArray', $set);
		
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