<?php /* Smarty version 2.6.18, created on 2008-09-23 20:28:32
         compiled from /home/qtravel/public_html/templates/default/locations_admin.tpl */ ?>
<?php echo $this->_tpl_vars['form']; ?>

<?php echo $this->_tpl_vars['grid']; ?>

<script	type="text/javascript">
<?php echo '
	function changeCountry()
	{
		var country_id = $(\'#locations_filter_country_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_country_url']; ?>
<?php echo '";
		var vData = {
				country_id : country_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#locations_filter_region_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#locations_filter_region_id").append(\'<option value="\'+region_id+\'">\'+data.regions[region_id]+\'</option>\');						
				}			
			}			
		 }, "json");
	}
	
	function changeContinent()
	{
		var continent_id = $(\'#locations_filter_continent_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#locations_filter_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					$("#locations_filter_country_id").append(\'<option value="\'+country_id+\'">\'+data.countries[country_id]+\'</option>\');
				}					
				changeCountry();
			}			
		 }, "json");
	}
	
		
	function deleteLocation(id)
	{
		var url	= "'; ?>
<?php echo $this->_tpl_vars['delete_location_url']; ?>
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
				$("#locations").submit();
			}
		 }, "json");
	}
'; ?>
	
</script>