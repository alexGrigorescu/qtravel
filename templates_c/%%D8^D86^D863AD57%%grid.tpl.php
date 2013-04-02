<?php /* Smarty version 2.6.18, created on 2013-03-03 10:50:36
         compiled from D:/wamp/www/qtravel/public_html/templates/default/grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'D:/wamp/www/qtravel/public_html/templates/default/grid.tpl', 9, false),)), $this); ?>
<?php echo $this->_tpl_vars['top']; ?>

<table border="0" cellpadding="0" cellspacing="0" class="<?php echo $this->_tpl_vars['class']; ?>
">
<tr>
<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['column']):
?>
	<td class="header" style="<?php echo $this->_tpl_vars['column']['style_header']; ?>
"><?php echo $this->_tpl_vars['column']['header']; ?>
</td>
<?php endforeach; endif; unset($_from); ?>
</tr>
<?php echo $this->_tpl_vars['header']; ?>

<?php echo smarty_function_counter(array('name' => 'i','start' => 0,'print' => false), $this);?>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
<?php echo smarty_function_counter(array('assign' => 'i'), $this);?>

<tr class="row<?php echo $this->_tpl_vars['i']%2; ?>
" onmouseover="this.className='row'" onmouseout="this.className='row1'">
<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['column']):
?>
	<td class="cell<?php echo $this->_tpl_vars['i']%2; ?>
" style="<?php echo $this->_tpl_vars['column']['style']; ?>
" nowrap><?php echo $this->_tpl_vars['row'][$this->_tpl_vars['column']['field']]; ?>
</td>
<?php endforeach; endif; unset($_from); ?>
</tr>
<?php endforeach; endif; unset($_from); ?>
<?php echo $this->_tpl_vars['footer']; ?>

<tr><td colspan="<?php echo $this->_tpl_vars['columns_count']; ?>
" class="footer"><?php echo $this->_tpl_vars['pageing']; ?>
</td></tr></table>
<?php echo $this->_tpl_vars['bottom']; ?>


