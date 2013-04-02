<div style="margin:5px;">
	<div class="accnav">
		<a href="{url o='main' m='index'}">Home</a> &raquo; 
		<a href="{url o='flight' m='index'}">{tr key="layout_flight"  class='layout'}</a> &raquo; 
		<a href="{url o='flight' m='continent' continent=$location.end_continent_code}">{$location.end_continent_title}</a>  &raquo; 
		<a href="{url o='flight' m='country' country=$location.end_country_code}">{$location.end_country_title}</a>  &raquo; 
		<a href="{url o='flight' m='region' region=$location.end_region_code}">{$location.end_region_title}</a>
	</div>
	<h3 class="acch3"><b style="color:#ff0000;">{$location.title}</b></h3>
	<div style="padding:5px;">
		<div style="float:right" class="reservation"><a href="{url o='reservation' m='index' type=flights id=$location.id}">{tr key="flight_reservation"} {$location.title}</a></div>
		<div class="clearer"><span></span></div>
		<div style="float:left">			
			<table class="flight_detail">
			<tr><td rowspan=4>{$location.flight_operator_1_thumb}</td></tr>
			<tr>
				<td style="vertical-align:top;">
				<table class="flight_detail">
					{if $location.flight_operator_2_id > 0}
						<tr><td style="width:120px;"><b>Operator:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.flight_operator_1_title}</td></tr>		
					{/if}
					{if $location.price1_1 > 0}
						<tr><td style="width:120px;"><b>Pret DUS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price1_1} {$location.currency_title}</td></tr>		
					{/if}
					<tr><td><b>Pret DUS-INTORS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price2_1} {$location.currency_title}</td></tr>				
					{if $location.stops_description_1 > ''}
						<tr><td><b>Escala:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.stops_description_1}</td></tr>		
					{/if}
				</table>
				</td>
			</tr>
			</table>
			
			{if $location.flight_operator_2_id > 0}
			<table class="flight_detail">
			<tr><td rowspan=4>{$location.flight_operator_2_thumb}</td></tr>
			<tr>
				<td style="vertical-align:top;">
				<table class="flight_detail">
					<tr><td style="width:120px;"><b>Operator:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.flight_operator_2_title}</td></tr>		
					{if $location.price1_2 > 0}
						<tr><td style="width:120px;"><b>Pret DUS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price1_2} {$location.currency_title}</td></tr>		
					{/if}
					<tr><td><b>Pret DUS-INTORS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price2_2} {$location.currency_title}</td></tr>				
					{if $location.stops_description_2 > ''}
						<tr><td><b>Escala:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.stops_description_2}</td></tr>		
					{/if}
				</table>
				</td>
			</tr>
			</table>
			{/if}
			
			{if $location.flight_operator_3_id > 0}
			<table class="flight_detail">
			<tr><td rowspan=4>{$location.flight_operator_3_thumb}</td></tr>
			<tr>
				<td style="vertical-align:top;">
				<table class="flight_detail">
					<tr><td style="width:120px;"><b>Operator:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.flight_operator_3_title}</td></tr>		
					{if $location.price1_3 > 0}
						<tr><td style="width:120px;"><b>Pret DUS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price1_3} {$location.currency_title}</td></tr>		
					{/if}
					<tr><td><b>Pret DUS-INTORS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price2_3} {$location.currency_title}</td></tr>				
					{if $location.stops_description_3 > ''}
						<tr><td><b>Escala:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.stops_description_3}</td></tr>		
					{/if}
				</table>
				</td>
			</tr>
			</table>
			{/if}
			
			{if $location.flight_operator_4_id > 0}
			<table class="flight_detail">
			<tr><td rowspan=4>{$location.flight_operator_4_thumb}</td></tr>
			<tr>
				<td style="vertical-align:top;">
				<table class="flight_detail">
					<tr><td style="width:120px;"><b>Operator:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.flight_operator_4_title}</td></tr>		
					{if $location.price1_4 > 0}
						<tr><td style="width:120px;"><b>Pret DUS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price1_4} {$location.currency_title}</td></tr>		
					{/if}
					<tr><td><b>Pret DUS-INTORS:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.price2_4} {$location.currency_title}</td></tr>				
					{if $location.stops_description_4 > ''}
						<tr><td><b>Escala:</b></td><td style="color:#ff0000; font-weight:bold;">{$location.stops_description_4}</td></tr>		
					{/if}
				</table>
				</td>
			</tr>
			</table>
			{/if}
		</div>
		<div class="clearer"><span></span></div>
	</div>
	<div>
		{foreach from=$pics item=pic}
			<div style="float:left;width:120px;"><a class="thickbox" href="{$pic.thumb_url}" title="" rel="item-gal">{$pic.thumb}</a></div>		
		{/foreach}
		<div class="clearer"><span></span></div>
	</div>
	<br/><br/>
	<div>
		<h3 class="acch3">{tr key="flight_title_location"}</h3>
		<table class="flight_detail">
			<tr><td class="label">{tr key="flight_label_start_region"}</td><td>{$location.start_region_title}</td></tr>
			<tr><td class="label">{tr key="flight_label_start_country"}</td><td>{$location.start_country_title}</td></tr>
			<tr><td class="label">{tr key="flight_label_end_region"}</td><td>{$location.end_region_title}</td></tr>
			<tr><td class="label">{tr key="flight_label_end_country"}</td><td>{$location.end_country_title}</td></tr>
		</table>
		<br/>
		<b>{tr key="flight_description_bottom_message"}</b>
		<br/>
	</div>
	<h3 class="acch3">{tr key="flight_title_description"}</h3>
	<div>{$location.description|escape:"br"}</div>
	{if $locations_count > 1}
		<div>
			<h3 class="acch3">{tr key="flight_title_other_flights"} {$location.end_region_title}, {$location.end_country_title}, {$location.end_continent_title}</h3>
			{foreach from=$locations item=new_location}
			{if $new_location.code != $location.code}
			<div class="acc">
				<div class="acctitle">
					<div style="float:left; height:16px; width:360px;"><a href="{url o='flight' m='location' location=$new_location.code region=$new_location.end_region_code}" title="{$new_location.title}">{$new_location.title|truncate:100}</a></div>
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbody">
					<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="flight_price"} {$new_location.price2} {$new_location.currency_title}</span></div>													
					<div style="height:75px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.description|strip_tags|truncate:400}</div>
					<div class="clearer"><span></span></div>
				</div>
			</div>
			{/if}
			{/foreach}
		</div>
	{/if}
</div>