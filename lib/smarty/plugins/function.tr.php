<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {tr} function plugin
 *
 * Type:     function<br>
 * Name:     tr<br>
 * Purpose:  generate a anchor<br>
 * @author Radu Baranga <radu dot baranga at gmail dot com>
 * @param array
 * @param Smarty
 */
function smarty_function_tr($params, &$smarty)
{
	return tr($params['key'], $params['class'], $params['section']);
}

/* vim: set expandtab: */

?>
