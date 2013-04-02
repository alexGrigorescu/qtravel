{literal}
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ro" lang="ro" dir="ltr">
	<head>
	{/literal}
	{if $metatags|@count gt 0}
	{foreach from=$metatags item=metatag}
	{$metatag}
	{/foreach}
	{else}
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="RO" />
	<title>Oferte Vacanta | Bilete avion | Bilete Autocar</title>
	{/if}
	{if $locationBack.id gt 0}
		{if $object eq 'accommodation_plane' || $object eq 'accommodation_bus' || $object eq 'accommodation_individual'}
			<LINK REL=PREVIOUS TITLE="{$locationBack.title}" HREF="{$url}cazare/{$locationBack.region_code}/{$locationBack.code}.html">
		{elseif $object eq 'flight'}
			<LINK REL=PREVIOUS TITLE="{$locationBack.title}" HREF="{$url}bilet-avion/{$locationBack.end_region_code}/{$locationBack.code}.html">
		{elseif $object eq 'buss'}
			<LINK REL=PREVIOUS TITLE="{$locationBack.title}" HREF="{$url}bilet-autocar/{$locationBack.end_region_code}/{$locationBack.code}.html">
		{/if}
	{/if}
	
	{if $locationNext.id gt 0}
		{if $object eq 'accommodation_plane' || $object eq 'accommodation_bus' || $object eq 'accommodation_individual'}
			<LINK REL=NEXT TITLE="{$locationNext.title}" HREF="{$url}cazare/{$locationNext.region_code}/{$locationNext.code}.html">
		{elseif $object eq 'flight'}
			<LINK REL=NEXT TITLE="{$locationNext.title}" HREF="{$url}bilet-avion/{$locationNext.end_region_code}/{$locationNext.code}.html">
		{elseif $object eq 'buss'}
			<LINK REL=NEXT TITLE="{$locationNext.title}" HREF="{$url}bilet-autocar/{$locationNext.end_region_code}/{$locationNext.code}.html">
		{/if}
	{/if}

	{literal}
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="/css/oferta-vacanta/jquery.ui.all.css">
	<link rel="stylesheet" href="/css/oferta-vacanta/jquery.jscrollpane.css">
	<link rel="stylesheet" href="/css/oferta-vacanta/lytebox.css">
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-ui-1.8.18.custom.min.js"></script>
	<script language="javascript" type="text/javascript" src="/javascript/oferta-vacanta/cycle.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.core.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.position.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.autocomplete.js"></script>
	<script type="text/javascript" src="{/literal}{$smarty.const.LOCAL_URL}javascript.js{literal}"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/lytebox.js"></script>
	<!--	Accordion-->
	<script type="text/javascript" src="/javascript/oferta-vacanta/friendly_accordion/ga.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/friendly_accordion/jquery.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/friendly_accordion/custom.js"></script>
	
	
	<link rel="stylesheet" href="{/literal}{$smarty.const.LOCAL_URL}style.css{literal}" type="text/css" media="all" />
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-32002283-1']);
	  _gaq.push(['_trackPageview']);
	 
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script> 
	
	<!--[if IE]>
		<style>
		#result-item-title {margin:-182px 0px 0px 0px !important;}
	</style>
	<![endif]-->
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
					<a href="{url o='main' m='index'}" title="Oferte vacanta"><li id="submenu-home"></li></a>
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
					<a href="{/literal}{url o="main" m="index"}{literal}" title="Oferte vacanta">        
						<img src="{/literal}{$img_path}{literal}/logo.png"  alt="Oferte vacanta">    
					</a>
				</div>
	
				<div id="feedback">
					<a href="{/literal}{url o="mymain" m="feedback"}{literal}" id='a_PopUp' rel="lyteframe" title="" target='_blank' rev="width: 550px; height: 350px; scrolling: no;"><img src="{/literal}{$img_path}{literal}/feedback.png"></a>
				</div>
				<div id="info" itemscope itemtype="http://schema.org/Place">
					<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						<span class="title">adresa:</span>
						<span class="text" itemprop="streetAddress">Str. Caderea Bastiliei, Nr. 66 </span>
						<span class="text" itemprop="addressRegion">Sector 1 </span>
						<span class="text" itemprop="addressLocality">Bucuresti</span>
					</div>
					<span class="title">telefoane:</span>
					<div class="text-block">
						<span class="text text-yellow"></span>
						<span class="text" itemprop="telephone">021.310.00.15</span>
					</div>
					<div class="text-block">
						<span class="text text-yellow"></span>
						<span class="text" itemprop="telephone">021.310.31.51</span>
					</div>
					<div class="text-block">
						<span class="text text-yellow"></span>
						<span class="text" itemprop="telephone">031.100.59.30</span>
					</div>
					<span class="title">email:</span>
					<a href="mailto:office@q-travel.ro"><span class="text text-block">office@q-travel.ro</span></a>
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
				{/literal}<ul>
					{foreach from=$layout_pages item=link}
						{*{if $link.code eq 'termeni_si_conditii' || $link.code eq 'politica_de_confidentialitate' || $link.code eq 'contract'}*}
						<a href="{$link.link}" title="{$link.metatitle}"><li>{$link.title}</li></a>
						{*{/if}*}
					{/foreach}  
				</ul>{literal}
			</div>
			<div id="footer-info-bottom">
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