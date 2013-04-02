{if $err}
	<div class="error">
		<h2>{tr key='account_index_errors'}</h2>
		<b>{$err}</b>
	</div>
{/if}
{$form_img}
<script language="JavaScript">
function check_account(f)
{ldelim}
	{$form_js}
	return true;
{rdelim}
</script>