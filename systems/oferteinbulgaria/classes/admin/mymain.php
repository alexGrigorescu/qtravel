<?
class mymain extends main
{
	function index()
	{
		$meta = array();
		$meta['title'] = '';
		$meta['metatitle'] = '';
		$meta['metadescription'] = '';
		$meta['metakeywords'] = '';
		
		$t = new layout('main_index');
		$t->display($meta);
	}
}
?>
