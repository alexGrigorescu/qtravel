<?php /* Smarty version 2.6.18, created on 2009-04-30 00:09:28
         compiled from /home/qtravel/public_html/templates/default/buss_location.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/buss_location.tpl', 3, false),array('function', 'tr', '/home/qtravel/public_html/templates/default/buss_location.tpl', 4, false),array('modifier', 'escape', '/home/qtravel/public_html/templates/default/buss_location.tpl', 39, false),array('modifier', 'truncate', '/home/qtravel/public_html/templates/default/buss_location.tpl', 48, false),array('modifier', 'strip_tags', '/home/qtravel/public_html/templates/default/buss_location.tpl', 53, false),)), $this); ?>
<div style="">
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
	<h3 class="acch3"><b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b></h3>
	<div style="padding:5px;">
		<div style="float:left">
			<table class="buss_detail">
			<tr><td class="price"><?php echo smarty_function_tr(array('key' => 'buss_label_price1'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['price1']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</td></tr>
			<?php if ($this->_tpl_vars['location']['price2'] > 0): ?>
				<tr><td class="price"><?php echo smarty_function_tr(array('key' => 'buss_label_price2'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['price2']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</td></tr>
			<?php endif; ?>
		</table>
		</div>
		<div style="float:right" class="reservation"><a href="<?php echo smarty_function_url(array('o' => 'reservation','m' => 'index','type' => 'busses','id' => $this->_tpl_vars['location']['id']), $this);?>
"><?php echo smarty_function_tr(array('key' => 'buss_reservation'), $this);?>
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
	<div>
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'buss_title_location'), $this);?>
</h3>
		<table class="detail">
			<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_start_region'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['start_region_title']; ?>
</td></tr>
			<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_start_country'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['start_country_title']; ?>
</td></tr>
			<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_end_region'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['end_region_title']; ?>
</td></tr>
			<tr><td class="label"><?php echo smarty_function_tr(array('key' => 'buss_label_end_country'), $this);?>
</td><td><?php echo $this->_tpl_vars['location']['end_country_title']; ?>
</td></tr>
		</table>
	</div>
	<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'buss_title_description'), $this);?>
</h3>
	<div><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</div>
	<?php if ($this->_tpl_vars['locations_count'] > 1): ?>
		
			<div>
				<h3 class="continent"><?php echo smarty_function_tr(array('key' => 'buss_title_other_busses'), $this);?>
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
						<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo smarty_function_tr(array('key' => 'buss_price'), $this);?>
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