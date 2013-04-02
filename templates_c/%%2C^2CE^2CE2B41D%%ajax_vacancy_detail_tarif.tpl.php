<?php /* Smarty version 2.6.18, created on 2013-02-07 17:32:32
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_vacancy_detail_tarif.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_vacancy_detail_tarif.tpl', 38, false),array('modifier', 'strlen', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_vacancy_detail_tarif.tpl', 87, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['priceImages1Night']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['priceImage']):
?>
<img src="<?php echo $this->_tpl_vars['priceImage']['path']; ?>
">
<?php endforeach; endif; unset($_from); ?>
<span class="description-text">
	<?php $_from = $this->_tpl_vars['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price_format']):
?>
		<?php $this->assign('price_single', 0); ?>
		<?php $this->assign('price_double', 0); ?>
		<?php $this->assign('price_3adult', 0); ?>
		<?php $this->assign('price_triple', 0); ?>
		<?php $this->assign('price_1child', 0); ?>
		<?php $this->assign('price_2child', 0); ?>
		<?php $this->assign('price_extra1', 0); ?>
		<?php $this->assign('price_extra2', 0); ?>
		<?php $this->assign('price_extra3', 0); ?>
		<?php $this->assign('w', 0); ?>
		<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
			<?php if ($this->_tpl_vars['new_price']['price_single'] != -1): ?><?php $this->assign('price_single', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_double'] != -1): ?><?php $this->assign('price_double', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_3adult'] != -1): ?><?php $this->assign('price_3adult', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_triple'] != -1): ?><?php $this->assign('price_triple', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_1child'] != -1): ?><?php $this->assign('price_1child', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_2child'] != -1): ?><?php $this->assign('price_2child', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_extra1'] != -1): ?><?php $this->assign('price_extra1', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_extra2'] != -1): ?><?php $this->assign('price_extra2', 1); ?><?php endif; ?>
			<?php if ($this->_tpl_vars['new_price']['price_extra3'] != -1): ?><?php $this->assign('price_extra3', 1); ?><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		
		<?php if ($this->_tpl_vars['price_single']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_double']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_3adult']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_triple']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_1child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_2child']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_extra1']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_extra2']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		<?php if ($this->_tpl_vars['price_extra3']): ?><?php $this->assign('w', ($this->_tpl_vars['w']+1)); ?><?php endif; ?>
		
		<span class="description-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['new_price_format']['title'])) ? $this->_run_mod_handler('substr', true, $_tmp, 2) : substr($_tmp, 2)); ?>
</span>
		<table class="prices" cellpadding="0" cellspacing="0">
		<tr>
			<td class="left header date">De la</td>
			<td class="left header date">Pana la</td>
			<?php if ($this->_tpl_vars['price_single']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_single']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_double']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_double']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_3adult']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_triple']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_triple']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_1child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_1child']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_2child']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_2child']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra1']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra2']; ?>
</td><?php endif; ?>
			<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right header w<?php echo $this->_tpl_vars['w']; ?>
"><?php echo $this->_tpl_vars['location']['price_extra3']; ?>
</td><?php endif; ?>
		</tr>
		<?php $_from = $this->_tpl_vars['new_price_format']['prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_price']):
?>
			<tr>
				<td class="left"><?php echo $this->_tpl_vars['new_price']['date_start_format']; ?>
</td>
				<td class="left"><?php echo $this->_tpl_vars['new_price']['date_end_format']; ?>
</td>
				<?php if ($this->_tpl_vars['price_single']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_single_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_double']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_double_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_3adult']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_3adult_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_triple']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_triple_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_1child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_1child_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_2child']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_2child_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra1']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_extra1_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra2']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_extra2_format']; ?>
</td><?php endif; ?>
				<?php if ($this->_tpl_vars['price_extra3']): ?><td class="right"><?php echo $this->_tpl_vars['new_price']['night']['price_extra3_format']; ?>
</td><?php endif; ?>
			</td>
		<?php endforeach; endif; unset($_from); ?>
		</table>
		<br/><br/>
	<?php endforeach; endif; unset($_from); ?>
</span><br />
<span class="description-text" style="font-style:italic;">
* Preturile sunt exprimate in 
<?php if ($this->_tpl_vars['location']['currency_code'] == 'usd'): ?>
	dolari ($)
<?php elseif ($this->_tpl_vars['location']['currency_code'] == 'lei'): ?>
	lei (RON)
<?php else: ?>
	euro (&euro;)
<?php endif; ?> si sunt calculate pe
<?php if ($this->_tpl_vars['location']['accommodation_period'] == 21): ?> 
	o noapte
<?php else: ?>
	o perioada de <?php echo $this->_tpl_vars['accommodationPeriod']; ?>
 zile
<?php endif; ?>
</span><br /><br />	
<?php if (((is_array($_tmp=$this->_tpl_vars['location']['description'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 0): ?>
<span class="description-title">Descriere</span>
<span class="description-text" itemprop="description"><?php echo $this->_tpl_vars['location']['description']; ?>
</span><br /><br />
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['location']['description_included'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 0): ?>
<span class="description-title">Tariful include:</span>
<span class="description-text"><?php echo $this->_tpl_vars['location']['description_included']; ?>
</span><br /><br />
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['location']['description_not_included'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 0): ?>
<span class="description-title">Tariful nu include:</span>
<span class="description-text"><?php echo $this->_tpl_vars['location']['description_not_included']; ?>
</span><br /><br />
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['location']['description_early_booking'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 0): ?>
<span class="description-title">Early booking:</span>
<span class="description-text"><?php echo $this->_tpl_vars['location']['description_early_booking']; ?>
</span><br /><br />
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['location']['description_special_offer'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 0): ?>
<span class="description-title">Oferta speciala:</span>
<span class="description-text"><?php echo $this->_tpl_vars['location']['description_special_offer']; ?>
</span><br /><br />
<?php endif; ?>