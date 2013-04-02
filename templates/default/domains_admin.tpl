{$form}
{$grid}
<script	type="text/javascript">
{literal}
	function deleteDomain(id)
	{
		var url	= "{/literal}{$delete_domain_url}{literal}";
		var vData = {
				id : id				
			};
		$.post(url, vData, function(data){
			if(data.error)
			{
				alert(data.message);
			}
			else
			{
				$("#domains").submit();
			}
		 }, "json");
	}
{/literal}	
</script>