<?php /* Smarty version 2.6.18, created on 2008-09-23 20:53:53
         compiled from /home/qtravel/public_html/templates/default/pages_admin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/pages_admin.tpl', 1, false),array('function', 'url', '/home/qtravel/public_html/templates/default/pages_admin.tpl', 1, false),)), $this); ?>
<input type="button" value="<?php echo smarty_function_tr(array('key' => 'pages_new_page_label'), $this);?>
" onClick="location.href='<?php echo smarty_function_url(array('o' => 'pages','m' => 'edit'), $this);?>
'">
<script type="text/javascript">
	d = new dTree('d');
	d.add(0,-1, '<?php echo smarty_function_tr(array('key' => 'pages_label_root'), $this);?>
');
	<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
		<?php if ($this->_tpl_vars['page']['sub'] > 0): ?>
			d.add(<?php echo $this->_tpl_vars['page']['id']; ?>
,<?php echo $this->_tpl_vars['page']['parent_id']; ?>
,'<?php echo $this->_tpl_vars['page']['code']; ?>
','<?php echo smarty_function_url(array('o' => 'pages','m' => 'edit','id' => $this->_tpl_vars['page']['id']), $this);?>
', '', '', '<?php echo $this->_tpl_vars['img_path']; ?>
/folder.gif', '<?php echo $this->_tpl_vars['img_path']; ?>
/folderopen.gif');
		<?php else: ?>
			d.add(<?php echo $this->_tpl_vars['page']['id']; ?>
,<?php echo $this->_tpl_vars['page']['parent_id']; ?>
,'<?php echo $this->_tpl_vars['page']['code']; ?>
','<?php echo smarty_function_url(array('o' => 'pages','m' => 'edit','id' => $this->_tpl_vars['page']['id']), $this);?>
', '', '', '<?php echo $this->_tpl_vars['img_path']; ?>
/page.gif', '<?php echo $this->_tpl_vars['img_path']; ?>
/page.gif');
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	document.write(d);
</script>