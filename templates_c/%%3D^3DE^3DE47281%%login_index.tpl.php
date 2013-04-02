<?php /* Smarty version 2.6.18, created on 2013-03-03 10:50:21
         compiled from D:/wamp/www/qtravel/public_html/templates/default/login_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', 'D:/wamp/www/qtravel/public_html/templates/default/login_index.tpl', 3, false),)), $this); ?>
<?php if ($this->_tpl_vars['err']): ?>
	<div class="error">
		<h2><?php echo smarty_function_tr(array('key' => 'login_index_errors'), $this);?>
</h2>
		<b><?php echo $this->_tpl_vars['err']; ?>
</b>
	</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['form_img']; ?>

<script language="JavaScript">
function check_login(f)
{
	<?php echo $this->_tpl_vars['form_js']; ?>

	return true;
}
</script>