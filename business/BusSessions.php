<?
	class BusSessions extends BusTable
	{
		function BusSessions()
		{
			$this->setTable(TBL_SESSIONS);
		}
		
		function check ($set)
		{
			$sql = 'select id, user_id, (datem < now()-interval timeout MINUTE) as is_expired, active from '.$this->table.' where id=\''.encode($set['id']).'\'';
			$q = new Query($sql);
			return $a = $q->fetch();
		}
	}
?>
