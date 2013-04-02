<?php /* Smarty version 2.6.18, created on 2013-02-11 15:33:31
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_search_bus.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_search_bus.tpl', 3, false),)), $this); ?>
<?php echo '
	<div id="search-fields-container">
		'; ?>
<input type="hidden" id="hid-search-url" value="<?php echo smarty_function_url(array('o' => 'buss','m' => 'index'), $this);?>
"><?php echo '
		<div id="autocomplete-destination-container">
			<label for="autocomplete-home-destination">Destinatie: </label>	
			<label style="font-style: italic;color: #999;cursor: text;position: absolute;padding: 0px 0px 0px 10px;width:180px;height:25px" id="label-autocomplete-home-destination">...alege destinatie</label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-home-destination">
			<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/input_margin_bg.png" id="btn-autocomplete-home-destination">
		</div>
	</div>
<script>
	$(function() {
		$("#btn-autocomplete-home-destination").click(function() {
			$("#label-autocomplete-home-destination").css(\'display\',\'none\');
			if($("#autocomplete-home-destination").autocomplete("widget").is(\':visible\')){
				$("#autocomplete-home-destination").autocomplete("close");
			} else {
				$("#autocomplete-home-destination").autocomplete("search");
			}
		});	
		$("#label-autocomplete-home-destination").click(function() {
			$(this).css(\'display\',\'none\');
			$("#autocomplete-home-destination").focus();
		});
	});
</script>
'; ?>