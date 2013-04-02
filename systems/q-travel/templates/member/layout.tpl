{literal}
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ro" lang="ro" dir="ltr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta charset="utf-8">
	<title>Oferta Vacanta 2011 - Cazare, Sejur, Oferte Hotel, Bilete Avion, Bilet autocar, Litoral, Ski</title>
	
	<link rel="stylesheet" href="/css/oferta-vacanta/jquery.ui.all.css">
	<link rel="stylesheet" href="/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="/css/oferta-vacanta/jquery.jscrollpane.css">
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-ui-1.8.18.custom.min.js"></script>
	<script language="javascript" type="text/javascript" src="/javascript/oferta-vacanta/cycle.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.core.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.position.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.autocomplete.js"></script>
	<script type="text/javascript" src="/javascript.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.jscrollpane.min.js"></script>
	
</head>
<body>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
	<div id="header">
	
	
		<input type="hidden" id="hid-rdb-promo" value="0">
		<input type="hidden" id="hid-buble-count" value="{/literal}{$bubles_count}{literal}">
		<input type="hidden" id="hid-ajax-url-prefix" value="{/literal}{$ajaxUrl}{literal}">
		<input type="hidden" id="hid-autocomplete-home-destination-id" value="">
		<input type="hidden" id="hid-autocomplete-hotel-id" value="">
		<input type="hidden" id="hid-autocomplete-stars-id" value="">
		<input type="hidden" id="hid-autocomplete-vacancy-type-id" value="">
		<input type="hidden" id="hid-price-promotion" value="0">
		<input type="hidden" id="hid-page-promotion" value="0">
		
		<div id="menu_bg"></div>
		<div id="carousel">
			<img class="carousel-element" border="0" alt="" src="{/literal}{$img_path}{literal}/carousel1.png" />
			<img class="carousel-element" border="0" alt="" src="{/literal}{$img_path}{literal}/carousel2.png" />
			<img class="carousel-element" border="0" alt="" src="{/literal}{$img_path}{literal}/carousel3.png" />
			<img class="carousel-element" border="0" alt="" src="{/literal}{$img_path}{literal}/carousel4.png" />
			<img class="carousel-element" border="0" alt="" src="{/literal}{$img_path}{literal}/carousel5.png" />
			<img class="carousel-element" border="0" alt="" src="{/literal}{$img_path}{literal}/carousel6.png" />
		</div>
		<script>
		//alte efecte ca turnDown  :shuffle,zoom,fade,curtainX,curtainY,scrollRight,
		//blindX,blindY,blindZ,cover,fadeZoom,growX,growY,none,scrollUp,
		//scrollDown,scrollLeft,scrollRight,scrollHorz,scrollVert,slideX,
		//slideY,toss,turnUp,turnDown,turnLeft,turnRight,uncover,wipe,zoom
		$('#carousel').cycle('fade'); </script>
		<div id="carousel-stripe">
			<img id="carousel-stripe-img" src="{/literal}{$img_path}{literal}/carousel_loader6.png">
		</div>
		<div id="carousel-stripe-arrow">
			<img id="carousel-stripe-arrow-img" src="{/literal}{$img_path}{literal}/carousel_stripe_arrow.png">
		</div>
	</div>
	<div id="page-header">
			<div id="menu">
				{/literal}<ul id="menulist">
					{if $menuList.submenu_home.status eq 1}
					<a href="{url o='main' m='index'}"><li id="submenu-home"></li></a>
					{/if}
					{if $menuList.submenu_vacancies.status eq 1}
					<li id="submenu-vacancies"></li>
					{/if}
					{if $menuList.submenu_tickets.status eq 1}
					<li id="submenu-tickets"></li>
					{/if}
					{if $menuList.submenu_tour.status eq 1}
					<li id="submenu-tour"></li>
					{/if}
					{if $menuList.submenu_events.status eq 1}
					<li id="submenu-events"></li>
					{/if}
					{if $menuList.submenu_contact.status eq 1}
					<a href="{url o='contact' m='index'}"><li id="submenu-contact"></li></a>
					{/if}
				</ul>{literal}
			</div>
			<div id="contact-zone">
				<div id="logo">
					<img src="{/literal}{$img_path}{literal}/logo.png">
				</div>
	
				<div id="feedback">
					<a href="#"><img src="{/literal}{$img_path}{literal}/feedback.png"></a>
				</div>
				<div id="info">
					<span class="title">adresa:</span>
					<span class="text">Str. Caderea Bastiliei, Nr. 66, Sector 1, Bucuresti</span>
					<span class="title">telefoane:</span>
					<div class="text-block">
						<span class="text text-yellow">f: </span>
						<span class="text">031.100.59.30</span>
					</div>
					<div class="text-block">
						<span class="text text-yellow">f: </span>
						<span class="text">021.310.00.15</span>
					</div>
					<span class="title">email:</span>
					<a href="mailto:office@q-travel.ro"><span class="text text-block">office@q-travel.ro</span></a>
					<a href="mailto:vacante@q-travel.ro"><span class="text text-block">vacante@q-travel.ro</span></a>
					<span class="title">socializam aici:</span>
					<div id="like" class="facebook-like">
						<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
						<fb:like href=http://www.oferta-vacanta.ro/" layout="button_count" show_faces="false" width="20"></fb:like>
					</div>
					<div class="google-plus"><g:plusone href='http://www.oferta-vacanta.ro/' size="medium"></g:plusone></div>
				</div>
			</div>
	</div>
	{/literal}{$page_content}{literal}
	<div id="footer">
		<div id="footer-info">
			<div id="footer-info-top">
				<img src="{/literal}{$img_path}{literal}/footer_support_text.png" class="footer-suport-text">
				<span class="footer-suport-text-style-first">&nbsp;&nbsp;031.100.59.30 / fax: 031.100.59.29 ;&nbsp;</span>
				<span class="footer-suport-text-style-second">SKYPE ID:&nbsp;</span>
				<span class="footer-suport-text-style-first">daniel_ghiocel;&nbsp;</span>
				<span class="footer-suport-text-style-second">YAHOO MESSENGER ID:&nbsp;</span>
				<span class="footer-suport-text-style-first">qtravel_suport </span>

			</div>
			<div id="footer-info-bottom">
				<span class="footer-suport-text-style-first">Suntem si aici:&nbsp;</span>
				<a target="_new" href="{/literal}{$facebookProfile}{literal}"><img src="{/literal}{$img_path}{literal}/footer_facebook_icon.png" class="footer-facebook-icon">
				<span class="footer-suport-text-style-second">&nbsp;Facebook&nbsp;</span></a>
<!--				<img src="{/literal}{$img_path}{literal}/footer_linkedin_icon.png" class="footer-linkedin-icon">-->
<!--				<span class="footer-suport-text-style-second">&nbsp;LinkedIn</span>-->
			</div>
		</div>
		<div id="footer-copyright">
			<div id="footer-copyright-top">
				{/literal}<ul> 
					{if $menuList.submenu_home.status eq 1}
					<a href="{url o='main' m='index'}"><li class="{if $searchType eq 'home'}selected{/if} first">HOME</li></a>
					{/if}
					{if $menuList.submenu_vacancies.status eq 1}
					<a href="{url o='accommodation_plane' m='index'}"><li {if $searchType eq 'vacancy'}class="selected"{/if}>VACANTE</li></a>
					{/if}
					{if $menuList.submenu_tickets.status eq 1}
					<a href="{url o='flight' m='index'}"><li {if $searchType eq 'ticket'}class="selected"{/if}>BILETE</li></a>
					{/if}
					{if $menuList.submenu_tour.status eq 1}
					<a href="{url o='tour_plane' m='index'}"><li {if $searchType eq 'tour'}class="selected"{/if}>CIRCUITE</li></a>
					{/if}
					{if $menuList.submenu_events.status eq 1}
					<a href="{url o='event_conference' m='index'}"><li {if $searchType eq 'events'}class="selected"{/if}>EVENIMENTE</li></a>
					{/if}
					{if $menuList.submenu_contact.status eq 1}
					<a href="{url o='contact' m='index'}"><li {if $searchType eq 'contact'}class="selected"{/if}>CONTACT</li></a>
					{/if}
				</ul>{literal}
			</div>
			<div id="footer-copyright-bottom">
				<span class="footer-suport-text-style-first">&#169; 2012 QTRAVEL &nbsp;</span>
				<span class="footer-suport-text-style-second">Toate drepturile rezervate</span>
			</div>
		</div>
	</div>
	
    </div>
    <script type="text/javascript">       
		window.___gcfg = {         lang: 'en-US'       };        (function() {         
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;         po.src = 'https://apis.google.com/js/plusone.js';         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);       })();     
	</script>
</body>
</html>
{/literal}