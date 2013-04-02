<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
{foreach from=$sitemap.data item=sitemap_item}
	<url>
		<loc>{$sitemap_item.url}</loc>		
	</url>
{/foreach}
</urlset>
