<?php /* Smarty version 2.6.18, created on 2008-09-13 18:04:26
         compiled from /home/qtravel/public_html/templates/default/rss.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/templates/default/rss.tpl', 7, false),array('modifier', 'date_format', '/home/qtravel/public_html/templates/default/rss.tpl', 10, false),array('modifier', 'escape', '/home/qtravel/public_html/templates/default/rss.tpl', 17, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title><?php echo $this->_tpl_vars['title']; ?>
</title>
		<atom:link href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['OBJ'],'m' => 'rss'), $this);?>
" rel="self" type="application/rss+xml" />
		<link><?php echo smarty_function_url(array('o' => $this->_tpl_vars['OBJ'],'m' => 'rss'), $this);?>
</link>
		<language><?php echo $this->_tpl_vars['lang']; ?>
</language>
		<pubDate><?php echo ((is_array($_tmp=$this->_tpl_vars['today'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %H:%M:%S %z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %H:%M:%S %z")); ?>
</pubDate>
		<lastBuildDate><?php echo ((is_array($_tmp=$this->_tpl_vars['today'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %H:%M:%S %z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %H:%M:%S %z")); ?>
</lastBuildDate>
		<ttl>30</ttl>
		<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			<item>
				<title><?php echo $this->_tpl_vars['item']['title']; ?>
</title>
				<link><?php echo $this->_tpl_vars['item']['url']; ?>
</link>
				<description><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'br') : smarty_modifier_escape($_tmp, 'br')); ?>
</description>
				<pubDate><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %H:%M:%S %z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %H:%M:%S %z")); ?>
</pubDate>
				<guid isPermaLink="true"><?php echo $this->_tpl_vars['item']['url']; ?>
</guid>
			</item>
		<?php endforeach; endif; unset($_from); ?>
	</channel>
</rss>