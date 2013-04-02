<?php /* Smarty version 2.6.18, created on 2013-02-07 18:37:55
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_vacancy_ticket_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/ajax_vacancy_ticket_details.tpl', 22, false),)), $this); ?>
<span class="description-title">Locatie</span><br />
<table>
<tr>
	<td><span class="description-text">Oras plecare: </span></td>
	<td><span class="description-text"><?php echo $this->_tpl_vars['location']['start_region_title']; ?>
</span></td>
</tr>
<tr>
	<td><span class="description-text">Tara plecare: </span></td>
	<td><span class="description-text"><?php echo $this->_tpl_vars['location']['start_country_title']; ?>
</span></td>
</tr>
<tr>
	<td><span class="description-text">Oras destinatie: </span></td>
	<td><span class="description-text"><?php echo $this->_tpl_vars['location']['end_region_title']; ?>
</span></td>
</tr>
<tr>
	<td><span class="description-text">Tara destinatie: </span></td>
	<td><span class="description-text"><?php echo $this->_tpl_vars['location']['end_country_title']; ?>
</span></td>
</tr>
</table>
<?php if ($this->_tpl_vars['offer_type'] == 'Avion'): ?>
<br/>
<span class="description-text"><?php echo smarty_function_tr(array('key' => 'flight_description_bottom_message'), $this);?>
</span>
<?php endif; ?>