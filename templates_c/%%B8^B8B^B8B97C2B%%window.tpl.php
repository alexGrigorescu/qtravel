<?php /* Smarty version 2.6.18, created on 2009-01-14 15:25:59
         compiled from /home/qtravel/public_html/templates/default/window.tpl */ ?>
<div style="position:relative;margin:0px;padding:0px;z-index:10;" id="div_<?php echo $this->_tpl_vars['field']; ?>
_parent">
	<div class="win_area" style="display: <?php echo $this->_tpl_vars['display']; ?>
; width:<?php echo $this->_tpl_vars['width']; ?>
px;height:<?php echo $this->_tpl_vars['height']; ?>
px;position:absolute; top: <?php echo $this->_tpl_vars['top']; ?>
px; left: <?php echo $this->_tpl_vars['left']; ?>
px;" id="div_<?php echo $this->_tpl_vars['field']; ?>
">
		<div class="win_head" id="div_<?php echo $this->_tpl_vars['field']; ?>
_head" onmousedown="dragStart(event, 'div_<?php echo $this->_tpl_vars['field']; ?>
', '<?php echo $this->_tpl_vars['form']; ?>
');">
			<input type="button" class="win_close" id="div_<?php echo $this->_tpl_vars['field']; ?>
_head_close" onClick="document.getElementById('div_<?php echo $this->_tpl_vars['field']; ?>
').style.display='none'; return false;" style="border: none;"/>	
			<div class="win_title"><?php echo $this->_tpl_vars['title']; ?>
</div>
		</div>
		<div class="win_body" id="div_<?php echo $this->_tpl_vars['field']; ?>
_body" name="div_<?php echo $this->_tpl_vars['field']; ?>
_body">
			<div class="win_content"><?php echo $this->_tpl_vars['content']; ?>
</div>
		</div>
	</div>
</div>