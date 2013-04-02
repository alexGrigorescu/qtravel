<?php /* Smarty version 2.6.18, created on 2008-09-13 23:40:41
         compiled from /home/qtravel/public_html/templates/default/news_details.tpl */ ?>
<div class="news-list">
	<div class="subpage">
		<div class="header"><h2 title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
"><?php echo $this->_tpl_vars['news_item']['title']; ?>
</h2></div>
		<div class="leadtext"><?php echo $this->_tpl_vars['news_item']['content']; ?>
</div>				
		<div class="permalink">
			<span class="feed_title">Sursa: <a href="<?php echo $this->_tpl_vars['news_item']['permalink']; ?>
" title="<?php echo $this->_tpl_vars['news_item']['title']; ?>
" rel="nofollow"> <?php echo $this->_tpl_vars['news_item']['feed_title']; ?>
</span></a>
			|
			<span class="date">Publicat: <?php echo $this->_tpl_vars['news_item']['date_format']; ?>
</span>			
		</div>
	</div>
</div>