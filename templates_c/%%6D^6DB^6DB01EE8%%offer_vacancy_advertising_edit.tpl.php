<?php /* Smarty version 2.6.18, created on 2012-11-18 17:14:45
         compiled from /home/qtravel/public_html/templates/default/offer_vacancy_advertising_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/offer_vacancy_advertising_edit.tpl', 19, false),)), $this); ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<link rel="stylesheet" href="/css/oferta-vacanta/jquery.ui.all.css">
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.core.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.position.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.autocomplete.js"></script>
<?php echo $this->_tpl_vars['form_image']; ?>


<?php echo '
<script>
	$(function() {
		$( "#vacancy_advertising_offers" ).autocomplete({
			source: function(request, response) {
				$( "#vacancy_advertising_offers_hid" ).val(\'\');
				$( "#vacancy_advertising_offers_code_hid" ).val(\'\');
		        $.ajax({
		          url: "'; ?>
<?php echo smarty_function_url(array('o' => 'offer_vacancy','m' => 'get_offers'), $this);?>
<?php echo '",
		               dataType: "json",
		          data: {
		            term : request.term,
		            bus	 : $("#vacancy_advertising_offer_type").val()
		          },
		          success: function(data) {
		            response(data);
		          }
		        });
		      },
			minLength: 0,
			select: function( event, ui ) {
				if(ui.item){
					
					$( "#vacancy_advertising_offers_hid" ).val(ui.item.id);
					$( "#vacancy_advertising_offers_code_hid" ).val(ui.item.value);
				}
			}
		});
	});
</script>
'; ?>