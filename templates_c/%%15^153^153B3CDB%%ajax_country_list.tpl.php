<?php /* Smarty version 2.6.18, created on 2013-02-07 17:26:50
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_country_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_country_list.tpl', 2, false),array('function', 'url', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_country_list.tpl', 13, false),)), $this); ?>
<ul>
	<?php if (count($this->_tpl_vars['countries']) > 0): ?>
	<?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['countriesName'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['countriesName']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['country']):
        $this->_foreach['countriesName']['iteration']++;
?>
		<?php if (($this->_foreach['countriesName']['iteration']-1) == 15 || ($this->_foreach['countriesName']['iteration']-1) == 30): ?>
		</ul>
			<?php if (($this->_foreach['countriesName']['iteration']-1) == 15): ?>
			<ul class="second">
			<?php elseif (($this->_foreach['countriesName']['iteration']-1) == 30): ?>
			<ul class="third">
			<?php endif; ?>
		<?php endif; ?>
		<li class="country" onmouseover="$('#towns-list-<?php echo $this->_tpl_vars['country']['code']; ?>
').addClass('towns-list-visible');" onmouseout="$('#towns-list-<?php echo $this->_tpl_vars['country']['code']; ?>
').removeClass('towns-list-visible');">
			<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'country','country' => $this->_tpl_vars['country']['code']), $this);?>
" style="text-decoration:none;margin:0;padding:0;color:inherit">
				<?php echo $this->_tpl_vars['country']['title']; ?>

			</a>
			
			<div id="towns-list-<?php echo $this->_tpl_vars['country']['code']; ?>
" class="towns-list">
			<ul>
			<?php $_from = $this->_tpl_vars['country']['towns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['townsName'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['townsName']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['town']):
        $this->_foreach['townsName']['iteration']++;
?>
			
				<li class="town"><a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'region','region' => $this->_tpl_vars['town']['code']), $this);?>
"><?php echo $this->_tpl_vars['town']['title']; ?>
</a></li>
			
			<?php endforeach; endif; unset($_from); ?>
			</ul>
			</div>
		</li>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
		<li style="width:200px;">Nu exista oferte pentru continentul ales !</li>
	<?php endif; ?>
</ul>