<?php
	class DefVacancyOfferAdvertising extends Grid
	{
		function DefVacancyOfferAdvertising($obj)
		{			
			$this->setName('advertising');
			$this->setObj($obj);
			$this->setPageSize(30);
			$this->url = $obj->url;
			
			$this->addColumn ('title', '', 'column_title');
			$this->addColumn ('status', '', 'column_status');
			$this->addColumn ('edit', '', 'column_edit');
			$this->addColumn ('delete', '', 'column_delete');
			$this->addColumn ('offer_code', '', 'column_offer_code');
			
		}

		function column_status($row)
		{	
			$activStr = '<a href="'.url('offer_vacancy','advertising_change_status',array('id'=>$row['id'])).'">Activ</a>';
			$inactivStr = '<a href="'.url('offer_vacancy','advertising_change_status',array('id'=>$row['id'])).'">Inactiv</a>';
			return ($row['status']==1)?$activStr:$inactivStr;
		}
		
		function column_title($row)
		{	
			return '<a href="#">'.$row['title'].'</a>';
		}
		
		function column_edit($row)
		{	
			return '<a href="'. url('offer_vacancy','advertising_edit',array('id'=>$row['id'])).'">Edit</a>';
		}
		
		function column_delete($row)
		{	
			return '<a href="#" onclick="if(confirm(\'Doriti sa efectuati stergerea?\')){location.href=\''. url('offer_vacancy','advertising_delete',array('id'=>$row['id'])).'\';}">Delete</a>';
		}
		
		function column_offer_code($row)
		{	
			return '<a href="#">'.$row['offer_code'].'</a>';
		}
		
		function getData()
		{
			$set = array();
			$set['page'] = 0;
			$set['page_size'] = 30;
			$set['group'] = 'search_home';
			$set['sorting'] = 'id asc';

			$response = Bus::call('vacancyOfferAdvertising', 'getArray', $set);
		
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