<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ro" lang="ro" dir="ltr">
	<head>
	<title>{$meta.metatitle}</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<meta http-equiv="keywords" content="{$meta.metakeywords}" />
	<meta http-equiv="description" content="{$meta.metadescription}" />
	{if $layout_domain.domain == 'oferta-vacanta.ro'}
		<meta name="verify-v1" content="cqzIYs7A+obnKeQtGeKzFnAdlW4qria65wToqrHdCQQ=" />
	{/if}
	{if $layout_domain.domain == 'avionbilet.ro'}
		<meta name="verify-v1" content="+em4e75psn1H2vOgr643OOaDEuEY3f0a/IQMVycS+Tk=" />
	{/if}
	{if $layout_domain.domain == 'oferteinbulgaria.ro'}
		<meta name="verify-v1" content="0erwHb3awOYqVJzDm347DhbmkrC08dQU8DlgZdvI8Es=" />
	{/if}
	 
	<script type="text/javascript" src="/javascript/com_gallery/jquery.js"></script>
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_accommodation' class='layout'}" href="{url o='accommodation' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_vacation' class='layout'}" href="{url o='vacation' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_flight' class='layout'}" href="{url o='flight' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_bus' class='layout'}" href="{url o='bus' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_vacation-charter' class='layout'}" href="{url o='vacation-charter' m='rss'}" />
	<script type="text/javascript" src="/javascript/com_gallery/thickbox.js"></script>
	{if $region > '' && $layout_domain.mapkey > ''}
		<script src="http://maps.google.com/maps?file=api&v=2&key={$layout_domain.mapkey}" type="text/javascript"></script>
		<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0" type="text/javascript"></script>
		<script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script> 
	{literal}
	<script type="text/javascript">
    var map = null;
    var geocoder = null;

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 13);
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              document.getElementById('map').style.display = 'none';
            } else {
              map.setCenter(point, 13);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address);
            }
          }
        );
      }
    }
    </script>
    {/literal}
    {/if}
	<link rel="stylesheet" href="/javascript/com_gallery/thickbox.css" type="text/css" media="screen" />	
	<link rel="stylesheet" href="{$smarty.const.LOCAL_URL}style.css?rand={$rand}" type="text/css" media="all" />
</head>
<body  {if $has_region > ''}onload="initialize();showAddress('{$region.code}');" onunload="GUnload()"{/if}>
<h1 class="title">{$meta.title}</h1>
<div class="topzone">
	<div  style="position:relative;">
    	<div style="position:absolute; left:0px; top:0px;"><img src="{$img_path}logo.jpg" alt="{$layout_domain.title} - {tr key='main_title' class='main'}"></div>
	</div>
	<div class="navtop-spacer"><!-- --></div>
	
	<div class="navtop">
		<a href="{url o='main' m='index'}">{tr key='layout_home' class='layout'}</a>
		<a href="{url o='accommodation' m='index'}">{tr key='layout_accommodation' class='layout'}</a>
		<a href="{url o='vacation' m='index'}">{tr key='layout_vacation' class='layout'}</a>
		<a href="{url o='flight' m='index'}">{tr key='layout_flight' class='layout'}</a>
		<a href="{url o='buss' m='index'}">{tr key='layout_buss' class='layout'}</a>
		<a href="{url o='charter' m='index'}">{tr key='layout_charter' class='layout'}</a>
		<a href="{url o='contact' m='index'}">{tr key='layout_contact' class='layout'}</a>
		<a href="{url o='news' m='index'}">{tr key='layout_news' class='layout' page=0 param1=index}</a>
	</div>
</div>

<table cellpadding="0"  cellspacing="0" class="page">
<tr>
	{if $meta.widthLeftBox}
	<td  class="right-box">
		<div class="right-box-top">
			<img src="{$img_path}regiuni_header.jpg" alt="{tr key='layout_regions' class='layout'}" title="{tr key='layout_regions' class='layout'}" />
		</div>
		<div class="right-box-body" style="text-align:center;">
			<div class="regions">
				{foreach from=$meta.regions item=region key=region_code}
					<div class="region">
						<div><a href="{$region.url}" title="{$region.title}">{$region.title}({$region.count})</a></div>
					</div>
				{/foreach}
			</div>
		</div>
		<div class="right-box-separator"><span></span></div>
		<div class="right-box-top">
			<img src="{$img_path}parteneri_header.jpg" alt="{tr key='layout_partners' class='layout'}" title="{tr key='layout_partners' class='layout'}" />
		</div>
		<div class="right-box-body" style="text-align:center;">
			<div class="partners">
				{foreach from=$layout_domains item=domain key=domain_code}
					<div class="partner">
						<div><a href="http://www.{$domain.domain}" title="{$domain.title}">{$domain.title}</a></div>
					</div>
				{/foreach}
			</div>
		</div>		
	</td>
	{/if}
	<td class="{if $meta.widthRightBox==1}smallcontent{else}content{/if}">
		<div class="search">
			<form action="{url o='search' m='index'}">
				<div style="background:#99CCFF; padding:5px;text-align:center;">
					<input type="text" name="q" style="width:300px;" value="{$q}"/>
					<input type="submit" value="{tr key='layout_search_button_label' class='layout'}"/>
				</div>
			</form>
		</div>
		{$page_content}
	</td>
	{if $meta.widthRightBox}
	<td  class="right-box">
		<div class="right-box-contact">
			<div class="right-box-contact-top"><img src="{$img_path}contact_header.jpg" alt="{tr key='layout_contact' class='layout'}" title="{tr key='layout_contact' class='layout'}" /></div>
			<div class="contact">		
                    <table cellspacing="2" cellpadding="0" summary="{tr key='layout_contact' class='layout'}" style="text-align:center;">
                    <tr><td colspan="2"><a href="mailto:office@q-travel.ro"><b style="color:#ff0000; font-size:13px;">office@q-travel.ro</b></a></td></tr>
                    <tr><td>Telefon:</td><td><b>O21 31O OO 15</b></td></tr>
                    <tr><td>Telefon:</td><td><b>O31 1OO 59 3O</b></td></tr>
                    <tr><td>Fax:</td><td><b>O31 1OO 59 29</b></td></tr>
                    <tr><td colspan="2">Str. Popa Tatu, Nr. 63<br/>Sector 1, Bucuresti</td></tr>
                    <tr><td colspan="2"><a href="{$img_path}harta.jpg"><img src="{$img_path}hartamica.jpg" alt="Harta"/></a></td></tr>
                    <tr><td colspan="2"><a href="{$img_path}harta.jpg"><b>Click aici </b></a></td></tr>
                    </table>
			</div>
		</div>
		<div class="right-box-separator"><span></span></div>
		<div class="right-box-top">
			<img src="{$img_path}destinatii_header.jpg" alt="{tr key='layout_special' class='layout'}" title="{tr key='layout_special' class='layout'}" />
		</div>
		<div class="right-box-body">
			<div class="destinatii">
				<table cellspacing="0" cellpadding="0" summary="{tr key='layout_special' class='layout'}" style="width:165px;">
				{foreach from=$GLOBALS.DESTINATIONS item=destination key=destination_code}
					<tr><td style="vertical-align:top; background: #EFF4FA; width:73px; height:79px;" rowspan="2"><a style="margin:0px;" href="{url o='accommodation' m='country' country=$destination_code}"><img style="width:73px; height:79px; border:0px; margin:0px;" alt="{$destination.title}" title="{$destination.title}" src="{$img_path}destinatii/{$destination_code}.jpg"/></a></td>
					<td style="background: #EFF4FA; text-align:left;"><a href="{url o='accommodation' m='country' country=$destination_code}"><b>{$destination.title}</b></a></td></tr>
					<tr><td style="text-align:left; vertical-align:top; height:55px; background: #EFF4FA;"><a href="{url o='accommodation' m='country' country=$destination_code}" style="font-size:10px;">{$destination.description}</a></td></tr>
					<tr><td style="height:1px;"></td></tr>
				{/foreach}
				</table>
			</div>
		</div>
		<div class="right-box-separator"><span></span></div>
		<div class="right-box-body">
			<a href="http://www.qtravel.htlrs.net/"><img src="{$img_path}rezervari_hotel_online.gif" alt="{tr key='layout_rezervari_hotel_online' class='layout'}" title="{tr key='layout_rezervari_hotel_online' class='layout'}" style="border:0px;"/></a>
		</div>
		<div class="right-box-separator"><span></span></div>
		{if !$meta.widthLeftBox}
			<div class="right-box-separator"><span></span></div>
			<div class="right-box-top">
				<img src="{$img_path}parteneri_header.jpg" alt="{tr key='layout_partners' class='layout'}" title="{tr key='layout_partners' class='layout'}" />
			</div>
			<div class="right-box-body" style="text-align:center;">
				<div class="partners">
					{foreach from=$layout_domains item=domain key=domain_code}
						<div class="partner">
							<div><a href="http://www.{$domain.domain}" title="{$domain.title}">{$domain.title}</a></div>
						</div>
					{/foreach}
				</div>
			</div>
		{/if}
		<div class="right-box-separator"><span></span></div>
		<div>{$layout_domain.stats}</div>	
	</td>
	{/if}
</tr>	
</table>
<div class="bottomzone">
	<div class="navbottom">
		{foreach from=$layout_pages item=link}
			<a href="{$link.link}" title="{$link.metatitle}">{$link.title}</a>
		{/foreach}		
	</div>
	
	<div style="padding:5px;padding-left:10px;padding-right:10px;text-align:center;">
	<strong><a href="{$meta.metalink}" title="{$meta.metatitle}">{$meta.metatitle}</a></strong><br/>		
	{foreach from=$meta.links.regions item=link}
		<a href="{$link.url}" title="{$link.metatitle}">{$link.title}</a>
	{/foreach}	
	</div>
	
	<div style="padding:5px;padding-left:10px;padding-right:10px;text-align:center;">
	{foreach from=$meta.links.countries item=link}
		<a href="{$link.url}" title="{$link.metatitle}">{$link.title}</a>
	{/foreach}	
	</div>
	
	<div style="padding:5px;padding-left:10px;padding-right:10px;text-align:center;">
	    <script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-5206046-1");
		pageTracker._trackPageview();
		</script>
  	</div>
</div>
</body>
</html>