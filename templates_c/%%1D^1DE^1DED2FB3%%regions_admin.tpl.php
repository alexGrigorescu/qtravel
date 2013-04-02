<?php /* Smarty version 2.6.18, created on 2008-09-23 20:28:04
         compiled from /home/qtravel/public_html/templates/default/regions_admin.tpl */ ?>
<?php echo $this->_tpl_vars['form']; ?>

<?php echo $this->_tpl_vars['grid']; ?>

<script	type="text/javascript">
<?php echo '
	function changeContinent()
	{
		var continent_id = $(\'#regions_filter_continent_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
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
		var url	= "'; ?>
<?php echo $this->_tpl_vars['delete_region_url']; ?>
<?php echo '";
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
'; ?>
	
</script>