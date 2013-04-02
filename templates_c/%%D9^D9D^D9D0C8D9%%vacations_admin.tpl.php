<?php /* Smarty version 2.6.18, created on 2010-06-27 10:11:19
         compiled from /home/qtravel/public_html/templates/default/vacations_admin.tpl */ ?>
<?php echo $this->_tpl_vars['form']; ?>

<?php echo $this->_tpl_vars['form2_header']; ?>

	<input type="hidden" id="vacations2_selected" value="0">
	<?php echo $this->_tpl_vars['grid']; ?>

</form>
<script	type="text/javascript">
<?php echo '
	function selectAll()
	{
		var selected = Number($(\'#vacations2_selected\').val());
		var input = $("[type=checkbox]");
		for(i=0; i<input.length; i++)
		{
			var checkbox = input[i];
			if (checkbox.name.match(/^vacations2_ids\\[(\\d)*\\]/))
			{
				if (selected%2==0)
				{
					checkbox.checked = true;
				}
				else
				{
					checkbox.checked = false;
				}
			}
		}

		$(\'#vacations2_selected\').val(selected+1);
	}

	function changeCountry()
	{
		var country_id = $(\'#vacations_filter_country_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_country_url']; ?>
<?php echo '";
		var vData = {
				country_id : country_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#vacations_filter_region_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#vacations_filter_region_id").append(\'<option value="\'+region_id+\'">\'+data.regions[region_id]+\'</option>\');						
				}			
			}			
		 }, "json");
	}
	
	function changeContinent()
	{
		var continent_id = $(\'#vacations_filter_continent_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#vacations_filter_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					$("#vacations_filter_country_id").append(\'<option value="\'+country_id+\'">\'+data.countries[country_id]+\'</option>\');
				}					
				changeCountry();
			}			
		 }, "json");
	}
	
	function generateVacation (accommodation_id)
	{
		var mult = $(\'#vacations_filter_vacation_\'+accommodation_id).val();
		var cat = $(\'#vacations_filter_cat_\'+accommodation_id).val();
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
				$(\'#vacations_filter_vacation_container_\'+accommodation_id).html("");
			}			
		 }, "json");
	}
	
	function savePriceVal (accommodation_id)
	{
		var price_val = $(\'#vacations_filter_price_val_\'+accommodation_id).val();
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
		var price_proc = $(\'#vacations_filter_price_proc_\'+accommodation_id).val();
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