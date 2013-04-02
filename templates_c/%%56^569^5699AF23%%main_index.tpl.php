<?php /* Smarty version 2.6.18, created on 2009-05-01 00:56:47
         compiled from /home/qtravel/public_html/systems/q-travel/templates/member/main_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/systems/q-travel/templates/member/main_index.tpl', 12, false),array('function', 'tr', '/home/qtravel/public_html/systems/q-travel/templates/member/main_index.tpl', 106, false),array('modifier', 'escape', '/home/qtravel/public_html/systems/q-travel/templates/member/main_index.tpl', 70, false),array('modifier', 'strip_tags', '/home/qtravel/public_html/systems/q-travel/templates/member/main_index.tpl', 84, false),array('modifier', 'truncate', '/home/qtravel/public_html/systems/q-travel/templates/member/main_index.tpl', 84, false),)), $this); ?>
<div class="ofertespeciale"></div>
<div style="margin:5px;">
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
	<?php if ($this->_tpl_vars['regions1_count'] > 0): ?>
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
	<?php if ($this->_tpl_vars['regions2_count'] > 0): ?>
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
	
	<?php if ($this->_tpl_vars['regions3_count'] > 0): ?>
	<h3 class="acch3"><?php echo $this->_tpl_vars['tr']['title_types3']; ?>
 <?php echo $this->_tpl_vars['country']['title']; ?>
, <?php echo $this->_tpl_vars['country']['continent_title']; ?>
</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		<?php $_from = $this->_tpl_vars['regions3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['regions3'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['regions3']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['region']):
        $this->_foreach['regions3']['iteration']++;
?>
			<?php if (! ($this->_foreach['regions2']['iteration'] <= 1) && $this->_foreach['regions3']['iteration'] % $this->_tpl_vars['percolumn3'] == 1): ?>
			    </td><td style="vertical-align:top; width:33%;" >
			<?php endif; ?>
			<div style="padding-top:2px;"><a class="country" href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['type3'],'m' => 'region','region' => $this->_tpl_vars['region']['code'],'country' => $this->_tpl_vars['region']['country_code']), $this);?>
"> &raquo; <b><?php echo $this->_tpl_vars['region']['title']; ?>
</b> (<?php echo $this->_tpl_vars['region']['count']; ?>
)</a></div>
		<?php endforeach; endif; unset($_from); ?>
	</td>
	</tr>
	</table>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['specials_count'] > 0): ?>		
		<div>
			<?php $_from = $this->_tpl_vars['specials']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['special']):
?>
			<div class="acc">
				<div class="acctitle">
					<div style="float:left; height:16px; overflow:hidden;"><a href="<?php echo $this->_tpl_vars['special']['info']['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['special']['info']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'amp') : smarty_modifier_escape($_tmp, 'amp')); ?>
</a></div>
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbodymain">
					<div>
						<div class="accthumb"><a href="<?php echo $this->_tpl_vars['special']['info']['url']; ?>
"><?php echo $this->_tpl_vars['special']['info']['thumb']; ?>
</a></div>						
					</div>
					<div>
					<?php $_from = $this->_tpl_vars['special']['offers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['offer']):
?>
						<div style="float:left; height:16px; width:100%; overflow:hidden; padding-left:5px; padding-top:5px;">
							<a href="<?php echo $this->_tpl_vars['offer']['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'amp') : smarty_modifier_escape($_tmp, 'amp')); ?>
</a>
						</div>
						<div style="float:left; height:28px; width:100%; overflow:hidden; padding-left:7px;">
						<?php if ($this->_tpl_vars['offer']['description'] > ''): ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180) : smarty_modifier_truncate($_tmp, 180)); ?>

						<?php else: ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['description2'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180) : smarty_modifier_truncate($_tmp, 180)); ?>

						<?php endif; ?>
						</div>					
					<?php endforeach; endif; unset($_from); ?>
					</div>
					<div class="clearer"><span></span></div>
				</div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<div class="clearer"><span></span></div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['domain']['description'] > ''): ?>
		<div>
			<h3 class="acch3"><?php echo $this->_tpl_vars['domain']['title']; ?>
</h3>
			<?php echo $this->_tpl_vars['domain']['description']; ?>

		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['geolocation']['description'] > ''): ?>
		<div>
			<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'title_geolocation_description'), $this);?>
 <?php echo $this->_tpl_vars['geolocation']['title']; ?>
</h3>
			<?php echo $this->_tpl_vars['geolocation']['description']; ?>

		</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['news_count'] > 0): ?>
		<div>
			<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'layout_news','class' => 'layout'), $this);?>
</h3></div>
			<div class="news-list">
			<?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news_item']):
?>
				<div class="subpage">
					<div class="header"><h2 title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
"><a href="<?php echo smarty_function_url(array('o' => 'news','m' => 'details','code' => $this->_tpl_vars['news_item']['code']), $this);?>
" title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
"><?php echo $this->_tpl_vars['news_item']['title']; ?>
</a></h2></div>
					<div class="leadtext"><?php echo $this->_tpl_vars['news_item']['description']; ?>
</div>				
					<div class="permalink">
						<span class="feed_title">Sursa: <a href="<?php echo $this->_tpl_vars['news_item']['permalink']; ?>
" title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
" rel="nofollow"> <?php echo $this->_tpl_vars['news_item']['feed_title']; ?>
</span></a>
						|
						<span class="date">Publicat: <?php echo $this->_tpl_vars['news_item']['date_format']; ?>
</span>			
					</div>
				</div>
			<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
	<?php endif; ?>
</div>