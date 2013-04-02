<?php
if (empty($GLOBALS["www_has_crawl_config"])) {
// We both know about reqire_once(), I just keep old style.
$GLOBALS["www_has_crawl_config"] = 1;
  
// *** MySQL database config. Please change these lines according your host
$mysql_host   = "localhost";
$mysql_db     = "qtravel_qtravel";
$mysql_user   = "qtravel_qtravel";
$mysql_pass   = ";m9}2=C@nZtC";

$CRAWL_ENTRY_POINT_URL = 'http://'.$_SERVER['HTTP_HOST'];	// website to crawl MUST begins with http:// prefix
$CRAWL_ENTRY_POINT_DOMAINS = array('oferta-vacanta.ro', 'oferteinbulgaria.ro', 'avionbilet.ro');	// website to crawl MUST begins with http:// prefix

$CRAWL_LOCALE = "en_US"; // read more about Locate http://php.rinet.ru/manual/en/function.setlocale.php
//$CRAWL_LOCALE = "ru_RU"; 

$CRAWL_MAX_DEPTH = 20;			// PHP Crawler uses recursive retrieving. Specify recursion maximum depth level.
$CRAWL_PAGE_EXPIRE_DAYS = 1;	// Page reindex period

// **** MISC SETTINGS ****

// disable keys while crawling (might save some time)
$CRAWL_DB_DISABLE_KEYS = false;

// skip crawing long URLs
$CRAWL_URL_MAX_LEN = 1024;

// index only fist CONFIG_URL_MAX_CONTENT bytes of page content
$CRAWL_URL_MAX_CONTENT = 150 * 1024;

// HACK. cooldown time after http request.
$CRAWL_THREAD_SLEEP_TIME = 1000000; //mk_sec

// **** SEARCH CONFIG ****

$CRAWL_SEARCH_TEXT_SURROUNDING_LENGHT = 70; //chars
$CRAWL_SEARCH_MAX_RES_WORD_COUNT = 2; // larger value produces larger search page

// *** INIT ****
setlocale (LC_ALL, $CRAWL_LOCALE);

}

?>
