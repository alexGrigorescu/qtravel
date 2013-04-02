{literal}	
html { 
	height: 100%; }
body { 
	margin:0 auto; 
	padding:0px; 
	text-align:center; 
	width:100%;  
	background:url("{/literal}{$img_path}{literal}/bg.png") repeat-x #8cc7e1; 
	font: 62% "Lucida Sans Unicode", sans-serif;}
ul li {
	list-style: none;}
a {
	text-decoration: none;}
img {
	border: none; }
#header {
	position:absolute; 
	margin:0px 0px 0px 0px; 
	text-align:center;
	width:100%;
	min-width:975px; }
/*start carousel*/
#header #carousel {
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	min-width:975px;
	height:386px;
	z-index:1;
	overflow:hidden; }
#header #carousel .carousel-element {
	position:relative;
	top:0;
	left:0px; 
	width:100%;
	min-width:975px;
	height:386px;
	overflow:hidden; }
#header #menu_bg {
	position:absolute; 
	margin:0px 0px 0px 0px;
	z-index:2; 
	width:100%;
	height:85px;
	background:url("{/literal}{$img_path}{literal}/menu_bg.png");}
#header #carousel-stripe-arrow {
	position:relative; 
	margin:0 auto;
	top:-52.5px;
	z-index:2; 
	width:58px;
	height:9px;
	text-align:center;}
#header #carousel-stripe {
	position:relative; 
	margin:-42px 0px 0px 0px;
	z-index:2; 
	width:100%;
	height:61px;
	text-align:center;
	background:url("{/literal}{$img_path}{literal}/carousel_stripe.png");}
#header #carousel-stripe img{
 	margin: 18px 0px 0px 0px}
/*end carousel*/
/*start contact*/
#page-header #contact-zone {
	position:absolute; 
	top:1px;
	z-index:3;  
	width:282px;
	height:360px;
	background:url("{/literal}{$img_path}{literal}/contact_bg.png"); }
#page-header #contact-zone #logo {
	position:absolute; 
	margin:0px 0px 0px 3px; }
#page-header #contact-zone #feedback {
	position:absolute; 
	margin:177px 0px 0px -14px; }
#page-header #contact-zone #info{
	position:absolute; 
	margin:116px 0px 0px 45px;
	text-align:left;}
#page-header #contact-zone #info .title{ 
	font-family:"Arial";
	font-style:italic;
	font-size:16pt;
	color:#ffd100;
	display:block;
	position:relative;
	font-weight:normal; 
	margin-top:10px;
	line-height:17px; }
#page-header #contact-zone #info .text{ 
	font-family:"Arial";
	font-style:italic;
	font-size:12pt;
	color:#ffffff;
	position:relative;
	font-weight:normal; 
	line-height:15px; }
#page-header #contact-zone #info .text-block{ 
	display:block; }
#page-header #contact-zone #info .text-yellow{ 
	color:#ffd100; }
#page-header #contact-zone .facebook-like{ 
	position:relative;
	margin: 10px 0px 0px 0px;
	float:left; }
#page-header #contact-zone .google-plus{ 
	position:relative;
	margin: 10px 0px 0px 0px;
	float:left; }
/*end contact*/
/*start menu*/
#page-header div#menu { 
	padding:0px; 
	border:0px solid #000000; 
	height:78px; 
	position:absolute; 
	right:0px;
	top:5px;; 
	z-index:2; }
#page-header div#menu ul#menulist {
	margin: 0 auto;
	padding: 0px;	
	height: 35px;		
	white-space: nowrap; }
#page-header div#menu ul#menulist li:first-child {
	padding: 0px 0px 0px 0px; }
#page-header div#menu li {
	display: inline;		
	list-style-type: none;		
	padding: 0px 0px;		
	margin: 0px 0px 0px 1px;		
	float: left; }
#page-header ul#menulist {
	z-index:10; }
#page-header ul#menulist li {
	position: relative;		
	z-index: 10; }
#page-header ul#menulist li ul {
	list-style: none;		
	display: none;		
	position: absolute;		
	top: 35px;		
	left: 0px;		
	padding: 0px;		
	margin: 0px;		
	z-index: 10; }
#page-header div#menu ul#menulist li.submenu:first-child {
	padding: 0px; }
#page-header ul#menulist li ul li.submenu ul {
	display: none; }
#page-header ul#menulist li ul li.submenu:hover ul {
	list-style: none;		
	display: block;		
	position: absolute;		
	top: 0px;		
	left: 200px;		
	padding: 0px;		
	margin: 0px; }
#page-header ul#menulist li:last-child ul li.submenu:hover ul {
	list-style: none;		
	display: block;		
	position: absolute;		
	top: 0px;		
	left: -202px;		
	padding: 0px;		
	margin: 0px; }
#page-header ul#menulist li ul li.submenu {
	list-style: none;		
	float: none;		
	display: block;		
	padding: 0px;		
	border: 0px;		
	text-align: left; }
#page-header ul#menulist li ul li.submenu a {
	text-decoration: none;		
	display: block;		
	padding: 5px;		
	margin: 0px;		
	border: none;		
	z-index: 10; }
#page-header ul#menulist li:hover ul {
	display:block; }
#page-header li#submenu-home { 
	width: 67px;		
	height:80px;		
	background:url("{/literal}{$img_path}{literal}/btn_home.png"); }
#page-header li#submenu-home:hover { 
	width: 67px;		
	height:95px;		
	background:url("{/literal}{$img_path}{literal}/btn_home_h.png"); }
#page-header li#submenu-vacancies { 
	width: 94px;		
	height:80px;		
	background:url("{/literal}{$img_path}{literal}/btn_vacancies.png"); }
#page-header li#submenu-vacancies:hover { 
	width: 94px;		
	height:95px;		
	background:url("{/literal}{$img_path}{literal}/btn_vacancies_h.png"); }
#page-header #submenu-vacancies #container { 
	width: 364px;		
 	height:149px;		
 	margin:35px 0px 0px -6px;		
	background:url("{/literal}{$img_path}{literal}/submenu_vacancies.png"); }
#page-header #submenu-vacancies #container img { 
	margin: 12px 0px 0px 2px; }
#page-header #submenu-vacancies #container a { 
	display: inline;		
	padding: 0px;		
	border:none; }
#page-header #submenu-vacancies #container img.first { 
	margin-left: 7px; }
#page-header li#submenu-tickets { 
	width: 74px;		
	height:80px;		
	background:url("{/literal}{$img_path}{literal}/btn_tickets.png"); }
#page-header li#submenu-tickets:hover { 
	width: 74px;		
	height:95px;		
	background:url("{/literal}{$img_path}{literal}/btn_tickets_h.png"); }
#page-header #submenu-tickets #container { 
	width: 251px;		
 	height:149px;		
 	margin:35px 0px 0px -7px;		
	background:url("{/literal}{$img_path}{literal}/submenu_tickets.png"); }
#page-header #submenu-tickets #container img { 
	margin: 12px 0px 0px 2px;}
#page-header #submenu-tickets #container a { 
	display: inline;		
	padding: 0px;		
	border:none; }
#page-header #submenu-tickets #container img.first { 
	margin-left:8px; }
#page-header li#submenu-tour { 
	width: 86px;		
	height:80px;		
	background:url("{/literal}{$img_path}{literal}/btn_tour.png"); }
#page-header li#submenu-tour:hover { 
	width: 86px;		
	height:95px;		
	background:url("{/literal}{$img_path}{literal}/btn_tour_h.png"); }
#page-header #submenu-tour #container { 
	width: 249px;		
 	height:149px;		
 	margin:35px 0px 0px -6px;		
	background:url("{/literal}{$img_path}{literal}/submenu_tour.png"); }
#page-header #submenu-tour #container img { 
	margin: 12px 0px 0px 2px; }
#page-header #submenu-tour #container a { 
	display: inline;		
	padding: 0px;		
	border:none; }
#page-header #submenu-tour #container img.first { 
	margin-left:8px; }
#page-header li#submenu-events { 
	width: 119px;		
	height:80px;		
	background:url("{/literal}{$img_path}{literal}/btn_events.png"); }
#page-header li#submenu-events:hover { 
	width: 119px;		
	height:95px;		
	background:url("{/literal}{$img_path}{literal}/btn_events_h.png"); }
#page-header #submenu-events #container { 
	width: 485px;		
 	height:149px;		
 	margin:35px 0px 0px -138px;		
	background:url("{/literal}{$img_path}{literal}/submenu_events.png"); }
#page-header #submenu-events #container img { 
	margin: 12px 0px 0px 2px; }
#page-header #submenu-events #container a { 
	display: inline;		
	padding: 0px;		
	border:none; }
#page-header #submenu-events #container img.first { 
	margin-left:4px; }
#page-header li#submenu-contact { 
	width: 90px;		
	height:80px;		
	background:url("{/literal}{$img_path}{literal}/btn_contact.png"); }
#page-header li#submenu-contact:hover { 
	width: 90px;		
	height:95px;		
	background:url("{/literal}{$img_path}{literal}/btn_contact_h.png"); }
/*end menu*/
#page-header{ 
	width:975px; 
	height:386px;
	position: relative;
	text-align:right;
	margin:0 auto; }
#page{ 
	border:0px solid #000000; 
	position:relative;
	padding:0px;
	text-align:center; 
	width:975px; 
	margin:0 auto;
	z-index:4; }
#page #bubles { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:185px;
	background:url("{/literal}{$img_path}{literal}/bubles_bg.png"); }
#page #bubles #buble-back{
	width:50px;
	height:185px;
	float:left; }
#page #bubles #buble-back ul {
	position:relative; 
	margin:85px 0px 0px -30px; }
#page #bubles #buble-back li.back-active { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_back_active.png"); }
#page #bubles #buble-back li.back-active:hover { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_back_h.png"); }
#page #bubles #buble-back li.back-inactive { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_back_inactive.png"); }
#page #bubles #buble-container{
	width:868px;
	height:183px;
	float:left;
	overflow:hidden; }
#page #bubles #buble-next{
	width:50px;
	height:185px;
	float:left; }
#page #bubles #buble-next ul {
	position:relative; 
	margin:85px 0px 0px -30px; }
#page #bubles #buble-next li.next-active { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_next_active.png"); }
#page #bubles #buble-next li.next-active:hover { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_next_h.png"); }
#page #bubles #buble-next li.next-inactive { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_next_inactive.png"); }
#page #bubles a{ 
	text-decoration:none; }
#page #bubles div.buble{ 
	float:left;
	position:relative;
	margin:35px 0px 0px 8px;
	width:136px;
	height:150px;
	background:url("{/literal}{$img_path}{literal}/buble.png"); }
#page #bubles div.first { 
	margin-left: 10px; }
#page #bubles span.title { 
	font-family:"Arial";
	font-size:16pt;
	color:#000068;
	margin-top:30px;
	display:block;
	position:relative;
	font-weight:bold; 
	line-height:36pt; }
#page #bubles span.text { 
	font-family:"Arial";
	font-style:italic;
	font-size:9pt;
	color:#000068;
	margin-top:0px;
	display:block;
	position:relative;
	font-weight:bold;
	line-height:5pt; }
#page #bubles span.price { 
	font-family:"Arial";
	font-size:16pt;
	color:#000068;
	margin-top:0px;
	display:block;
	position:relative;
	font-weight:bold; }
#page #contact-clear{
	margin:0px 0px 0px 0px;
	width:100%;
	height:30px; }
#page #page-body {
	margin:0px 0px 0px 0px;
	width:100%;
	height:945px; }
#page #page-body #body-engine{
	margin:0px 0px 0px 0px;
	width:675px;
	height:945px;
	float:left; }
#page #page-body #body-advertising{
	margin:0px 0px 0px 0px;
	width:300px;
	height:945px;
	float:left; }
#page #search { 
	position:relative; 
	margin:0px 0px 0px 1px;
	width:675px;
	height:420px;
	background:url("{/literal}{$img_path}{literal}/search_bg.png");
	float:left; }
/*start search-header*/
#page #search #search-header{ 
	margin:0px 0px 0px 0px;
	width:675px;
	height:95px;
	text-align:left; }
#page #search #search-header img{ 
	margin:5px 0px 0px 10px; }
/*end search-header*/
/*start search-buttons*/
#page #search #search-buttons{ 
	margin:0px 0px 0px 0px;
	width:180px;
	height:325px;
	text-align: left;
	float:left; }
#page #search #search-buttons ul {
	margin:0px 0px 0px -30px; }
#page #search #search-buttons ul li {
	list-style: none;		
	float: none;		
	display: block;		
	padding: 0px;		
	border: 0px;		
	text-align: left; }
#page #search #search-buttons li {
	margin:5.5px 0px 0px 0px; }
#page #search #search-buttons li:first-child {
	margin:0px 0px 0px 0px; }
#page #search #search-buttons li:last-child {
	margin:6px 0px 0px 0px; }
#page #search #search-buttons li.btn-search-plane-inactive { 
	width: 146px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_plane.png"); }
#page #search #search-buttons li#btn-search-plane:hover { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_plane_h.png"); }

#page #search #search-buttons li.btn-search-plane-active { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_plane_h.png"); }
#page #search #search-buttons li.btn-search-bus-inactive { 
	width: 146px;		
	height:64px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_bus.png"); }
#page #search #search-buttons li#btn-search-bus:hover { 
	width: 170px;		
	height:64px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_bus_h.png"); }
#page #search #search-buttons li.btn-search-bus-active { 
	width: 170px;		
	height:64px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_bus_h.png"); }
#page #search #search-buttons li.btn-search-vacancies-inactive { 
	width: 146px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_vacancies.png"); }
#page #search #search-buttons li#btn-search-vacancies:hover { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_vacancies_h.png"); }
#page #search #search-buttons li.btn-search-vacancies-active { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_vacancies_h.png"); }
#page #search #search-buttons li.btn-search-hotels-inactive { 
	width: 146px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_hotels.png"); }
#page #search #search-buttons li#btn-search-hotels:hover { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_hotels_h.png"); }
#page #search #search-buttons li.btn-search-hotels-active { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_hotels_h.png"); }
#page #search #search-buttons li.btn-search-rentcar-inactive  { 
	width: 146px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_rentcar.png"); }
#page #search #search-buttons li#btn-search-rentcar:hover { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_rentcar_h.png"); }
#page #search #search-buttons li.btn-search-rentcar-active { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_rentcar_h.png"); }
#page #search #search-buttons li.btn-search-insurance-inactive { 
	width: 146px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_insurance.png"); }
#page #search #search-buttons li#btn-search-insurance:hover { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_insurance_h.png"); }
#page #search #search-buttons li.btn-search-insurance-active { 
	width: 170px;		
	height:44px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_insurance_h.png"); }
/*end search-buttons*/
/*start search-filter*/
#page #search #search-filter{ 
	margin:0px 0px 0px 0px;
	width:495px;
	height:325px;
	text-align: left; 
	float:left; }
#page #search #search-filter #search-fields{ 
	margin:0px 0px 0px 0px;
	width:495px;
	height:260px;
	text-align: left; 
	display:block; }
#page #search #search-filter #search-action{ 
	margin:0px 0px 0px 0px;
	width:495px;
	height:65px;
	text-align: left; }
#page #search #search-filter #search-action #btn-search-container{
	margin:-5px 0px 0px 243px; }
#page #search #search-filter #search-action #btn-search{ 
	width: 200px;		
	height:47px;		
	background:url("{/literal}{$img_path}{literal}/btn_search.png"); }
#page #search #search-filter #search-action #btn-search:hover{ 
	width: 200px;		
	height:47px;		
	background:url("{/literal}{$img_path}{literal}/btn_search_h.png"); }
/*end search-filter*/
#page #search-external-hotel { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:300px;
	height:132px;
	float:left;
	background:url("{/literal}{$img_path}{literal}/search_external_hotel_bg.png"); }
#page #search-external-hotel #search-external-advertising { 
	width:300px;
	height:100px;
	position:relative; 
	margin:0px 0px 0px 0px; }
#page #search-external-hotel #search-external-advertising .title{
	width:273px;
	height:19px;
	position:relative; 
	margin:10px 0px 0px 0px; } 
#page #search-external-hotel #search-external-advertising .text{
	width:275px;
	height:48px;
	position:relative; 
	margin:0px 0px 0px 0px; } 
#page #search-external-hotel #search-external-button { 
	width:300px;
	height:32px;
	position:relative; 
	margin:0px 0px 0px 0px; }
#page #search-external-hotel #search-external-button img{
	margin:4px 0px 0px 0px; } 
#page #right_advertising_bg { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:300px;
	height:439px;
	float:left;
	background:url("{/literal}{$img_path}{literal}/right_advertising_bg.png"); }
#page #right_advertising_bg ul{ 
	margin: 27px 0px 0px -35px; }
#page #right_advertising_bg ul li{ 
	margin: 16px 0px 0px 0px; }
/*start promotions*/
#page #promo-container { 
	position:relative; 
	margin:4px 0px 0px 1px;
	width:675px;
	height:520px;
	float:left;
	background:url("{/literal}{$img_path}{literal}/promotions_bg.png"); }
#page #promo-container #promo-header{ 
	margin:0px 0px 0px 0px;
	width:675px;
	height:120px;
	text-align:left; }
#page #promo-container #promo-header .promo-text{ 
	margin:20px 0px 0px 10px; }
#page #promo-container #promo-header ul {
	margin:24px 0px 0px -28.3px; }
#page #promo-container #promo-header  li {
	margin:0px 0px 0px 2px;
	float:left; }
#page #promo-container #promo-header li:first-child {
	margin:0px 0px 0px 0px; }
#page #promo-container #promo-header li:last-child {
	margin:0px 0px 0px 2px; }
#page #promo-container #promo-header li.last-minute-inactive { 
	width: 106px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_last_minute.png"); }
#page #promo-container #promo-header li.last-minute-active { 
	width: 106px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_last_minute_h.png"); }
#page #promo-container #promo-header li#last-minute:hover { 
	width: 106px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_last_minute_h.png"); }
#page #promo-container #promo-header li.early-booking-inactive { 
	width: 123px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_early_booking.png"); }
#page #promo-container #promo-header li.early-booking-active { 
	width: 123px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_early_booking_h.png"); }
#page #promo-container #promo-header li#early-booking:hover { 
	width: 123px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_early_booking_h.png"); }
#page #promo-container #promo-header li.easter-inactive { 
	width: 56px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_easter.png"); }
#page #promo-container #promo-header li.easter-active { 
	width: 56px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_easter_h.png"); }
#page #promo-container #promo-header li#easter:hover { 
	width: 56px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_easter_h.png"); }
#page #promo-container #promo-header li.first-may-inactive { 
	width: 45px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_first_may.png"); }
#page #promo-container #promo-header li.first-may-active { 
	width: 45px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_first_may_h.png"); }
#page #promo-container #promo-header li#first-may:hover { 
	width: 45px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_first_may_h.png"); }
#page #promo-container #promo-header li.seaside-inactive { 
	width: 68px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_seaside.png"); }
#page #promo-container #promo-header li.seaside-active { 
	width: 68px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_seaside_h.png"); }
#page #promo-container #promo-header li#seaside:hover { 
	width: 68px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_seaside_h.png"); }
#page #promo-container #promo-header li.seniors-inactive { 
	width: 67px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_seniors.png"); }
#page #promo-container #promo-header li.seniors-active { 
	width: 67px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_seniors_h.png"); }
#page #promo-container #promo-header li#seniors:hover { 
	width: 67px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_seniors_h.png"); }
#page #promo-container #promo-header li.mountain-inactive { 
	width: 59px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_mountain.png"); }
#page #promo-container #promo-header li.mountain-active { 
	width: 59px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_mountain_h.png"); }
#page #promo-container #promo-header li#mountain:hover { 
	width: 59px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_mountain_h.png"); }
#page #promo-container #promo-header li.events-inactive { 
	width: 102px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_events.png"); }
#page #promo-container #promo-header li.events-active { 
	width: 102px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_events_h.png"); }
#page #promo-container #promo-header li#events:hover { 
	width: 102px;		
	height:29px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_events_h.png"); }
#page #promo-container #promo-body{ 
	margin:0px 0px 0px 0px;
	width:675px;
	height:315px;
	text-align:left; }
#page #promo-container #promo-body #promo-offers{ 
	margin:0px 0px 0px 0px;
	width:555px;
	height:315px;
	text-align:left;
	float:left; }
#page #promo-container #promo-body #promo-offers ul {
	margin:0px 0px 0px -27px;
	width:555px;
	height:315px;
	text-align:left; }
#page #promo-container #promo-body #promo-offers li {
	margin:8px 0px 0px 7px;
	float:left;
	width:174px;
	height:145px;
	background:url("{/literal}{$img_path}{literal}/promo_item_bg.png"); }
#page #promo-container #promo-body #promo-offers div.promo-item-container {
	margin:0px 0px 0px 0px;
	float:left;
	width:174px;
	height:90px; }
#page #promo-container #promo-body #promo-offers div.promo-text-container {
	margin:0px 0px 0px 0px;
	float:left;
	width:174px;
	height:55px; }
#page #promo-container #promo-body #promo-offers div.promo-text-container .promo-title-violet{
	position:relative;
	margin:0px 0px 0px 15px;
	font-family:"Arial";
	font-size:12pt;
	color:#7154c0;
	font-weight:bold; 
	line-height:28px;
	display:block;
	overflow:hidden;
	width:100px;
	height:30px; }
#page #promo-container #promo-body #promo-offers div.promo-text-container .promo-text-violet{
	position:relative;
	margin:0px 0px 0px 15px;
	font-family:"Arial";
	font-size:10pt;
	color:#8a8a8a;
	font-weight:normal; 
	line-height:12px;
	display:block;
	overflow:hidden;
	width:130px; 
	height:25px; }
#page #promo-container #promo-body #promo-offers div.regular-buble {
	position:absolute;
	margin:60px 0px 0px 115px;
	width:59px;
	height:70px;
	background:url("{/literal}{$img_path}{literal}/promo_regular_buble.png");
	text-align:center; }
#page #promo-container #promo-body #promo-offers div.regular-buble span{
	font-family:"Arial";
	font-size:20pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:45px; }
#page #promo-container #promo-body #promo-buttons{ 
	margin:0px 0px 0px 0px;
	width:120px;
	height:315px;
	text-align:left;
	float:left; }
#page #promo-container #promo-body #promo-buttons ul {
	margin:160px 0px 0px -15px; }
#page #promo-container #promo-body #promo-buttons  li {
	margin:0px 0px 0px 0px;
	float:left; }
#page #promo-container #promo-body #promo-buttons li:last-child {
	margin:0px 0px 0px 2px; }


#page #promo-container #promo-body #promo-buttons li.back-active { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_back_active.png"); }
#page #promo-container #promo-body #promo-buttons li.back-active:hover { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_back_h.png"); }
#page #promo-container #promo-body #promo-buttons li.back-inactive { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_back_inactive.png"); }


#page #promo-container #promo-body #promo-buttons li.next-active { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_next_active.png"); }
#page #promo-container #promo-body #promo-buttons li.next-active:hover { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_next_h.png"); }
#page #promo-container #promo-body #promo-buttons li.next-inactive { 
	width: 32px;		
	height:53px;		
	background:url("{/literal}{$img_path}{literal}/btn_promo_next_inactive.png"); }


#page #promo-container #promo-footer{ 
	margin:0px 0px 0px 0px;
	width:675px;
	height:85px;
	text-align:left; }
#page #promo-container #promo-footer #rdb-promo{ 
	width:22px;
	height:22px;
	float:left;
	margin-left:20px;
	margin-top:30px;
	visibility:hidden;
}
#page #promo-container #promo-footer #promo-slider-text{ 
	float:left;
	margin-left:10px;
	margin-top:30px;
}
#page #promo-container #promo-footer #promo-slider-minus img{ 
	float:left;
	margin-left:10px;
	margin-top:40px;
}
#page #promo-container #promo-footer #promo-slider-active{ 
	border:none;
	width:300px;
	float:left;
	margin-left:10px;
	margin-top:37px;
	visibility:hidden;
}
#page #promo-container #promo-footer #promo-slider-plus img{ 
	float:left;
	margin-left:10px;
	margin-top:35px;
}
#page #promo-container #promo-footer #promo-slider-euro{ 
	float:left;
	width:12px;
	height:15px;
	margin-left:2px;
	margin-top:32px;
}
#page #promo-container #promo-footer #promo-slider-inactive{ 
	position:absolute;
	border:none;
	width:347px;
	height:100px;
	margin-left:276px;
	margin-top:1px;
	background: url({/literal}{$img_path}{literal}/promo_slider_inactive2.png) no-repeat;
	visibility:hidden;
}
/*end promotions*/
#page #facebook-container { 
	position:relative; 
	margin:0px 0px 0px 1px;
	width:300px;
	height:375px;
	float:left;
	background-color:#ffffff; }
#page #facebook-container .like-on-facebook {
	position:absolute; 
	margin:0px 0px 0px 0px;
	width:300px;
	height:41px;
 	background: url({/literal}{$img_path}{literal}/facebook_like.png);
 	z-index:100;} 
/*page search result*/
#page #page-body #body-engine,.result{
	background: url({/literal}{$img_path}{literal}/result_bg.png); }
#page #page-body #body-engine .result-header{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:676px;
	height:90px;
	float:left; }
#page #page-body #body-engine .result-header .result-title {
	position:relative; 
	margin:0px 0px 0px 0px;
	width:676px;
	height:40px;
	float:left;
	text-align:left; }
#page #page-body #body-engine .result-header .result-title img{
	position:relative; 
	margin:15px 0px 0px 25px; }
#page #page-body #body-engine .result-top-paging {
	position:relative; 
	margin:0px 0px 0px 0px;
	width:676px;
	height:50px;
	float:left; }
#page #page-body #body-engine .result-top-paging .paging-container{
	position:relative; 
	margin:20px 0px 0px 26px;
	width:624px;
	height:24px; 
	background: url({/literal}{$img_path}{literal}/result_paging_bg.png);}
#page #page-body #body-engine .result-top-paging .paging-container .page-back{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:220px;
	height:24px;
	float:left; 
	text-align:left; }
#page #page-body #body-engine .result-top-paging .paging-container .page-back img {
	position:relative; 
	margin:10px 5px 0px 10px; }
#page #page-body #body-engine .result-top-paging .paging-container .page-back .page-text {
	font-family:"Arial";
	font-size:8pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:10px; }
#page #page-body #body-engine .result-top-paging .paging-container .page-middle{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:180px;
	height:24px;
	float:left; }
#page #page-body #body-engine  .result-top-paging .paging-container .page-middle ul {
	margin:2px 0px 0px -36px;
	width:180px;
	height:24px; }
#page #page-body #body-engine .result-top-paging .paging-container .page-middle li {
	margin:0px 0px 0px 5px;
	width:20px;
	height:20px;
	float:left; }
#page #page-body #body-engine  .result-top-paging .paging-container .page-middle li.page-count {
	font-family:"Arial";
	font-size:8pt;
	color:#ffffff;
	font-weight:normal; 
	line-height:20px; }
#page #page-body #body-engine .result-top-paging .paging-container .page-middle li.selected {
	background:url("{/literal}{$img_path}{literal}/result_page_count_bg.png");
	color:#383a7a; }
#page #page-body #body-engine .result-top-paging .paging-container .page-next{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:224px;
	height:24px;
	float:left;
	text-align:right; }
#page #page-body #body-engine .result-top-paging .paging-container .page-next  img{
	position:relative; 
	margin:10px 10px 0px 5px; }
#page #page-body #body-engine .result-top-paging .paging-container .page-next .page-text {
	font-family:"Arial";
	font-size:8pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:10px; }
#page #page-body #body-engine .result-body{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:676px;
	height:802px;
	float:left; }
#page #page-body #body-engine .result-body ul {
	margin:0px 0px 0px -64px;
	width:676px;
	height:802px;
	text-align:left; }
#page #page-body #body-engine .result-body li {
	margin:47px 0px 0px 50px;
	float:left;
	width:174px;
	height:150px;
	background:url("{/literal}{$img_path}{literal}/result_item_bg.png"); }
#page #page-body #body-engine .result-body div.result-item-title {
	position:absolute;
	margin:-32px 0px 0px 0px;
	width:174px;
	height:20px; }
#page #page-body #body-engine .result-body div.result-item-title span {
	font-family:"Arial";
	font-size:12pt;
	color:#4fa800;
	font-weight:bold; 
	line-height:15px;
	text-decoration:underline; }
#page #page-body #body-engine .result-body div.result-item-container {
	margin:0px 0px 0px 0px;
	float:left;
	width:174px;
	height:105px; }
#page #page-body #body-engine .result-body div.result-text-container-left {
	margin:0px 0px 0px 0px;
	float:left;
	width:78px;
	height:55px; }
#page #page-body #body-engine .result-body div.result-text-container-middle {
	margin:0px 0px 0px 4px;
	float:left;
	width:76px;
	height:55px;
	text-align: right; }
#page #page-body #body-engine .result-body div.result-text-container-right {
	margin:0px 0px 0px 0px;
	float:left;
	width:16px;
	height:55px; }
#page #page-body #body-engine .result-body .result-promo-value{
	position:relative;
	margin:0px 0px 0px 7px;
	font-family:"Arial";
	font-size:15pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:25px; }
#page #page-body #body-engine .result-body .result-promo-title{
	position:relative;
	margin:0px 0px 0px 7px;
	font-family:"Arial";
	font-size:10pt;
	color:#22246a;
	font-weight:bold; 
	letter-spacing: -1px;
	line-height:10px; }
#page #page-body #body-engine .result-body .result-promo-price{
	position:relative;
	margin:0px 0px 0px 0px;
	font-family:"Arial";
	font-size:17pt;
	color:#ffd200;
	font-weight:bold; 
	line-height:50px; }
#page #page-body #body-engine .result-body .result-promo-euro{
	position:relative;
	margin:0px 0px 0px 4px;
	font-family:"Arial";
	font-size:13pt;
	color:#ffd200;
	font-weight:bold; 
	line-height:51px; }
#page #page-body #body-engine .result-footer{
	position:relative; 
	margin:-10px 0px 0px 0px;
	width:676px;
	height:54px;
	float:left; }
#page #continents-buttons { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:300px;
	height:229px;
	float:left; }
#page #continents-buttons span.continent-text{ 
	position:relative; 
	margin:0px 0px 0px 15px;
	font-family:"Arial";
	font-size:18pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:45px;  }
#page #continents-buttons ul {
	margin:-2px 0px 0px -40px;
	width:300px;
	height:229px;
	text-align:left; }
#page #continents-buttons li {
	margin:2px 0px 0px 0px;
	float:left;
	width:300px;
	height:44px;
	background:url("{/literal}{$img_path}{literal}/btn_continent.png"); }
#page #continents-buttons li:hover {
	background:url("{/literal}{$img_path}{literal}/btn_continent_h.png"); }
#page #continents-buttons .selected-continent {
	background:url("{/literal}{$img_path}{literal}/btn_continent_h.png"); }
#page #result-right-advertising-bg { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:300px;
	height:341px;
	float:left;
	background:url("{/literal}{$img_path}{literal}/right_advertising_bg.png"); }
#page #result-right-advertising-bg ul{ 
	margin: 27px 0px 0px -35px; }
#page #result-right-advertising-bg ul li{ 
	margin: 16px 0px 0px 0px; }
#page #result-fast-search { 
	position:relative; 
	margin:35px 0px 0px 0px;
	width:100%;
	height:140px; }
#page #result-fast-search #fast-search-top { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:40px;
	float:left; }
#page #result-fast-search #fast-search-top img { 
	position:relative; 
	margin:0px 0px 0px 15px; }
#page #result-fast-search #fast-search-middle { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:44px;
	float:left; }
#page #result-fast-search #fast-search-middle .left{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:430px;
	height:44px;
	float:left;
	text-align:left; }
#page #result-fast-search #fast-search-middle .left .fast-search-container #filter-vacancy{
	position:relative; 
	margin:-29px 0px 0px 120px;
	top:10px;
	height:41px;}
#page #result-fast-search #fast-search-middle .left .fast-search-container #filter-vacancy .text {
	position:relative; 
	margin:0px 0px 0px 0px;
	width:52px;
	float:left;
	font-family:"Arial";
	font-size:9pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:10px;}
#page #result-fast-search #fast-search-middle .left .fast-search-container #filter-vacancy .rdb {
	position:relative; 
	margin:-5px 0px 0px 0px;
	width:28px;
	float:left;}
#page #result-fast-search #fast-search-middle .left .fast-search-container{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:420px;
	height:41px;
	background:url("{/literal}{$img_path}{literal}/fast_search_left_bg.png"); }
#page #result-fast-search #fast-search-middle .right{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:545px;
	height:44px;
	float:left;
	text-align:left; }
#page #result-fast-search #fast-search-middle .right .fast-search-container{ 
	position:relative; 
	margin:0px 0px 0px 7px;
	width:538px;
	height:41px;
	background:url("{/literal}{$img_path}{literal}/fast_search_right_bg.png"); }
#page #result-fast-search #fast-search-middle .right .fast-search-container #filter-transport{
	position:relative; 
	margin:-29px 0px 0px 190px;
	top:10px;
	height:41px;}
#page #result-fast-search #fast-search-middle .right .fast-search-container #filter-transport .text {
	position:relative; 
	margin:0px 0px 0px 0px;
	width:52px;
	float:left;
	font-family:"Arial";
	font-size:9pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:10px;}
#page #result-fast-search #fast-search-middle .right .fast-search-container #filter-transport .rdb {
	position:relative; 
	margin:-5px 0px 0px 0px;
	width:28px;
	float:left;}
#page #result-fast-search #fast-search-bottom .left #autocomplete-destination-container {
	margin:-26px 0px 0px 180px;
}
#page #result-fast-search #fast-search-bottom .left #autocomplete-destination-container input {
	float:left;
	border-color:white;
	font-size: 11.6px;
	background:#ffffff;
	width:195px;
	margin: 0;
	padding: 0.3em;
}
#page #result-fast-search #fast-search-bottom .left #autocomplete-destination-container img {
	float:left;
	margin:-3px 0px 0px -4px;
}
#page #result-fast-search #fast-search-bottom { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:56px;
	float:left; }
#page #result-fast-search #fast-search-bottom .left{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:430px;
	height:44px;
	float:left;
	text-align:left; }
#page #result-fast-search #fast-search-bottom .left .fast-search-container{ 
	position:relative; 
	margin:8px 0px 0px 0px;
	width:420px;
	height:41px;
	background:url("{/literal}{$img_path}{literal}/fast_search_left_bg.png"); }
#page #result-fast-search #fast-search-bottom .right{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:545px;
	height:44px;
	float:left;
	text-align:left; }
#page #result-fast-search #fast-search-bottom .right .fast-search-container{ 
	position:relative; 
	margin:8px 0px 0px 7px;
	width:538px;
	height:41px;
	background:url("{/literal}{$img_path}{literal}/fast_search_right_bg.png"); }
#page #result-fast-search .fast-search-text{ 
	position:relative; 
	margin:8px 0px 0px 4px; }
#page #result-fast-search .fast-search-slider-minus{ 
	position:relative; 
	margin:0px 0px 0px 28px; }
#page #result-fast-search .fast-search-slider-plus{ 
	position:relative; 
	margin:0px 0px 0px 307px; }
#page #result-fast-search #grid-slider-active{ 
	position:absolute;
	border:none;
	width:300px;
	float:left;
	margin-left:648px;
	margin-top:114px; }
#page #search-fields #search-fields-container {
	position:absolute;
	margin:10px 0px 0px 10px;
	width:465px;
	height:260px; }
#page #search-fields #search-fields-container label {
	color: #FFFFFF;
    display:block;
    font-family: "Arial";
    font-size: 9pt;
    font-weight: bold;
    line-height: 25px;
    margin: 0;
    position: relative;
    width: 80px; }
#page #search-fields #autocomplete-destination-container {
	position:relative;
	margin:0px 0px 0px 0px;
	float:left; }
#page #search-fields #autocomplete-destination-container input {
	float:left;
	border-color:white;
	font-size: 11.6px;
	background:#ffffff;
	width:185px;
	margin: 0;
	padding: 0.3em; }
#page #search-fields #autocomplete-destination-container img {
	float:left;
	margin:-3px 0px 0px -4px; }
#page #search-fields #autocomplete-hotel-container {
	position:relative;
	margin:0px 0px 0px 20px;
	float:left; }
#page #search-fields #autocomplete-hotel-container input {
	float:left;
	border-color:white;
	font-size: 11.6px;
	background:#ffffff;
	width:185px;
	margin: 0;
	padding: 0.3em; }
#page #search-fields #autocomplete-hotel-container img {
	float:left;
	margin:-3px 0px 0px -4px; }
#page #search-fields #autocomplete-vacancy-type-container {
	position:relative;
	margin:0px 0px 0px 0px;
	float:left; }
#page #search-fields #autocomplete-vacancy-type-container input {
	float:left;
	border-color:white;
	font-size: 11.6px;
	background:#ffffff;
	width:185px;
	margin: 0;
	padding: 0.3em; }
#page #search-fields #autocomplete-vacancy-type-container img {
	float:left;
	margin:-3px 0px 0px -4px; }
#page #search-fields #autocomplete-stars-container {
	position:relative;
	margin:0px 0px 0px 20px;
	float:left; }
#page #search-fields #autocomplete-stars-container input {
	float:left;
	border-color:white;
	font-size: 11.6px;
	background:#ffffff;
	width:185px;
	margin: 0;
	padding: 0.3em; }
#page #search-fields #autocomplete-stars-container img {
	float:left;
	margin:-3px 0px 0px -4px;}
#page #page-body #contact-header-text-container{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:675px;
	height:137px; }
#page #page-body #contact-header-text{ 
	position:relative; 
	margin:0px 0px 0px 45px;
	background:url("{/literal}{$img_path}{literal}/contact_header_text.png");
	width:590px;
	height:103px; }
#page #page-body #contact-newsletter{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:675px;
	height:171px; }
#page #page-body #contact-newsletter #input-text-container {
	height:43px;
	width:357px;
	float:left; }
#page #page-body #contact-newsletter #input-text-container .txt-search {
    background: none repeat scroll 0 0 #fffff;
    outline: medium none;
    border: 0 none;
    display: inline-block;
    font-size: 17px;
    outline: medium none;
    padding: 2px 4px 3px;
    height: 100%;
    width: 100%; }
#page #page-body #contact-newsletter .input-text-bg{
	position:relative; 
	margin:0px 0px 0px 3px;
	width:15px;
	height:48px;
	float:left;}
#page #page-body #contact-newsletter .btn-newsletter{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:147px;
	height:47px;
	text-align:left;}
#page #page-body #contact-newsletter .input-label-newsletter{
    color: #FFD100;
    display: block;
    font-family: "Arial";
    font-size: 16pt;
    font-style: italic;
    font-weight: normal;
    line-height: 50px;
    position: relative; }
#page #page-body #contact-newsletter #top{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:675px;
	height:57px; }
#page #page-body #contact-newsletter #top-left{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:130px;
	height:57px;
	float:left; }
#page #page-body #contact-newsletter #top-center{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:376px;
	height:57px;
	float:left;
	text-align:left; }
#page #page-body #contact-newsletter #top-right{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:169px;
	height:57px;
	float:left;
	text-align:left; }
#page #page-body #contact-newsletter #middle{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:675px;
	height:57px; }
#page #page-body #contact-newsletter #middle-left{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:130px;
	height:57px;
	float:left; }
#page #page-body #contact-newsletter #middle-center{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:376px;
	height:57px;
	float:left;
	text-align:left; }
#page #page-body #contact-newsletter #middle-right{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:169px;
	height:57px;
	float:left;
	text-align:left; }
#page #page-body #contact-newsletter #bottom{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:675px;
	height:57px; }
#page #page-body #contact-newsletter #bottom-left{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:130px;
	height:57px;
	float:left; }
#page #page-body #contact-newsletter #bottom-center{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:376px;
	height:57px;
	float:left;
	text-align:left; }
#page #page-body #contact-newsletter #bottom-right{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:169px;
	height:57px;
	float:left;
	text-align:left; }
#page #page-body #contact-middle-text-container{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:675px;
	height:110px; }
#page #page-body #contact-middle-text{ 
	position:relative; 
	margin:0px 0px 0px 45px;
	background:url("{/literal}{$img_path}{literal}/contact_middle_text.png");
	width:480px;
	height:47px; }
#page #page-body #contact-map{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:675px;
	height:527px; }
#page #page-body #contact-map #left{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:205px;
	height:527px;
	float:left; }
#page #page-body #contact-map #left .title{
	color: #FFD100;
    font-family: "Arial";
    font-size: 12pt;
    font-weight: bold;
    line-height: 25px;
    margin-left: 45px;
    display:block; }
#page #page-body #contact-map #left .text{
	color: #FFFFFF;
    font-family: "Arial";
    font-size: 12pt;
    font-weight: bold;
    line-height: 20px;
    margin-left: 45px;
    display:block; }
#page #page-body #contact-map #left .top{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:205px;
	height:100px;
	float:left;
	text-align:left; }
#page #page-body #contact-map #left .middle{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:205px;
	height:150px;
	float:left;
	text-align:left; }
#page #page-body #contact-map #left .bottom{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:205px;
	height:277px;
	float:left;
	text-align:left; }
#page #page-body #contact-map #left .middle{
} 
#page #page-body #contact-map #left .bottom{
} 
#page #page-body #contact-map #right{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:470px;
	height:527px;
	float:left; }
#page #page-body #contact-map #right #map{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	background:url("{/literal}{$img_path}{literal}/contact_map.png");
	width:451px;
	height:365px; }
/*Detail offer page*/
#page #page-body #detail-content{
	position:relative; 
	margin:30px 0px 0px 27px;
	width:621px;
	height:915px;
	float: left;
	overflow:hidden;} 
#page #page-body #detail-title{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:95px;
	float: left;} 
#page #page-body #detail-title .left{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:471px;
	height:95px;
	float: left;} 
#page #page-body #detail-title .left .top{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:471px;
	height:65px;
	float: left;
	overflow:hidden;
	text-align:left;} 
#page #page-body #detail-title .left .bottom{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:471px;
	height:30px;
	float: left;
	overflow:hidden;
	text-align:left;} 
#page #page-body #detail-title .left .top span{
    color: #FFFFFF;
    font-family: "Arial";
    font-size: 20pt;
    font-weight: bold;
    line-height: 28px;}
#page #page-body #detail-title .left .bottom span{
    color: green;
    font-family: "Arial";
    font-size: 12pt;
    font-style:italic;
    font-weight: bold;
    line-height: 15px;}
#page #page-body #detail-title .right{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:150px;
	height:95px;
	float: left;} 
#page #page-body #detail-title .right{
	position:relative; 
	margin:10px 0px 0px 0px;}
#page #page-body #detail-pictures{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:360px;
	float: left;} 
#page #page-body #detail-pictures .left{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:471px;
	height:360px;
	float: left;} 
#page #page-body #detail-pictures .left #detail-image-bg{
	background:url("{/literal}{$img_path}{literal}/detail_primary_image_bg.png");
	position:relative; 
	margin:0px 0px 0px 0px;
	width:456px;
	height:347px;
	float: left;}
#page #page-body #detail-pictures .left #detail-image-bg img{
	position:relative; 
	margin:8px 0px 0px 0px;} 
#page #page-body #detail-pictures .right{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:150px;
	height:360px;
	float: left;  } 
#page #page-body #detail-pictures .right .mask{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:150px;
	height:351px;
	float: left;
	overflow:hidden; } 
#page #page-body #detail-pictures .right #image-prev{
	position:absolute; 
	cursor: pointer;
	z-index:10;
	top: 6px;
	right:6px;
	width:37px;
	height:31px;
	background:url("{/literal}{$img_path}{literal}/detail_list_prev.png");}
#page #page-body #detail-pictures .right #image-next{
	position:absolute;
	cursor: pointer;
	z-index:10;
	bottom: 21px;
	right:6px;
	width:37px;
	height:31px;
	background:url("{/literal}{$img_path}{literal}/detail_list_next.png");
}
#page #page-body #detail-pictures .right ul{
	position:relative; 
	margin:0px 0px 0px -39px;
	width:149px;
	height:360px; } 
#page #page-body #detail-pictures .right li{
	background:url("{/literal}{$img_path}{literal}/detail_list_image_bg.png");
	position:relative; 
	margin:5px 0px 0px 0px;
	width:149px;
	height:112px; } 
#page #page-body #detail-pictures .right li img{
	position:relative; 
	margin:7px 0px 0px 0px;} 
#page #page-body #detail-pictures .right li:first-child{
	margin-top: 0px;} 
#page #page-body #detail-hotel{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:56px;
	float: left;} 
#page #page-body #detail-hotel .left{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:471px;
	height:56px;
	float: left;
	text-align:left;} 
#page #page-body #detail-hotel .left #text-container{
	position:relative; 
	margin:10px 0px 0px 0px;}	
#page #page-body #detail-hotel .left .text-hotel{
    color: #ffffff;
    font-family: "Arial";
    font-size: 12pt;
    font-weight: bold;
    line-height: 15px;}
#page #page-body #detail-content .text-stars{
    color: #4FA800;
    font-family: "Arial";
    font-size: 12pt;
    font-weight: bold;
    line-height: 15px;}
#page #page-body #detail-content .text-stars-symbol{
	position:absolute; 
	margin:-11px 0px 0px 0px;
    color: #4FA800;
    font-family: "Arial";
    font-size: 12pt;
    font-weight: bold; }
#page #page-body #detail-hotel .left .text-observation{
    color: #e2e2eb;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 15px;}
#page #page-body #detail-hotel .right{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:150px;
	height:56px;
	float: left;} 
#page #page-body #detail-description{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:214px;
	float: left;
	text-align:left;
	overflow:auto;}
#page #page-body .description-text-block{
	color: #e2e2eb;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 15px;
    display:block;}
#page #page-body .description-title{
    color: #ffd200;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 20px;
    display:block;}
#page #page-body .description-title-noblock{
    color: #ffd200;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 20px;}
#page #page-body .description-text{
    color: #e2e2eb;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 15px;}
#page #page-body .description-text-red{
    color: #d24329;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 15px;}
#page #page-body #detail-buttons{
	position:relative; 
	margin:10px 0px 0px 0px;
	width:621px;
	height:46px;
	float: left;
	border-bottom-style:dashed;
	border-width:1px;
	border-color:#5f6195;}  
#page #page-body #detail-buttons ul{
	position:relative; 
	margin:0px 0px 0px -47px;
	width:621px;
	height:46px; }  
#page #page-body #detail-buttons #detail-btn-tarif{
	background:url("{/literal}{$img_path}{literal}/detail_btn_tarif.png");
	position:relative; 
	width:187px;
	height:30px;
	float:left; } 
#page #page-body #detail-buttons #detail-btn-hotel{
	background:url("{/literal}{$img_path}{literal}/detail_btn_hotel.png");
	position:relative; 
	width:194px;
	height:30px;
	float:left; }
#page #page-body #detail-buttons #detail-btn-info{
	background:url("{/literal}{$img_path}{literal}/detail_btn_info.png");
	position:relative; 
	width:102px;
	height:30px;
	float:left; }
#page #page-body #detail-buttons #detail-btn-details{
	background:url("{/literal}{$img_path}{literal}/detail_btn_details.png");
	position:relative; 
	width:82px;
	height:30px;
	float:left; } 
#page #page-body #detail-buttons #detail-btn-tarif7{
	background:url("{/literal}{$img_path}{literal}/detail_btn_tarif7.png");
	position:relative; 
	width:194px;
	height:30px;
	float:left; }
#page #page-body #detail-buttons #detail-btn-impresion{
	background:url("{/literal}{$img_path}{literal}/detail_btn_impresion.png");
	position:relative; 
	width:82px;
	height:30px;
	float:left; }
#page #page-body #detail-buttons li{
	position:relative; 
	margin:0px 0px 0px 8px; }
#page #page-body #detail-slider{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:65px;
	float: left;
	border-bottom-style:dashed;
	border-width:1px;
	border-color:#5f6195;} 
#page #page-body #detail-slider .left{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:280px;
	height:112px;
	float: left;
	vertical-align:middle;} 
#page #page-body #detail-slider .left img{
	position:relative; 
	margin:36px 0px 0px 0px;}
#page #page-body #detail-slider .right{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:341px;
	height:112px;
	float: left;
	text-align:left;} 
#page #page-body #detail-slider .right #slider{ 
	position:relative; 
	margin:42px 0px 0px 0px; }
#page #page-body #detail-slider .right #stars-slider-active{ 
	position:relative; 
	margin:4px 5px 0px 15px;
	border:none;
	width:285px;
	float:left;}
#page #page-body #detail-slider .right .fast-search-slider-minus{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	float:left; }
#page #page-body #detail-slider .right .fast-search-slider-plus{ 
	position:relative; 
	margin:0px 0px 0px 0px;
	float:left; }
#page #page-body #detail-flight-description{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:258px;
	float: left;
	text-align:left;
	overflow:auto;}
#page #page-body #detail-flight-pictures{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:437px;
	float: left;
	border-bottom-style:dashed;
	border-width:1px;
	border-color:#5f6195;} 
#page #page-body #detail-flight-pictures ul{
	position:relative; 
	margin:0px 0px 0px -40px; }  
#page #page-body #detail-flight-pictures li{
	position:relative; 
	margin:5px 0px 0px 0px;
	width:621px;
	height:102px; }
#page #page-body #detail-flight-pictures .left{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:156px;
	height:102px;
	float:left;
	text-align:left; }
#page #page-body #detail-flight-pictures .center{
	position:relative; 
	margin:0px 0px 0px 10px;
	width:225px;
	height:102px;
	float:left;
	text-align:left; }
#page #page-body #detail-flight-pictures .center .title{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:120px;
	height:102px;
	float:left;
	text-align:left;}
#page #page-body .description-flight-title{
    color: #ffd200;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 20px;
    display:block;}
#page #page-body #detail-flight-pictures .center .text{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:105px;
	height:102px;
	float:left;
	text-align:left;}
#page #page-body .description-flight-text{
    color: #e2e2eb;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 20px;
    display:block;}
#page #page-body #detail-flight-pictures .right{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:230px;
	height:102px;
	float:left;
	text-align:left; }
#page #page-body #detail-buss-description{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:258px;
	float: left;
	text-align:left;
	overflow:auto;}
#page #page-body #detail-buss-pictures{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:437px;
	float: left;
	border-bottom-style:dashed;
	border-width:1px;
	border-color:#5f6195;
	text-align:left;} 
#page #page-body #detail-similars{
	position:relative; 
	margin:0px 0px 0px 0px;
	width:621px;
	height:69px;
	float: left;} 
#page #page-body #detail-similars img{
	position:relative; 
	margin:13px 0px 0px 0px;
	width:621px;
	height:44px;
	float: left;}





#page #detail-reservation-form{
	text-align:left; }
#page #detail-reservation-content {
	position:relative; 
	margin:30px 0px 0px 27px;
	width:621px;
	height:915px;
	float: left;
	overflow:hidden;} 
#page #detail-reservation-form .footer{
	border-top-style:dashed;
	border-width:1px;
	border-color:#5f6195;
	margin: 20px 0px 0px 0px;}
#page #detail-reservation-form td.label{
	text-align: left;
    width: 250px;
    color: #ffd200;
    font-family: "Arial";
    font-size: 10pt;
    font-weight: bold;
    line-height: 20px;}
#page #detail-reservation-form .star{
    color: #4FA800;}
#page #detail-reservation-form .element input,textarea{
   	background: none repeat scroll 0 0 #FFFFFF;
    border-style: none;
    float: left;
    font-size: 12px;
    margin: 0;
    padding: 0.6em;
    -moz-border-radius: 4px; 
	-webkit-border-radius: 4px; 
	-khtml-border-radius: 4px; 
	border-radius: 4px;
    width: 321px;}
#page #detail-reservation-form .element textarea{
	height:80px; }
#page #detail-reservation-form #reservation_save{
	text-indent:-9999px;
 	border-style: none;
	background:url("{/literal}{$img_path}{literal}/send_offer.png");
	width:623px;
	height:44px;
	margin: 20px 0px 0px 0px;
}

    



#detail-content div.prices div.left {float:left;width:40px; padding:5px; border-bottom:1px solid #cdcdcd;}
#detail-content div.prices div.header {width:40px; height:16px; padding:5px; font-weight:bold; font-size:12px;border:0px solid #cdcdcd; background:url({/literal}{$img_path}{literal}mainbar_off.gif);} 
#detail-content div.prices div.large {width:100px;}
#detail-content table.prices {width:100%; border-collapse: collapse; }
#detail-content table.prices td { padding:2px; border:1px solid #8EB8E1; }
#detail-content table.prices td.right { text-align:right; }
#detail-content table.prices td.header { height:23px;} 
#detail-content table.prices td.w5 { width:20%;} 
#detail-content table.prices td.w4 { width:25%} 
#detail-content table.prices td.w3 { width:33%} 
#detail-content table.prices td.w2 { width:50%} 
#detail-content table.prices td.date { width:90px;} 
#detail-content table.detail td.label , table.detail  td.price{width:150px; padding:5px; font-weight:bold;}
#detail-content table.detail td.price{ color:#8EB8E1;}
#footer{ 
	border:0px solid #000000; 
	position:relative;
	padding:0px;
	text-align:center; 
	width:975px;
	margin:0 auto; }
#footer #footer-info { 
	position:relative; 
	margin:5px 0px 0px 1px;
	width:100%;
	height:87px;
	background:url("{/literal}{$img_path}{literal}/footer_bg.png"); }
#footer #footer-info #footer-info-top { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:47px;
	float:left; }
#footer #footer-info #footer-info-top .footer-suport-text{ 
	position:relative; 
	margin:20px 0px 0px 60px;
	width:216px;
	height:24px;
	float:left; }
#footer #footer-info #footer-info-top .footer-suport-text-style-first{
	position:relative; 
	margin:0px 0px 0px 0px;
	font-family:"Arial";
	font-size:10pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:65px;
	float:left; }
#footer #footer-info #footer-info-top .footer-suport-text-style-second{
	position:relative; 
	margin:0px 0px 0px 0px;
	font-family:"Arial";
	font-size:10pt;
	color:#ffd200;
	font-weight:bold; 
	line-height:65px;
	float:left; }
#footer #footer-info #footer-info-bottom { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:40px;
	float:left; }
#footer #footer-info #footer-info-bottom .footer-suport-text-style-first{
	position:relative; 
	margin:0px 0px 0px 355px;
	font-family:"Arial";
	font-size:9pt;
	color:#a4a7f1;
	font-weight:bold; 
	line-height:25px;
	float:left; }
#footer #footer-info #footer-info-bottom .footer-suport-text-style-second{
	position:relative; 
	margin:0px 0px 0px 0px;
	font-family:"Arial";
	font-size:9pt;
	color:#ffffff;
	font-weight:bold; 
	line-height:25px;
	float:left; }
#footer #footer-info #footer-info-bottom .footer-facebook-icon{
	position:relative; 
	margin:0px 0px 0px 0px; 
	float:left;}
#footer #footer-info #footer-info-bottom .footer-linkedin-icon{
	position:relative; 
	margin:0px 0px 0px 0px; 
	float:left;}
#footer #footer-copyright { 
	position:relative; 
	margin:10px 0px 0px 1px;
	width:100%;
	height:90px; }
#footer #footer-copyright #footer-copyright-top { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:45px;
	float:left;
	text-align:center; }
#footer #footer-copyright #footer-copyright-top ul {
	margin: 0 auto;
	display:inline-block; }
#footer #footer-copyright #footer-copyright-top li.first {
	/*margin:2px 0px 0px 270px;*/ }
#footer #footer-copyright #footer-copyright-top li {
	position:relative; 
	margin:2px 0px 0px 10px;
	float:left;
	font-family:"Arial";
	font-size:11pt;
	color:#2e3192;
	font-weight:bold; 
	line-height:35px; }
#footer #footer-copyright #footer-copyright-top li:hover {
	color:#4fa800; }
#footer #footer-copyright #footer-copyright-top li.selected {
	color:#4fa800; }
#footer #footer-copyright #footer-copyright-bottom { 
	position:relative; 
	margin:0px 0px 0px 0px;
	width:100%;
	height:45px;
	float:left; }
#footer #footer-copyright #footer-copyright-bottom .footer-suport-text-style-first{
	position:relative; 
	margin:0px 0px 0px 350px;
	float:left;
	font-family:"Arial";
	font-size:12pt;
	color:#4fa800;
	font-weight:bold; 
	line-height:25px;  }
#footer #footer-copyright #footer-copyright-bottom .footer-suport-text-style-second{
	position:relative; 
	margin:0px 0px 0px 0px;
	float:left;
	font-family:"Arial";
	font-size:12pt;
	color:#22246a;
	font-weight:normal; 
	line-height:23px;  }
	
/*JQuery UI*/
.ui-custom-widget-overlay { 
	position: absolute; 
	top: 0; 
	left: 0; 
	width: 100%; 
	height: 100%; }
/*----------------------------------*/
.ui-custom-widget-content { 
	border: 1px solid #00204c; 
	background: #00204c  50% bottom repeat-x; 
	color: #1e1b1d; }
.ui-custom-widget-content a { 
	color: #1e1b1d; }
.ui-custom-widget-header { 
	border: 1px solid #ffcb08; 
	background: #ffcb08  50% 50% repeat-x; 
	color: #ffffff; 
	font-weight: bold; }
.ui-custom-widget-header a { 
	color: #ffffff; }
/*----------------------------------*/
.ui-custom-state-default, .ui-custom-widget-content .ui-custom-state-default, .ui-custom-widget-header .ui-custom-state-default { 
	background: url({/literal}{$img_path}{literal}/btn_slide_active.png);
	text-decoration:none;
	font-family:"Arial";
	text-align: center;
	font-size:16pt;
	color:#2e3192;
	font-weight:bold; 
	line-height:30px; }
.ui-custom-state-focus {border: 0px;outline:none;}
div:focus{border: 0px;outline:none;}
div:active{border: 0px;outline:none;}
/*----------------------------------*/
.ui-custom-corner-all, .ui-custom-corner-top, .ui-custom-corner-left, .ui-custom-corner-tl { 
	-moz-border-radius-topleft: 6px; 
	-webkit-border-top-left-radius: 6px; 
	-khtml-border-top-left-radius: 6px; 
	border-top-left-radius: 6px; }
.ui-custom-corner-all, .ui-custom-corner-top, .ui-custom-corner-right, .ui-custom-corner-tr { 
	-moz-border-radius-topright: 6px; 
	-webkit-border-top-right-radius: 6px; 
	-khtml-border-top-right-radius: 6px; 
	border-top-right-radius: 6px; }
.ui-custom-corner-all, .ui-custom-corner-bottom, .ui-custom-corner-left, .ui-custom-corner-bl { 
	-moz-border-radius-bottomleft: 6px; 
	-webkit-border-bottom-left-radius: 6px; 
	-khtml-border-bottom-left-radius: 6px; 
	border-bottom-left-radius: 6px; }
.ui-custom-corner-all, .ui-custom-corner-bottom, .ui-custom-corner-right, .ui-custom-corner-br { 
	-moz-border-radius-bottomright: 6px; 
	-webkit-border-bottom-right-radius: 6px; 
	-khtml-border-bottom-right-radius: 6px; 
	border-bottom-right-radius: 6px; }
/*----------------------------------*/
.ui-custom-slider { 
	position: relative; 
	text-align: left; }
.ui-custom-slider .ui-custom-slider-handle { 
	position: absolute; 
	z-index: 2; width: 62px; 
	height: 36px; 
	cursor: default; }
.ui-custom-slider .ui-custom-slider-range { 
	position: absolute; 
	z-index: 1; 
	font-size: .7em; 
	display: block; 
	border: 0; 
	background-position: 0 0; }
.ui-custom-slider-horizontal { 
	height: .8em; }
.ui-custom-slider-horizontal .ui-custom-slider-handle { 
	top: -37px; margin-left: -30px;}
.ui-custom-slider-horizontal .ui-custom-slider-range { 
	top: 0; height: 100%; }
.ui-custom-slider-horizontal .ui-custom-slider-range-min { 
	left: 0; }
.ui-custom-slider-horizontal .ui-custom-slider-range-max { 
	right: 0; }
{/literal}