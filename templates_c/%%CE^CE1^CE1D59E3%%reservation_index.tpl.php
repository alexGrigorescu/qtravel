<?php /* Smarty version 2.6.18, created on 2009-03-12 01:08:07
         compiled from /home/qtravel/public_html/templates/default/reservation_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/reservation_index.tpl', 4, false),array('function', 'tr', '/home/qtravel/public_html/templates/default/reservation_index.tpl', 5, false),array('modifier', 'escape', '/home/qtravel/public_html/templates/default/reservation_index.tpl', 154, false),array('modifier', 'strip_tags', '/home/qtravel/public_html/templates/default/reservation_index.tpl', 171, false),array('modifier', 'truncate', '/home/qtravel/public_html/templates/default/reservation_index.tpl', 171, false),)), $this); ?>
<div style="margin:5px;">
	<?php if ($this->_tpl_vars['type'] == 'accommodations'): ?>
		<div class="accnav">
			<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'index'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_accommodation','class' => 'layout'), $this);?>
</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'continent','continent' => $this->_tpl_vars['location']['continent_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['continent_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'country','country' => $this->_tpl_vars['location']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['country_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'country' => $this->_tpl_vars['location']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['region_title']; ?>
</a>
		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['type'] == 'busses'): ?>
		<div class="accnav">
			<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'buss','m' => 'index'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_buss','class' => 'layout'), $this);?>
</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'buss','m' => 'continent','continent' => $this->_tpl_vars['location']['end_continent_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['end_continent_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'buss','m' => 'country','country' => $this->_tpl_vars['location']['end_country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['end_country_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'buss','m' => 'region','region' => $this->_tpl_vars['location']['end_region_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['end_region_title']; ?>
</a>
		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['type'] == 'charters'): ?>
		<div class="accnav">
			<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'charter','m' => 'index'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_charter','class' => 'layout'), $this);?>
</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'charter','m' => 'continent','continent' => $this->_tpl_vars['location']['continent_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['continent_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'charter','m' => 'country','country' => $this->_tpl_vars['location']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['country_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'charter','m' => 'region','region' => $this->_tpl_vars['location']['region_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['region_title']; ?>
</a>
		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['type'] == 'flights'): ?>
		<div class="accnav">
			<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'index'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_flight','class' => 'layout'), $this);?>
</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'continent','continent' => $this->_tpl_vars['location']['end_continent_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['end_continent_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'country','country' => $this->_tpl_vars['location']['end_country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['end_country_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'region','region' => $this->_tpl_vars['location']['end_region_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['end_region_title']; ?>
</a>
		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['type'] == 'vacations'): ?>
		<div class="accnav">
			<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'index'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_vacation','class' => 'layout'), $this);?>
</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'continent','continent' => $this->_tpl_vars['location']['continent_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['continent_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'country','country' => $this->_tpl_vars['location']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['country_title']; ?>
</a>  &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'region','region' => $this->_tpl_vars['location']['region_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['region_title']; ?>
</a>
		</div>
	<?php endif; ?>
	<h3 class="acch3"><?php echo $this->_tpl_vars['type_title']; ?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>
	<?php if ($this->_tpl_vars['type'] == 'flights' || $this->_tpl_vars['type'] == 'busses'): ?>
		
	<?php else: ?>
		, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>

	<?php endif; ?>
	</h3>
	<div class="error"><?php echo $this->_tpl_vars['err']; ?>
</div>
	<?php echo $this->_tpl_vars['form']; ?>

</div>

<?php if ($this->_tpl_vars['type'] == 'accommodations'): ?>
	<div style="margin:5px;">
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'accommodation_title_accommodation','class' => 'accommodation'), $this);?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
		<div>
			<div style="float:left">
				<div><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['location']['accommodation_type_stars']; ?>
.gif"  alt="<?php echo $this->_tpl_vars['location']['accommodation_type_title']; ?>
"/></div>					
			</div>
			<div class="clearer"><span></span></div>
		</div>
		<br/><br/>
		<div>
			<?php $_from = $this->_tpl_vars['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pic']):
?>
				<div style="float:left;width:120px;"><a class="thickbox" href="<?php echo $this->_tpl_vars['pic']['thumb_url']; ?>
" title="" rel="item-gal"><?php echo $this->_tpl_vars['pic']['thumb']; ?>
</a></div>		
			<?php endforeach; endif; unset($_from); ?>
			<div class="clearer"><span></span></div>
		</div>
		<div><?php echo $this->_tpl_vars['location']['location_description']; ?>
</div>
		<?php if ($this->_tpl_vars['prices_count'] > 0): ?>
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'accommodation_title_prices','class' => 'accommodation'), $this);?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>		
		<?php $_from = $this->_tpl_vars['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price_format']):
?>
			<?php $this->assign('price_single', 0); ?>
			<?php $this->assign('price_double', 0); ?>
			<?php $this->assign('price_3adult', 0); ?>
			<?php $this->assign('price_triple', 0); ?>
			<?php $this->assign('price_1child', 0); ?>
			<?php $this->assign('price_2child', 0); ?>
			<?php $this->assign('price_extra1', 0); ?>
			<?php $this->assign('price_extra2', 0); ?>
			<?php $this->assign('price_extra3', 0); ?>
			<?php $this->assign('w', 0); ?>
			<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
				<?php if ($this->_tpl_vars['new_price']['price_single'] != -1): ?><?php $this->assign('price_single', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_double'] != -1): ?><?php $this->assign('price_double', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_3adult'] != -1): ?><?php $this->assign('price_3adult', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_triple'] != -1): ?><?php $this->assign('price_triple', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_1child'] != -1): ?><?php $this->assign('price_1child', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_2child'] != -1): ?><?php $this->assign('price_2child', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra1'] != -1): ?><?php $this->assign('price_extra1', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra2'] != -1): ?><?php $this->assign('price_extra2', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra3'] != -1): ?><?php $this->assign('price_extra3', 1); ?><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			
			<?php if ($this->_tpl_vars['price_single']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_double']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_3adult']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_triple']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_1child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_2child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra1']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra2']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra3']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			
			<div style="font-weight:bold; color:#ff0000; padding:5px;"><?php echo $this->_tpl_vars['new_price_format']['title']; ?>
</div>
			<table class="prices" cellpadding="0" cellspacing="0">
			<tr>
				<td class="left header date">De la</td>
				<td class="left header date">Pana la</td>
				<?php if ($this->_tpl_vars['price_single']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_single']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_double']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_double']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_3adult']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_triple']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_triple']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_1child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_1child']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_2child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_2child']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra1']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra2']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra3']; ?>
</td><?php endif; ?>
			</tr>
			<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
				<tr>
					<td class="left"><?php echo $this->_tpl_vars['new_price']['date_start_format']; ?>
</td>
					<td class="left"><?php echo $this->_tpl_vars['new_price']['date_end_format']; ?>
</td>
					<?php if ($this->_tpl_vars['price_single']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_single_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_double']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_double_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_3adult_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_triple']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_triple_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_1child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_1child_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_2child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_2child_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra1_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra2_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra3_format']; ?>
</td><?php endif; ?>
				</td>
			<?php endforeach; endif; unset($_from); ?>
			</table>
			<br/><br/>
		<?php endforeach; endif; unset($_from); ?>
		<div>
		* Preturile sunt exprimate in 
		<?php if ($this->_tpl_vars['location']['currency_code'] == 'usd'): ?>
			dolari ($)
		<?php elseif ($this->_tpl_vars['location']['currency_code'] == 'lei'): ?>
			lei (RON)
		<?php else: ?>
			euro (&euro;)
		<?php endif; ?>
		</div>
		<?php endif; ?>
		<div><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</div>
		<?php if ($this->_tpl_vars['locations_count'] > 1): ?>
			<div>
				<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'accommodation_title_other_accommodations','class' => 'accommodation'), $this);?>
 <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
				<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
				<?php if ($this->_tpl_vars['new_location']['code'] != $this->_tpl_vars['location']['code']): ?>
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px;"><a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['title']; ?>
</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbodyreg">
						<div style="float:left;width:110px; text-align:center;">
							<div style="width:80px;margin:auto;margin-bottom:3px;"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['location']['accommodation_type_stars']; ?>
.gif"  alt="<?php echo $this->_tpl_vars['location']['accommodation_type_title']; ?>
"/></div>						
							<div class="accthumb"><a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['location_thumb']; ?>
</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo smarty_function_tr(array('key' => '"accommodation_price','class' => 'accommodation'), $this);?>
 <?php echo $this->_tpl_vars['new_location']['price']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span></div>													
						<div style="margin-left: 110px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['location_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 320) : smarty_modifier_truncate($_tmp, 320)); ?>
</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['type'] == 'busses'): ?>
	<div style="margin:5px;">		
		<h3 class="acch3"><b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b></h3>
		<div style="padding:5px;">
			<div style="float:left">
				<table class="buss_detail">
					<tr><td class="price"><?php echo smarty_function_tr(array('key' => 'buss_label_price1','class' => 'buss'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['price1']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</td></tr>
					<?php if ($this->_tpl_vars['location']['price2'] > 0): ?>
						<tr><td class="price"><?php echo smarty_function_tr(array('key' => 'buss_label_price2','class' => 'buss'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['price2']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</td></tr>
					<?php endif; ?>
				</table>
			</div>
			<div class="clearer"><span></span></div>
		</div>
		<div>
			<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'buss_title_location','class' => 'buss'), $this);?>
</h3>
			
			<table class="detail">
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_start_region','class' => 'buss'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['start_region_title']; ?>
</td></tr>
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_start_country','class' => 'buss'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['start_country_title']; ?>
</td></tr>
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_end_region','class' => 'buss'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['end_region_title']; ?>
</td></tr>
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_end_country','class' => 'buss'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['end_country_title']; ?>
</td></tr>
			</table>
		</div>
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'buss_title_description','class' => 'buss'), $this);?>
</h3>
		<div><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</div>
		<?php if ($this->_tpl_vars['locations_count'] > 1): ?>			
				<div>
					<h3 class="continent"><?php echo smarty_function_tr(array('key' => 'buss_title_other_busses','class' => 'buss'), $this);?>
 <?php echo $this->_tpl_vars['location']['end_region_title']; ?>
, <?php echo $this->_tpl_vars['location']['end_country_title']; ?>
, <?php echo $this->_tpl_vars['location']['end_continent_title']; ?>
</h3>
					<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
					<?php if ($this->_tpl_vars['new_location']['code'] != $this->_tpl_vars['location']['code']): ?>
					<div class="acc">
						<div class="acctitle">
							<div style="float:left; height:16px;"><a href="<?php echo smarty_function_url(array('o' => 'buss','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'region' => $this->_tpl_vars['new_location']['end_region_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['new_location']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</a></div>
							<div class="clearer"><span></span></div>
						</div>
						<div class="accbodyreg">
							<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo smarty_function_tr(array('key' => 'buss_price','class' => 'buss'), $this);?>
 <?php echo $this->_tpl_vars['new_location']['price']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span></div>													
							<div style="height:100px; padding:0px; border:0px solid #EBEBEB; "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 400) : smarty_modifier_truncate($_tmp, 400)); ?>
</div>
							<div class="clearer"><span></span></div>
						</div>
					</div>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['type'] == 'charters'): ?>
	<div style="margin:5px;">		
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'charter_title_charter','class' => 'charter'), $this);?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
		<div style="padding:5px;">
			<div style="float:left">
				<div><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['location']['accommodation_type_stars']; ?>
.gif"  alt="<?php echo $this->_tpl_vars['location']['accommodation_type_title']; ?>
"/></div>					
			</div>
			<div class="clearer"><span></span></div>
		</div>
		<br/><br/>
		<div>
			<?php $_from = $this->_tpl_vars['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pic']):
?>
				<div style="float:left;width:120px;"><a class="thickbox" href="<?php echo $this->_tpl_vars['pic']['thumb_url']; ?>
" title="" rel="item-gal"><?php echo $this->_tpl_vars['pic']['thumb']; ?>
</a></div>		
			<?php endforeach; endif; unset($_from); ?>
			<div class="clearer"><span></span></div>
		</div>
		<div><?php echo $this->_tpl_vars['location']['location_description']; ?>
</div>
		<?php if ($this->_tpl_vars['prices_count'] > 0): ?>
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'charter_title_prices','class' => 'charter'), $this);?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
		<?php $_from = $this->_tpl_vars['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price_format']):
?>
			<?php $this->assign('price_single', 0); ?>
			<?php $this->assign('price_double', 0); ?>
			<?php $this->assign('price_3adult', 0); ?>
			<?php $this->assign('price_triple', 0); ?>
			<?php $this->assign('price_1child', 0); ?>
			<?php $this->assign('price_2child', 0); ?>
			<?php $this->assign('price_extra1', 0); ?>
			<?php $this->assign('price_extra2', 0); ?>
			<?php $this->assign('price_extra3', 0); ?>
			<?php $this->assign('w', 0); ?>
			<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
				<?php if ($this->_tpl_vars['new_price']['price_single'] != -1): ?><?php $this->assign('price_single', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_double'] != -1): ?><?php $this->assign('price_double', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_3adult'] != -1): ?><?php $this->assign('price_3adult', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_triple'] != -1): ?><?php $this->assign('price_triple', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_1child'] != -1): ?><?php $this->assign('price_1child', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_2child'] != -1): ?><?php $this->assign('price_2child', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra1'] != -1): ?><?php $this->assign('price_extra1', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra2'] != -1): ?><?php $this->assign('price_extra2', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra3'] != -1): ?><?php $this->assign('price_extra3', 1); ?><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			
			<?php if ($this->_tpl_vars['price_single']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_double']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_3adult']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_triple']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_1child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_2child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra1']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra2']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra3']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			
			<div style="font-weight:bold; color:#ff0000; padding:5px;"><?php echo $this->_tpl_vars['new_price_format']['title']; ?>
</div>
			<table class="prices" cellpadding="0" cellspacing="0">
			<tr>
				<td class="left header date">De la</td>
				<td class="left header date">Pana la</td>
				<?php if ($this->_tpl_vars['price_single']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_single']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_double']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_double']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_3adult']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_triple']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_triple']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_1child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_1child']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_2child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_2child']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra1']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra2']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra3']; ?>
</td><?php endif; ?>
			</tr>
			<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
				<tr>
					<td class="left"><?php echo $this->_tpl_vars['new_price']['date_start_format']; ?>
</td>
					<td class="left"><?php echo $this->_tpl_vars['new_price']['date_end_format']; ?>
</td>
					<?php if ($this->_tpl_vars['price_single']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_single_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_double']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_double_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_3adult_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_triple']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_triple_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_1child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_1child_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_2child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_2child_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra1_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra2_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra3_format']; ?>
</td><?php endif; ?>
				</td>
			<?php endforeach; endif; unset($_from); ?>
			</table>
			<br/><br/>
		<?php endforeach; endif; unset($_from); ?>
		<div>
		* Preturile sunt exprimate in 
		<?php if ($this->_tpl_vars['location']['currency_code'] == 'usd'): ?>
			dolari ($)
		<?php elseif ($this->_tpl_vars['location']['currency_code'] == 'lei'): ?>
			lei (RON)
		<?php else: ?>
			euro (&euro;)
		<?php endif; ?>
		</div>
		<?php endif; ?>	
		<div><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</div>
		<?php if ($this->_tpl_vars['locations_count'] > 1): ?>
			<div>
				<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'charter_title_other_charters','class' => 'charter'), $this);?>
 <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
				<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
				<?php if ($this->_tpl_vars['new_location']['code'] != $this->_tpl_vars['location']['code']): ?>
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px;"><a href="<?php echo smarty_function_url(array('o' => 'charter','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['title']; ?>
</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbodyreg">
						<div style="float:left;width:110px; text-align:center;">
							<div style="width:80px;margin:auto;margin-bottom:3px;margin-top:6px;"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['location']['accommodation_type_stars']; ?>
.gif"  alt="<?php echo $this->_tpl_vars['location']['accommodation_type_title']; ?>
"/></div>						
							<div class="accthumb"><a href="<?php echo smarty_function_url(array('o' => 'charter','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['location_thumb']; ?>
</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo smarty_function_tr(array('key' => 'charter_price','class' => 'charter'), $this);?>
 <?php echo $this->_tpl_vars['new_location']['price']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span></div>													
						<div style="margin-left: 110px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['location_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 320) : smarty_modifier_truncate($_tmp, 320)); ?>
</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['type'] == 'flights'): ?>
	<div style="margin:5px;">
		<h3 class="acch3"><b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b></h3>
		<div style="padding:5px;">
			<div style="float:left">
				<table class="flight_detail">
				<?php if ($this->_tpl_vars['location']['price1'] > 0): ?>
					<tr><td class="price"><?php echo smarty_function_tr(array('key' => 'flight_label_price1','class' => 'flight'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['price1']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['location']['price2'] > 0): ?>
					<tr><td class="price"><?php echo smarty_function_tr(array('key' => 'flight_label_price2','class' => 'flight'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['price2']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</td></tr>
				<?php endif; ?>
			</table>
			</div>
			<div class="clearer"><span></span></div>
		</div>
		<div>
			<?php $_from = $this->_tpl_vars['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pic']):
?>
				<div style="float:left;width:120px;"><a class="thickbox" href="<?php echo $this->_tpl_vars['pic']['thumb_url']; ?>
" title="" rel="item-gal"><?php echo $this->_tpl_vars['pic']['thumb']; ?>
</a></div>		
			<?php endforeach; endif; unset($_from); ?>
			<div class="clearer"><span></span></div>
		</div>
		<br/><br/>
		<div>
			<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'flight_title_location','class' => 'flight'), $this);?>
</h3>
			<table class="flight_detail">
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'flight_label_start_region','class' => 'flight'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['start_region_title']; ?>
</td></tr>
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'flight_label_start_country','class' => 'flight'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['start_country_title']; ?>
</td></tr>
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'flight_label_end_region','class' => 'flight'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['end_region_title']; ?>
</td></tr>
				<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'flight_label_end_country','class' => 'flight'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['end_country_title']; ?>
</td></tr>
			</table>
			<br/>
			<b><?php echo smarty_function_tr(array('key' => 'flight_description_bottom_message','class' => 'flight'), $this);?>
</b>
			<br/>
		</div>
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'flight_title_description','class' => 'flight'), $this);?>
</h3>
		<div><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</div>
		<?php if ($this->_tpl_vars['locations_count'] > 1): ?>
			<div>
				<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'flight_title_other_flights','class' => 'flight'), $this);?>
 <?php echo $this->_tpl_vars['location']['end_region_title']; ?>
, <?php echo $this->_tpl_vars['location']['end_country_title']; ?>
, <?php echo $this->_tpl_vars['location']['end_continent_title']; ?>
</h3>
				<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
				<?php if ($this->_tpl_vars['new_location']['code'] != $this->_tpl_vars['location']['code']): ?>
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px; width:360px;"><a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'region' => $this->_tpl_vars['new_location']['end_region_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['new_location']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbody">
						<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo smarty_function_tr(array('key' => 'flight_price','class' => 'flight'), $this);?>
 <?php echo $this->_tpl_vars['new_location']['price2']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span></div>													
						<div style="height:75px; padding:0px; border:0px solid #EBEBEB; "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 400) : smarty_modifier_truncate($_tmp, 400)); ?>
</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['type'] == 'vacations'): ?>
	<div style="margin:5px;">
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'vacation_title_vacation','class' => 'vacation'), $this);?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
		<div>
			<?php $_from = $this->_tpl_vars['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pic']):
?>
				<div style="float:left;width:120px;"><a class="thickbox" href="<?php echo $this->_tpl_vars['pic']['thumb_url']; ?>
" title="" rel="item-gal"><?php echo $this->_tpl_vars['pic']['thumb']; ?>
</a></div>		
			<?php endforeach; endif; unset($_from); ?>
			<div class="clearer"><span></span></div>
		</div>
		<br/><br/>
		<div><?php echo $this->_tpl_vars['location']['location_description']; ?>
</div>
		<?php if ($this->_tpl_vars['prices_count'] > 0): ?>
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'vacation_title_prices','class' => 'vacation'), $this);?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>		
		<?php $_from = $this->_tpl_vars['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price_format']):
?>
			<?php $this->assign('price_single', 0); ?>
			<?php $this->assign('price_double', 0); ?>
			<?php $this->assign('price_3adult', 0); ?>
			<?php $this->assign('price_triple', 0); ?>
			<?php $this->assign('price_1child', 0); ?>
			<?php $this->assign('price_2child', 0); ?>
			<?php $this->assign('price_extra1', 0); ?>
			<?php $this->assign('price_extra2', 0); ?>
			<?php $this->assign('price_extra3', 0); ?>
			<?php $this->assign('w', 0); ?>
			<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
				<?php if ($this->_tpl_vars['new_price']['price_single'] != -1): ?><?php $this->assign('price_single', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_double'] != -1): ?><?php $this->assign('price_double', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_3adult'] != -1): ?><?php $this->assign('price_3adult', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_triple'] != -1): ?><?php $this->assign('price_triple', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_1child'] != -1): ?><?php $this->assign('price_1child', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_2child'] != -1): ?><?php $this->assign('price_2child', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra1'] != -1): ?><?php $this->assign('price_extra1', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra2'] != -1): ?><?php $this->assign('price_extra2', 1); ?><?php endif; ?>
				<?php if ($this->_tpl_vars['new_price']['price_extra3'] != -1): ?><?php $this->assign('price_extra3', 1); ?><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			
			<?php if ($this->_tpl_vars['price_single']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_double']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_3adult']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_triple']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_1child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_2child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra1']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra2']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra3']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
			
			<div style="font-weight:bold; color:#ff0000; padding:5px;"><?php echo $this->_tpl_vars['new_price_format']['title']; ?>
</div>
			<table class="prices" cellpadding="0" cellspacing="0">
			<tr>
				<td class="left header date">De la</td>
				<td class="left header date">Pana la</td>
				<?php if ($this->_tpl_vars['price_single']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_single']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_double']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_double']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_3adult']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_triple']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_triple']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_1child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_1child']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_2child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_2child']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra1']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra2']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra3']; ?>
</td><?php endif; ?>
			</tr>
			<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
				<tr>
					<td class="left"><?php echo $this->_tpl_vars['new_price']['date_start_format']; ?>
</td>
					<td class="left"><?php echo $this->_tpl_vars['new_price']['date_end_format']; ?>
</td>
					<?php if ($this->_tpl_vars['price_single']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_single_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_double']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_double_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_3adult_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_triple']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_triple_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_1child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_1child_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_2child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_2child_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra1_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra2_format']; ?>
</td><?php endif; ?>
					<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['price_extra3_format']; ?>
</td><?php endif; ?>
				</td>
			<?php endforeach; endif; unset($_from); ?>
			</table>
			<br/><br/>
		<?php endforeach; endif; unset($_from); ?>
		<div>
		* Preturile sunt exprimate in 
		<?php if ($this->_tpl_vars['location']['currency_code'] == 'usd'): ?>
			dolari ($)
		<?php elseif ($this->_tpl_vars['location']['currency_code'] == 'lei'): ?>
			lei (RON)
		<?php else: ?>
			euro (&euro;)
		<?php endif; ?>
		</div>
		<?php endif; ?>
		<div><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</div>
		<?php if ($this->_tpl_vars['locations_count'] > 1): ?>
			<div>
				<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'vacation_title_other_vacations','class' => 'vacation'), $this);?>
 <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
				<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
				<?php if ($this->_tpl_vars['new_location']['code'] != $this->_tpl_vars['location']['code']): ?>
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px;"><a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['title']; ?>
</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbodyreg">
						<div style="float:left;width:110px; text-align:center;">
							<div style="width:80px;margin:auto;margin-bottom:3px;margin-top:6px;"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['new_location']['accommodation_type_stars']; ?>
.gif"  alt="<?php echo $this->_tpl_vars['new_location']['accommodation_type_title']; ?>
"/></div>					
							<div class="accthumb"><a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['location_thumb']; ?>
</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo smarty_function_tr(array('key' => 'vacation_price','class' => 'vacation'), $this);?>
 <?php echo $this->_tpl_vars['new_location']['price']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span></div>													
						<div style="margin-left: 110px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['location_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 320) : smarty_modifier_truncate($_tmp, 320)); ?>
</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>