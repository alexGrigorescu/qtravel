<html>
<head>
	<title>{tr key='site_title' class='layout'}</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$smarty.const.CHARSET}" />
	<meta http-equiv="keywords" content="{tr key='site_keywords' class='layout'}" >
	<meta http-equiv="description" content="{tr key='site_description' class='layout'}" />
	<script type="text/javascript" src="javascript/jquery/jquery.js"></script>
	<script type="text/javascript" src="javascript/jquery/calendar.js"></script>	
	<script type="text/javascript" src="javascript/jquery/form.js"></script>
	<script type="text/javascript" src="javascript/dtree/dtree.js"></script>
	<script type="text/javascript" src="javascript/script.js"></script>
	<style type="text/css">@import url(javascript/jquery/calendar.css);</style> 
	<style type="text/css">
		{$css}
	</style>
</head>
<body>
<div style="padding-top:10px;"></div>
<div style="text-align:center;">
	<div style="text-align:center;">
	<table border="0" cellspacing="0" cellpadding="0" style="background: url({$img_path}bluetop2.png) repeat-x; margin:auto;width:968px; border: 2px solid #CCCCCC;">
	<tr>
		<td style="border-right: 2px solid #CCCCCC; vertical-align:top; width:168px;">
			<div style="padding-top:19px;">
				<table border="0" cellspacing="0" cellpadding="0" style="width: 168px;">
					<tr>
						<td>
							<div class="nav">
							{if $user_id > 0}
								<a class="level0" href="{url o='main' m='index' clean = '1'}">{tr key='layout_home' class='layout'}</a>
								{if $user_rigts.domains || $user_rights.pages || $user_rights.users}<span class="level0">{tr key='layout_settings' class='layout'}</span>{/if}
								{if $user_rights.domains}<a class="level1" href="{url o='domains' m='admin' clean = '1'}">{tr key='layout_domains' class='layout'}</a>{/if}
								{if $user_rights.pages}<a class="level1" href="{url o='pages' m='admin' clean = '1'}">{tr key='layout_pages' class='layout'}</a>{/if}
								{if $user_rights.users}<a class="level1" href="{url o='users' m='admin' clean = '1'}">{tr key='layout_users' class='layout'}</a>{/if}
								
								
								{if $user_rights.accommodation_types || $user_rights.transport_types || $user_rights.flight_types || $user_rights.flight_operators}<span class="level0">{tr key='layout_define' class='layout'}</span>{/if}
								{if $user_rights.accommodation_types}<a class="level1" href="{url o='accommodation_types' m='admin' clean = '1'}">{tr key='layout_accommodation_types' class='layout'}</a>{/if}
								{if $user_rights.transport_types}<a class="level1" href="{url o='transport_types' m='admin' clean = '1'}">{tr key='layout_transport_types' class='layout'}</a>{/if}
								{if $user_rights.flight_types}<a class="level1" href="{url o='flight_types' m='admin' clean = '1'}">{tr key='layout_flight_types' class='layout'}</a>{/if}
								{if $user_rights.flight_operators}<a class="level1" href="{url o='flight_operators' m='admin' clean = '1'}">{tr key='layout_flight_operators' class='layout'}</a>{/if}
								
								{if $user_rights.continents || $user_rights.countries || $user_rights.regions || $user_rights.flight_operators}<span class="level0">{tr key='layout_places' class='layout'}</span>{/if}
								{if $user_rights.continents}<a class="level1" href="{url o='continents' m='admin' clean = '1'}">{tr key='layout_continents' class='layout'}</a>{/if}
								{if $user_rights.countries}<a class="level1" href="{url o='countries' m='admin' clean = '1'}">{tr key='layout_countries' class='layout'}</a>{/if}
								{if $user_rights.regions}<a class="level1" href="{url o='regions' m='admin' clean = '1'}">{tr key='layout_regions' class='layout'}</a>{/if}
								
								{if $user_rights.accommodations || $user_rights.vacations || $user_rights.locations || $user_rights.flights || $user_rights.busses || $user_rights.circuits || $user_rights.specials}<span class="level0">{tr key='layout_offers' class='layout'}</span>{/if}
								{if $user_rights.accommodations}<a class="level1" href="{url o='accommodations' m='admin' clean = '1'}">{tr key='layout_accommodations' class='layout'}</a>{/if}
								{if $user_rights.vacations}<a class="level1" href="{url o='vacations' m='admin' clean = '1'}">{tr key='layout_vacations' class='layout'}</a>{/if}
								{if $user_rights.locations}<a class="level1" href="{url o='locations' m='admin' clean = '1'}">{tr key='layout_locations' class='layout'}</a>{/if}
								{if $user_rights.flights}<a class="level1" href="{url o='flights' m='admin' clean = '1'}">{tr key='layout_flights' class='layout'}</a>{/if}
								{if $user_rights.busses}<a class="level1" href="{url o='busses' m='admin' clean = '1'}">{tr key='layout_busses' class='layout'}</a>{/if}
								{if $user_rights.circuits}<a class="level1" href="{url o='circuits' m='admin' clean = '1'}">{tr key='layout_circuits' class='layout'}</a>{/if}
								{if $user_rights.contracts}<a class="level1" href="{url o='contracts' m='admin' clean = '1'}">{tr key='layout_contracts' class='layout'}</a>{/if}
								{if $user_rights.specials}<a class="level1" href="{url o='specials' m='admin' clean = '1'}">{tr key='layout_specials' class='layout'}</a>{/if}
								
								<a class="level0" href="{url o='login' m='logout' clean = '1'}">{tr key='layout_logout' class='layout'} <b>{$user_info.user_name}</b></a>
							{else}
								<a class="level0" href="{url o='main' m='index' clean = '1'}">{tr key='layout_home' class='layout'}</a>
								<a class="level0" href="{url o='login' m='index' clean = '1'}">{tr key='layout_login' class='layout'}</a>
							{/if}
							</div>
						</td>
					</tr>
				</table>
			</div>
		</td>
		<td style="height:400px; vertical-align:top;width:800px;">
			<table border="0" cellspacing="0" cellpadding="0" style="width:100%;">
			<tr>
				<td style="font-weight: bold; font-size: 15px; color: #FFFFFF; text-align:center; border-bottom: 2px solid #CCCCCC; padding:5px;">{$meta.title}</td>
			</tr>
			<tr>
				<td style="vertical-align:top; padding: 15px 19px 15px 19px; height:400px;">
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