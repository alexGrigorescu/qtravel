{foreach from=$elements item=element}
{if $element.type == 'formelementtabpane'}
	{if $start_tabpane==1}</div>{/if}
	{$element.image}
	{assign var='start_tabpane' value='1'}
{elseif $element.type == 'formelementtab'}
	{if $start_tab==1}</div>{/if}
	{$element.image}
	{assign var='start_tab' value='1'}
{elseif $element.type == 'formelementheader'}
	<div class="header">{$element.label}</div>
{elseif $element.type == 'formelementhidden'}
	<div class="hidden">{$element.image}</div>
{elseif $element.type == 'formelementwysiwyg'}
	<table class="row">
	<tr>
		<td class="label" colspan="2">{$element.label}</td>
	</tr>
	<tr>
		<td class="element">{$element.image}</td>
		<td class="help">{$element.help}</td>
	</tr>
	</table>
{elseif $element.type == 'formelementsubmit' || $element.type == 'formelementbutton'}
{else}
<table class="row">
<tr>
	<td class="label">{$element.label}</td>
	<td class="element">{$element.image}</td>
	<td class="help">{$element.help}</td>
</tr>
</table>
{/if}
{/foreach}
{if $start_tab==1}</div>{/if}
{if $start_tabpane==1}</div>{/if}
