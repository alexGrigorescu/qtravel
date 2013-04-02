{$top}
<table border="0" cellpadding="0" cellspacing="0" class="{$class}">
<tr>
{foreach from=$columns item=column}
	<td class="header" style="{$column.style_header}">{$column.header}</td>
{/foreach}
</tr>
{$header}
{counter name=i start=0 print=false}
{foreach from=$data item=row}
{counter assign=i}
<tr class="row{$i%2}" onmouseover="this.className='row'" onmouseout="this.className='row1'">
{foreach from=$columns item=column}
	<td class="cell{$i%2}" style="{$column.style}" nowrap>{$row[$column.field]}</td>
{/foreach}
</tr>
{/foreach}
{$footer}
<tr><td colspan="{$columns_count}" class="footer">{$pageing}</td></tr></table>
{$bottom}


