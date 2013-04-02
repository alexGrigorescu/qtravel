<?php /* Smarty version 2.6.18, created on 2009-06-17 00:28:25
         compiled from /home/qtravel/public_html/templates/default/accommodations_admin.tpl */ ?>
<?php echo $this->_tpl_vars['form']; ?>

<?php echo $this->_tpl_vars['grid']; ?>

<script	type="text/javascript">
<?php echo '
	function changeCountry()
	{
		var country_id = $(\'#accommodations_filter_country_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_country_url']; ?>
<?php echo '";
		var vData = {
				country_id : country_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#accommodations_filter_region_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#accommodations_filter_region_id").append(\'<option value="\'+region_id+\'">\'+data.regions[region_id]+\'</option>\');
				}			
			}			
		 }, "json");
	}
	
	function changeContinent()
	{
		var continent_id = $(\'#accommodations_filter_continent_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#accommodations_filter_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					$("#accommodations_filter_country_id").append(\'<option value="\'+country_id+\'">\'+data.countries[country_id]+\'</option>\');
				}					
				changeCountry();
			}			
		 }, "json");
	}
	
	function generateVacation (accommodation_id)
	{
		var mult = $(\'#accommodations_filter_vacation_\'+accommodation_id).val();
		var cat = $(\'#accommodations_filter_cat_\'+accommodation_id).val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['generate_vacation_url']; ?>
<?php echo '";
		var vData = {
				id : accommodation_id,
				mult : mult,			
				cat : cat				
			};
		$.post(url, vData, function(data){
			if(data.succes){
				$(\'#accommodations_filter_vacation_container_\'+accommodation_id).html("");
			}			
		 }, "json");
	}
	
	function savePriceVal (accommodation_id)
	{
		var price_val = $(\'#accommodations_filter_price_val_\'+accommodation_id).val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['save_price_val_url']; ?>
<?php echo '";
		var vData = {
				id : accommodation_id,
				price_val : price_val			
			};
		$.post(url, vData, function(data){
			if(data.succes){}			
		 }, "json");
	}
	
	function savePriceProc (accommodation_id)
	{
		var price_proc = $(\'#accommodations_filter_price_proc_\'+accommodation_id).val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['save_price_proc_url']; ?>
<?php echo '";
		var vData = {
				id : accommodation_id,
				price_proc : price_proc			
			};
		$.post(url, vData, function(data){
			if(data.succes){}			
		 }, "json");
	}
'; ?>
	
</script>