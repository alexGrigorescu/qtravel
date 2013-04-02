<?php /* Smarty version 2.6.18, created on 2013-03-03 10:27:35
         compiled from D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/layout.tpl', 6, false),array('function', 'url', 'D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/layout.tpl', 116, false),)), $this); ?>
<?php echo '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ro" lang="ro" dir="ltr">
	<head>
	'; ?>

	<?php if (count($this->_tpl_vars['metatags']) > 0): ?>
	<?php $_from = $this->_tpl_vars['metatags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metatag']):
?>
	<?php echo $this->_tpl_vars['metatag']; ?>

	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="RO" />
	<title>Oferte Vacanta | Bilete avion | Bilete Autocar</title>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['locationBack']['id'] > 0): ?>
		<?php if ($this->_tpl_vars['object'] == 'accommodation_plane' || $this->_tpl_vars['object'] == 'accommodation_bus' || $this->_tpl_vars['object'] == 'accommodation_individual'): ?>
			<LINK REL=PREVIOUS TITLE="<?php echo $this->_tpl_vars['locationBack']['title']; ?>
" HREF="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['locationBack']['region_code']; ?>
/<?php echo $this->_tpl_vars['locationBack']['code']; ?>
.html">
		<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
			<LINK REL=PREVIOUS TITLE="<?php echo $this->_tpl_vars['locationBack']['title']; ?>
" HREF="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['locationBack']['end_region_code']; ?>
/<?php echo $this->_tpl_vars['locationBack']['code']; ?>
.html">
		<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
			<LINK REL=PREVIOUS TITLE="<?php echo $this->_tpl_vars['locationBack']['title']; ?>
" HREF="<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/<?php echo $this->_tpl_vars['locationBack']['end_region_code']; ?>
/<?php echo $this->_tpl_vars['locationBack']['code']; ?>
.html">
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['locationNext']['id'] > 0): ?>
		<?php if ($this->_tpl_vars['object'] == 'accommodation_plane' || $this->_tpl_vars['object'] == 'accommodation_bus' || $this->_tpl_vars['object'] == 'accommodation_individual'): ?>
			<LINK REL=NEXT TITLE="<?php echo $this->_tpl_vars['locationNext']['title']; ?>
" HREF="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['locationNext']['region_code']; ?>
/<?php echo $this->_tpl_vars['locationNext']['code']; ?>
.html">
		<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
			<LINK REL=NEXT TITLE="<?php echo $this->_tpl_vars['locationNext']['title']; ?>
" HREF="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['locationNext']['end_region_code']; ?>
/<?php echo $this->_tpl_vars['locationNext']['code']; ?>
.html">
		<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
			<LINK REL=NEXT TITLE="<?php echo $this->_tpl_vars['locationNext']['title']; ?>
" HREF="<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/<?php echo $this->_tpl_vars['locationNext']['end_region_code']; ?>
/<?php echo $this->_tpl_vars['locationNext']['code']; ?>
.html">
		<?php endif; ?>
	<?php endif; ?>

	<?php echo '
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
	<script type="text/javascript" src="'; ?>
<?php echo @LOCAL_URL; ?>
javascript.js<?php echo '"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/lytebox.js"></script>
	<!--	Accordion-->
	<script type="text/javascript" src="/javascript/oferta-vacanta/friendly_accordion/ga.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/friendly_accordion/jquery.js"></script>
	<script type="text/javascript" src="/javascript/oferta-vacanta/friendly_accordion/custom.js"></script>
	
	
	<link rel="stylesheet" href="'; ?>
<?php echo @LOCAL_URL; ?>
style.css<?php echo '" type="text/css" media="all" />
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push([\'_setAccount\', \'UA-32002283-1\']);
	  _gaq.push([\'_trackPageview\']);
	 
	  (function() {
	    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
	    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
	    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
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
		<input type="hidden" id="hid-buble-count" value="'; ?>
<?php echo $this->_tpl_vars['bubles_count']; ?>
<?php echo '">
		<input type="hidden" id="hid-ajax-url-prefix" value="'; ?>
<?php echo $this->_tpl_vars['ajaxUrl']; ?>
<?php echo '">
		<input type="hidden" id="hid-autocomplete-home-destination-id" value="">
		<input type="hidden" id="hid-autocomplete-hotel-id" value="">
		<input type="hidden" id="hid-autocomplete-stars-id" value="">
		<input type="hidden" id="hid-autocomplete-vacancy-type-id" value="">
		<input type="hidden" id="hid-price-promotion" value="0">
		<input type="hidden" id="hid-page-promotion" value="0">
		
		<div id="menu_bg"></div>
		<div id="carousel">
			<img class="carousel-element" border="0" alt="" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel1.png" />
			<img class="carousel-element" border="0" alt="" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel2.png" />
			<img class="carousel-element" border="0" alt="" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel3.png" />
			<img class="carousel-element" border="0" alt="" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel4.png" />
			<img class="carousel-element" border="0" alt="" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel5.png" />
			<img class="carousel-element" border="0" alt="" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel6.png" />
		</div>
		<script>
		//alte efecte ca turnDown  :shuffle,zoom,fade,curtainX,curtainY,scrollRight,
		//blindX,blindY,blindZ,cover,fadeZoom,growX,growY,none,scrollUp,
		//scrollDown,scrollLeft,scrollRight,scrollHorz,scrollVert,slideX,
		//slideY,toss,turnUp,turnDown,turnLeft,turnRight,uncover,wipe,zoom
		$(\'#carousel\').cycle(\'fade\'); </script>
		<div id="carousel-stripe">
			<img id="carousel-stripe-img" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel_loader6.png">
		</div>
		<div id="carousel-stripe-arrow">
			<img id="carousel-stripe-arrow-img" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/carousel_stripe_arrow.png">
		</div>
	</div>
	<div id="page-header">
			<div id="menu">
				'; ?>
<ul id="menulist">
					<?php if ($this->_tpl_vars['menuList']['submenu_home']['status'] == 1): ?>
					<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
" title="Oferte vacanta"><li id="submenu-home"></li></a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['menuList']['submenu_vacancies']['status'] == 1): ?>
					<li id="submenu-vacancies"></li>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['menuList']['submenu_tickets']['status'] == 1): ?>
					<li id="submenu-tickets"></li>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['menuList']['submenu_tour']['status'] == 1): ?>
					<li id="submenu-tour"></li>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['menuList']['submenu_events']['status'] == 1): ?>
					<li id="submenu-events"></li>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['menuList']['submenu_contact']['status'] == 1): ?>
					<a href="<?php echo smarty_function_url(array('o' => 'contact','m' => 'index'), $this);?>
"><li id="submenu-contact"></li></a>
					<?php endif; ?>
				</ul><?php echo '
			</div>
			<div id="contact-zone">
				<div id="logo">
					<a href="'; ?>
<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
<?php echo '" title="Oferte vacanta">        
						<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/logo.png"  alt="Oferte vacanta">    
					</a>
				</div>
	
				<div id="feedback">
					<a href="'; ?>
<?php echo smarty_function_url(array('o' => 'mymain','m' => 'feedback'), $this);?>
<?php echo '" id=\'a_PopUp\' rel="lyteframe" title="" target=\'_blank\' rev="width: 550px; height: 350px; scrolling: no;"><img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/feedback.png"></a>
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
					<div class="google-plus"><g:plusone href=\'http://www.oferta-vacanta.ro/\' size="medium"></g:plusone></div>
				</div>
			</div>
	</div>
	'; ?>
<?php echo $this->_tpl_vars['page_content']; ?>
<?php echo '
	<div id="footer">
		<div id="footer-info">
			<div id="footer-info-top">
				'; ?>
<ul>
					<?php $_from = $this->_tpl_vars['layout_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
												<a href="<?php echo $this->_tpl_vars['link']['link']; ?>
" title="<?php echo $this->_tpl_vars['link']['metatitle']; ?>
"><li><?php echo $this->_tpl_vars['link']['title']; ?>
</li></a>
											<?php endforeach; endif; unset($_from); ?>  
				</ul><?php echo '
			</div>
			<div id="footer-info-bottom">
				<span class="footer-suport-text-style-first">&#169; 2012 QTRAVEL &nbsp;</span>
				<span class="footer-suport-text-style-second">Toate drepturile rezervate</span>
			</div>
		</div>
	</div>
	
    </div>
    <script type="text/javascript">       
		window.___gcfg = {         lang: \'en-US\'       };        (function() {         
		var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;         po.src = \'https://apis.google.com/js/plusone.js\';         var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);       })();     
	</script>
</body>
</html>
'; ?>