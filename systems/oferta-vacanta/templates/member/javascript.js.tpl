{literal}
$(function() {
//$('html, body').stop().animate({
//            scrollLeft: (1600-window.innerWidth)/2
//        });
});
$(function() {
	$('#submenu-vacancies').append('<ul><li class="submenu"><div id="container"><a href="{/literal}{url o='accommodation_plane' m='index'}{literal}" title="Vacante cu avionul"><img class="first" src="{/literal}{$img_path}{literal}/submenu_vacancies_plane.png" alt="Vacante cu avionul"></a><a href="{/literal}{url o='accommodation_bus' m='index'}{literal}" title="Vacante cu autocarul"><img src="{/literal}{$img_path}{literal}/submenu_vacancies_bus.png" alt="Vacante cu autocarul"></a><a href="{/literal}{url o='accommodation_individual' m='index'}{literal}" title="Vacante individual"><img src="{/literal}{$img_path}{literal}/submenu_vacancies_single.png" alt="Vacante individual"></a></div></li></ul>');
	$('#submenu-tickets').append('<ul><li class="submenu"><div id="container"><a href="{/literal}{url o='flight' m='index'}{literal}" title="Oferta bilete avion"><img class="first" src="{/literal}{$img_path}{literal}/submenu_tickets_plane.png"  alt="Oferta bilete avion"></a><a href="{/literal}{url o='buss' m='index'}{literal}"  title="Bilete autocar"><img src="{/literal}{$img_path}{literal}/submenu_tickets_bus.png" alt="Bilete autocar"></a></div></li></ul>');
	$('#submenu-tour').append('<ul><li class="submenu"><div id="container"><a href="{/literal}{url o='tour_plane' m='index'}{literal}"><img class="first" src="{/literal}{$img_path}{literal}/submenu_tour_plane.png"></a><a href="{/literal}{url o='tour_bus' m='index'}{literal}"><img src="{/literal}{$img_path}{literal}/submenu_tour_bus.png"></a></div></li></ul>');
	$('#submenu-events').append('<ul><li class="submenu"><div id="container"><a href="{/literal}{url o='event_conference' m='index'}{literal}"><img class="first" src="{/literal}{$img_path}{literal}/submenu_events_conference.png"></a><a href="{/literal}{url o='event_meeting' m='index'}{literal}"><img src="{/literal}{$img_path}{literal}/submenu_events_meeting.png"></a><a href="{/literal}{url o='event_team_buiding' m='index'}{literal}"><img src="{/literal}{$img_path}{literal}/submenu_events_team_building.png"></a><a href="{/literal}{url o='event_incentive' m='index'}{literal}"><img src="{/literal}{$img_path}{literal}/submenu_events_incentive.png"></a></div></li></ul>');
});
$(function() {
	var minSlideValue = 1;
	var maxSlideValue = 400;
	$( "#promo-slider-active" ).slider({
		range: "min",
		value: 1,
		min: minSlideValue,
		max: maxSlideValue,
		slide: function( event, ui ) {
			$( "#promo-slider-active > a" ).html(ui.value);
		},
		change: function( event, ui ) {
			$("#hid-price-promotion").val(ui.value);
			$("#hid-page-promotion").val(0);
			getPromotionList("ajax_promo_"+$("#hid-active-promotion").val());

			$( "#promo-slider-active > a" ).html(ui.value);
		}
	});
	$( "#promo-slider-active > a" ).html($("#promo-slider-active").slider("value"));

	$( "#rdb-promo" ).click(function() {
		if($( "#hid-rdb-promo" ).val() == 1){
			$( "#rdb-promo > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_unchecked.png");
			$( "#hid-rdb-promo" ).val("0");
			$( "#promo-slider-active" ).css("visibility","hidden");
			$( "#promo-slider-inactive" ).css("visibility","visible");
			$("#hid-price-promotion").val(0);
			$("#hid-page-promotion").val(0);
			getPromotionList("ajax_promo_"+$("#hid-active-promotion").val());
		} else {
			$( "#rdb-promo > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_checked.png");
			$( "#hid-rdb-promo" ).val("1");
			$( "#promo-slider-active" ).css("visibility","visible");
			$( "#promo-slider-inactive" ).css("visibility","hidden");
		}
	 	return false;
	});
	if($( "#hid-rdb-promo" ).val() == 0){
		$( "#rdb-promo > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_unchecked.png");
		$( "#rdb-promo > img" ).css("visibility","visible");
		$( "#promo-slider-active" ).css("visibility","hidden");
		$( "#promo-slider-inactive" ).css("visibility","visible");
	} else {
		$( "#rdb-promo > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_checked.png");
		$( "#rdb-promo > img" ).css("visibility","visible");
		$( "#promo-slider-active" ).css("visibility","visible");
		$( "#promo-slider-inactive" ).css("visibility","hidden");
	}
	$( "#promo-slider-minus" ).click(function() {
		var currentSliderValue = $( "#promo-slider-active" ).slider("value");
		if(currentSliderValue > minSlideValue){
			$( "#promo-slider-active" ).slider("value",(currentSliderValue-1));
		}
		return false;
	});
	$( "#promo-slider-plus" ).click(function() {
		var currentSliderValue = $( "#promo-slider-active" ).slider("value");
		if(currentSliderValue < maxSlideValue){
			$( "#promo-slider-active" ).slider("value",(currentSliderValue+1));
		}
		return false;
	});
});
$(function() {
	var bubleWidth = {/literal}{$buble_width}{literal};
	var currentBubleIndex = 0;
	var bubleCount = parseInt($( "#hid-buble-count" ).val());
	var isChrome = /chrome/.test(navigator.userAgent.toLowerCase());
	$("#btn-buble-back > ul > li").attr("class","back-inactive");
	$( "#btn-buble-next" ).click(function() {
		if((currentBubleIndex + 6 +1) <= bubleCount){
			var currentBubleSlideMarginLeft = parseInt($("#buble-slider").css('margin-left'));
			if(isChrome == true && currentBubleSlideMarginLeft != 0){
				;//currentBubleSlideMarginLeft --;
			}
			var newBubleSlideMarginLeft = currentBubleSlideMarginLeft + (-bubleWidth);
			if((newBubleSlideMarginLeft%bubleWidth) == 0){
				currentBubleIndex++;
		 		$("#buble-slider").animate({'margin-left': newBubleSlideMarginLeft + 'px'});
		 		$("#btn-buble-back > ul > li").attr("class","back-active");
		 		if(!((currentBubleIndex + 6 +1) <= bubleCount)){
		 			$("#btn-buble-next > ul > li").attr("class","next-inactive");
		 		}
		 	}
		} 
		return false;
	});
	$( "#btn-buble-back" ).click(function() {
		if((currentBubleIndex - 1) >= 0){
			var currentBubleSlideMarginLeft = parseInt($("#buble-slider").css('margin-left'));
			if(isChrome == true && currentBubleSlideMarginLeft != 0){
				;//currentBubleSlideMarginLeft --;
			}
			var newBubleSlideMarginLeft = currentBubleSlideMarginLeft + bubleWidth;
			if((newBubleSlideMarginLeft%bubleWidth) == 0){
				currentBubleIndex--;
				$("#buble-slider").animate({'margin-left': newBubleSlideMarginLeft + 'px'});
				$("#btn-buble-next > ul > li").attr("class","next-active");
				if(!((currentBubleIndex - 1) >= 0)){
					$("#btn-buble-back > ul > li").attr("class","back-inactive");
				}
			}		 	
		}
		return false;
	});
});
function searchHomePage(object,method){
	$("#search-buttons > ul > li").each(function(index) {
		$(this).attr('class',$(this).attr('id')+'-inactive');
	});

	$("#hid-autocomplete-home-destination-id").val('');
	$("#hid-autocomplete-hotel-id").val('');
	$("#hid-autocomplete-stars-id").val('');
	$("#hid-autocomplete-vacancy-type-id").val('');

	object.attr('class',object.attr('id')+'-active');
	$.ajax({
	  type: "POST",
	  url: "/mymain." + method + ".html",
	  data: "val=11",
	  success: function(html){
	   $("#search-fields").html(html);
	  }
	});
}
$(function() {
	$("#btn-search-plane").click(function() {
		searchHomePage($(this),"ajax_search_plane");
	});
	$("#btn-search-bus").click(function() {
		searchHomePage($(this),"ajax_search_bus");
	});
	$("#btn-search-vacancies").click(function() {
		searchHomePage($(this),"ajax_search_vacancies");
	});
	$("#btn-search-hotels").click(function() {
		searchHomePage($(this),"ajax_search_hotels");
	});
	$("#btn-search-rentcar").click(function() {
		searchHomePage($(this),"ajax_search_rentcar");
	});
	$("#btn-search-insurance").click(function() {
		searchHomePage($(this),"ajax_search_insurance");
	});
	$("#btn-search").click(function() {
		var searchUrl = $('#hid-search-url').val().replace('.html','');
		
		if($("#hid-autocomplete-home-destination-id").val() == ''){
			alert('Selectati destinatia!');
			return false;
		} else if($("#autocomplete-vacancy-type").length && $("#hid-autocomplete-vacancy-type-id").val() == '') {
			alert('Selectati tip vacanta!');
			return false;
		} else {
			var filterParts = $("#hid-autocomplete-home-destination-id").val().split('_');
			if(filterParts[0].length > 0){
				searchUrl = searchUrl + $("#hid-autocomplete-vacancy-type-id").val() + '/' + filterParts[0]+'.html';
			} else if(filterParts[1].length > 0){
				searchUrl = searchUrl + $("#hid-autocomplete-vacancy-type-id").val() + '/' + filterParts[1]+'.html';
			}
			
			location.href = searchUrl+'?&st='+ $("#hid-autocomplete-stars-id").val()+'&ht='+$("#hid-autocomplete-hotel-id").val();
		}
	});
	$("#btn-search-vacancies").click();
});
function getPromotionList(method){
	var price = $("#hid-price-promotion").val();
	var page = $("#hid-page-promotion").val();
	$.ajax({
	  type: "POST",
	  url: "/mymain." + method + ".html",
	  data: "p="+page+"&pr="+price,
	  success: function(html){
	   $("#promo-body").html(html);
	  }
	});
}
function promotionsHomePage(object,method){
	$("#promo-header > ul > li").each(function(index) {
		$(this).attr('class',$(this).attr('id')+'-inactive');
	});
	$("#hid-active-promotion").val(method.substr(11));
	$("#hid-page-promotion").val(0);

	object.attr('class',object.attr('id')+'-active');
	getPromotionList(method);
}
$(function() {
	$("#last-minute").click(function() {
		promotionsHomePage($(this),"ajax_promo_last_minute");
	});
	$("#early-booking").click(function() {
		promotionsHomePage($(this),"ajax_promo_early_booking");
	});
	$("#easter").click(function() {
		promotionsHomePage($(this),"ajax_promo_easter");
	});
	$("#first-may").click(function() {
		promotionsHomePage($(this),"ajax_promo_first_may");
	});
	$("#seaside").click(function() {
		promotionsHomePage($(this),"ajax_promo_seaside");
	});
	$("#seniors").click(function() {
		promotionsHomePage($(this),"ajax_promo_seniors");
	});
	$("#mountain").click(function() {
		promotionsHomePage($(this),"ajax_promo_mountain");
	});
	$("#events").click(function() {
		promotionsHomePage($(this),"ajax_promo_events");
	});
	$("#ski").click(function() {
		promotionsHomePage($(this),"ajax_promo_ski");
	});
	$("#noel").click(function() {
		promotionsHomePage($(this),"ajax_promo_noel");
	});
	$("#new_year_eve").click(function() {
		promotionsHomePage($(this),"ajax_promo_new_year_eve");
	});
	$("#spa_balneo").click(function() {
		promotionsHomePage($(this),"ajax_promo_spa_balneo");
	});

	if($("#hid-active-promotion").length){
		$("#"+$("#hid-active-promotion").val().replace('_','-')).click();
	}
	
});
function getCountries(continent,div,object,method){
	$.ajax({
		  type: "POST",
	  url: "{/literal}{url o='mymain' m='ajax_country_list'}{literal}",
	  data: "continent="+continent+"&searchObject="+object+"&searchMethod="+method,
	  success: function(html){
			$("#country-list-"+div).html(html);
			
	  }
	});
}
{/literal}