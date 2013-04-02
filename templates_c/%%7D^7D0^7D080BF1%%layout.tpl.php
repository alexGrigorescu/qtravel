<?php /* Smarty version 2.6.18, created on 2012-08-23 00:05:01
         compiled from /home/qtravel/public_html/systems/oferteinbulgaria/templates/member/layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/systems/oferteinbulgaria/templates/member/layout.tpl', 21, false),array('function', 'url', '/home/qtravel/public_html/systems/oferteinbulgaria/templates/member/layout.tpl', 21, false),array('modifier', 'nl2br', '/home/qtravel/public_html/systems/oferteinbulgaria/templates/member/layout.tpl', 134, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ro" lang="ro" dir="ltr">
	<head>
	<title><?php echo $this->_tpl_vars['meta']['metatitle']; ?>
</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<meta http-equiv="keywords" content="<?php echo $this->_tpl_vars['meta']['metakeywords']; ?>
" />
	<meta http-equiv="description" content="<?php echo $this->_tpl_vars['meta']['metadescription']; ?>
" />
	<?php if ($this->_tpl_vars['layout_domain']['domain'] == 'oferta-vacanta.ro'): ?>
		<meta name="verify-v1" content="cqzIYs7A+obnKeQtGeKzFnAdlW4qria65wToqrHdCQQ=" />
	<?php endif; ?>
	<?php if ($this->_tpl_vars['layout_domain']['domain'] == 'avionbilet.ro'): ?>
		<meta name="verify-v1" content="+em4e75psn1H2vOgr643OOaDEuEY3f0a/IQMVycS+Tk=" />
	<?php endif; ?>
	<?php if ($this->_tpl_vars['layout_domain']['domain'] == 'oferteinbulgaria.ro'): ?>
		<meta name="verify-v1" content="0erwHb3awOYqVJzDm347DhbmkrC08dQU8DlgZdvI8Es=" />
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo @LOCAL_URL; ?>
style.css?rand=<?php echo $this->_tpl_vars['rand']; ?>
" type="text/css" media="all" /> 
	<script type="text/javascript" src="/javascript/com_gallery/jquery.js"></script>
	<?php if ($this->_tpl_vars['layout_domain']['code'] == 'oferta-vacanta'): ?>
	<link rel="alternate" type="application/atom+xml" title="<?php echo smarty_function_tr(array('key' => 'rss_accommodation','class' => 'layout'), $this);?>
" href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'rss'), $this);?>
" />
	<link rel="alternate" type="application/atom+xml" title="<?php echo smarty_function_tr(array('key' => 'rss_vacation','class' => 'layout'), $this);?>
" href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'rss'), $this);?>
" />
	<link rel="alternate" type="application/atom+xml" title="<?php echo smarty_function_tr(array('key' => 'rss_flight','class' => 'layout'), $this);?>
" href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'rss'), $this);?>
" />
	<link rel="alternate" type="application/atom+xml" title="<?php echo smarty_function_tr(array('key' => 'rss_bus','class' => 'layout'), $this);?>
" href="<?php echo smarty_function_url(array('o' => 'bus','m' => 'rss'), $this);?>
" />
	<link rel="alternate" type="application/atom+xml" title="<?php echo smarty_function_tr(array('key' => 'rss_vacation-charter','class' => 'layout'), $this);?>
" href="<?php echo smarty_function_url(array('o' => 'vacation-charter','m' => 'rss'), $this);?>
" />
	<?php endif; ?>
	<script type="text/javascript" src="/javascript/com_gallery/thickbox.js"></script>
	<?php if ($this->_tpl_vars['region'] > '' && $this->_tpl_vars['layout_domain']['mapkey'] > ''): ?>
		<script src="http://maps.google.com/maps?file=api&v=2&key=<?php echo $this->_tpl_vars['layout_domain']['mapkey']; ?>
" type="text/javascript"></script>
		<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0" type="text/javascript"></script>
		<script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script> 
	<?php echo '
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
              document.getElementById(\'map\').style.display = \'none\';
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
    '; ?>

    <?php endif; ?>
	<link rel="stylesheet" href="/javascript/com_gallery/thickbox.css" type="text/css" media="screen" />	
	
</head>
<body  <?php if ($this->_tpl_vars['has_region'] > ''): ?>onload="initialize();showAddress('<?php echo $this->_tpl_vars['region']['code']; ?>
');" onunload="GUnload()"<?php endif; ?>>
<h1 class="title"><?php echo $this->_tpl_vars['meta']['title']; ?>
</h1>
	<div id="page">
		<div id="header">
			<div id="meniu">
		    	<ul>
		        	<li><a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
home<?php if (@OBJ == 'main' || @OBJ == 'reservation' || @OBJ == 'search'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
home_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
home<?php if (@OBJ == 'main' || @OBJ == 'reservation' || @OBJ == 'search'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
		        	<?php if ($this->_tpl_vars['layout_domain']['code'] != 'bilete-avion-ieftine'): ?>
			        	<?php if ($this->_tpl_vars['layout_domain']['code'] == 'oferta-vacanta'): ?>
				        	<li><a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
cazare<?php if (@OBJ == 'accommodation'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
cazare_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
cazare<?php if (@OBJ == 'accommodation'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
				            <li><a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
sejururi<?php if (@OBJ == 'vacation'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
sejururi_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
sejururi<?php if (@OBJ == 'vacation'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
				        <?php else: ?>
				        	<li><a href="<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'country','country' => 'bulgaria'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
cazare<?php if (@OBJ == 'accommodation'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
cazare_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
cazare<?php if (@OBJ == 'accommodation'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
				            <li><a href="<?php echo smarty_function_url(array('o' => 'vacation','m' => 'country','country' => 'bulgaria'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
sejururi<?php if (@OBJ == 'vacation'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
sejururi_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
sejururi<?php if (@OBJ == 'vacation'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
				        <?php endif; ?>
		            <?php endif; ?>
		            <?php if ($this->_tpl_vars['layout_domain']['code'] == 'bilete-avion-ieftine' || $this->_tpl_vars['layout_domain']['code'] == 'oferta-vacanta'): ?>
		            <li><a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
bileteavion<?php if (@OBJ == 'flight'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
bileteavion_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
bileteavion<?php if (@OBJ == 'flight'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
		            <?php endif; ?>
		            <?php if ($this->_tpl_vars['layout_domain']['code'] == 'oferta-vacanta'): ?>
		            <li><a href="<?php echo smarty_function_url(array('o' => 'buss','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
bileteautocar<?php if (@OBJ == 'buss'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
bileteautocar_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
bileteautocar<?php if (@OBJ == 'buss'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
		            <li><a href="<?php echo smarty_function_url(array('o' => 'charter','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
vacantecharter<?php if (@OBJ == 'charter'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
vacantecharter_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
vacantecharter<?php if (@OBJ == 'charter'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
		            <?php endif; ?>
		            <li><a href="<?php echo smarty_function_url(array('o' => 'contact','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
contact<?php if (@OBJ == 'contact'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
contact_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
contact<?php if (@OBJ == 'contact'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
		            <?php if ($this->_tpl_vars['layout_domain']['code'] == 'oferta-vacanta'): ?>
		            <li><a href="<?php echo smarty_function_url(array('o' => 'news','m' => 'index'), $this);?>
"><img onMouseOut="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
stiriturism<?php if (@OBJ == 'news'): ?>_h<?php endif; ?>.jpg'" onMouseOver="this.src='<?php echo $this->_tpl_vars['img_path']; ?>
stiriturism_h.jpg'" src="<?php echo $this->_tpl_vars['img_path']; ?>
stiriturism<?php if (@OBJ == 'news'): ?>_h<?php endif; ?>.jpg" border="0"/></a></li>
		            <?php endif; ?>
		        </ul>
		    </div>
		    <?php if ($this->_tpl_vars['layout_domain']['code'] == 'bilete-avion-ieftine'): ?>
		    	<?php $this->assign('header', 'flight'); ?>
		    <?php elseif ($this->_tpl_vars['layout_domain']['code'] == 'oferte-bulgaria'): ?>
		    	<?php $this->assign('header', 'bulgaria'); ?>
		    <?php else: ?>
		    	<?php $this->assign('header', @OBJ); ?>
		    <?php endif; ?>
		    <div class="header_picture_<?php echo $this->_tpl_vars['header']; ?>
">
		    	<div class="header-search" >
		    		<form action="<?php echo smarty_function_url(array('o' => 'search','m' => 'index'), $this);?>
">
		            	<input type="text" name="q" class="header-search-text" />
		                <input type="image" class="header-search-button" src="<?php echo $this->_tpl_vars['img_path']; ?>
cauta.jpg" />
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
	            		<?php echo $this->_tpl_vars['page_content']; ?>

	            		<br/><br/>
	            		<?php if ($this->_tpl_vars['layout_domain']['domain'] == 'avionbilet.ro' && @OBJ == 'main'): ?>
	            		<div><img src="<?php echo $this->_tpl_vars['img_path']; ?>
bilete_avion_bottom.jpg" style="width:699px; height:117px;"/></div>
	            		<?php endif; ?>
	            	</td>
	            </tr>
	            </table>
            </div>
            <div id="right">
            	<div class="lastminute">
                	
                	<div style="width:160px;color:#333; padding-left:16px;"><a href="<?php echo $this->_tpl_vars['last_minute']['url']; ?>
" rel="nofallow"><?php echo ((is_array($_tmp=$this->_tpl_vars['last_minute']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</a></div>
                    <br />
                    <!--
                    <img  class="blueblullet"src="<?php echo $this->_tpl_vars['img_path']; ?>
blue_bullet.jpg" />                    
                    <a href="/" class="vezi">vezi toate ofertele last minute</a>
                    -->
                </div>
                <div class="clear"></div>
                <?php if ($this->_tpl_vars['meta']['widthLeftBox']): ?>
	        		<div class="regiuni">
	        			<div class="regiuni_header"></div>
	                	<ul>
	                    	<?php $_from = $this->_tpl_vars['meta']['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['region_code'] => $this->_tpl_vars['region']):
?>
	                    		<li><div class="divli"><a href="<?php echo $this->_tpl_vars['region']['url']; ?>
" title="<?php echo $this->_tpl_vars['region']['title']; ?>
"><?php echo $this->_tpl_vars['region']['title']; ?>
</a><span>&nbsp;(<?php echo $this->_tpl_vars['region']['count']; ?>
)</span></div></li>		                        
							<?php endforeach; endif; unset($_from); ?>
	                    </ul>	                   
			            <br/>
	                </div>
	            <?php else: ?>
	            	<div class="superocazii">
	                <br /><br /><br /><br />
	                	<?php $_from = $this->_tpl_vars['special_vacations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['special_vacation']):
?>
	                	<div class="ocazie">
	                	<?php if ($this->_tpl_vars['special_vacation']['thumb'] > ''): ?>
	                		<div style="width:105px; float:left;"><?php echo $this->_tpl_vars['special_vacation']['thumb']; ?>
</div>
	                	<?php else: ?>
	                		<div style="width:25px; float:left;">&nbsp;</div>
	                	<?php endif; ?>
	                		
	                		<div style="width:120px; float:left;">
	                			<span><?php echo $this->_tpl_vars['special_vacation']['title']; ?>
</span>                        
		                        <div class="dot"></div>
		                        <a href="<?php echo $this->_tpl_vars['special_vacation']['url']; ?>
" class="despre">> despre oferta</a>
	                		</div>	                        
	                    </div>
	                    <div class="clear"></div>
	                    <div class="space"></div>
	                	<?php endforeach; endif; unset($_from); ?>
	                	<!--
	                    <img  style="margin:0px 0px 0px 18px"src="<?php echo $this->_tpl_vars['img_path']; ?>
orange_bullet.jpg" />
	                    <a href="/" class="ocazii">vezi toate ocaziile</a>
	                    -->
	                </div>
	                
	            <?php endif; ?> 
	            <div class="clear"></div>
                <div class="casute">
	            	<div class="clear"></div>
	                <div class="pasi"><a href="http://www.qtravel.htlrs.net/"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
3pasi.jpg" style="width:227px; height:292px; border:0px;" alt="Rezervari hotel online!"/></a></div>
	                <?php if ($this->_tpl_vars['layout_domain']['code'] == 'oferta-vacanta'): ?>
		            	<div class="vacanta"><a href="http://www.oferta-vacanta.ro/" title="Oferta vacanta"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
vacanta2009.jpg" style="width:227px; height:331px; border:0px;" alt="Oferta vacanta"/></a></div>
		            <?php endif; ?>
		            <div class="someone"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
someone.png" /></div>
	                <div class="stats"></div>
	            </div>             
            </div>
                      
        </div>
        <div class="clear"></div>
        <div id="footer">
        	<div class="meniu">
            	<div>
					<ul>
	               	 	<li style="margin:3px 50px 0px 0px"><span class="qtravel">Copyright &copy; 2009 Q Travel Confort</span></li>
	                	<?php $_from = $this->_tpl_vars['layout_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
							<li><a href="<?php echo $this->_tpl_vars['link']['link']; ?>
" title="<?php echo $this->_tpl_vars['link']['metatitle']; ?>
"><?php echo $this->_tpl_vars['link']['title']; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>                    	
	                </ul>
                </div>
                <div class="clear"></div>
                <?php if ($this->_tpl_vars['layout_domain']['code'] == 'oferta-vacanta'): ?>		            
	                <div>
						<strong><a href="<?php echo $this->_tpl_vars['meta']['metalink']; ?>
" title="<?php echo $this->_tpl_vars['meta']['metatitle']; ?>
"><?php echo $this->_tpl_vars['meta']['metatitle']; ?>
</a></strong><br/>		
						<?php $_from = $this->_tpl_vars['meta']['links']['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
							<a href="<?php echo $this->_tpl_vars['link']['url']; ?>
" title="<?php echo $this->_tpl_vars['link']['metatitle']; ?>
"><?php echo $this->_tpl_vars['link']['title']; ?>
</a>
						<?php endforeach; endif; unset($_from); ?>	
					</div>
					<div class="clear"></div>
					<div>
						<?php $_from = $this->_tpl_vars['meta']['links']['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
							<a href="<?php echo $this->_tpl_vars['link']['url']; ?>
" title="<?php echo $this->_tpl_vars['link']['metatitle']; ?>
"><?php echo $this->_tpl_vars['link']['title']; ?>
</a>
						<?php endforeach; endif; unset($_from); ?>	
					</div>
				<?php endif; ?>
            </div>
        </div>
    </div>
    
</body>
</html>