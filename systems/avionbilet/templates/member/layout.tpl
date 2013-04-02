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
	<link rel="stylesheet" href="{$smarty.const.LOCAL_URL}style.css?rand={$rand}" type="text/css" media="all" /> 
	<script type="text/javascript" src="/javascript/com_gallery/jquery.js"></script>
	{if $layout_domain.code == 'oferta-vacanta'}
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_accommodation' class='layout'}" href="{url o='accommodation' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_vacation' class='layout'}" href="{url o='vacation' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_flight' class='layout'}" href="{url o='flight' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_bus' class='layout'}" href="{url o='bus' m='rss'}" />
	<link rel="alternate" type="application/atom+xml" title="{tr key='rss_vacation-charter' class='layout'}" href="{url o='vacation-charter' m='rss'}" />
	{/if}
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
	
</head>
<body  {if $has_region > ''}onload="initialize();showAddress('{$region.code}');" onunload="GUnload()"{/if}>
<h1 class="title">{$meta.title}</h1>
	<div id="page">
		<div id="header">
			<div id="meniu">
		    	<ul>
		        	<li><a href="{url o='main' m='index'}"><img onMouseOut="this.src='{$img_path}home{if $smarty.const.OBJ == 'main' || $smarty.const.OBJ == 'reservation' || $smarty.const.OBJ == 'search'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}home_h.jpg'" src="{$img_path}home{if $smarty.const.OBJ == 'main' || $smarty.const.OBJ == 'reservation' || $smarty.const.OBJ == 'search'}_h{/if}.jpg" border="0"/></a></li>
		        	{if $layout_domain.code != 'bilete-avion-ieftine'}
			        	{if $layout_domain.code == 'oferta-vacanta'}
				        	<li><a href="{url o='accommodation' m='index'}"><img onMouseOut="this.src='{$img_path}cazare{if $smarty.const.OBJ == 'accommodation'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}cazare_h.jpg'" src="{$img_path}cazare{if $smarty.const.OBJ == 'accommodation'}_h{/if}.jpg" border="0"/></a></li>
				            <li><a href="{url o='vacation' m='index'}"><img onMouseOut="this.src='{$img_path}sejururi{if $smarty.const.OBJ == 'vacation'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}sejururi_h.jpg'" src="{$img_path}sejururi{if $smarty.const.OBJ == 'vacation'}_h{/if}.jpg" border="0"/></a></li>
				        {else}
				        	<li><a href="{url o='accommodation' m='country' country='bulgaria'}"><img onMouseOut="this.src='{$img_path}cazare{if $smarty.const.OBJ == 'accommodation'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}cazare_h.jpg'" src="{$img_path}cazare{if $smarty.const.OBJ == 'accommodation'}_h{/if}.jpg" border="0"/></a></li>
				            <li><a href="{url o='vacation' m='country' country='bulgaria'}"><img onMouseOut="this.src='{$img_path}sejururi{if $smarty.const.OBJ == 'vacation'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}sejururi_h.jpg'" src="{$img_path}sejururi{if $smarty.const.OBJ == 'vacation'}_h{/if}.jpg" border="0"/></a></li>
				        {/if}
		            {/if}
		            {if $layout_domain.code == 'bilete-avion-ieftine' || $layout_domain.code == 'oferta-vacanta'}
		            <li><a href="{url o='flight' m='index'}"><img onMouseOut="this.src='{$img_path}bileteavion{if $smarty.const.OBJ == 'flight'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}bileteavion_h.jpg'" src="{$img_path}bileteavion{if $smarty.const.OBJ == 'flight'}_h{/if}.jpg" border="0"/></a></li>
		            {/if}
		            {if $layout_domain.code == 'oferta-vacanta'}
		            <li><a href="{url o='buss' m='index'}"><img onMouseOut="this.src='{$img_path}bileteautocar{if $smarty.const.OBJ == 'buss'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}bileteautocar_h.jpg'" src="{$img_path}bileteautocar{if $smarty.const.OBJ == 'buss'}_h{/if}.jpg" border="0"/></a></li>
		            <li><a href="{url o='charter' m='index'}"><img onMouseOut="this.src='{$img_path}vacantecharter{if $smarty.const.OBJ == 'charter'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}vacantecharter_h.jpg'" src="{$img_path}vacantecharter{if $smarty.const.OBJ == 'charter'}_h{/if}.jpg" border="0"/></a></li>
		            {/if}
		            <li><a href="{url o='contact' m='index'}"><img onMouseOut="this.src='{$img_path}contact{if $smarty.const.OBJ == 'contact'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}contact_h.jpg'" src="{$img_path}contact{if $smarty.const.OBJ == 'contact'}_h{/if}.jpg" border="0"/></a></li>
		            {if $layout_domain.code == 'oferta-vacanta'}
		            <li><a href="{url o='news' m='index'}"><img onMouseOut="this.src='{$img_path}stiriturism{if $smarty.const.OBJ == 'news'}_h{/if}.jpg'" onMouseOver="this.src='{$img_path}stiriturism_h.jpg'" src="{$img_path}stiriturism{if $smarty.const.OBJ == 'news'}_h{/if}.jpg" border="0"/></a></li>
		            {/if}
		        </ul>
		    </div>
		    {if $layout_domain.code=='bilete-avion-ieftine'}
		    	{assign var='header' value='flight'}
		    {elseif $layout_domain.code=='oferte-bulgaria'}
		    	{assign var='header' value='bulgaria'}
		    {else}
		    	{assign var='header' value=$smarty.const.OBJ}
		    {/if}
		    <div class="header_picture_{$header}">
		    	<div class="header-search" >
		    		<form action="{url o='search' m='index'}">
		            	<input type="text" name="q" class="header-search-text" />
		                <input type="image" class="header-search-button" src="{$img_path}cauta.jpg" />
		            </form>
		        </div>
		    </div>
		</div>
        <div class="clear"></div>
        <div id="body">
        	<div id="left">
        		<table cellpadding="0"  cellspacing="0" width="100%">
				<tr>
					<td style="vertical-align:top; padding-bottom:10px;width:10px;">
	        		&nbsp;
		            </td>
		            <td class="left-content">
	            		{$page_content}
	            		<br/><br/>
	            		{if $layout_domain.domain == 'avionbilet.ro' && $smarty.const.OBJ == 'main'}
	            		<div><img src="{$img_path}bilete_avion_bottom.jpg" style="width:699px; height:117px;"/></div>
	            		{/if}
	            	</td>
	            </tr>
	            </table>
            </div>
            <div id="right">
            	<div class="lastminute">
                	
                	<div style="width:160px;color:#333; padding-left:16px;"><a href="{$last_minute.url}" rel="nofallow">{$last_minute.description|nl2br}</a></div>
                    <br />
                    <!--
                    <img  class="blueblullet"src="{$img_path}blue_bullet.jpg" />                    
                    <a href="/" class="vezi">vezi toate ofertele last minute</a>
                    -->
                </div>
                <div class="clear"></div>
                {if $meta.widthLeftBox}
	        		<div class="regiuni">
	        			<div class="regiuni_header"></div>
	                	<ul>
	                    	{foreach from=$meta.regions item=region key=region_code}
	                    		<li><div class="divli"><a href="{$region.url}" title="{$region.title}">{$region.title}</a><span>&nbsp;({$region.count})</span></div></li>		                        
							{/foreach}
	                    </ul>	                   
			            <br/>
	                </div>
	            {else}
	            	<div class="superocazii">
	                <br /><br /><br /><br />
	                	{foreach from=$special_vacations item=special_vacation}
	                	<div class="ocazie">
	                	{if $special_vacation.thumb > ''}
	                		<div style="width:105px; float:left;">{$special_vacation.thumb}</div>
	                	{else}
	                		<div style="width:25px; float:left;">&nbsp;</div>
	                	{/if}
	                		
	                		<div style="width:120px; float:left;">
	                			<span>{$special_vacation.title}</span>                        
		                        <div class="dot"></div>
		                        <a href="{$special_vacation.url}" class="despre">> despre oferta</a>
	                		</div>	                        
	                    </div>
	                    <div class="clear"></div>
	                    <div class="space"></div>
	                	{/foreach}
	                	<!--
	                    <img  style="margin:0px 0px 0px 18px"src="{$img_path}orange_bullet.jpg" />
	                    <a href="/" class="ocazii">vezi toate ocaziile</a>
	                    -->
	                </div>
	                
	            {/if} 
	            <div class="clear"></div>
                <div class="casute">
	            	<div class="clear"></div>
	                <div class="pasi"><a href="http://www.qtravel.htlrs.net/"><img src="{$img_path}3pasi.jpg" style="width:227px; height:292px; border:0px;" alt="Rezervari hotel online!"/></a></div>
	                {if $layout_domain.code == 'oferta-vacanta'}
		            	<div class="vacanta"><a href="http://www.oferta-vacanta.ro/" title="Oferta vacanta"><img src="{$img_path}vacanta2009.jpg" style="width:227px; height:331px; border:0px;" alt="Oferta vacanta"/></a></div>
		            {/if}
		            <div class="someone"><img src="{$img_path}someone.png" /></div>
	                <div class="stats">{*{$layout_domain.stats}*}</div>
	            </div>             
            </div>
                      
        </div>
        <div class="clear"></div>
        <div id="footer">
        	<div class="meniu">
            	<div>
					<ul>
	               	 	<li style="margin:3px 50px 0px 0px"><span class="qtravel">Copyright &copy; 2009 Q Travel Confort</span></li>
	                	{foreach from=$layout_pages item=link}
							<li><a href="{$link.link}" title="{$link.metatitle}">{$link.title}</a></li>
						{/foreach}                    	
	                </ul>
                </div>
                <div class="clear"></div>
                {if $layout_domain.code == 'oferta-vacanta'}		            
	                <div>
						<strong><a href="{$meta.metalink}" title="{$meta.metatitle}">{$meta.metatitle}</a></strong><br/>		
						{foreach from=$meta.links.regions item=link}
							<a href="{$link.url}" title="{$link.metatitle}">{$link.title}</a>
						{/foreach}	
					</div>
					<div class="clear"></div>
					<div>
						{foreach from=$meta.links.countries item=link}
							<a href="{$link.url}" title="{$link.metatitle}">{$link.title}</a>
						{/foreach}	
					</div>
				{/if}
            </div>
        </div>
    </div>
    
</body>
</html>