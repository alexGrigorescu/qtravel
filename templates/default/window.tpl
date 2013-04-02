<div style="position:relative;margin:0px;padding:0px;z-index:10;" id="div_{$field}_parent">
	<div class="win_area" style="display: {$display}; width:{$width}px;height:{$height}px;position:absolute; top: {$top}px; left: {$left}px;" id="div_{$field}">
		<div class="win_head" id="div_{$field}_head" onmousedown="dragStart(event, 'div_{$field}', '{$form}');">
			<input type="button" class="win_close" id="div_{$field}_head_close" onClick="document.getElementById('div_{$field}').style.display='none'; return false;" style="border: none;"/>	
			<div class="win_title">{$title}</div>
		</div>
		<div class="win_body" id="div_{$field}_body" name="div_{$field}_body">
			<div class="win_content">{$content}</div>
		</div>
	</div>
</div>
