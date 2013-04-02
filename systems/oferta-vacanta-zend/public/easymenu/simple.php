<?php
/**
 * Show menu (standalone version)
 * You can run this file directly or include this file from another php file
 * and use easymenu() function to display the menu
 * 
 * Example:
 * 
 * <?php
 * include 'easymenu/simple.php';
 * echo easymenu(1);
 * 
 */

include 'config.php';
include 'includes/db.php';
include 'includes/tree.php';
$db = new DB;
$db->Connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

function easymenu($group_id, $attr = '') {
	global $db;
	$tree = new Tree;

	$sql = sprintf(
		'SELECT * FROM %s WHERE group_id = %s ORDER BY %s, %s',
		MENU_TABLE,
		$group_id,
		MENU_PARENT,
		MENU_POSITION
	);
	$menu = $db->GetAll($sql);
	foreach ($menu as $row) {
		$label = '<a href="'.$row[MENU_URL].'">';
		$label .= $row[MENU_TITLE];
		$label .= '</a>';

		$li_attr = '';
		if ($row[MENU_CLASS]) {
			$li_attr = ' class="'.$row[MENU_CLASS].'"';
		}
		$tree->add_row($row[MENU_ID], $row[MENU_PARENT], $li_attr, $label);
	}
	$menu = $tree->generate_list($attr);
	return $menu;
}

//echo easymenu(1);