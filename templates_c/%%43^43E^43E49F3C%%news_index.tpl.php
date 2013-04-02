<?php /* Smarty version 2.6.18, created on 2009-04-29 22:08:57
         compiled from /home/qtravel/public_html/templates/default/news_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/news_index.tpl', 3, false),array('function', 'url', '/home/qtravel/public_html/templates/default/news_index.tpl', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['news_count'] > 0): ?>
	<div style="margin:5px;">
		<div><h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'layout_news','class' => 'layout'), $this);?>
</h3></div>
		<div class="news-list">
		<?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news_item']):
?>
			<div class="subpage">
				<div class="header"><h2 title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
"><a href="<?php echo smarty_function_url(array('o' => 'news','m' => 'details','code' => $this->_tpl_vars['news_item']['code']), $this);?>
" title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
"><?php echo $this->_tpl_vars['news_item']['title']; ?>
</a></h2></div>
				<div class="leadtext"><?php echo $this->_tpl_vars['news_item']['description']; ?>
</div>				
				<div class="permalink">
					<span class="feed_title">Sursa: <a href="<?php echo $this->_tpl_vars['news_item']['permalink']; ?>
" title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
"  rel="nofollow"> <?php echo $this->_tpl_vars['news_item']['feed_title']; ?>
</span></a>
					|
					<span class="date">Publicat: <?php echo $this->_tpl_vars['news_item']['date_format']; ?>
</span>			
				</div>
			</div>
		<?php endforeach; endif; unset($_from); ?>
		</div>
		<div class="pageing">
		<?php echo $this->_tpl_vars['pageing']; ?>

		</div>
	</div>
<?php else: ?>
	<div>
		<div><h3 class="acch3"><?php echo smarty_function_tr(array('key' => 'layout_news','class' => 'layout'), $this);?>
</h3></div>
		<div><?php echo smarty_function_tr(array('key' => 'news_count_0','class' => 'layout'), $this);?>
</div>
	</div>
<?php endif; ?>