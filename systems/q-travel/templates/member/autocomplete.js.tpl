{literal}
	<script>
		$(function() {
			$( "#autocomplete-home-destination" ).autocomplete({
				source: function(request, response) {
					$( "#hid-autocomplete-home-destination-id" ).val('');
			        $.ajax({
			          url: "{/literal}{url o='accommodation_plane' m='get_destinations'}{literal}",
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
							$( "#autocomplete-hotel").val('');
						}
					}
				}
			});
			$( "#autocomplete-hotel" ).autocomplete({
				  source: function(request, response) {
				  	$( "#hid-autocomplete-hotel-id" ).val('');
			        $.ajax({
			          url: "{/literal}{url o='mymain' m='get_hotels'}{literal}",
			               dataType: "json",
			          data: {
			            term : request.term,
			            region_id : $('#hid-autocomplete-home-destination-id').val()
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
					$( "#hid-autocomplete-stars-id" ).val('');
			        $.ajax({
			          url: "{/literal}{url o='mymain' m='get_stars'}{literal}",
			               dataType: "json",
			          data: {
			            term : request.term,
			            hotel_id : $('#hid-autocomplete-hotel-id').val()
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
					$( "#hid-autocomplete-vacancy-type-id" ).val('');
			        $.ajax({
			          url: "{/literal}{url o='mymain' m='get_vacancy_type'}{literal}",
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
{/literal}