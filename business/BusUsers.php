<?
	class BusUsers extends BusTable
	{
		function BusUsers()
		{
			$this->setTable(TBL_USERS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select users.* from '.TBL_USERS.' users 
			where users.id=\''.encode($set['id']).'\'
			';
			$q = new Query($sql);
			$data = $q->fetch();
			
			if (isset($data['rights']))
			{
				$data['rights'] = split (',', $data['rights']);
			}
			return $data;
		}
		
		function login ($set)
		{
			$sql = 'select * from '.TBL_USERS.' where active=1 and user_name=\''.encode($set['user_name']).'\' and (password=\''.encode($set['password']).'\' or password=\''.encode($set['password2']).'\')';
			$q = new Query($sql);
			return 0 + $q->getScalar('id');
		}
		
		function getArray($set)
		{
			$w = '';
			if (strlen(trim($set['text'])) > 0) $w .= ' and (user_name like \'%'.encode($set['text']).'%\' or email like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['user_type'])) > 0) $w .= ' and users.user_type=\''.encode($set['user_type']).'\'';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' users.datec desc';	
			$sql  = 
			'
			select users.*  from '.TBL_USERS.' users
      		where users.id > 0 '.$w.'
			';
			
			 $sql .= ' order by '. $set['sorting'];
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$response = array();
		    $response['count'] = $count;
		    $response['data'] = $data;
		    return $response;
		}
		
		function emailExists($set)
	    {
	        $q = new Query('select * from '.TBL_USERS.' where email=\''.encode($set['email']).'\' and id!='.$set['user_id']);
	        return ($q->fetch());
	    }
	    
	    function userNameExists($set)
		{
			$sql = 
			'
			select users.* from '.TBL_USERS.' users
			where users.user_name=\''.encode($set['user_name']).'\' and users.id<>\''.encode($set['id']).'\'
			';
			$q = new Query ($sql);
			$response = $q->fetch();
			
			return $response;
		}
		
		function getTypes($set)
		{
			$types = array ();
			$types['member'] = 'Member';
			$types['manager'] = 'Manager';
			$types['admin'] = 'Admin';
			$types['guest'] = 'Guest';
			
			return $types;
		}
		
		function getModules($set)
		{
			$types = array ();
			$types['accommodations'] = 1;
			$types['busses'] = 1;
			$types['circuits'] = 1;
			$types['continents'] = 1;
			$types['countries'] = 1;
			$types['contracts'] = 1;
			$types['domains'] = 1;
			$types['flights'] = 1;
			$types['flight_operators'] = 1;
			$types['locations'] = 1;
			$types['pages'] = 1;
			$types['regions'] = 1;
			$types['specials'] = 1;
			$types['users'] = 1;
			$types['vacations'] = 1;
			
			return $types;
		}
		
		function hasRight($set)
		{
			if($GLOBALS['SECURITY']->hasRight($set))
			{
				return true;
			}
			return false;
		}
	}
?>
