<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<link rel="stylesheet" href="/css/oferta-vacanta/jquery.ui.all.css">
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.core.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.position.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery.ui.autocomplete.js"></script>
{$form_image}

{literal}
<script>
	$(function() {
		$( "#vacancy_advertising_offers" ).autocomplete({
			source: function(request, response) {
				$( "#vacancy_advertising_offers_hid" ).val('');
				$( "#vacancy_advertising_offers_code_hid" ).val('');
		        $.ajax({
		          url: "{/literal}{url o='offer_vacancy' m='get_offers'}{literal}",
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
{/literal}