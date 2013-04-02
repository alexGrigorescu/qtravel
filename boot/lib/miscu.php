<?php
function iso2ascii($s)
{
    $from = array('î','Î','â','â','ă','ã','Â','ş','Ş','ţ','Ţ','Ä','Å£','Å','Åž','Å¢','a','a¦','Ä');
	$to =   array('i','I','a','a','a','a','A','s','S','t','T','a' ,'t' ,'s' ,'S','T' ,'"' ,'...','A');
	return $s = str_replace($from, $to, $s);
}

function iso2utf8($string) {
     return mb_convert_encoding($string, "UTF-8", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));
}

function match_words($content)
{
	preg_match_all('/[a-zA-Z0-9îăÂşŞţŢ]+/', $content, $words);
	return $words;
}
?>