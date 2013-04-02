<?
	class Mail
	{
		function send($to, $subj, $body, $from)
		{
			$headers = '';
			$headers .= "From: $from\n";
			$headers .= "Message-Id: <".date('YmdHis').".".substr(rand().md5(uniqid(rand())), 0, 8)."@".$_SERVER['HTTP_HOST'].">\n";
			$headers .= "Mime-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			$headers .= "Reply-To: ".$from."\n";
			
			mail($to, $subj, $body, $headers);
		}
	}
?>
