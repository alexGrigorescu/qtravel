<?php /* Smarty version 2.6.18, created on 2013-03-03 10:27:36
         compiled from D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/autocomplete.js.tpl */ ?>
<?php echo '
	<script>
		$(function() {
			$( "#autocomplete-home-destination" ).autocomplete({
				source: function(request, response) {
					$( "#hid-autocomplete-home-destination-id" ).val(\'\');
			        $.ajax({
			          url: "/accommodation_plane.get_code_destinations.html",
			               dataType: "json",
			          data: {
			            term : request.term
			          },
			          success: function(data) {
			            response(data);
			          }
			        });
			      },
				minLength: 0,
				select: function( event, ui ) {
					if(ui.item){
						$( "#hid-autocomplete-home-destination-id" ).val(ui.item.id);
						if($( "#autocomplete-hotel")){
							$( "#autocomplete-hotel").val(\'\');
						}
					}
				}
			});
			$( "#autocomplete-hotel" ).autocomplete({
				  source: function(request, response) {
				  	$( "#hid-autocomplete-hotel-id" ).val(\'\');
			        $.ajax({
			          url: "/mymain.get_hotels.html",
			               dataType: "json",
			          data: {
			            term : request.term,
			            region_id : $(\'#hid-autocomplete-home-destination-id\').val()
			          },
			          success: function(data) {
			            response(data);
			          }
			        });
			      },
				minLength: 0,
				select: function( event, ui ) {
					if(ui.item){
						$( "#hid-autocomplete-hotel-id").val(ui.item.id);
					}
				}
			});
			$( "#autocomplete-stars" ).autocomplete({
				source: function(request, response) {
					$( "#hid-autocomplete-stars-id" ).val(\'\');
			        $.ajax({
			          url: "mymain.get_stars.html",
			               dataType: "json",
			          data: {
			            term : request.term,
			            hotel_id : $(\'#hid-autocomplete-hotel-id\').val()
			          },
			          success: function(data) {
			            response(data);
			          }
			        });
			      },
				minLength: 0,
				select: function( event, ui ) {
					if(ui.item){
						$( "#hid-autocomplete-stars-id").val(ui.item.id);
					}
				}
			});
			$( "#autocomplete-vacancy-type" ).autocomplete({
				source: function(request, response) {
					$( "#hid-autocomplete-vacancy-type-id" ).val(\'\');
			        $.ajax({
			          url: "mymain.get_vacancy_type.html",
			               dataType: "json",
			          data: {
			            term : request.term
			          },
			          success: function(data) {
			            response(data);
			          }
			        });
			      },
				minLength: 0,
				select: function( event, ui ) {
					if(ui.item){
						$( "#hid-autocomplete-vacancy-type-id").val(ui.item.id);
					}
				}
			});
		});
	</script>
'; ?>