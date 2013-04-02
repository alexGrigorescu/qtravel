<style>
{literal}
.acc_title {
	display: block;
	border-bottom: 1px solid red;
	text-decoration: none;
	font-weight: bold;
	padding: 10px 0px 5px 0px;
}

a.country { color: #ff0000;}
div.acc { margin:2px; width:368px; border:0px solid #ff0000; float:left;}
div.acc a {font-weight:bold; padding:2px;}
div.acc a:hover {}
div.acc span.price {color: #ff0000;font-weight: bold; color:#ff0000;}
div.acc div.acctitle {border:1px solid #EBEBEB; padding:3px; padding-left:10px; background:url({/literal}{$img_path}{literal}mainbar_off.gif);}
div.acc div.accbody {border:1px solid #EBEBEB; border-top:0px; padding:2px; background-color:#F3F3F3; height:120px;}
div.acc div.accthumb {padding:4px; margin:0px;}
div.acc div.accthumb img {border:2px solid #ccc;}
div.acc div.accthumb a {}
div.acc div.accthumb a:hover {}
{/literal}
</style>
<a href="{url o='main' m='index'}">Home</a> &raquo; 
<a href="{url o='buss' m='index'}">{tr key="layout_buss"  class='layout'}</a> &raquo; 
<a href="{url o='buss' m='continent' continent=$region.continent_code}">{$region.continent_title}</a>  &raquo; 
<a href="{url o='buss' m='country' country=$region.country_code}">{$region.country_title}</a>  &raquo; 
<a href="{url o='buss' m='region' region=$region.code}">{$region.title}</a> 

<h3 class="acc_title">{tr key="buss_title_country_busses"}  {$region.title}, {$region.country_title}, {$region.continent_title} </h3>
<div style="margin:5px;">
	{foreach from=$locations item=location}
		<div class="acc">
			<div class="acctitle">
				<div style="float:left; height:16px; width:360px;"><a href="{url o='buss' m='location' location=$location.code}" title="{$location.title}">{$location.title|truncate:100}</a></div>
				<div class="clearer"><span></span></div>
			</div>
			<div class="accbody">
				<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="buss_price"} {$location.price1} {$location.currency_title}</span></div>													
				<div style="width:360px; height:100px; padding:0px; padding-left:10px;border:0px solid #EBEBEB; ">{$location.description|strip_tags|truncate:400}</div>
				<div class="clearer"><span></span></div>
			</div>
		</div>
	{/foreach}
	<div class="clearer"><span></span></div>
</div>

{if $region.description > ''}
	<div style="margin:5px;">	
		<div>
			<h3 class="acc_title">{tr key="buss_title_region_description"}  {$region.title}, {$region.country_title}, {$region.continent_title}</h3>
			{$region.description}
		</div>
	</div>
{/if}