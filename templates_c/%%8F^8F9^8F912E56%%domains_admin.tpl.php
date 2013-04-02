<?php /* Smarty version 2.6.18, created on 2013-03-03 12:16:09
         compiled from D:/wamp/www/qtravel/public_html/templates/default/domains_admin.tpl */ ?>
<?php echo $this->_tpl_vars['form']; ?>

<?php echo $this->_tpl_vars['grid']; ?>

<script	type="text/javascript">
<?php echo '
	function deleteDomain(id)
	{
		var url	= "'; ?>
<?php echo $this->_tpl_vars['delete_domain_url']; ?>
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
				$("#domains").submit();
			}
		 }, "json");
	}
'; ?>
	
</script>