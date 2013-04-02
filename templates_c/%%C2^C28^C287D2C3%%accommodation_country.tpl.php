<?php /* Smarty version 2.6.18, created on 2009-07-12 23:08:29
         compiled from /home/qtravel/public_html/templates/default/accommodation_country.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/accommodation_country.tpl', 3, false),array('modifier', 'strip_tags', '/home/qtravel/public_html/templates/default/accommodation_country.tpl', 73, false),array('modifier', 'truncate', '/home/qtravel/public_html/templates/default/accommodation_country.tpl', 73, false),array('modifier', 'escape', '/home/qtravel/public_html/templates/default/accommodation_country.tpl', 97, false),)), $this); ?>
<div>
	<div class="accnav">
		<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo;
		<?php if ($this->_tpl_vars['layout_domain']['domain'] == 'oferta-vacanta.ro'): ?>	
			<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'index'), $this);?>
"><?php echo $this->_tpl_vars['tr']['layout_type']; ?>
</a> &raquo; 
			<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'continent','continent' => $this->_tpl_vars['country']['continent_code']), $this);?>
"><?php echo $this->_tpl_vars['country']['continent_title']; ?>
</a> &raquo;  
		<?php endif; ?>
		<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'country','country' => $this->_tpl_vars['country']['code']), $this);?>
"><?php echo $this->_tpl_vars['country']['title']; ?>
</a>
	</div>
	<?php if ($this->_tpl_vars['regions_count'] > 0): ?>
	<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_types']; ?>
 <?php echo $this->_tpl_vars['country']['title']; ?>
, <?php echo $this->_tpl_vars['country']['continent_title']; ?>
</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		<?php $_from = $this->_tpl_vars['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['regions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['regions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['region']):
        $this->_foreach['regions']['iteration']++;
?>
			<?php if (! ($this->_foreach['regions']['iteration'] <= 1) && $this->_foreach['regions']['iteration'] % $this->_tpl_vars['percolumn'] == 1): ?>
			    </td><td style="vertical-align:top; width:33%;" >
			<?php endif; ?>
			<div style="padding-top:2px;"><a class="country" href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'region','region' => $this->_tpl_vars['region']['code'],'country' => $this->_tpl_vars['region']['country_code']), $this);?>
"> &raquo; <b><?php echo $this->_tpl_vars['region']['title']; ?>
</b> (<?php echo $this->_tpl_vars['region']['count']; ?>
)</a></div>
		<?php endforeach; endif; unset($_from); ?>
	</td>
	</tr>
	</table>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['regions1_count'] > 0 && false): ?>
	<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_types1']; ?>
 <?php echo $this->_tpl_vars['country']['title']; ?>
, <?php echo $this->_tpl_vars['country']['continent_title']; ?>
</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		<?php $_from = $this->_tpl_vars['regions1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['regions1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['regions1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['region']):
        $this->_foreach['regions1']['iteration']++;
?>
			<?php if (! ($this->_foreach['regions1']['iteration'] <= 1) && $this->_foreach['regions1']['iteration'] % $this->_tpl_vars['percolumn1'] == 1): ?>
			    </td><td style="vertical-align:top; width:33%;" >
			<?php endif; ?>
			<div style="padding-top:2px;"><a class="country" href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type1'],'m' => 'region','region' => $this->_tpl_vars['region']['code'],'country' => $this->_tpl_vars['region']['country_code']), $this);?>
"> &raquo; <b><?php echo $this->_tpl_vars['region']['title']; ?>
</b> (<?php echo $this->_tpl_vars['region']['count']; ?>
)</a></div>
		<?php endforeach; endif; unset($_from); ?>
	</td>
	</tr>
	</table>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['regions2_count'] > 0 && false): ?>
	<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_types2']; ?>
 <?php echo $this->_tpl_vars['country']['title']; ?>
, <?php echo $this->_tpl_vars['country']['continent_title']; ?>
</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		<?php $_from = $this->_tpl_vars['regions2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['regions2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['regions2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['region']):
        $this->_foreach['regions2']['iteration']++;
?>
			<?php if (! ($this->_foreach['regions2']['iteration'] <= 1) && $this->_foreach['regions2']['iteration'] % $this->_tpl_vars['percolumn2'] == 1): ?>
			    </td><td style="vertical-align:top; width:33%;" >
			<?php endif; ?>
			<div style="padding-top:2px;"><a class="country" href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type2'],'m' => 'region','region' => $this->_tpl_vars['region']['code'],'country' => $this->_tpl_vars['region']['country_code']), $this);?>
"> &raquo; <b><?php echo $this->_tpl_vars['region']['title']; ?>
</b> (<?php echo $this->_tpl_vars['region']['count']; ?>
)</a></div>
		<?php endforeach; endif; unset($_from); ?>
	</td>
	</tr>
	</table>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['locations_count'] > 1): ?>
		<div>	
			<div>
				<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_country_types']; ?>
  <?php echo $this->_tpl_vars['country']['title']; ?>
, <?php echo $this->_tpl_vars['country']['continent_title']; ?>
</h3>
				<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
				<?php if ($this->_tpl_vars['new_location']['code'] != $this->_tpl_vars['location']['code']): ?>
					<div class="acc">
					<?php if ($this->_tpl_vars['width_thumb']): ?>
						<div class="acctitle">
							<div style="float:left; height:16px;"><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'location','region' => $this->_tpl_vars['new_location']['region_code'],'location' => $this->_tpl_vars['new_location']['code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['title']; ?>
</a></div>
							<div class="clearer"><span></span></div>
						</div>
						<div class="accbody">
							<div style="float:left;width:110px;">
								<div style="width:80px;margin:auto;margin-bottom:3px;margin-top:6px;"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['new_location']['accommodation_type_stars']; ?>
.gif" alt="<?php echo $this->_tpl_vars['new_location']['accommodation_type_title']; ?>
"/></div>						
								<div class="accthumb"><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'location','region' => $this->_tpl_vars['new_location']['region_code'],'location' => $this->_tpl_vars['new_location']['code'],'country' => $this->_tpl_vars['new_location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['location_thumb']; ?>
</a></div>
							</div>
							<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo $this->_tpl_vars['tr']['type_price']; ?>
 <?php echo $this->_tpl_vars['new_location']['price']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span></div>													
							<div style="margin-left: 112px; height:100px; padding:0px; border:0px solid #EBEBEB; "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['location_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 320) : smarty_modifier_truncate($_tmp, 320)); ?>
</div>
							<div class="clearer"><span></span></div>
						</div>
					<?php else: ?>
						<div class="acctitle">
							<div style="float:left; height:16px; width:320px;"><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'location','region' => $this->_tpl_vars['new_location']['end_region_code'],'location' => $this->_tpl_vars['new_location']['code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo $this->_tpl_vars['new_location']['title']; ?>
</a></div>
							<div class="clearer"><span></span></div>
						</div>
						<div class="accbody">
							<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo $this->_tpl_vars['tr']['type_price']; ?>
 <?php echo $this->_tpl_vars['new_location']['price2']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
</span></div>													
							<div style="height:75px; padding:0px; border:0px solid #EBEBEB; "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 300) : smarty_modifier_truncate($_tmp, 300)); ?>
</div>
							<div class="clearer"><span></span></div>
						</div>
					<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<div class="clearer"><span></span></div>
		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['country']['description'] > ''): ?>
		<div>
			<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_country_description']; ?>
 <?php echo $this->_tpl_vars['country']['title']; ?>
, <?php echo $this->_tpl_vars['country']['continent_title']; ?>
</h3>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['country']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>

		</div>
	<?php endif; ?>
</div>