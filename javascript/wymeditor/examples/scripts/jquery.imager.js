var $j = jQuery.noConflict();

$j(function() {
	//set up your AJAX call
	$j.ajax({ 
	  type: "POST", 
	  url: "http://eshop.firma.ro/wymeditor/examples/scripts/test.html", //path to your PHP function
	  data: "img=test&stamp=now", 					//not required for this example, but you can POST data to your PHP function like this
	  success: function(msg){ 						//trigger this code if the PHP function successfully returns data
		$j("div#gallery").html(msg);
	  }  
	});
});