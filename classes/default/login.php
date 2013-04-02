<?
	class login
	{
		function index($err = '', $goto = '')
		{
			$t = new layout('login_index');
					
			$captcha = new Captcha();
			$captcha->code();
			
			$form = new DefLoginForm($this);
			$form->loadFromRequest();
			
			$t->assign('form_img', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function save($goto = '')
		{
			$form = new DefLoginForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			if(true)
			{
				if ($GLOBALS['SECURITY']->login($request['user'], $request['password']))
				{
					if ($GLOBALS['SECURITY']->user_type == SECTION)
					{
						if ($goto > '')
						{
							redirectToUrl($goto);
						}
						else
						{
							redirect("main", 'index');
						}				
					}
					else
					{
						redirect("login", 'logout');
					}
				}
				else 
				{
					$this->index('login_err_login_invalid');
				}
			}
			else 
			{
				$this->index($form->getFirstErrorCode());
			}
		}
	
		function logout()
		{
			$GLOBALS['SECURITY']->logout();
			redirect(OBJ, 'index');
		}
	}
?>
