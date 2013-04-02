{$form}
{$grid}
<script	type="text/javascript">
{literal}
	function deleteContinent(id)
	{
		var url	= "{/literal}{$delete_continent_url}{literal}";
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
				$("#continents").submit();
			}
		 }, "json");
	}
{/literal}	
</script>