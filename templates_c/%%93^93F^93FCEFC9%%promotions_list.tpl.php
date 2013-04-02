<?php /* Smarty version 2.6.18, created on 2013-03-03 10:27:39
         compiled from D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/promotions_list.tpl */ ?>
<div id="promo-offers">
	<ul>
		<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['location']):
?>
			<div itemscope itemtype="http://schema.org/Place">
				<a itemprop="url" href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['location']['region_code']; ?>
/<?php echo $this->_tpl_vars['location']['code']; ?>
.html"><li>
					<div class="promo-item-container">
						<!--<img src="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo $this->_tpl_vars['location']['promo_thumb']; ?>
">-->
						<img src="<?php echo $this->_tpl_vars['location']['location_thumb_url']; ?>
" width="174" height="90">
					</div>
					<div class="promo-text-container">
						<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<span class="promo-title-violet" itemprop="addressLocality"><?php echo $this->_tpl_vars['location']['region_title']; ?>
</span>
						</div>
						<span itemprop="name" class="promo-text-violet"><?php echo $this->_tpl_vars['location']['promo_title']; ?>
</span>
					</div>
					<div class="regular-buble">
						<span><?php echo $this->_tpl_vars['location']['price']; ?>
</span>
					</div>
				</li></a>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>
<div id="promo-buttons">
	<ul>
		<li id="promo-back" class="<?php if ($this->_tpl_vars['page'] > 0): ?>back-active<?php else: ?>back-inactive<?php endif; ?>"></li>
		<li id="promo-next" class="<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pageTotalCount']): ?>next-active<?php else: ?>next-inactive<?php endif; ?>"></li>
	</ul>
</div>
<?php echo '
<script>
$(function() {
	'; ?>
<?php if ($this->_tpl_vars['page'] > 0): ?><?php echo '
	$("#promo-back").click(function() {
		$("#hid-page-promotion").val("'; ?>
<?php echo $this->_tpl_vars['page']-1; ?>
<?php echo '")
		getPromotionList('; ?>
"<?php echo $this->_tpl_vars['method']; ?>
"<?php echo ');
	});
	'; ?>
<?php endif; ?><?php echo '
	'; ?>
<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pageTotalCount']): ?><?php echo '
	$("#promo-next").click(function() {
		$("#hid-page-promotion").val("'; ?>
<?php echo $this->_tpl_vars['page']+1; ?>
<?php echo '")
		getPromotionList('; ?>
"<?php echo $this->_tpl_vars['method']; ?>
"<?php echo ');
	});
	'; ?>
<?php endif; ?><?php echo '
});
</script>
'; ?>
				
			