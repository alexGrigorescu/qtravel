<script type="text/javascript">
	d = new dTree('d');
	d.add(0,-1, '{tr key='pages_label_root'}','javascript:set(\'{$page_id}\', \'0\');set(\'{$page_code}\', \'{tr key='pages_label_root'}\');close(\'div_{$field}\');');
	{foreach from=$pages item=page}
		{if $page.sub > 0}
			d.add({$page.id},{$page.parent_id},'{$page.code}','javascript:set(\'{$page_id}\', \'{$page.id}\');set(\'{$page_code}\', \'{$page.code}\');close(\'div_{$field}\');', '', '', '{$img_path}folder.gif', '{$img_path}folderopen.gif');
		{else}
			d.add({$page.id},{$page.parent_id},'{$page.code}', 'javascript:set(\'{$page_id}\', \'{$page.id}\');set(\'{$page_code}\', \'{$page.code}\');close(\'div_{$field}\');', '', '', '{$img_path}page.gif', '{$img_path}page.gif');
		{/if}
	{/foreach}
	document.write(d);
	{literal}
	function set(field, value)
	{
		document.getElementById(field).value = value;
	}
	function close(field)
	{
		document.getElementById(field).style.display = 'none';
	}
	{/literal}
</script>