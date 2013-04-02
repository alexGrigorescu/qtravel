<?php
	class reservation
	{
		function index($type, $id, $err = '')
		{
			$table = $type;
			if(empty($id) || !in_array($table, array('flights','busses','accommodations'))) {
				$t = new layout('main_invalid');
				$img = $t->get();
				$t->display();
				return;
			}
			
			$location = Bus::call($table, 'read', array('id'=>$id));
			
			if (!isset($location['id']))
			{
				$t = new layout('main_invalid');
				$img = $t->get();
				$t->display();
				return;
			}
			
			if ($type == 'flights' || $type == 'busses')
			{
				$location['region_title'] = $location['end_region_title'];
				$location['country_title'] = $location['end_country_title'];
				$location['continent_title'] = $location['end_continent_title'];
				$location['continent_id'] = $location['end_continent_id'];
				$location['location_description'] = $location['description'];
				$location['region_code'] = $location['end_region_code'];
				$location['country_id'] = $location['end_country_id'];
				
				$object=($type == 'flights')?'flight':'buss';
			}
			if($type == 'accommodations'){
				$object = 'accommodation_';
				switch ($location['transport']) {
					case 0:
						$object .= 'individual';
						break;
					case 1:
						$object .= 'plane';
						break;
					case 2:
						$object .= 'bus';
						break;
				}
			}
			
			$form = new DefVacancyReservationForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			$form->loadFromArray($request);
			
			$t = new layout('reservation_index');
			$t->assign('location', $location);
			$t->assign('object', $object);	
			$t->assign('method', __FUNCTION__);		
			$t->assign('form', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function save($type, $id){
			$table = $type;
			$location = Bus::call($table, 'read', array('id'=>$id));
			if ($type == 'flights' || $type == 'busses')
			{
				$location['region_title'] = $location['end_region_title'];
				$location['country_title'] = $location['end_country_title'];
				$location['continent_title'] = $location['end_continent_title'];
				$location['location_description'] = $location['description'];
			}		
			
			$form = new DefVacancyReservationForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{
				if ($type == 'flights' || $type == 'busses')
				{
					$request['title'] = $location['title'];
				}
				else 
				{
					$request['title'] = $location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
				}
				
				$location = Bus::call($table, 'read', array('id'=>$id));
				if ($type =='accommodations')
				{
					$url = url('accommodation', 'location', array('location'=>$location['location_code'], 'region'=>$location['region_code'], 'country'=>$location['country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'].'</a>';
				}
				elseif($type =='flights')
				{
					$url = url('flight', 'location', array('location'=>$location['code'], 'region'=>$location['end_region_code'], 'country'=>$location['end_country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].'</a>';
				}
				elseif($type =='busses')
				{
					$url = url('buss', 'location', array('location'=>$location['code'], 'region'=>$location['end_region_code'], 'country'=>$location['end_country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].'</a>';
				}
				$request['type'] = $type;
				$request['message'] = nl2br($request['message']);
				$request['ip'] = $_SERVER['REMOTE_ADDR'];
				$request['domain'] = $_SERVER['HTTP_HOST'];
				
				$this->mail($request);
				
				redirect(OBJ, 'thanks');
			}
			else 
			{
				$err_msg = $form->getFirstErrorCode();
				$this->index($type, $id, $err_msg['message']);
				return false;
			}
		}
		
		function thanks($type, $id)
		{
			$table = $type;
			$location = Bus::call($table, 'read', array('id'=>$id));
			if ($type == 'flights' || $type == 'busses')
			{
				$location['region_title'] = $location['end_region_title'];
				$location['country_title'] = $location['end_country_title'];
				$location['continent_title'] = $location['end_continent_title'];
				$location['location_description'] = $location['description'];
				$object=($type == 'flights')?'flight':'buss';
			} else {
				$object = 'accommodation_individual';
			}

			$t = new layout('reservation_index');
			$t->assign('thanks', 1);
			$t->assign('location', $location);
			$t->assign('object', $object);	
			$t->assign('method', __FUNCTION__);
			$t->display($meta);
		}
		
		function mail($info)
		{
			$from = $info['email'];
			$to = $GLOBALS['ADMIN_EMAIL'];
			$to1 = $GLOBALS['SUPPORT_EMAIL'];
			
			$subj = tr('reservation_'.$info['type'].'_mail_subj');
			$body = tr('reservation_'.$info['type'].'_mail_body');
			
			$subj = str_replace_params($info, $subj);
			$body = str_replace_params($info, $body);
			
			Mail::send($to, $subj, $body, $from);
			Mail::send($to1, $subj, $body, $from);
		}
	}
?>