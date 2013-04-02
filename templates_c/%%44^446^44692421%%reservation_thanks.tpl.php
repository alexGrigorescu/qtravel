<?php /* Smarty version 2.6.18, created on 2011-07-15 08:06:57
         compiled from /home/qtravel/public_html/templates/default/reservation_thanks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/reservation_thanks.tpl', 30, false),)), $this); ?>
<style>
<?php echo '
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
div.acc div.acctitle {border:1px solid #EBEBEB; padding:3px; padding-left:10px; background:url('; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo 'mainbar_off.gif);}
'; ?>

</style>
<h3 class="continent"><?php echo $this->_tpl_vars['type_title']; ?>
 <b style="color:#ff0000;"><?php echo $this->_tpl_vars['location']['title']; ?>
</b>
<?php if ($this->_tpl_vars['type'] == 'flights' || $this->_tpl_vars['type'] == 'busses'): ?>
	
<?php else: ?>
	, <?php echo $this->_tpl_vars['location']['region_title']; ?>
, <?php echo $this->_tpl_vars['location']['country_title']; ?>
, <?php echo $this->_tpl_vars['location']['continent_title']; ?>

<?php endif; ?>
</h3>
<div><span class="text"><?php echo smarty_function_tr(array('key' => 'reservation_thanks_message'), $this);?>
</span></div>
<?php echo '
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
'; ?>