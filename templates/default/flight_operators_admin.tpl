{$form}
{$grid}
<script	type="text/javascript">
{literal}
	function deleteFlightOperator(id)
	{
		var url	= "{/literal}{$delete_flight_operator_url}{literal}";
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
{/literal}	
</script>