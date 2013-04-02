<?php /* Smarty version 2.6.18, created on 2009-07-12 23:53:08
         compiled from /home/qtravel/public_html/templates/default/search_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', '/home/qtravel/public_html/templates/default/search_index.tpl', 4, false),array('modifier', 'truncate', '/home/qtravel/public_html/templates/default/search_index.tpl', 8, false),array('function', 'url', '/home/qtravel/public_html/templates/default/search_index.tpl', 8, false),)), $this); ?>
<div style="margin:5px;">
	<?php if ($this->_tpl_vars['locations_count'] > 0): ?>
		<div>
			<h3 class="acch3">S-au gasit <?php echo $this->_tpl_vars['locations_count']; ?>
 rezultate pentru <span style="color:#ff0000;"><?php echo ((is_array($_tmp=$this->_tpl_vars['q'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</span> (<?php echo $this->_tpl_vars['locations_time']; ?>
 secunde):</h3>
			<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_location']):
?>
			<div class="accs">
				<div class="acctitle">
						<div><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['new_location']['class'],'m' => 'location','region' => $this->_tpl_vars['new_location']['region_code'],'location' => $this->_tpl_vars['new_location']['code']), $this);?>
" title="<?php echo $this->_tpl_vars['new_location']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['new_location']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
 | <?php echo $this->_tpl_vars['new_location']['region_title']; ?>
 | <?php echo $this->_tpl_vars['new_location']['country_title']; ?>
 | <?php echo $this->_tpl_vars['new_location']['price']; ?>
 <?php echo $this->_tpl_vars['new_location']['currency_title']; ?>
 </a></div>
					</div>
					<div class="accbody">
						<?php if ($this->_tpl_vars['new_location']['location_description'] > ''): ?>
							<div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['location_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 400) : smarty_modifier_truncate($_tmp, 400)); ?>
</div>
						<?php else: ?>
							<div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['new_location']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 400) : smarty_modifier_truncate($_tmp, 400)); ?>
</div>
						<?php endif; ?>
						<div style="padding-top:5px;"><span class="url"><?php echo smarty_function_url(array('o' => $this->_tpl_vars['new_location']['class'],'m' => 'location','region' => $this->_tpl_vars['new_location']['region_code'],'location' => $this->_tpl_vars['new_location']['code']), $this);?>
</span></div>						
					</div>
			</div>
			<?php endforeach; else: ?>
			<div class="accs">
				<b>Nu exista rezultate pentru cautarea dumneavoastra.</b>
			</div>	
			<?php endif; unset($_from); ?>
		</div>
	<?php else: ?>
		<div class="accs">
			<b>Nu exista rezultate pentru cautarea dumneavoastra.</b>
		</div>
	<?php endif; ?>
</div>