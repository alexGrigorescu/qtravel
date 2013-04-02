<?php /* Smarty version 2.6.18, created on 2008-09-23 20:54:29
         compiled from /home/qtravel/public_html/templates/default/continents_admin.tpl */ ?>
<?php echo $this->_tpl_vars['form']; ?>

<?php echo $this->_tpl_vars['grid']; ?>

<script	type="text/javascript">
<?php echo '
	function deleteContinent(id)
	{
		var url	= "'; ?>
<?php echo $this->_tpl_vars['delete_continent_url']; ?>
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
				$("#continents").submit();
			}
		 }, "json");
	}
'; ?>
	
</script>