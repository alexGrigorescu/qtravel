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

span.text {font-weight: normal; font-size:13px;}

div.acc { margin:2px; width:368px; border:0px solid #ff0000; float:left;}
div.acc a {font-weight:bold; padding:2px;}
div.acc a:hover {}
div.acc div.acctitle {border:1px solid #EBEBEB; padding:3px; padding-left:10px; background:url({/literal}{$img_path}{literal}mainbar_off.gif);}
{/literal}
</style>
<h3 class="continent">{$type_title} <b style="color:#ff0000;">{$location.title}</b>
{if $type == 'flights' || $type == 'busses'}
	
{else}
	, {$location.region_title}, {$location.country_title}, {$location.continent_title}
{/if}
</h3>
<div><span class="text">{tr key='reservation_thanks_message'}</span></div>
{literal}
<!-- Google Code for Rezervare hotel Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1037578189;
var google_conversion_language = "ro";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "qU56CInxkAIQzd_g7gM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1037578189/?label=qU56CInxkAIQzd_g7gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
{/literal}