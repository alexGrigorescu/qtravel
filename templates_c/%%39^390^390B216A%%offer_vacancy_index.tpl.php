<?php /* Smarty version 2.6.18, created on 2013-03-03 11:29:06
         compiled from D:/wamp/www/qtravel/public_html/templates/default/offer_vacancy_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'D:/wamp/www/qtravel/public_html/templates/default/offer_vacancy_index.tpl', 7, false),)), $this); ?>
<table style="border:solid 0px grey;width:60%">
<tr>
	<td colspan='2'>Administrare site <i>oferta-vacanta.ro</i></td>
</tr>
<tr>
	<td style="width:30%;border:solid 1px grey;">
		<input type="button" value="Meniu" class="button_save" style="width:100%" onclick="location.href='<?php echo smarty_function_url(array('o' => 'offer_vacancy','m' => 'menu'), $this);?>
'">
	</td>
	<td style="border:solid 1px grey;">
		Administrare butoane meniu.
	</td>
</tr>
<tr>
	<td style="width:30%;border:solid 1px grey;">
		<input type="button" value="Cautare" class="button_save" style="width:100%" onclick="location.href='<?php echo smarty_function_url(array('o' => 'offer_vacancy','m' => 'home_search'), $this);?>
'">
	</td>
	<td style="border:solid 1px grey;">
		Administrare butoane cautare din pagina principala.
	</td>
</tr>
<tr>
	<td style="width:30%;border:solid 1px grey;">
		<input type="button" value="Promotii" class="button_save" style="width:100%" onclick="location.href='<?php echo smarty_function_url(array('o' => 'offer_vacancy','m' => 'home_promotions'), $this);?>
'">
	</td>
	<td style="border:solid 1px grey;">
		Administrare promotii din pagina principala.
	</td>
</tr>
<tr>
	<td style="width:30%;border:solid 1px grey;">
		<input type="button" value="Reclame" class="button_save" style="width:100%" onclick="location.href='<?php echo smarty_function_url(array('o' => 'offer_vacancy','m' => 'advertising'), $this);?>
'">
	</td>
	<td style="border:solid 1px grey;">
		Administrare reclame.
	</td>
</tr>

</table>