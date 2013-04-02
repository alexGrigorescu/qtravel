<?
	class newsletter
	{
		function save()
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			$form = new DefNewsletterForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{
				$userByEmail = Bus::call('users', 'emailExists', array('email'=>$request['email'], 'user_id'=>0));
	        	$email_exists = isset($userByEmail['id']);
	        	if ($email_exists)
	        	{
	        		$response['succes'] = false;
	        		$response['message'] = tr('newsletter_message_email_exists');
					echo (json_encode ($response));
					return true;
	        	}
	        	else 
	        	{
	        		$request['user_name'] = code($request['name']);
	        		$request['user_type'] = 'guest';
	        		$request['datec'] = date('Y-m-d H:i:s');
	        		Bus::call('users', 'insert', $request);
					$response['message'] = tr('newsletter_message_add_succes');
					echo (json_encode ($response));
					return true;
	        	}
			}
			else 
			{
				$error = $form->getFirstErrorCode();
				$response['succes'] = false;
				$response['message'] = tr($error['message']);
				$response['field'] = $error['field'];
				
				echo (json_encode ($response));
				return false;
			}
		}
		
		function save_newsletter($info)
		{
			
		}
	}
?>