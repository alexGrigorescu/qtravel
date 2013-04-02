<?php /* Smarty version 2.6.18, created on 2009-01-28 23:42:26
         compiled from /home/qtravel/public_html/templates/default/item_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/item_edit.tpl', 3, false),)), $this); ?>
<?php if ($this->_tpl_vars['err']): ?>
	<div class="error">
		<h2><?php echo smarty_function_tr(array('key' => 'countries_edit_errors'), $this);?>
</h2>
		<b><?php echo $this->_tpl_vars['err']; ?>
</b>
	</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['form']; ?>

<script language="JavaScript">
function check_account(f)
{
	<?php echo $this->_tpl_vars['form_js']; ?>

	return true;
}
</script>