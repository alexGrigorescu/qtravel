<?php /* Smarty version 2.6.18, created on 2011-09-27 09:41:48
         compiled from /home/qtravel/public_html/templates/default/accommodation_location.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/accommodation_location.tpl', 3, false),array('function', 'tr', '/home/qtravel/public_html/templates/default/accommodation_location.tpl', 5, false),array('modifier', 'nl2br', '/home/qtravel/public_html/templates/default/accommodation_location.tpl', 109, false),array('modifier', 'escape', '/home/qtravel/public_html/templates/default/accommodation_location.tpl', 120, false),array('modifier', 'strip_tags', '/home/qtravel/public_html/templates/default/accommodation_location.tpl', 139, false),array('modifier', 'truncate', '/home/qtravel/public_html/templates/default/accommodation_location.tpl', 139, false),)), $this); ?>
<div>
	<div class="accnav">
		<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo; 
		<?php if ($this->_tpl_vars['layout_domain']['domain'] == 'oferta-vacanta.ro'): ?>	
		<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'index'), $this);?>
"><?php echo smarty_function_tr(array('key' => 'layout_accommodation','class' => 'layout'), $this);?>
</a> &raquo; 
		<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'continent','continent' => $this->_tpl_vars['location']['continent_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['continent_title']; ?>
</a>  &raquo; 
		<?php endif; ?>
		<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'country','country' => $this->_tpl_vars['location']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['country_title']; ?>
</a>  &raquo; 
		<a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'country' => $this->_tpl_vars['location']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['region_title']; ?>
</a>
	</div>
	<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'accommodation_title_accommodation'), $this);?>
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
			<div><span class="price"><?php echo smarty_function_tr(array('key' => 'accommodation_price'), $this);?>
 <?php echo $this->_tpl_vars['location']['price']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span></div>													
		</div>
		<div style="float:right" class="reservation"><a href="<?php echo smarty_function_url(array('o' => 'reservation','m' => 'index','type' => 'accommodations','id' => $this->_tpl_vars['location']['id']), $this);?>
"><?php echo smarty_function_tr(array('key' => 'accommodation_reservation'), $this);?>
 <?php echo $this->_tpl_vars['location']['title']; ?>
</a></div>
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
	<div><?php echo $this->_tpl_vars['location']['location_description']; ?>
</div>
	<?php if ($this->_tpl_vars['prices_count'] > 0): ?>
	<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'accommodation_title_prices'), $this);?>
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
	<?php if ($this->_tpl_vars['location']['description_included'] > ''): ?>
		<div><br/><b>Tariful include:</b><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description_included'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['location']['description_not_included'] > ''): ?>
		<div><br/><b>Tariful nu include:</b><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description_not_included'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['location']['description_early_booking'] > ''): ?>
		<div><br/><b>Early booking:</b><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description_early_booking'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['location']['description_special_offer'] > ''): ?>
		<div style="color:red;"><br/><b>Oferta speciala:</b><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description_special_offer'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
	<?php endif; ?>
	<div><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</div>
	<?php if ($this->_tpl_vars['locations_count'] > 1): ?>
		<div>
			<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'accommodation_title_other_accommodations'), $this);?>
 <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
			<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
			<?php if ($this->_tpl_vars['new_location']['code'] != $this->_tpl_vars['location']['code']): ?>
			<div class="acc" style="width:100%;">
				<div class="acctitle">
					<div style="float:left; height:16px;"><a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['title']; ?>
</a></div>
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbodyreg" style="height:115px;">
					<div style="float:left;width:110px; text-align:center; padding-top:5px;">
						<div class="accthumb"><a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['location_thumb']; ?>
</a></div>
					</div>
					<div style="text-align:right; padding:5px;">
						<div style="width:80px; float:left;"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['location']['accommodation_type_stars']; ?>
.gif"  alt="<?php echo $this->_tpl_vars['location']['accommodation_type_title']; ?>
"/></div>												
						<span class="price"><?php echo smarty_function_tr(array('key' => 'accommodation_price'), $this);?>
 <?php echo $this->_tpl_vars['new_location']['price']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span>
					</div>													
					<div style="margin-left: 110px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['location_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 320) : smarty_modifier_truncate($_tmp, 320)); ?>
</div>
					<div class="clearer"><span></span></div>
				</div>
			</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['region'] > '' && $this->_tpl_vars['layout_domain']['mapkey'] > ''): ?>
	<div id="map">
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'title_map'), $this);?>
  <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>
</h3>
		<div id="map_canvas" style="width: 500px; height: 400px"></div>
	</div>
	<?php endif; ?>
</div>