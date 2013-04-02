<html>
<head>
	<title>{tr key='site_title' class='layout'}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$smarty.const.CHARSET}" />
	<meta http-equiv="keywords" content="{tr key='site_keywords' class='layout'}" >
	<meta http-equiv="description" content="{tr key='site_description' class='layout'}" />
	<script type="text/javascript" src="javascript/jquery/jquery.js"></script>
	<script type="text/javascript" src="javascript/jquery/form.js"></script>
	<script type="text/javascript" src="javascript/dtree/dtree.js"></script>
	<script type="text/javascript" src="javascript/script.js"></script>
	<style type="text/css">
		{$css}
	</style>
</head>
<body>
<div style="padding-top:10px;"></div>
<div style="text-align:center;">
	<div style="text-align:center;">
	<table border="0" cellspacing="0" cellpadding="0" style="margin:auto;width:968px;">
	<tr>
		<td style="border: 1px solid #333333;  vertical-align:top; width:168px">
			<div style="padding-top:19px;">
				<table border="0" cellspacing="0" cellpadding="0" style="width: 168px;">
					{if $user_id > 0}
					<tr>
						<td style="text-align:center;">
							You are logged in as <br/> {$user_info.user_name}<br/>
						</td>
					</tr>
					{/if}
					<tr>
						<td>
							<div class="nav">
							{if $user_id > 0}
								<a href="{url o='main' m='index' clean = '1'}">{tr key='layout_home' class='layout'}</a><br/>
								<a href="{url o='pages' m='admin' clean = '1'}">{tr key='layout_pages' class='layout'}</a><br/>
								<a href="{url o='accommodations' m='admin' clean = '1'}">{tr key='layout_accommodations' class='layout'}</a><br/>
								<a href="{url o='vacations' m='admin' clean = '1'}">{tr key='layout_vacations' class='layout'}</a><br/>
								<a href="{url o='continents' m='admin' clean = '1'}">{tr key='layout_continents' class='layout'}</a><br/>
								<a href="{url o='countries' m='admin' clean = '1'}">{tr key='layout_countries' class='layout'}</a><br/>
								<a href="{url o='regions' m='admin' clean = '1'}">{tr key='layout_regions' class='layout'}</a><br/>
								<a href="{url o='locations' m='admin' clean = '1'}">{tr key='layout_locations' class='layout'}</a><br/>
								<a href="{url o='flight_operators' m='admin' clean = '1'}">{tr key='layout_flight_operators' class='layout'}</a><br/>
								<a href="{url o='flight_types' m='admin' clean = '1'}">{tr key='layout_flight_types' class='layout'}</a><br/>
								<a href="{url o='flights' m='admin' clean = '1'}">{tr key='layout_flights' class='layout'}</a><br/>
								<a href="{url o='transport_types' m='admin' clean = '1'}">{tr key='layout_transport_types' class='layout'}</a><br/>
								<a href="{url o='accommodation_types' m='admin' clean = '1'}">{tr key='layout_accommodation_types' class='layout'}</a><br/>
								<a href="{url o='circuits' m='admin' clean = '1'}">{tr key='layout_circuits' class='layout'}</a><br/>
								<a href="{url o='specials' m='admin' clean = '1'}">{tr key='layout_specials' class='layout'}</a><br/>
								<a href="{url o='contracts' m='admin' clean = '1'}">{tr key='layout_contracts' class='layout'}</a><br/>
								<a href="{url o='login' m='logout' clean = '1'}">{tr key='layout_logout' class='layout'}</a>
							{else}
								<a href="{url o='main' m='index' clean = '1'}">{tr key='layout_home' class='layout'}</a><br/>
								<a href="{url o='login' m='index' clean = '1'}">{tr key='layout_login' class='layout'}</a><br/>
							{/if}
							</div>
						</td>
					</tr>
				</table>
			</div>
		</td>
		<td style="padding-left: 20px;height:400px;vertical-align:top;width:800px;">
			<table border="0" cellspacing="0" cellpadding="0" style="width:100%;">
			<tr>
				<td style="text-align:center;border: 1px solid #333333;padding:5px;border-bottom:0px;">{$meta.title}</td>
			</tr>
			<tr>
				<td style="vertical-align:top; border: 1px solid #333333; padding: 15px 19px 15px 19px; height:400px;">
					{$page_content}
				</td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
</div>
</body>
</html>