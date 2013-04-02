<style>
{literal}
span.err {color: #ff0000;font-weight: bold;}
{/literal}
</style>
<div style="margin:5px;">
	<h3 class="acch3">{tr key="layout_contact" class="layout"}</h3>
	{$page.content}
	<h3 class="acch3">{tr key="layout_contact" class="layout"}</h3>
	<div><span class="err">{$err}</span></div>
	{$form_image}
</div>