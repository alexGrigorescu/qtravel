<div style="margin:5px;">
	<div class="accnav">
		<a href="{url o='main' m='index'}">Home</a> &raquo; 
		<a href="{url o='charter' m='index'}">{tr key="layout_charter"  class='layout'}</a> &raquo; 
		<a href="{url o='charter' m='continent' continent=$location.continent_code}">{$location.continent_title}</a>  &raquo; 
		<a href="{url o='charter' m='country' country=$location.country_code}">{$location.country_title}</a>  &raquo; 
		<a href="{url o='charter' m='region' region=$location.region_code}">{$location.region_title}</a>
	</div>
	<h3 class="acch3">{tr key="charter_title_charter"} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
	<div style="padding:5px;">
		<div style="float:left">
			<div><img src="{$img_path}star_{$location.accommodation_type_stars}.gif"  alt="{$location.accommodation_type_title}"/></div>					
			<div><span class="price">{tr key="charter_price"} {$location.price} {$location.currency_title}</span></div>													
		</div>
		<div style="float:right" class="reservation"><a href="{url o='reservation' m='index' type=charters id=$location.id}">{tr key="charter_reservation"} {$location.title}</a></div>
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
	<h3 class="acch3">{tr key="charter_title_prices"} <b style="color:#ff0000;">{$location.title}</b>, {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
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
			<h3 class="acch3">{tr key="charter_title_other_charters"} {$location.region_title}, {$location.country_title}, {$location.continent_title}</h3>
			{foreach from=$locations item=new_location}
			{if $new_location.code != $location.code}
			<div class="acc" style="width:100%;">
				<div class="acctitle">
					<div style="float:left; height:16px;"><a href="{url o='charter' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.title}</a></div>
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbodyreg" style="height:115px;">
					<div style="float:left;width:110px; text-align:center; padding-top:5px;">
						<div class="accthumb"><a href="{url o='charter' m='location' location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
					</div>
					<div style="text-align:right; padding:5px;">
						<div style="width:80px; float:left;"><img src="{$img_path}star_{$location.accommodation_type_stars}.gif"  alt="{$location.accommodation_type_title}"/></div>												
						<span class="price">{tr key="charter_price"} {$new_location.price} {$new_location.currency_title}</span>
					</div>													
					<div style="margin-left: 110px;">{$new_location.location_description|strip_tags|truncate:320}</div>
					<div class="clearer"><span></span></div>
				</div>
			</div>
			{/if}
			{/foreach}
		</div>
	{/if}
</div>