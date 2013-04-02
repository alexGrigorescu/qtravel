<?
	class Dt
	{
		var $y, $m, $d, $h, $i, $s, $empty;

		function add($amount, $unit)
		{
			switch($unit)
			{
				case 's': $this->s += amount; break;
				case 'i': $this->i += amount; break;
				case 'h': $this->h += amount; break;
				case 'd': $this->d += amount; break;
				default: die("Invalid units");
			}
		}

		/*
			$rule: last_day, first_day, proper_day
			ex: 31.01.2004 + 1 month
					last_day: 28.02.2001
					first_day: 01.03.2001
					proper_day: 03.03.2001
		*/
		function addMonths($amount, $rule = 'last_day')
		{
			$this->m += $amount;
			$od = $this->d;
			$this->normalize();
			if ($this->d != $od)
			{
				if ($rule == "last_day") $this->d = -1;
				if ($rule == "first_day") $this->d = 1;
				$this->normalize();
			}
		}

		function addYears($amount, $rule = 'last_day')
		{
			$this->y += $amount;
			$od = $this->d;
			$this->normalize();
			if ($this->d != $od)
			{
				if ($rule == "last_day") $this->d = -1;
				if ($rule == "first_day") $this->d = 1;
				$this->normalize();
			}
		}

		function dt($date = 'now', $set_format = '')
		{
			$this->empty = true;
			$this->set($date, $set_format);
		}

		// returns -1 (less) 0 (equal) 1 (higher)
		function compareDateTime($d2)
		{
			if ($this->y < $d2->y) return -1; if ($this->y > $d2->y) return 1;
			if ($this->m < $d2->m) return -1; if ($this->m > $d2->m) return 1;
			if ($this->d < $d2->d) return -1; if ($this->d > $d2->d) return 1;
			if ($this->h < $d2->h) return -1; if ($this->h > $d2->h) return 1;
			if ($this->i < $d2->i) return -1; if ($this->i > $d2->i) return 1;
			if ($this->s < $d2->s) return -1; if ($this->s > $d2->s) return 1;
			return 0;
		}

		function compareDate($d2)
		{
			if ($this->y < $d2->y) return -1; if ($this->y > $d2->y) return 1;
			if ($this->m < $d2->m) return -1; if ($this->m > $d2->m) return 1;
			if ($this->d < $d2->d) return -1; if ($this->d > $d2->d) return 1;
			return 0;
		}

		function compareTime($d2)
		{
			if ($this->h < $d2->h) return -1; if ($this->h > $d2->h) return 1;
			if ($this->i < $d2->i) return -1; if ($this->i > $d2->i) return 1;
			if ($this->s < $d2->s) return -1; if ($this->s > $d2->s) return 1;
			return 0;
		}

		// trebuie apelata STATIC
		function isValid($text, $format)
		{
			global $date_set_formats, $date_formats;
			if (!isset($date_set_formats[$format]))
				$format = $date_formats[$format][3];

			if (isset($date_set_formats[$format]))
				$xxx = $date_set_formats[$format][0];
			else
				return false;

			return ereg($xxx, $text);
		}

		function set($date, $set_format = '')
		{
			global $DEFAULT_DATE_FORMAT, $date_set_formats, $date_formats;
			if ($set_format == '') $set_format = $DEFAULT_DATE_FORMAT;

			if ($date == 'now')
			{
				$a = getdate(mktime());
				$this->y = $a['year'];
				$this->m = $a['mon'];
				$this->d = $a['mday'];
				$this->h = $a['hours'];
				$this->i = $a['minutes'];
				$this->s = $a['seconds'];
				$this->empty = false;
			}
			else if ($set_format == 'internal')
			{
				$a = getdate($date);
				$this->y = $a['year'];
				$this->m = $a['mon'];
				$this->d = $a['mday'];
				$this->h = $a['hours'];
				$this->i = $a['minutes'];
				$this->s = $a['seconds'];
				$this->empty = false;
			}
			else
			{
				if (!isset($date_set_formats[$set_format]))
					$set_format = $date_formats[$set_format][3];

				if (isset($date_set_formats[$set_format]))
					$xxx = $date_set_formats[$set_format][0];
				else
					$xxx = false;

				if ($xxx)
				{
					if (ereg($xxx, $date, $r))
					{
						$this->y = 0+$r[$date_set_formats[$set_format][1][0] + 1];
						$this->m = 0+$r[$date_set_formats[$set_format][1][1] + 1];
						$this->d = 0+$r[$date_set_formats[$set_format][1][2] + 1];
						$this->h = 0+$r[$date_set_formats[$set_format][1][3] + 1];
						$this->i = 0+$r[$date_set_formats[$set_format][1][4] + 1];
						$this->s = 0+$r[$date_set_formats[$set_format][1][5] + 1];
						$this->empty = false;
					}
				}
			}
		}

		function getDate($get_format = '')
		{
			global $DEFAULT_DATE_FORMAT, $date_formats;
			if ($this->empty) return null;
			if ($get_format == '') $get_format = $DEFAULT_DATE_FORMAT;
			$this->normalize();
			return $this->replace_format($date_formats[$get_format][1]);
		}

		function getTime($get_format = '')
		{
			global $DEFAULT_DATE_FORMAT, $date_formats;
			if ($this->empty) return null;
			if ($get_format == '') $get_format = $DEFAULT_DATE_FORMAT;
			$this->normalize();
			return $this->replace_format($date_formats[$get_format][2]);
		}

		function getDateTime($get_format = '')
		{
			global $DEFAULT_DATE_FORMAT, $date_formats;
			if ($this->empty) return null;
			if ($get_format == '') $get_format = $DEFAULT_DATE_FORMAT;
			$this->normalize();
			return $this->replace_format($date_formats[$get_format][0]);
		}

		function normalize()
		{
			$oy = $this->y - 2004;
			$d = mktime(
				$this->h,
				$this->i,
				$this->s,
				$this->m,
				$this->d,
				2004
				);
			$this->set($d, 'internal');
			$this->y += $oy;
		}

		function replace_format($format)
		{
			$s = $format;
			$s = str_replace('%Y', sprintf("%04d",$this->y), $s);
			$s = str_replace('%m', sprintf("%02d",$this->m), $s);
			$s = str_replace('%d', sprintf("%02d",$this->d), $s);
			$s = str_replace('%H', sprintf("%02d",$this->h), $s);
			$s = str_replace('%M', sprintf("%02d",$this->i), $s);
			$s = str_replace('%S', sprintf("%02d",$this->s), $s);
			return $s;
		}
		
		function findEndOfMonth()
		{
			$this->normalize();
			$this->d = 1;
			$this->m ++;
			$this->add(-1, 'd');
		}
	}

	/*************************************/
	//
	//  Executed code
	//
	/*************************************/

	$date_formats = array();
	$date_formats['mysql'] = array('%Y-%m-%d %H:%M:%S', '%Y-%m-%d', '%H:%M:%S', 'ymd');
	$date_formats['ee']	= array('%d.%m.%Y %H:%M:%S', '%d.%m.%Y', '%H:%M:%S', 'dmy');
	$date_formats['we']	= array('%d/%m/%Y %H:%M:%S', '%d/%m/%Y', '%H:%M:%S', 'dmy');
	$date_formats['us']	= array('%m/%d/%Y %H:%M:%S', '%m/%d/%Y', '%H:%M:%S', 'mdy');

	$date_set_formats = array();
	$date_set_formats['ymd'] = array('^([0-9]{4})[-\./]?([0-9]{2})[-\./]?([0-9]{2})( *([0-9]{2}):?([0-9]{2}):?([0-9]{2}))?$', array(0,1,2,4,5,6));
	$date_set_formats['dmy'] = array('^([0-9]{1,2})[-\./]([0-9]{1,2})[-\./]([0-9]{4})( +([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}))?$', array(2,1,0,4,5,6));
	$date_set_formats['mdy'] = array('^([0-9]{1,2})[-\./]([0-9]{1,2})[-\./]([0-9]{4})( +([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}))?$', array(2,0,1,4,5,6));
?>
