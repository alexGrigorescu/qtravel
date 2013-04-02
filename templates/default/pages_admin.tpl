<input type="button" value="{tr key='pages_new_page_label'}" onClick="location.href='{url o='pages' m='edit'}'">
<script type="text/javascript">
	d = new dTree('d');
	d.add(0,-1, '{tr key='pages_label_root'}');
	{foreach from=$pages item=page}
		{if $page.sub > 0}
			d.add({$page.id},{$page.parent_id},'{$page.code}','{url o='pages' m='edit' id=$page.id}', '', '', '{$img_path}/folder.gif', '{$img_path}/folderopen.gif');
		{else}
			d.add({$page.id},{$page.parent_id},'{$page.code}','{url o='pages' m='edit' id=$page.id}', '', '', '{$img_path}/page.gif', '{$img_path}/page.gif');
		{/if}
	{/foreach}
	document.write(d);
</script>