<?php /* Smarty version 2.6.18, created on 2012-09-17 10:11:57
         compiled from /home/qtravel/public_html/systems/avionbilet/templates/admin/layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/systems/avionbilet/templates/admin/layout.tpl', 3, false),array('function', 'url', '/home/qtravel/public_html/systems/avionbilet/templates/admin/layout.tpl', 30, false),)), $this); ?>
<html>
<head>
	<title><?php echo smarty_function_tr(array('key' => 'site_title','class' => 'layout'), $this);?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo @CHARSET; ?>
" />
	<meta http-equiv="keywords" content="<?php echo smarty_function_tr(array('key' => 'site_keywords','class' => 'layout'), $this);?>
" >
	<meta http-equiv="description" content="<?php echo smarty_function_tr(array('key' => 'site_description','class' => 'layout'), $this);?>
" />
	<script type="text/javascript" src="javascript/jquery/jquery.js"></script>
	<script type="text/javascript" src="javascript/jquery/calendar.js"></script>	
	<script type="text/javascript" src="javascript/jquery/form.js"></script>
	<script type="text/javascript" src="javascript/dtree/dtree.js"></script>
	<script type="text/javascript" src="javascript/script.js"></script>
	<style type="text/css">@import url(javascript/jquery/calendar.css);</style> 
	<style type="text/css">
		<?php echo $this->_tpl_vars['css']; ?>

	</style>
</head>
<body>
<div style="padding-top:10px;"></div>
<div style="text-align:center;">
	<div style="text-align:center;">
	<table border="0" cellspacing="0" cellpadding="0" style="background: url(<?php echo $this->_tpl_vars['img_path']; ?>
bluetop2.png) repeat-x; margin:auto;width:968px; border: 2px solid #CCCCCC;">
	<tr>
		<td style="border-right: 2px solid #CCCCCC; vertical-align:top; width:168px;">
			<div style="padding-top:19px;">
				<table border="0" cellspacing="0" cellpadding="0" style="width: 168px;">
					<tr>
						<td>
							<div class="nav">
							<?php if ($this->_tpl_vars['user_id'] > 0): ?>
								<a class="level0" href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_home','class' => 'layout'), $this);?>
</a>
								<?php if ($this->_tpl_vars['user_rigts']['domains'] || $this->_tpl_vars['user_rights']['pages'] || $this->_tpl_vars['user_rights']['users']): ?><span class="level0"><?php echo smarty_function_tr(array('key' => 'layout_settings','class' => 'layout'), $this);?>
</span><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['domains']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'domains','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_domains','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['pages']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'pages','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_pages','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['users']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'users','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_users','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['users']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'offer_vacancy','m' => 'index','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_oferta_vacanta','class' => 'layout'), $this);?>
</a><?php endif; ?>
								
								
								<?php if ($this->_tpl_vars['user_rights']['accommodation_types'] || $this->_tpl_vars['user_rights']['transport_types'] || $this->_tpl_vars['user_rights']['flight_types'] || $this->_tpl_vars['user_rights']['flight_operators']): ?><span class="level0"><?php echo smarty_function_tr(array('key' => 'layout_define','class' => 'layout'), $this);?>
</span><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['accommodation_types']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'accommodation_types','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_accommodation_types','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['transport_types']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'transport_types','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_transport_types','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['flight_types']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'flight_types','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_flight_types','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['flight_operators']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'flight_operators','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_flight_operators','class' => 'layout'), $this);?>
</a><?php endif; ?>
								
								<?php if ($this->_tpl_vars['user_rights']['continents'] || $this->_tpl_vars['user_rights']['countries'] || $this->_tpl_vars['user_rights']['regions'] || $this->_tpl_vars['user_rights']['flight_operators']): ?><span class="level0"><?php echo smarty_function_tr(array('key' => 'layout_places','class' => 'layout'), $this);?>
</span><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['continents']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'continents','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_continents','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['countries']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'countries','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_countries','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['regions']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'regions','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_regions','class' => 'layout'), $this);?>
</a><?php endif; ?>
								
								<?php if ($this->_tpl_vars['user_rights']['accommodations'] || $this->_tpl_vars['user_rights']['vacations'] || $this->_tpl_vars['user_rights']['locations'] || $this->_tpl_vars['user_rights']['flights'] || $this->_tpl_vars['user_rights']['busses'] || $this->_tpl_vars['user_rights']['circuits'] || $this->_tpl_vars['user_rights']['specials']): ?><span class="level0"><?php echo smarty_function_tr(array('key' => 'layout_offers','class' => 'layout'), $this);?>
</span><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['accommodations']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'accommodations','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_accommodations','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['vacations']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'vacations','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_vacations','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['locations']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'locations','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_locations','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['flights']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'flights','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_flights','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['busses']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'busses','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_busses','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['circuits']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'circuits','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_circuits','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['contracts']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'contracts','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_contracts','class' => 'layout'), $this);?>
</a><?php endif; ?>
								<?php if ($this->_tpl_vars['user_rights']['specials']): ?><a class="level1" href="<?php echo smarty_function_url(array('o' => 'specials','m' => 'admin','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_specials','class' => 'layout'), $this);?>
</a><?php endif; ?>
								
								<a class="level0" href="<?php echo smarty_function_url(array('o' => 'login','m' => 'logout','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_logout','class' => 'layout'), $this);?>
 <b><?php echo $this->_tpl_vars['user_info']['user_name']; ?>
</b></a>
							<?php else: ?>
								<a class="level0" href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_home','class' => 'layout'), $this);?>
</a>
								<a class="level0" href="<?php echo smarty_function_url(array('o' => 'login','m' => 'index','clean' => '1'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_login','class' => 'layout'), $this);?>
</a>
							<?php endif; ?>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</td>
		<td style="height:400px; vertical-align:top;width:800px;">
			<table border="0" cellspacing="0" cellpadding="0" style="width:100%;">
			<tr>
				<td style="font-weight: bold; font-size: 15px; color: #FFFFFF; text-align:center; border-bottom: 2px solid #CCCCCC; padding:5px;"><?php echo $this->_tpl_vars['meta']['title']; ?>
</td>
			</tr>
			<tr>
				<td style="vertical-align:top; padding: 15px 19px 15px 19px; height:400px;">
					<?php echo $this->_tpl_vars['page_content']; ?>

				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
</div>
</body>
</html>