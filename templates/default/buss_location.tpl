<div style="">
	<div class="accnav">
		<a href="{url o='main' m='index'}">Home</a> &raquo; 
		<a href="{url o='buss' m='index'}">{tr key="layout_buss"  class='layout'}</a> &raquo; 
		<a href="{url o='buss' m='continent' continent=$location.end_continent_code}">{$location.end_continent_title}</a>  &raquo; 
		<a href="{url o='buss' m='country' country=$location.end_country_code}">{$location.end_country_title}</a>  &raquo; 
		<a href="{url o='buss' m='region' region=$location.end_region_code}">{$location.end_region_title}</a>
	</div>
	<h3 class="acch3"><b style="color:#ff0000;">{$location.title}</b></h3>
	<div style="padding:5px;">
		<div style="float:left">
			<table class="buss_detail">
			<tr><td class="price">{tr key="buss_label_price1"}</td><td>{$location.price1} {$location.currency_title}</td></tr>
			{if $location.price2 > 0}
				<tr><td class="price">{tr key="buss_label_price2"}</td><td>{$location.price2} {$location.currency_title}</td></tr>
			{/if}
		</table>
		</div>
		<div style="float:right" class="reservation"><a href="{url o='reservation' m='index' type=busses id=$location.id}">{tr key="buss_reservation"} {$location.title}</a></div>
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
		<h3 class="acch3">{tr key="buss_title_location"}</h3>
		<table class="detail">
			<tr><td class="label">{tr key="buss_label_start_region"}</td><td>{$location.start_region_title}</td></tr>
			<tr><td class="label">{tr key="buss_label_start_country"}</td><td>{$location.start_country_title}</td></tr>
			<tr><td class="label">{tr key="buss_label_end_region"}</td><td>{$location.end_region_title}</td></tr>
			<tr><td class="label">{tr key="buss_label_end_country"}</td><td>{$location.end_country_title}</td></tr>
		</table>
	</div>
	<h3 class="acch3">{tr key="buss_title_description"}</h3>
	<div>{$location.description|escape:"br"}</div>
	{if $locations_count > 1}
		
			<div>
				<h3 class="continent">{tr key="buss_title_other_busses"} {$location.end_region_title}, {$location.end_country_title}, {$location.end_continent_title}</h3>
				{foreach from=$locations item=new_location}
				{if $new_location.code != $location.code}
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px;"><a href="{url o='buss' m='location' location=$new_location.code region=$new_location.end_region_code}" title="{$new_location.title}">{$new_location.title|truncate:100}</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbodyreg">
						<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="buss_price"} {$new_location.price} {$new_location.currency_title}</span></div>													
						<div style="height:100px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.description|strip_tags|truncate:400}</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				{/if}
				{/foreach}
			</div>
	{/if}
</div>