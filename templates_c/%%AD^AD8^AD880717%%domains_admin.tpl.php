<?php /* Smarty version 2.6.18, created on 2008-09-23 10:57:50
         compiled from /home/qtravel/public_html/templates/default/domains_admin.tpl */ ?>
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