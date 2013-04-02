{foreach from=$offers item=flight}
	<div>
		<h3>{$flight.title}</h3>
		<table>
			<tr>
				<td>{tr key=flight_start}</td>
				<td>{$flight.start_region_title}, {$flight.start_country_title} {if $flight.start_airport} - {$flight.start_airport}{/if}&nbsp;</td>
			</tr>
			<tr>
				<td>{tr key=flight_end}</td>
				<td>{$flight.end_region_title}, {$flight.end_country_title} {if $flight.end_airport} - {$flight.end_airport}{/if}&nbsp;</td>
			</tr>
			<tr>
				<td>{tr key=flight_operator}</td>
				<td>{$flight.flight_operator_title}&nbsp;</td>
			</tr>
			<tr>
				<td>{tr key=flight_type}</td>
				<td>{$flight.flight_type_title}&nbsp;</td>
			</tr>
			<tr>
				<td>{tr key=flight_start_time}</td>
				<td>{$flight.hour|truncate:5:"":true}&nbsp;</td>
			</tr>
			<tr>
				<td>{tr key=flight_duration}</td>
				<td>{$flight.duration|truncate:5:"":true}&nbsp;</td>
			</tr>
			<tr>
				<td>{tr key=flight_stops}</td>
				<td>{if $flight.stops}{tr key=flight_with_stops}{else}{tr key=flight_without_stops}:{/if}&nbsp;</td>
			</tr>
			{if $flight.stops && $flight.stops_description}
			<tr>
				<td colspan="2" style="padding: 0px 20px 0px 20px;">{$flight.stops_description}&nbsp;</td>
			</tr>
			{/if}
			<tr>
				<td>{tr key=flight_airport_tax}</td>
				<td>{if $flight.airport_tax_included}{tr key=flight_airport_tax_included}{else}{$flight.airport_tax} {tr key=flight_airport_tax_not_included}{/if}&nbsp;</td>
			</tr>
			<tr>
				<td>{tr key=flight_one_way_price}</td>
				<td>{if $flight.price1}{$flight.price1}{else}{tr key=flight_cannot_order_one_way}{/if}&nbsp;</td>
			</tr>
			{if $flight.price2}
			<tr>
				<td>{tr key=flight_return_price}</td>
				<td>{$flight.price2}&nbsp;</td>
			</tr>
			{/if}
			{if $flight.price2}
			<tr>
				<td>{tr key=flight_description}</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" style="padding: 0px 20px 0px 20px;">{$flight.description}&nbsp;</td>
			</tr>
			{/if}
			<tr>
				<td>&nbsp;</td>
				<td><a href="{url o=flight m=order flight_id=$flight.id}">{tr key=flight_order}</a></td>
			</tr>
		</table>
	</div>
{foreachelse}
	<h3>{tr key='flight_no_offers_found'}</h3>
{/foreach}