<div>{tr key='flight_choose_end'}</div>
<style>
{literal}


.continent {
	border-bottom: 1px solid red;
	font-weight: bold;
	padding: 10px 0px 5px 0px;
}

.continent a, .continent a:hover {
	text-decoration: none;
}

.country {
	text-decoration: none;
}

.country a, .country a:hover {
	text-decoration: none;
}

.regions {
	padding: 5px 10px 10px 10px;
	border-bottom: 1px solid red;
}
{/literal}
</style>

{foreach from=$continents item=continent key=continent_code}
	<h3 class="continent"><a href="{url o='flight' m='end_step2' end_continent=$continent.id}">{$continent.title}</a></h3>
	{foreach from=$continent.countries item=country key=country_code}
		<div class="country"><a onclick="$('#regions_{$country.id}').toggle(); return false;" href="{url o='flight' m='end_step3' end_continent=$continent.id end_country=$country.id}">{$country.title}</a></div>
		<div style="display: none;" class="regions" id="regions_{$country.id}">
			{foreach from=$country.regions item=region key=region_code}
				<div class="region"><a href="{url o='flight' m='offers' end_continent=$continent.id end_country=$country.id end_region=$region.id}">{$region.title}</a></div>
			{/foreach}
		</div>
	{/foreach}
{foreachelse}
	<h3>{tr key='flight_no_flights_found'}</h3>
{/foreach}