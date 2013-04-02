{$form}
{$grid}
<script	type="text/javascript">
{literal}
	function changeStartCountry()
	{
		var country_id = $('#flights_filter_start_country_id').val();
		var url = "{/literal}{$change_country_url}{literal}";
		var vData = {
			country_id : country_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				if (data.count > 0)
				{
					$("#flights_filter_start_region_id").html("");
					for (region_id in data.regions)
					{
						var option = document.createElement("OPTION");
						option.value = region_id;
						option.text = data.regions[region_id];
						$("#flights_filter_start_region_id").append(option);
					}			
				}
				else
				{
					$('#flights_filter_start_region_id').html("");
				}
			}
			else
			{
			}
		 }, "json");
	}
	function changeStartContinent()
	{
		var continent_id = $('#flights_filter_start_continent_id').val();
		var url = "{/literal}{$change_continent_url}{literal}";
		var vData = {
			continent_id : continent_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#flights_start_country_id").html("");
				if (data.count > 0)
				{
					
					for (country_id in data.countries)
					{
						var option = document.createElement("OPTION");
						option.value = country_id;
						option.text = data.countries[country_id];
						$("#flights_filter_start_country_id").append(option);
					}
					
				}
				else
				{
					
				}
				changeStartCountry();
			}
			else
			{
			}
		 }, "json");
	}
	function changeEndCountry()
	{
		var country_id = $('#flights_filter_end_country_id').val();
		var url = "{/literal}{$change_country_url}{literal}";
		var vData = {
			country_id : country_id				
		};
		
		$.post(url, vData, function(data){
			if(!data.error){
				if (data.count > 0)
				{
					$("#flights_filter_end_region_id").html("");
					for (region_id in data.regions)
					{
						var option = document.createElement("OPTION");
						option.value = region_id;
						option.text = data.regions[region_id];
						$("#flights_filter_end_region_id").append(option);
					}			
				}
				else
				{
					$('#flights_filter_end_region_id').html("");
				}
			}
			else
			{				
			}
		 }, "json");
	}
	
	function changeEndContinent()
	{
		var continent_id = $('#flights_filter_end_continent_id').val();
		var url = "{/literal}{$change_continent_url}{literal}";
		var vData = {
			continent_id : continent_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#flights_filter_end_country_id").html("");
				if (data.count > 0)
				{
					
					for (country_id in data.countries)
					{
						var option = document.createElement("OPTION");
						option.value = country_id;
						option.text = data.countries[country_id];
						$("#flights_filter_end_country_id").append(option);
					}
					
				}
				else
				{
					
				}
				changeEndCountry();
			}
			else
			{				
			}
		 }, "json");
	}
{/literal}	
</script>