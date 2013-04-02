<?
class main
{
	function index()
	{
			
	}
	
	function style()
    {
    	header("Content-type: text/css");
    	$t = new layout('style.css');
		$t->display(array(), 'layout_css');
    }

    function javascript()
    {
    	header("Content-type: text/javascript");
    	$t = new layout('javascript.js');
		$t->display(array(), 'layout_js');
    }
	
	function deny()
	{
		$t = new layout('main_deny');
		$t->display();
	}
	
	function login()
	{
		redirect('login','index');
	}
	  
	function help()
	{
		$t = new layout('main_help');
		$img = $t->get();
		TplLayout::show($img);
	}
	
	function invalid()
	{
		$t = new layout('main_invalid');
		$img = $t->get();
		$t->display();
	}
}
?>
