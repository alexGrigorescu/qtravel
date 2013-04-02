var $s = jQuery.noConflict();
$s(document).ready(function(){
	$s('span.accordion0').click(function() {
		$s('span.accordion0').next().slideToggle(300);
		$s('span.accordion0').toggleClass("activehandle");
		return false;
	}).next().hide();
	
	$s('span.accordion1').click(function() {
		$s('span.accordion1').next().slideToggle(300);
		$s('span.accordion1').toggleClass("activehandle");
		return false;
	}).next().hide();
	
	$s('span.accordion2').click(function() {
		$s('span.accordion2').next().slideToggle(300);
		$s('span.accordion2').toggleClass("activehandle");
		return false;
	}).next().hide();
	
	$s('span.accordion3').click(function() {
		$s('span.accordion3').next().slideToggle(300);
		$s('span.accordion3').toggleClass("activehandle");
		return false;
	}).next().hide();
	
	$s('span.accordion4').click(function() {
		$s('span.accordion4').next().slideToggle(300);
		$s('span.accordion4').toggleClass("activehandle");
		return false;
	}).next().hide();
	
	$s('span.accordion5').click(function() {
		$s('span.accordion5').next().slideToggle(300);
		$s('span.accordion5').toggleClass("activehandle");
		return false;
	}).next().hide();
	
	$s('span.accordion6').click(function() {
		$s('span.accordion6').next().slideToggle(300);
		$s('span.accordion6').toggleClass("activehandle");
		return false;
	}).next().hide();
	
	$s('div.accordion-title').click(function() {
		$s('#promo-accordion').slideToggle(300);
		$s('div.accordion-title').toggleClass("activehandle");
		return false;
	}).next().hide();
}); 