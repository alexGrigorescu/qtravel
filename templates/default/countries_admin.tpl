{$form}
{$grid}
<script	type="text/javascript">
{literal}
	function deleteCountry(id)
	{
		var url	= "{/literal}{$delete_country_url}{literal}";
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
				$("#countries").submit();
			}
		 }, "json");
	}
{/literal}	
</script>