<div class="sitemap">
	{foreach from=$pages_item item=page_item}
		<h{$page_item.level} class="level{$page_item.level}">
			<a href="{url o='pages' m='index' code=$page_item.code}">{$page_item.title}</a>
		</h{$page_item.level}>
	{/foreach}
</div>
			