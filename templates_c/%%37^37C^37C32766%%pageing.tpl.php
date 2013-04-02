<?php /* Smarty version 2.6.18, created on 2008-09-23 20:28:04
         compiled from /home/qtravel/public_html/templates/default/pageing.tpl */ ?>
<table border="0" cellspacing="0" cellpadding="2" width="100%" class="pageing">
<tr>	
	<td style="width:200px;" class="pageing" nowrap>Found <?php echo $this->_tpl_vars['rec_count']; ?>
 records.</td>
	<td align="left" width="30" class="pageing"><?php if ($this->_tpl_vars['page'] > 5): ?><a href="<?php echo $this->_tpl_vars['links']['page_back_back']; ?>
">&lt;&lt;</a><?php else: ?>&lt;&lt;<?php endif; ?></td>
	<td align="left" width="30" class="pageing"><?php if ($this->_tpl_vars['page'] > 0): ?><a href="<?php echo $this->_tpl_vars['links']['page_back']; ?>
">&lt;</a><?php else: ?>&lt;<?php endif; ?></td>					
	<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page_item']):
?><td align="center" class="pageing"><?php if ($this->_tpl_vars['page_item']['value'] == $this->_tpl_vars['page']): ?><b><?php echo $this->_tpl_vars['page_item']['title']; ?>
</b><?php else: ?><a href="<?php echo $this->_tpl_vars['page_item']['link']; ?>
"><?php echo $this->_tpl_vars['page_item']['title']; ?>
</a><?php endif; ?></td><?php endforeach; endif; unset($_from); ?> 
	<td align="right" width=30 class="pageing"><?php if ($this->_tpl_vars['page'] + 1 < $this->_tpl_vars['page_count']): ?><a href="<?php echo $this->_tpl_vars['links']['page_next']; ?>
">&gt;</a><?php else: ?>&gt;<?php endif; ?></td>
	<td align="right" width=30 class="pageing"><?php if ($this->_tpl_vars['page'] + 5 < $this->_tpl_vars['page_count']): ?><a href="<?php echo $this->_tpl_vars['links']['page_next_next']; ?>
">&gt;&gt;</a><?php else: ?>&gt;&gt;<?php endif; ?></td>							
</tr>
</table>