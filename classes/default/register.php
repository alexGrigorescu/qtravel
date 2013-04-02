<?
	class register
	{
		function index($err = '')
		{
			$form = new DefRegisterForm($this);
			if (strlen(trim($err)) > 0)
			{
				$form->loadFromRequest();
			}
			
			$t = new layout('register_index');
			$t->assign('form_img', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function save()
		{
			$form = new DefRegisterForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{		
				if (BusUser::usernameExists($request['user_name']))
				{
					$this->index('register_js_user_name_exists');
					return false;
				}
				
				if (BusUser::emailExists($request['email']))
				{
					$this->index('register_js_email_exists');
					return false;
				}
				
				$request['user_type'] = 'manager';
				BusUser::insert($request);
				$request = array_merge($request, $GLOBALS['DEFAULT_'.strtoupper(SECTION)]);
				BusUser::replaceByType($request, SECTION);
				
				$this->mail_register($request);
				
				redirect(OBJ, 'thanks');
			}
			else 
			{
				$this->index($form->getFirstErrorCode());
			}
		}
		
		function thanks()
		{
			$t = new layout('register_thanks');
			$t->display();
		}
		
		function mail_register($info)
		{
			$from = $GLOBALS['DEFAULT_EMAIL_SOURCE'];
			$to = $info['email'];
			
			$info['site_title'] = tr('register_site_title');
			$info['site_domain'] = tr('register_site_domain');
			
			$subj = tr('register_mail_subj');
			$body = tr('register_mail_body');
			
			$subj = str_replace_params($info, $subj);
			$body = str_replace_params($info, $body);
			
			Mail::send($to, $subj, $body);
		}
	}
?>
