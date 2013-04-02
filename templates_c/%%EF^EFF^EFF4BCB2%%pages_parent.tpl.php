<?php /* Smarty version 2.6.18, created on 2009-01-14 15:25:59
         compiled from /home/qtravel/public_html/templates/default/pages_parent.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/pages_parent.tpl', 3, false),)), $this); ?>
<script type="text/javascript">
	d = new dTree('d');
	d.add(0,-1, '<?php echo smarty_function_tr(array('key' => 'pages_label_root'), $this);?>
','javascript:set(\'<?php echo $this->_tpl_vars['page_id']; ?>
\', \'0\');set(\'<?php echo $this->_tpl_vars['page_code']; ?>
\', \'<?php echo smarty_function_tr(array('key' => 'pages_label_root'), $this);?>
\');close(\'div_<?php echo $this->_tpl_vars['field']; ?>
\');');
	<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
		<?php if ($this->_tpl_vars['page']['sub'] > 0): ?>
			d.add(<?php echo $this->_tpl_vars['page']['id']; ?>
,<?php echo $this->_tpl_vars['page']['parent_id']; ?>
,'<?php echo $this->_tpl_vars['page']['code']; ?>
','javascript:set(\'<?php echo $this->_tpl_vars['page_id']; ?>
\', \'<?php echo $this->_tpl_vars['page']['id']; ?>
\');set(\'<?php echo $this->_tpl_vars['page_code']; ?>
\', \'<?php echo $this->_tpl_vars['page']['code']; ?>
\');close(\'div_<?php echo $this->_tpl_vars['field']; ?>
\');', '', '', '<?php echo $this->_tpl_vars['img_path']; ?>
folder.gif', '<?php echo $this->_tpl_vars['img_path']; ?>
folderopen.gif');
		<?php else: ?>
			d.add(<?php echo $this->_tpl_vars['page']['id']; ?>
,<?php echo $this->_tpl_vars['page']['parent_id']; ?>
,'<?php echo $this->_tpl_vars['page']['code']; ?>
', 'javascript:set(\'<?php echo $this->_tpl_vars['page_id']; ?>
\', \'<?php echo $this->_tpl_vars['page']['id']; ?>
\');set(\'<?php echo $this->_tpl_vars['page_code']; ?>
\', \'<?php echo $this->_tpl_vars['page']['code']; ?>
\');close(\'div_<?php echo $this->_tpl_vars['field']; ?>
\');', '', '', '<?php echo $this->_tpl_vars['img_path']; ?>
page.gif', '<?php echo $this->_tpl_vars['img_path']; ?>
page.gif');
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	document.write(d);
	<?php echo '
	function set(field, value)
	{
		document.getElementById(field).value = value;
	}
	function close(field)
	{
		document.getElementById(field).style.display = \'none\';
	}
	'; ?>

</script>