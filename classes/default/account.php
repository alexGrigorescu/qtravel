<?
	class account
	{
		function account()
		{
			$this->user_id = $GLOBALS['user_id'];
		}
		
		function index($err = '')
		{
			$this->info = BusUser::getInfoByType($this->user_id, SECTION);
						
			$form = new DefAccountForm($this);
			if (strlen(trim($err)) > 0)
			{
				$form->loadFromRequest();
				$request = $form->saveToArray();
				$request['user_name'] = $this->info['user_name'];
				$form->loadFromArray ($request);
			}
			else 
			{
				$form->loadFromArray($this->info);				   
			}
			
			$t = new layout('account_index');
			$t->assign('form_img', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function save()
		{
			$form = new DefAccountForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{		
				if (BusUser::emailExists($request['email'], $this->user_id))
				{
					$this->index('account_email_exists');
				}
				
				BusUser::update($this->user_id, $request);
				redirect(OBJ, 'thanks');
			}
			else 
			{
				$this->index($form->getFirstErrorCode());
			}
		}
		
		function thanks()
		{
			$t = new layout('account_thanks');
			$t->display();
		}
	}
?>
