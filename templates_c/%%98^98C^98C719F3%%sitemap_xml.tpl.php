<?php /* Smarty version 2.6.18, created on 2009-01-17 19:52:47
         compiled from /home/qtravel/public_html/templates/default/sitemap_xml.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php $_from = $this->_tpl_vars['sitemap']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sitemap_item']):
?>
	<url>
		<loc><?php echo $this->_tpl_vars['sitemap_item']['url']; ?>
</loc>		
	</url>
<?php endforeach; endif; unset($_from); ?>
</urlset>