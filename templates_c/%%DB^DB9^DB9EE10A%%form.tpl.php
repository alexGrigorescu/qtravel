<?php /* Smarty version 2.6.18, created on 2008-09-13 15:35:28
         compiled from /home/qtravel/public_html/templates/default/form.tpl */ ?>
<?php $_from = $this->_tpl_vars['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
<?php if ($this->_tpl_vars['element']['type'] == 'formelementtabpane'): ?>
	<?php if ($this->_tpl_vars['start_tabpane'] == 1): ?></div><?php endif; ?>
	<?php echo $this->_tpl_vars['element']['image']; ?>

	<?php $this->assign('start_tabpane', '1'); ?>
<?php elseif ($this->_tpl_vars['element']['type'] == 'formelementtab'): ?>
	<?php if ($this->_tpl_vars['start_tab'] == 1): ?></div><?php endif; ?>
	<?php echo $this->_tpl_vars['element']['image']; ?>

	<?php $this->assign('start_tab', '1'); ?>
<?php elseif ($this->_tpl_vars['element']['type'] == 'formelementheader'): ?>
	<div class="header"><?php echo $this->_tpl_vars['element']['label']; ?>
</div>
<?php elseif ($this->_tpl_vars['element']['type'] == 'formelementhidden'): ?>
	<div class="hidden"><?php echo $this->_tpl_vars['element']['image']; ?>
</div>
<?php elseif ($this->_tpl_vars['element']['type'] == 'formelementwysiwyg'): ?>
	<table class="row">
	<tr>
		<td class="label" colspan="2"><?php echo $this->_tpl_vars['element']['label']; ?>
</td>
	</tr>
	<tr>
		<td class="element"><?php echo $this->_tpl_vars['element']['image']; ?>
</td>
		<td class="help"><?php echo $this->_tpl_vars['element']['help']; ?>
</td>
	</tr>
	</table>
<?php elseif ($this->_tpl_vars['element']['type'] == 'formelementsubmit' || $this->_tpl_vars['element']['type'] == 'formelementbutton'): ?>
<?php else: ?>
<table class="row">
<tr>
	<td class="label"><?php echo $this->_tpl_vars['element']['label']; ?>
</td>
	<td class="element"><?php echo $this->_tpl_vars['element']['image']; ?>
</td>
	<td class="help"><?php echo $this->_tpl_vars['element']['help']; ?>
</td>
</tr>
</table>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['start_tab'] == 1): ?></div><?php endif; ?>
<?php if ($this->_tpl_vars['start_tabpane'] == 1): ?></div><?php endif; ?>