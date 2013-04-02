<?php /* Smarty version 2.6.18, created on 2009-07-12 23:08:11
         compiled from /home/qtravel/public_html/templates/default/accommodation_region.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/accommodation_region.tpl', 3, false),array('function', 'tr', '/home/qtravel/public_html/templates/default/accommodation_region.tpl', 72, false),array('modifier', 'strip_tags', '/home/qtravel/public_html/templates/default/accommodation_region.tpl', 46, false),array('modifier', 'truncate', '/home/qtravel/public_html/templates/default/accommodation_region.tpl', 46, false),array('modifier', 'escape', '/home/qtravel/public_html/templates/default/accommodation_region.tpl', 67, false),)), $this); ?>
<div>
	<div class="accnav">
		<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Home</a> &raquo; 
		<?php if ($this->_tpl_vars['layout_domain']['domain'] == 'oferta-vacanta.ro'): ?>	
		<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'index'), $this);?>
"><?php echo $this->_tpl_vars['tr']['layout_type']; ?>
</a>&nbsp;&raquo;&nbsp;
		<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'continent','continent' => $this->_tpl_vars['region']['continent_code']), $this);?>
"><?php echo $this->_tpl_vars['region']['continent_title']; ?>
</a>&nbsp;&raquo;&nbsp;
		<?php endif; ?>
		<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'country','country' => $this->_tpl_vars['region']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['region']['country_title']; ?>
</a>&nbsp;&raquo;&nbsp;
		<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'region','region' => $this->_tpl_vars['region']['code'],'country' => $this->_tpl_vars['region']['country_code']), $this);?>
"><?php echo $this->_tpl_vars['region']['title']; ?>
</a>
	</div>
	<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_types']; ?>
 <?php echo $this->_tpl_vars['region']['title']; ?>
, <?php echo $this->_tpl_vars['region']['country_title']; ?>
, <?php echo $this->_tpl_vars['region']['continent_title']; ?>
</h3>
	<div>
		<p><ul>
		<?php if ($this->_tpl_vars['subtype'] == ''): ?>
			<li><a style="font-weight:bold; color:#ff0000; " href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'country' => $this->_tpl_vars['location']['country_code']), $this);?>
">Toate ofertele</a></li>
		<?php else: ?>
			<li><a style="font-weight:bold; " href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'country' => $this->_tpl_vars['location']['country_code']), $this);?>
">Toate ofertele</a></li>
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['subtypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['subtypes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['subtypes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subtype_item']):
        $this->_foreach['subtypes']['iteration']++;
?>
			<?php if ($this->_tpl_vars['subtype'] == $this->_tpl_vars['subtype_item']['code']): ?>
				<li><a style="font-weight:bold; color:#ff0000; " href="<?php if ($this->_tpl_vars['subtype_item']['count'] > 0): ?><?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'country' => $this->_tpl_vars['location']['country_code'],'subtype' => $this->_tpl_vars['subtype_item']['code']), $this);?>
<?php else: ?>#<?php endif; ?>"><?php echo $this->_tpl_vars['subtype_item']['title']; ?>
 (<?php echo $this->_tpl_vars['subtype_item']['count']; ?>
)</a></li>
			<?php else: ?>
				<?php if ($this->_tpl_vars['subtype_item']['count'] > 0): ?>
					<li><a style="font-weight:bold; " href="<?php if ($this->_tpl_vars['subtype_item']['count'] > 0): ?><?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'country' => $this->_tpl_vars['location']['country_code'],'subtype' => $this->_tpl_vars['subtype_item']['code']), $this);?>
<?php else: ?>#<?php endif; ?>"><?php echo $this->_tpl_vars['subtype_item']['title']; ?>
 (<?php echo $this->_tpl_vars['subtype_item']['count']; ?>
)</a></li>
				<?php endif; ?>
			<?php endif; ?>			
		<?php endforeach; endif; unset($_from); ?>
		</ul></p>
	</div>
	<div>
		<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['location']):
?>
			<div class="acc">
			<?php if ($this->_tpl_vars['width_thumb']): ?>
				<div class="acctitle">
					<div style="float:left; height:16px; border:0px;"><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'location','location' => $this->_tpl_vars['location']['code'],'country' => $this->_tpl_vars['location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['location']['title']; ?>
"><?php echo $this->_tpl_vars['location']['title']; ?>
</a></div>					
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbody">
					<div style="float:left;width:110px; text-align:center; padding-top:5px;">
						<div class="accthumb"><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'location','location' => $this->_tpl_vars['location']['code'],'country' => $this->_tpl_vars['location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['location']['title']; ?>
"><?php echo $this->_tpl_vars['location']['location_thumb']; ?>
</a></div>
					</div>
					<div style="text-align:right; padding:5px;">
						<div style="width:80px; float:left;"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
star_<?php echo $this->_tpl_vars['location']['accommodation_type_stars']; ?>
.gif" alt="<?php echo $this->_tpl_vars['location']['accommodation_type_title']; ?>
"/></div>
						<span class="price"><?php echo $this->_tpl_vars['tr']['type_price']; ?>
 <?php echo $this->_tpl_vars['location']['price']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
					</div>										
					<div style="margin-left: 105px; height:100px; padding:0px; border:0px solid #EBEBEB; "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['location']['location_description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 320) : smarty_modifier_truncate($_tmp, 320)); ?>
</div>
					<div class="clearer"><span></span></div>
				</div>
			<?php else: ?>
				<div class="acctitle">
					<div style="float:left; height:16px;"><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type'],'m' => 'location','location' => $this->_tpl_vars['location']['code'],'country' => $this->_tpl_vars['location']['country_code']), $this);?>
" title="<?php echo $this->_tpl_vars['location']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['location']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</a></div>
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbodyreg">
					<div style="text-align:right; padding-right:5px;"><span class="price"><?php echo $this->_tpl_vars['tr']['type_price']; ?>
 <?php echo $this->_tpl_vars['location']['price2']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span></div>													
					<div style="height:100px; padding:0px; padding-left:10px; border:0px solid #EBEBEB; "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 400) : smarty_modifier_truncate($_tmp, 400)); ?>
</div>
					<div class="clearer"><span></span></div>
				</div>
			<?php endif; ?>
			</div>
		<?php endforeach; endif; unset($_from); ?>
		<div class="clearer"><span></span></div>
	</div>
	<?php if ($this->_tpl_vars['region']['description'] > ''): ?>
		<div>
			<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_region_description']; ?>
  <?php echo $this->_tpl_vars['region']['title']; ?>
, <?php echo $this->_tpl_vars['region']['country_title']; ?>
, <?php echo $this->_tpl_vars['region']['continent_title']; ?>
</h3>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['region']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>

		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['region'] > '' && $this->_tpl_vars['layout_domain']['mapkey'] > ''): ?>
	<div id="map">
		<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'title_map'), $this);?>
  <?php echo $this->_tpl_vars['region']['title']; ?>
, <?php echo $this->_tpl_vars['region']['country_title']; ?>
, <?php echo $this->_tpl_vars['region']['continent_title']; ?>
</h3>
		<div id="map_canvas" style="width: 500px; height: 400px"></div>
	</div>
	<?php endif; ?>
</div>