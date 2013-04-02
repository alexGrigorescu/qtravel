<?php /* Smarty version 2.6.18, created on 2013-03-03 10:27:36
         compiled from D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_search_vacancies.tpl */ ?>
<?php echo '
	<div id="search-fields-container">
		'; ?>
<input type="hidden" id="hid-search-url" value="<?php echo $this->_tpl_vars['searchUrl']; ?>
"><?php echo '
		<div id="autocomplete-destination-container">
			<label for="autocomplete-home-destination">Destinatie: </label>
			<label style="font-style: italic;color: #999;cursor: text;position: absolute;padding: 0px 0px 0px 10px;width:180px;height:25px" id="label-autocomplete-home-destination">...alege destinatie</label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-home-destination">
			<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/input_margin_bg.png" id="btn-autocomplete-home-destination">
		</div>
		<div id="autocomplete-hotel-container">
			<label for="autocomplete-hotel">Nume hotel: </label>
			<label style="font-style: italic;color: #999;cursor: text;position: absolute;padding: 0px 0px 0px 10px;width:180px;height:25px" id="label-autocomplete-home-hotel">...alege hotel</label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-hotel">
			<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/input_margin_bg.png" id="btn-autocomplete-hotel">
		</div>
		<div id="autocomplete-vacancy-type-container">
			<label for="autocomplete-vacancy-type">Tip vacanta: </label>
			<label style="font-style: italic;color: #999;cursor: text;position: absolute;padding: 0px 0px 0px 10px;width:180px;height:25px" id="label-autocomplete-home-type">...alege tip vacanta</label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-vacancy-type">
			<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/input_margin_bg.png" id="btn-autocomplete-vacancy-type">
		</div>
		<div id="autocomplete-stars-container">
			<label for="autocomplete-stars">Tip hotel: </label>
			<label style="font-style: italic;color: #999;cursor: text;position: absolute;padding: 0px 0px 0px 10px;width:180px;height:25px" id="label-autocomplete-home-stars">...alege numar stele</label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-stars">
			<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/input_margin_bg.png" id="btn-autocomplete-stars">
		</div>
	</div>
	<script>
	$(function() {
		$("#btn-autocomplete-stars").click(function() {
			$("#label-autocomplete-home-stars").css(\'display\',\'none\');
			if($("#autocomplete-stars").autocomplete("widget").is(\':visible\')){
				$("#autocomplete-stars").autocomplete("close");
			} else {
				$("#autocomplete-stars").autocomplete("search");
			}
			
		});	
		$("#btn-autocomplete-vacancy-type").click(function() {
			$("#label-autocomplete-home-type").css(\'display\',\'none\');
			if($("#autocomplete-vacancy-type").autocomplete("widget").is(\':visible\')){
				$("#autocomplete-vacancy-type").autocomplete("close");
			} else {
				$("#autocomplete-vacancy-type").autocomplete("search");
			}
			
		});	
		$("#btn-autocomplete-hotel").click(function() {
			$("#label-autocomplete-home-hotel").css(\'display\',\'none\');
			if($("#autocomplete-hotel").autocomplete("widget").is(\':visible\')){
				$("#autocomplete-hotel").autocomplete("close");
			} else {
				$("#autocomplete-hotel").autocomplete("search");
			}		
		});	
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
		$("#label-autocomplete-home-type").click(function() {
			$(this).css(\'display\',\'none\');
			$("#autocomplete-vacancy-type").focus();
		});
		$("#label-autocomplete-home-stars").click(function() {
			$(this).css(\'display\',\'none\');
			$("#autocomplete-stars").focus();
		});
		$("#label-autocomplete-home-hotel").click(function() {
			$(this).css(\'display\',\'none\');
			$("#autocomplete-hotel").focus();
		});
	});
	</script>
'; ?>