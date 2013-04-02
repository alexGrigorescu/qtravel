<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {link} function plugin
 *
 * Type:     function<br>
 * Name:     url<br>
 * Purpose:  generate a anchor<br>
 * @author Radu Baranga <radu dot baranga at gmail dot com>
 * @param array
 * @param Smarty
 */
function smarty_function_url($params, &$smarty)
{
	$o = $params['o'];unset($params['o']);
	$m = $params['m'];unset($params['m']);
	$clean = elementNr($params['clean']);
	if ($clean)
	{
    	return getCleanLink($o, $m);
	}
	else 
	{
		return url($o, $m, $params);
	}
}

/* vim: set expandtab: */

?>
