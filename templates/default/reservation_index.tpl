<div style="margin:5px;">
	{if $type == 'accommodations'}
		<div class="accnav">
			<a href="{url o='main' m='index'}">Home</a> &raquo; 
			<a href="{url o='accommodation' m='index'}">{tr key="layout_accommodation"  class='layout'}</a> &raquo; 
			<a href="{url o='accommodation' m='continent' continent=$location.continent_code}">{$location.continent_title}</a>  &raquo; 
			<a href="{url o='accommodation' m='country' country=$location.country_code}">{$location.country_title}</a>  &raquo; 
			<a href="{url o='accommodation' m='region' region=$location.region_code country=$location.country_code}">{$location.region_title}</a>
		</div>
	{/if}
	{if $type == 'busses'}
		<div class="accnav">
			<a href="{url o='main' m='index'}">Home</a> &raquo; 
			<a href="{url o='buss' m='index'}">{tr key="layout_buss"  class='layout'}</a> &raquo; 
			<a href="{url o='buss' m='continent' continent=$location.end_continent_code}">{$location.end_continent_title}</a>  &raquo; 
			<a href="{url o='buss' m='country' country=$location.end_country_code}">{$location.end_country_title}</a>  &raquo; 
			<a href="{url o='buss' m='region' region=$location.end_region_code}">{$location.end_region_title}</a>
		</div>
	{/if}
	{if $type == 'charters'}
		<div class="accnav">
			<a href="{url o='main' m='index'}">Home</a> &raquo; 
			<a href="{url o='charter' m='index'}">{tr key="layout_charter"  class='layout'}</a> &raquo; 
			<a href="{url o='charter' m='continent' continent=$location.continent_code}">{$location.continent_title}</a>  &raquo; 
			<a href="{url o='charter' m='country' country=$location.country_code}">{$location.country_title}</a>  &raquo; 
			<a href="{url o='charter' m='region' region=$location.region_code}">{$location.region_title}</a>
		</div>
	{/if}
	{if $type == 'flights'}
		<div class="accnav">
			<a href="{url o='main' m='index'}">Home</a> &raquo; 
			<a href="{url o='flight' m='index'}">{tr key="layout_flight"  class='layout'}</a> &raquo; 
			<a href="{url o='flight' m='continent' continent=$location.end_continent_code}">{$location.end_continent_title}</a>  &raquo; 
			<a href="{url o='flight' m='country' country=$location.end_country_code}">{$location.end_country_title}</a>  &raquo; 
			<a href="{url o='flight' m='region' region=$location.end_region_code}">{$location.end_region_title}</a>
		</div>
	{/if}
	{if $type == 'vacations'}
		<div class="accnav">
			<a href="{url o='main' m='index'}">Home</a> &raquo; 
			<a href="{url o='vacation' m='index'}">{tr key="layout_vacation"  class='layout'}</a> &raquo; 
			<a href="{url o='vacation' m='continent' continent=$location.continent_code}">{$location.continent_title}</a>  &raquo; 
			<a href="{url o='vacation' m='country' country=$location.country_code}">{$location.country_title}</a>  &raquo; 
			<a href="{url o='vacation' m='region' region=$location.region_code}">{$location.region_title}</a>
		</div>
	{/if}
	<h3 class="acch3">{$type_title} <b style="color:#ff0000;">{$location.title}</b>
	{if $type == 'flights' || $type == 'busses'}
		
	{else}
		, {$location.region_title}, {$location.country_title}, {$location.continent_title}
	{/if}
	</h3>
	<div class="error">{$err}</div>
	{$form}
</div>

{if $type == 'accommodations'}
	<div style="margin:5px;">
		<h3 class="acch3">{tr key="accommodation_title_accommodation" class='accommodation'} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
		<div>
			<div style="float:left">
				<div><img src="{$img_path}star_{$location.accommodation_type_stars}.gif"  alt="{$location.accommodation_type_title}"/></div>					
			</div>
			<div class="clearer"><span></span></div>
		</div>
		<br/><br/>
		<div>
			{foreach from=$pics item=pic}
				<div style="float:left;width:120px;"><a class="thickbox" href="{$pic.thumb_url}" title="" rel="item-gal">{$pic.thumb}</a></div>		
			{/foreach}
			<div class="clearer"><span></span></div>
		</div>
		<div>{$location.location_description}</div>
		{if $prices_count > 0}
		<h3 class="acch3">{tr key="accommodation_title_prices" class='accommodation'} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>		
		{foreach from=$prices item=new_price_format}
			{assign var='price_single' value=0}
			{assign var='price_double' value=0}
			{assign var='price_3adult' value=0}
			{assign var='price_triple' value=0}
			{assign var='price_1child' value=0}
			{assign var='price_2child' value=0}
			{assign var='price_extra1' value=0}
			{assign var='price_extra2' value=0}
			{assign var='price_extra3' value=0}
			{assign var='w' value=0}
			{foreach from=$new_price_format.prices item=new_price}
				{if $new_price.price_single != -1}{assign var='price_single' value=1}{/if}
				{if $new_price.price_double != -1}{assign var='price_double' value=1}{/if}
				{if $new_price.price_3adult != -1}{assign var='price_3adult' value=1}{/if}
				{if $new_price.price_triple != -1}{assign var='price_triple' value=1}{/if}
				{if $new_price.price_1child != -1}{assign var='price_1child' value=1}{/if}
				{if $new_price.price_2child != -1}{assign var='price_2child' value=1}{/if}
				{if $new_price.price_extra1 != -1}{assign var='price_extra1' value=1}{/if}
				{if $new_price.price_extra2 != -1}{assign var='price_extra2' value=1}{/if}
				{if $new_price.price_extra3 != -1}{assign var='price_extra3' value=1}{/if}
			{/foreach}
			
			{if $price_single}{assign var='w' value="`$w+1`"}{/if}
			{if $price_double}{assign var='w' value="`$w+1`"}{/if}
			{if $price_3adult}{assign var='w' value="`$w+1`"}{/if}
			{if $price_triple}{assign var='w' value="`$w+1`"}{/if}
			{if $price_1child}{assign var='w' value="`$w+1`"}{/if}
			{if $price_2child}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra1}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra2}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra3}{assign var='w' value="`$w+1`"}{/if}
			
			<div style="font-weight:bold; color:#ff0000; padding:5px;">{$new_price_format.title}</div>
			<table class="prices" cellpadding="0" cellspacing="0">
			<tr>
				<td class="left header date">De la</td>
				<td class="left header date">Pana la</td>
				{if $price_single}<td class="right header w{$w}">{$location.price_single}</td>{/if}
				{if $price_double}<td class="right header w{$w}">{$location.price_double}</td>{/if}
				{if $price_3adult}<td class="right header w{$w}">{$location.price_3adult}</td>{/if}
				{if $price_triple}<td class="right header w{$w}">{$location.price_triple}</td>{/if}
				{if $price_1child}<td class="right header w{$w}">{$location.price_1child}</td>{/if}
				{if $price_2child}<td class="right header w{$w}">{$location.price_2child}</td>{/if}
				{if $price_extra1}<td class="right header w{$w}">{$location.price_extra1}</td>{/if}
				{if $price_extra2}<td class="right header w{$w}">{$location.price_extra2}</td>{/if}
				{if $price_extra3}<td class="right header w{$w}">{$location.price_extra3}</td>{/if}
			</tr>
			{foreach from=$new_price_format.prices item=new_price}
				<tr>
					<td class="left">{$new_price.date_start_format}</td>
					<td class="left">{$new_price.date_end_format}</td>
					{if $price_single}<td class="right">{$new_price.price_single_format}</td>{/if}
					{if $price_double}<td class="right">{$new_price.price_double_format}</td>{/if}
					{if $price_3adult}<td class="right">{$new_price.price_3adult_format}</td>{/if}
					{if $price_triple}<td class="right">{$new_price.price_triple_format}</td>{/if}
					{if $price_1child}<td class="right">{$new_price.price_1child_format}</td>{/if}
					{if $price_2child}<td class="right">{$new_price.price_2child_format}</td>{/if}
					{if $price_extra1}<td class="right">{$new_price.price_extra1_format}</td>{/if}
					{if $price_extra2}<td class="right">{$new_price.price_extra2_format}</td>{/if}
					{if $price_extra3}<td class="right">{$new_price.price_extra3_format}</td>{/if}
				</td>
			{/foreach}
			</table>
			<br/><br/>
		{/foreach}
		<div>
		* Preturile sunt exprimate in 
		{if $location.currency_code == 'usd'}
			dolari ($)
		{elseif $location.currency_code == 'lei'}
			lei (RON)
		{else }
			euro (&euro;)
		{/if}
		</div>
		{/if}
		<div>{$location.description|escape:"br"}</div>
		{if $locations_count > 1}
			<div>
				<h3 class="acch3">{tr key='accommodation_title_other_accommodations'  class='accommodation'} {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
				{foreach from=$locations item=new_location}
				{if $new_location.code != $location.code}
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px;"><a href="{url o='accommodation' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.title}</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbodyreg">
						<div style="float:left;width:110px; text-align:center;">
							<div style="width:80px;margin:auto;margin-bottom:3px;"><img src="{$img_path}star_{$location.accommodation_type_stars}.gif"  alt="{$location.accommodation_type_title}"/></div>						
							<div class="accthumb"><a href="{url o='accommodation' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price">{tr key='"accommodation_price'  class='accommodation'} {$new_location.price} {$new_location.currency_title}</span></div>													
						<div style="margin-left: 110px;">{$new_location.location_description|strip_tags|truncate:320}</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				{/if}
				{/foreach}
			</div>
		{/if}
	</div>
{/if}
{if $type == 'busses'}
	<div style="margin:5px;">		
		<h3 class="acch3"><b style="color:#ff0000;">{$location.title}</b></h3>
		<div style="padding:5px;">
			<div style="float:left">
				<table class="buss_detail">
					<tr><td class="price">{tr key="buss_label_price1" class='buss'}</td><td>{$location.price1} {$location.currency_title}</td></tr>
					{if $location.price2 > 0}
						<tr><td class="price">{tr key="buss_label_price2" class='buss'}</td><td>{$location.price2} {$location.currency_title}</td></tr>
					{/if}
				</table>
			</div>
			<div class="clearer"><span></span></div>
		</div>
		<div>
			<h3 class="acch3">{tr key="buss_title_location" class="buss"}</h3>
			
			<table class="detail">
				<tr><td class="label">{tr key="buss_label_start_region" class="buss"}</td><td>{$location.start_region_title}</td></tr>
				<tr><td class="label">{tr key="buss_label_start_country" class="buss"}</td><td>{$location.start_country_title}</td></tr>
				<tr><td class="label">{tr key="buss_label_end_region" class="buss"}</td><td>{$location.end_region_title}</td></tr>
				<tr><td class="label">{tr key="buss_label_end_country" class="buss"}</td><td>{$location.end_country_title}</td></tr>
			</table>
		</div>
		<h3 class="acch3">{tr key="buss_title_description" class="buss"}</h3>
		<div>{$location.description|escape:"br"}</div>
		{if $locations_count > 1}			
				<div>
					<h3 class="continent">{tr key="buss_title_other_busses" class="buss"} {$location.end_region_title}, {$location.end_country_title}, {$location.end_continent_title}</h3>
					{foreach from=$locations item=new_location}
					{if $new_location.code != $location.code}
					<div class="acc">
						<div class="acctitle">
							<div style="float:left; height:16px;"><a href="{url o='buss' m='location' location=$new_location.code region=$new_location.end_region_code}" title="{$new_location.title}">{$new_location.title|truncate:100}</a></div>
							<div class="clearer"><span></span></div>
						</div>
						<div class="accbodyreg">
							<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="buss_price" class="buss"} {$new_location.price} {$new_location.currency_title}</span></div>													
							<div style="height:100px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.description|strip_tags|truncate:400}</div>
							<div class="clearer"><span></span></div>
						</div>
					</div>
					{/if}
					{/foreach}
				</div>
		{/if}
	</div>
{/if}
{if $type == 'charters'}
	<div style="margin:5px;">		
		<h3 class="acch3">{tr key="charter_title_charter" class="charter"} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
		<div style="padding:5px;">
			<div style="float:left">
				<div><img src="{$img_path}star_{$location.accommodation_type_stars}.gif"  alt="{$location.accommodation_type_title}"/></div>					
			</div>
			<div class="clearer"><span></span></div>
		</div>
		<br/><br/>
		<div>
			{foreach from=$pics item=pic}
				<div style="float:left;width:120px;"><a class="thickbox" href="{$pic.thumb_url}" title="" rel="item-gal">{$pic.thumb}</a></div>		
			{/foreach}
			<div class="clearer"><span></span></div>
		</div>
		<div>{$location.location_description}</div>
		{if $prices_count > 0}
		<h3 class="acch3">{tr key="charter_title_prices" class='charter'} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
		{foreach from=$prices item=new_price_format}
			{assign var='price_single' value=0}
			{assign var='price_double' value=0}
			{assign var='price_3adult' value=0}
			{assign var='price_triple' value=0}
			{assign var='price_1child' value=0}
			{assign var='price_2child' value=0}
			{assign var='price_extra1' value=0}
			{assign var='price_extra2' value=0}
			{assign var='price_extra3' value=0}
			{assign var='w' value=0}
			{foreach from=$new_price_format.prices item=new_price}
				{if $new_price.price_single != -1}{assign var='price_single' value=1}{/if}
				{if $new_price.price_double != -1}{assign var='price_double' value=1}{/if}
				{if $new_price.price_3adult != -1}{assign var='price_3adult' value=1}{/if}
				{if $new_price.price_triple != -1}{assign var='price_triple' value=1}{/if}
				{if $new_price.price_1child != -1}{assign var='price_1child' value=1}{/if}
				{if $new_price.price_2child != -1}{assign var='price_2child' value=1}{/if}
				{if $new_price.price_extra1 != -1}{assign var='price_extra1' value=1}{/if}
				{if $new_price.price_extra2 != -1}{assign var='price_extra2' value=1}{/if}
				{if $new_price.price_extra3 != -1}{assign var='price_extra3' value=1}{/if}
			{/foreach}
			
			{if $price_single}{assign var='w' value="`$w+1`"}{/if}
			{if $price_double}{assign var='w' value="`$w+1`"}{/if}
			{if $price_3adult}{assign var='w' value="`$w+1`"}{/if}
			{if $price_triple}{assign var='w' value="`$w+1`"}{/if}
			{if $price_1child}{assign var='w' value="`$w+1`"}{/if}
			{if $price_2child}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra1}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra2}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra3}{assign var='w' value="`$w+1`"}{/if}
			
			<div style="font-weight:bold; color:#ff0000; padding:5px;">{$new_price_format.title}</div>
			<table class="prices" cellpadding="0" cellspacing="0">
			<tr>
				<td class="left header date">De la</td>
				<td class="left header date">Pana la</td>
				{if $price_single}<td class="right header w{$w}">{$location.price_single}</td>{/if}
				{if $price_double}<td class="right header w{$w}">{$location.price_double}</td>{/if}
				{if $price_3adult}<td class="right header w{$w}">{$location.price_3adult}</td>{/if}
				{if $price_triple}<td class="right header w{$w}">{$location.price_triple}</td>{/if}
				{if $price_1child}<td class="right header w{$w}">{$location.price_1child}</td>{/if}
				{if $price_2child}<td class="right header w{$w}">{$location.price_2child}</td>{/if}
				{if $price_extra1}<td class="right header w{$w}">{$location.price_extra1}</td>{/if}
				{if $price_extra2}<td class="right header w{$w}">{$location.price_extra2}</td>{/if}
				{if $price_extra3}<td class="right header w{$w}">{$location.price_extra3}</td>{/if}
			</tr>
			{foreach from=$new_price_format.prices item=new_price}
				<tr>
					<td class="left">{$new_price.date_start_format}</td>
					<td class="left">{$new_price.date_end_format}</td>
					{if $price_single}<td class="right">{$new_price.price_single_format}</td>{/if}
					{if $price_double}<td class="right">{$new_price.price_double_format}</td>{/if}
					{if $price_3adult}<td class="right">{$new_price.price_3adult_format}</td>{/if}
					{if $price_triple}<td class="right">{$new_price.price_triple_format}</td>{/if}
					{if $price_1child}<td class="right">{$new_price.price_1child_format}</td>{/if}
					{if $price_2child}<td class="right">{$new_price.price_2child_format}</td>{/if}
					{if $price_extra1}<td class="right">{$new_price.price_extra1_format}</td>{/if}
					{if $price_extra2}<td class="right">{$new_price.price_extra2_format}</td>{/if}
					{if $price_extra3}<td class="right">{$new_price.price_extra3_format}</td>{/if}
				</td>
			{/foreach}
			</table>
			<br/><br/>
		{/foreach}
		<div>
		* Preturile sunt exprimate in 
		{if $location.currency_code == 'usd'}
			dolari ($)
		{elseif $location.currency_code == 'lei'}
			lei (RON)
		{else }
			euro (&euro;)
		{/if}
		</div>
		{/if}	
		<div>{$location.description|escape:"br"}</div>
		{if $locations_count > 1}
			<div>
				<h3 class="acch3">{tr key="charter_title_other_charters" class="charter"} {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
				{foreach from=$locations item=new_location}
				{if $new_location.code != $location.code}
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px;"><a href="{url o='charter' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.title}</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbodyreg">
						<div style="float:left;width:110px; text-align:center;">
							<div style="width:80px;margin:auto;margin-bottom:3px;margin-top:6px;"><img src="{$img_path}star_{$location.accommodation_type_stars}.gif"  alt="{$location.accommodation_type_title}"/></div>						
							<div class="accthumb"><a href="{url o='charter' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="charter_price" class="charter"} {$new_location.price} {$new_location.currency_title}</span></div>													
						<div style="margin-left: 110px;">{$new_location.location_description|strip_tags|truncate:320}</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				{/if}
				{/foreach}
			</div>
		{/if}
	</div>
{/if}
{if $type == 'flights'}
	<div style="margin:5px;">
		<h3 class="acch3"><b style="color:#ff0000;">{$location.title}</b></h3>
		<div style="padding:5px;">
			<div style="float:left">
				<table class="flight_detail">
				{if $location.price1 > 0}
					<tr><td class="price">{tr key="flight_label_price1" class='flight'}</td><td>{$location.price1} {$location.currency_title}</td></tr>
				{/if}
				{if $location.price2 > 0}
					<tr><td class="price">{tr key="flight_label_price2" class='flight'}</td><td>{$location.price2} {$location.currency_title}</td></tr>
				{/if}
			</table>
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
			<h3 class="acch3">{tr key='flight_title_location'  class='flight'"}</h3>
			<table class="flight_detail">
				<tr><td class="label">{tr key="flight_label_start_region" class="flight"}</td><td>{$location.start_region_title}</td></tr>
				<tr><td class="label">{tr key="flight_label_start_country" class="flight"}</td><td>{$location.start_country_title}</td></tr>
				<tr><td class="label">{tr key="flight_label_end_region" class="flight"}</td><td>{$location.end_region_title}</td></tr>
				<tr><td class="label">{tr key="flight_label_end_country" class="flight"}</td><td>{$location.end_country_title}</td></tr>
			</table>
			<br/>
			<b>{tr key="flight_description_bottom_message" class="flight"}</b>
			<br/>
		</div>
		<h3 class="acch3">{tr key="flight_title_description" class="flight"}</h3>
		<div>{$location.description|escape:"br"}</div>
		{if $locations_count > 1}
			<div>
				<h3 class="acch3">{tr key="flight_title_other_flights" class="flight"} {$location.end_region_title}, {$location.end_country_title}, {$location.end_continent_title}</h3>
				{foreach from=$locations item=new_location}
				{if $new_location.code != $location.code}
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px; width:360px;"><a href="{url o='flight' m='location' location=$new_location.code region=$new_location.end_region_code}" title="{$new_location.title}">{$new_location.title|truncate:100}</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbody">
						<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="flight_price" class="flight"} {$new_location.price2} {$new_location.currency_title}</span></div>													
						<div style="height:75px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.description|strip_tags|truncate:400}</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				{/if}
				{/foreach}
			</div>
		{/if}
	</div>
{/if}
{if $type == 'vacations'}
	<div style="margin:5px;">
		<h3 class="acch3">{tr key="vacation_title_vacation" class="vacation"} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
		<div>
			{foreach from=$pics item=pic}
				<div style="float:left;width:120px;"><a class="thickbox" href="{$pic.thumb_url}" title="" rel="item-gal">{$pic.thumb}</a></div>		
			{/foreach}
			<div class="clearer"><span></span></div>
		</div>
		<br/><br/>
		<div>{$location.location_description}</div>
		{if $prices_count > 0}
		<h3 class="acch3">{tr key="vacation_title_prices" class='vacation'} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>		
		{foreach from=$prices item=new_price_format}
			{assign var='price_single' value=0}
			{assign var='price_double' value=0}
			{assign var='price_3adult' value=0}
			{assign var='price_triple' value=0}
			{assign var='price_1child' value=0}
			{assign var='price_2child' value=0}
			{assign var='price_extra1' value=0}
			{assign var='price_extra2' value=0}
			{assign var='price_extra3' value=0}
			{assign var='w' value=0}
			{foreach from=$new_price_format.prices item=new_price}
				{if $new_price.price_single != -1}{assign var='price_single' value=1}{/if}
				{if $new_price.price_double != -1}{assign var='price_double' value=1}{/if}
				{if $new_price.price_3adult != -1}{assign var='price_3adult' value=1}{/if}
				{if $new_price.price_triple != -1}{assign var='price_triple' value=1}{/if}
				{if $new_price.price_1child != -1}{assign var='price_1child' value=1}{/if}
				{if $new_price.price_2child != -1}{assign var='price_2child' value=1}{/if}
				{if $new_price.price_extra1 != -1}{assign var='price_extra1' value=1}{/if}
				{if $new_price.price_extra2 != -1}{assign var='price_extra2' value=1}{/if}
				{if $new_price.price_extra3 != -1}{assign var='price_extra3' value=1}{/if}
			{/foreach}
			
			{if $price_single}{assign var='w' value="`$w+1`"}{/if}
			{if $price_double}{assign var='w' value="`$w+1`"}{/if}
			{if $price_3adult}{assign var='w' value="`$w+1`"}{/if}
			{if $price_triple}{assign var='w' value="`$w+1`"}{/if}
			{if $price_1child}{assign var='w' value="`$w+1`"}{/if}
			{if $price_2child}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra1}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra2}{assign var='w' value="`$w+1`"}{/if}
			{if $price_extra3}{assign var='w' value="`$w+1`"}{/if}
			
			<div style="font-weight:bold; color:#ff0000; padding:5px;">{$new_price_format.title}</div>
			<table class="prices" cellpadding="0" cellspacing="0">
			<tr>
				<td class="left header date">De la</td>
				<td class="left header date">Pana la</td>
				{if $price_single}<td class="right header w{$w}">{$location.price_single}</td>{/if}
				{if $price_double}<td class="right header w{$w}">{$location.price_double}</td>{/if}
				{if $price_3adult}<td class="right header w{$w}">{$location.price_3adult}</td>{/if}
				{if $price_triple}<td class="right header w{$w}">{$location.price_triple}</td>{/if}
				{if $price_1child}<td class="right header w{$w}">{$location.price_1child}</td>{/if}
				{if $price_2child}<td class="right header w{$w}">{$location.price_2child}</td>{/if}
				{if $price_extra1}<td class="right header w{$w}">{$location.price_extra1}</td>{/if}
				{if $price_extra2}<td class="right header w{$w}">{$location.price_extra2}</td>{/if}
				{if $price_extra3}<td class="right header w{$w}">{$location.price_extra3}</td>{/if}
			</tr>
			{foreach from=$new_price_format.prices item=new_price}
				<tr>
					<td class="left">{$new_price.date_start_format}</td>
					<td class="left">{$new_price.date_end_format}</td>
					{if $price_single}<td class="right">{$new_price.price_single_format}</td>{/if}
					{if $price_double}<td class="right">{$new_price.price_double_format}</td>{/if}
					{if $price_3adult}<td class="right">{$new_price.price_3adult_format}</td>{/if}
					{if $price_triple}<td class="right">{$new_price.price_triple_format}</td>{/if}
					{if $price_1child}<td class="right">{$new_price.price_1child_format}</td>{/if}
					{if $price_2child}<td class="right">{$new_price.price_2child_format}</td>{/if}
					{if $price_extra1}<td class="right">{$new_price.price_extra1_format}</td>{/if}
					{if $price_extra2}<td class="right">{$new_price.price_extra2_format}</td>{/if}
					{if $price_extra3}<td class="right">{$new_price.price_extra3_format}</td>{/if}
				</td>
			{/foreach}
			</table>
			<br/><br/>
		{/foreach}
		<div>
		* Preturile sunt exprimate in 
		{if $location.currency_code == 'usd'}
			dolari ($)
		{elseif $location.currency_code == 'lei'}
			lei (RON)
		{else }
			euro (&euro;)
		{/if}
		</div>
		{/if}
		<div>{$location.description|escape:"br"}</div>
		{if $locations_count > 1}
			<div>
				<h3 class="acch3">{tr key="vacation_title_other_vacations" class="vacation"} {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
				{foreach from=$locations item=new_location}
				{if $new_location.code != $location.code}
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px;"><a href="{url o='vacation' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.title}</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbodyreg">
						<div style="float:left;width:110px; text-align:center;">
							<div style="width:80px;margin:auto;margin-bottom:3px;margin-top:6px;"><img src="{$img_path}star_{$new_location.accommodation_type_stars}.gif"  alt="{$new_location.accommodation_type_title}"/></div>					
							<div class="accthumb"><a href="{url o='vacation' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="vacation_price" class="vacation"} {$new_location.price} {$new_location.currency_title}</span></div>													
						<div style="margin-left: 110px;">{$new_location.location_description|strip_tags|truncate:320}</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				{/if}
				{/foreach}
			</div>
		{/if}
	</div>
{/if}