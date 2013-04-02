<table border="0" cellspacing="0" cellpadding="2" width="100%" class="pageing">
<tr>	
	<td style="width:200px;" class="pageing" nowrap>Found {$rec_count} records.</td>
	<td align="left" width="30" class="pageing">{if $page > 5}<a href="{$links.page_back_back}">&lt;&lt;</a>{else}&lt;&lt;{/if}</td>
	<td align="left" width="30" class="pageing">{if $page > 0}<a href="{$links.page_back}">&lt;</a>{else}&lt;{/if}</td>					
	{foreach from=$pages item=page_item}<td align="center" class="pageing">{if $page_item.value == $page}<b>{$page_item.title}</b>{else}<a href="{$page_item.link}">{$page_item.title}</a>{/if}</td>{/foreach} 
	<td align="right" width=30 class="pageing">{if $page + 1 < $page_count}<a href="{$links.page_next}">&gt;</a>{else}&gt;{/if}</td>
	<td align="right" width=30 class="pageing">{if $page + 5 < $page_count}<a href="{$links.page_next_next}">&gt;&gt;</a>{else}&gt;&gt;{/if}</td>							
</tr>
</table>