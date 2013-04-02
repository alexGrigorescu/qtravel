<?
	if (!defined('SESSION_COOKIE_NAME')) define('SESSION_COOKIE_NAME', 'PKSessionID');
  
	class BusSecurity
	{
		var $session_id = '';
		var $expired = false;
		var $disabled = false;  // a dat logout
		var $invalid = false;
		var $user_id = 0;
		var $user_info = array();
		var $user_level = 0;
		var $user_type = 'guest';
		var $user_rights = array();
		
		function BusSecurity()
		{
			if (isset($_COOKIE[SESSION_COOKIE_NAME]))
			{
				$sid = $_COOKIE[SESSION_COOKIE_NAME];
			}
			else 
			{
				$sid = '';
			}
			
			$this->getSession($sid);
		}		
		
		function readUserInfo()
		{
			if ($this->user_id > 0)
			{
				$this->user_info = Bus::call('users', 'read', array('id'=>$this->user_id));
				$this->user_id = $this->user_info['id'];
				$this->user_type = $this->user_info['user_type'];
				$this->user_rights = $this->getRights();
				if ($this->user_type == 'admin') $this->user_level = 20;
				if ($this->user_type == 'manager') $this->user_level = 10;
				if ($this->user_type == 'member') $this->user_level = 1;
			}
		}
		
		function hasRight($set)
		{
			if( (isset($this->user_info['rights']) && in_array($set['module'], $this->user_info['rights']) !== false && $this->user_type == 'admin'))
			{
				return true;
			}
			return false;
		}
		
		function getRights()
		{
			$rights = array();
			$modules = bus::call('users', 'getModules');
			foreach ($modules as $k=>$v)
			{
				if ($this->hasRight(array('module'=>$k)))
				{
					$rights[$k] = 1;
				}
			}
			
			return $rights;
		}
		
		function encodePassword($pass, $user = '')
		{
			return md5("$pass$user");
		}
		
		function getSession($session_id)
		{
			$this->session_id = '';
			$this->expired = false;
			$this->disabled = false;
			$this->invalid = false;
			$this->user_id = 0;			
			if ($session_id > '')
			{
				$a = Bus::call('sessions', 'check', array('id'=>$session_id));
				if (!$a)
				{
					$this->invalid = true;
				}
				elseif (!$a['active'])
				{
					$this->disabled = true;
				}
				elseif ($a['is_expired'])
				{
					$this->expired = true;
				}
				else
				{
					$this->session_id = $a['id'];
					$this->user_id = $a['user_id'];
		
					ExecSQL('update '.TBL_SESSIONS.' set datem=NOW() where id=\''.encode($this->session_id).'\'');
				}
			}
			
			$this->readUserInfo();			
		}
		
		function setSessionID($per_browser_session = true)
		{
			if ($per_browser_session)			
				setcookie(SESSION_COOKIE_NAME, $this->session_id, 0);
			else
				setcookie(SESSION_COOKIE_NAME, $this->session_id, time() + 365*24*60*60);
		}
		
		function login($user, $pass, $keep_logged_in = false, $timeout = 0)
		{
			if ($timeout == 0) $timeout = $keep_logged_in ? (60*24*365) : $GLOBALS['SESSION_TIMEOUT'];
			
			if (!($user > '' &&  $pass > ''))
			{
				return false;
			}
			
			$uid = Bus::call('users', 'login', array('user_name'=>$user, 'password'=>$pass, 'password2'=>$this->encodePassword($pass)));
			if ($uid > 0)
			{			
				$this->session_id = md5(uniqid("PK".rand()));
				Bus::call('sessions', 'replace', array('id'=>$this->session_id, 'datec'=>date('Y-m-d H:i:s'), 'datem'=>date('Y-m-d H:i:s'), 'timeout'=>$timeout, 'active'=>1, 'user_id'=>$uid));	
				$this->setSessionID(!$keep_logged_in);
				$this->getSession($this->session_id);
				
				return true;
			}			
			else
			{
				return false;
			}
		}
		
		function logout()
		{		
			if ($this->session_id > ''); else return;
			Bus::call('sessions', 'update', array('id'=>$this->session_id, 'active'=>0, 'datem	'=>date('Y-m-d H:i:s')));
			$this->session_id = '';
			$this->SetSessionID();
			$this->GetSession($this->session_id);
		}
	}
?>
