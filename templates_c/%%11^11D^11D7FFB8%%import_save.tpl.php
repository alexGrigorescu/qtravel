<?php /* Smarty version 2.6.18, created on 2008-10-29 21:34:44
         compiled from /home/qtravel/public_html/templates/default/import_save.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/import_save.tpl', 1, false),)), $this); ?>
<a href="<?php echo smarty_function_url(array('o' => @OBJ,'m' => 'admin'), $this);?>
" > << BACK </a>
<?php $_from = $this->_tpl_vars['msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg_item']):
?>
	<div><?php echo $this->_tpl_vars['msg_item']['msg']; ?>
</div>
<?php endforeach; endif; unset($_from); ?>