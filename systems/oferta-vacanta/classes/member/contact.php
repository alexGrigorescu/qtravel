<?php
	class contact
	{
		function index()
		{ 
			$sitemap = array(
				'site_id' => 2,
				'url' => 'http://'.WEB.'.'.DOMAIN.'/contact.index.html',
				'url_md5' => md5('http://'.WEB.'.'.DOMAIN.'/contact.index.html'),
				'url_title' => 'Vacante avion ' . $countryRegion,
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			
			$t = new layout('contact_index');
			$t->assign('searchType', 'contact');
			$t->assign('object', 'accommodation_plane');
			$t->assign('method', 'index');
			$t->display($meta);
		}
		
		function save_newsletter_info(){
			$name = trim(request('txt-newsl-name'));
			$email = trim(request('txt-newsl-email'));
			$phone = trim(request('txt-newsl-phone'));
			$response = array(
				'is_error'	=>0,
				'message'	=>'Datele au fost inregistrate!'
			);
			
			if(strlen($name) < 3){
				$response['is_error'] = 1;
				$response['message'] = 'Numele completat este invalid!';
			}
			$isValidMail = filter_var($email,FILTER_VALIDATE_EMAIL);
			if($isValidMail === false){
				$response['is_error'] = 1;
				$response['message'] = 'Adresa de mail completata nu este valida!';
			}
			
			$matches = preg_grep("/^[\d]+$/", array($phone));
			if(empty($matches)){
				$response['is_error'] = 1;
				$response['message'] = 'Numarul de telefon completat nu este valid!';
			}
			
			$userByUserName = Bus::call('users', 'userNameExists', array('user_name'=>code($name)));
			if(!empty($userByUserName['id'])){
				$response['is_error'] = 1;
				$response['message'] = 'Numele este deja inregistrat!';
			}
			
			if($response['is_error'] == 0){
				$set = array(
	        		'user_type'		=>'guest',
	        		'user_name'		=>code($name),
	        		'name'			=>$name,
					'email'			=>$email,
					'phone'			=>$phone,
					'active'		=>0,
	        		'datec'			=>date('Y-m-d'),
	        		'rights'		=>''
	        	);
	        	Bus::call('users', 'insert', $set);
			}
			echo json_encode($response);
		}
		
		function detail()
		{
			$t = new layout('detail_offer');
			$t->assign('object', 'accommodation_plane');
			$t->assign('method', 'index');
			$t->assign('searchType', 'contact');
			$t->display($meta);
		}
	}
?>