<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Easy Menu Manager</title>
<meta charset="utf-8">

<link rel="stylesheet" href="<?php echo _BASE_URL; ?>templates/css/style.css">
<!--[if lte IE 8]>
<script type="text/javascript" src="<?php echo _BASE_URL; ?>templates/js/html5.js"></script>
<![endif]-->
<script>
var _BASE_URL = '<?php echo _BASE_URL; ?>';
var current_group_id = <?php echo $group_id; ?>;
</script>
<script src="<?php echo _BASE_URL; ?>templates/js/jquery.1.4.1.min.js"></script>
<script src="<?php echo _BASE_URL; ?>templates/js/interface-1.2.js"></script>
<script src="<?php echo _BASE_URL; ?>templates/js/inestedsortable.js"></script>
<script src="<?php echo _BASE_URL; ?>templates/js/menu.js"></script>

</head>
<body>
	<div id="wrapper">
		<header>
			<h1><a href="<?php echo site_url('menu'); ?>">Easy Menu Manager</a></h1>
			<div id="link">
				<a class="button red" href="<?php echo _BASE_URL; ?>" target="_blank">Preview Menu</a>
			</div>
		</header>
		<div id="content">
			<div id="main">
				<ul id="menu-group">
					<?php foreach ((array)$menu_groups as $id => $title) : ?>
					<li id="group-<?php echo $id; ?>">
						<a href="<?php echo site_url('menu&amp;group_id=' . $id); ?>">
							<?php echo $title; ?>
						</a>
					</li>
					<?php endforeach; ?>
					<li id="add-group"><a href="<?php echo site_url('menu_group.add'); ?>" title="Add Group">+</a></li>
				</ul>
				<div class="clear"></div>

				<form method="post" id="form-menu" action="<?php echo site_url('menu.save_position'); ?>">
					<div class="ns-row" id="ns-header">
						<div class="ns-actions">Actions</div>
						<div class="ns-class">Class</div>
						<div class="ns-url">URL</div>
						<div class="ns-title">Title</div>
					</div>
					<?php echo $menu_ul; ?>
					<div id="ns-footer">
						<button type="submit" class="button green small" id="btn-save-menu">Update Menu</button>
					</div>
				</form>
			</div>
			<aside>
				<section class="box">
					<h2>Info</h2>
					<div>
						<p>Drag the menu list to re-order, and click <b>Update Menu</b> to save the position.</p>
						<p>To add a menu item, use the form below.</p>
					</div>
				</section>
				<section class="box">
					<h2>Current Group</h2>
					<div>
						<span id="edit-group-input"><?php echo $group_title; ?></span>
						(ID: <b><?php echo $group_id; ?></b>)
						<div>
							<a id="edit-group" href="#">Edit</a>
							<?php if ($group_id > 1) : ?>
							&middot; <a id="delete-group" href="#">Delete</a>
							<?php endif; ?>
						</div>
					</div>
				</section>
				<section class="box">
					<h2>Add Menu Item</h2>
					<div>
						<form id="form-add-menu" method="post" action="<?php echo site_url('menu.add'); ?>">
							<p>
								<label for="menu-title">Title</label>
								<input type="text" name="title" id="menu-title">
							</p>
							<p>
								<label for="menu-url">URL</label>
								<input type="text" name="url" id="menu-url">
							</p>
							<p>
								<label for="menu-class">Class</label>
								<input type="text" name="class" id="menu-class">
							</p>
							<p class="buttons">
								<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
								<button id="add-menu" type="submit" class="button green small">Add Menu Item</button>
							</p>
						</form>
					</div>
				</section>
			</aside>
			<div class="clear"></div>
		</div>
		<footer>
			Easy Menu Manager
		</footer>
	</div>
	<div id="loading">
		<img src="<?php echo _BASE_URL; ?>templates/images/ajax-loader.gif" alt="Loading">
		Processing...
	</div>
</body>
</html>