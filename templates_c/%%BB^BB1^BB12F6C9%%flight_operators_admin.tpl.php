<?php /* Smarty version 2.6.18, created on 2009-02-01 15:50:07
         compiled from /home/qtravel/public_html/templates/default/flight_operators_admin.tpl */ ?>
<?php echo $this->_tpl_vars['form']; ?>

<?php echo $this->_tpl_vars['grid']; ?>

<script	type="text/javascript">
<?php echo '
	function deleteFlightOperator(id)
	{
		var url	= "'; ?>
<?php echo $this->_tpl_vars['delete_flight_operator_url']; ?>
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
				$("#flight_operators").submit();
			}
		 }, "json");
	}
'; ?>
	
</script>