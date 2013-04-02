{if $err}
	<div class="error">
		<h2>{tr key='countries_edit_errors'}</h2>
		<b>{$err}</b>
	</div>
{/if}
{$form}
<script language="JavaScript">
function check_account(f)
{ldelim}
	{$form_js}
	return true;
{rdelim}
</script>