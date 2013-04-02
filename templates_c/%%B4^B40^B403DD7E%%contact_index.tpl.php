<?php /* Smarty version 2.6.18, created on 2011-06-06 22:07:43
         compiled from /home/qtravel/public_html/templates/default/contact_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/contact_index.tpl', 7, false),)), $this); ?>
<style>
<?php echo '
span.err {color: #ff0000;font-weight: bold;}
'; ?>

</style>
<div style="margin:5px;">
	<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'layout_contact','class' => 'layout'), $this);?>
</h3>
	<?php echo $this->_tpl_vars['page']['content']; ?>

	<h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'layout_contact','class' => 'layout'), $this);?>
</h3>
	<div><span class="err"><?php echo $this->_tpl_vars['err']; ?>
</span></div>
	<?php echo $this->_tpl_vars['form_image']; ?>

</div>