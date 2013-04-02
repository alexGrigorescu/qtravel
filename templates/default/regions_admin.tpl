{$form}
{$grid}
<script	type="text/javascript">
{literal}
	function changeContinent()
	{
		var continent_id = $('#regions_filter_continent_id').val();
		var url	= "{/literal}{$change_continent_url}{literal}";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#regions_filter_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					var option = document.createElement("OPTION");
					option.value = country_id;
					option.text = data.countries[country_id];
					if (country_id > 0 && !selected)
					{
						option.selected = "selected";
						selected = true;
					}
					$("#regions_filter_country_id").append(option);
				}					
			}			
		 }, "json");
	}
	
	function deleteRegion(id)
	{
		var url	= "{/literal}{$delete_region_url}{literal}";
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
				$("#regions").submit();
			}
		 }, "json");
	}
{/literal}	
</script>