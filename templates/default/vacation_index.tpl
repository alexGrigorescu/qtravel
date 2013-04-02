<style>
{literal}
.continent {
	display: block;
	border-bottom: 1px solid red;
	text-decoration: none;
	font-weight: bold;
	padding: 10px 0px 5px 0px;
}

.country {
	
}

div.acc { margin:2px; width:368px; border:0px solid #ff0000; float:left;}
div.acc a {font-weight:bold; color:#000; padding:2px; text-decoration:none;}
div.acc a:hover {font-weight:bold; color:#ff0000;}
div.acc span.price {color: #ff0000;font-weight: bold;}
div.acc div.acctitle {border:1px solid #EBEBEB; padding:3px; padding-left:10px; background:url({/literal}{$img_path}{literal}mainbar_off.gif);}
div.acc div.accbody {border:1px solid #EBEBEB; border-top:0px; padding:2px; background-color:#F3F3F3; height:87px;}
div.acc div.accthumb {padding:4px; margin:0px;}
div.acc div.accthumb img {border:2px solid #ccc;}
div.acc div.accthumb a {}
div.acc div.accthumb a:hover {}

{/literal}
</style>
<a href="{url o='main' m='index'}">Home</a> &raquo; 
<a href="{url o='vacation' m='index'}">{tr key="layout_vacation"  class='layout'}</a>

{foreach from=$continents item=continent key=continent_code}
	<h3 class="continent">{$continent.title}</h3>
	<table style="width:100%" border="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		{foreach from=$continent.countries item=country name=countries}
			{if not $smarty.foreach.countries.first and $smarty.foreach.countries.iteration mod $continent.percolumn == 1}
			    </td><td style="vertical-align:top; width:33%;" >
			{/if}
			<div style="padding-top:1px;"><a class="country" href="{url o='vacation' m='country' country=$country.code}"> &raquo; <b>{$country.title}</b> ({$country.count})</a></div>			
		{/foreach}
	</td>
	</tr>
	</table>
{/foreach}

{if $locations_count > 1}
	<div style="margin:5px;">	
		<div>
			<h3 class="continent">{tr key="vacation_title_index_vacations"}</h3>
			{foreach from=$locations item=new_location}
			{if $new_location.code != $location.code}
			<div class="acc">
				<div class="acctitle">
					<div style="float:left; height:16px; width:240px; overflow:hidden;"><a href="{url o='vacation' m='location' region=$new_location.region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.title}</a></div>
					<div style="float:right;width:80px;"><img src="{$img_path}star_{$new_location.accommodation_type_stars}.gif"/></div>					
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbody">
					<div style="float:left;width:110px;">
						<div class="accthumb"><a href="{url o='vacation' m='location' region=$new_location.region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
					</div>
					<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="vacation_price"} {$new_location.price} {$new_location.currency_title}</span></div>													
					<div style="margin-left: 115px; height:75px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.location_description|strip_tags|truncate:240}</div>
					<div class="clearer"><span></span></div>
				</div>
			</div>
			{/if}
			{/foreach}
		</div>
	</div>
{/if}