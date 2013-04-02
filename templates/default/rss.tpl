<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>{$title}</title>
		<atom:link href="{url o=$OBJ m='rss'}" rel="self" type="application/rss+xml" />
		<link>{url o=$OBJ m='rss'}</link>
		<language>{$lang}</language>
		<pubDate>{$today|date_format:"%a, %d %b %Y %H:%M:%S %z"}</pubDate>
		<lastBuildDate>{$today|date_format:"%a, %d %b %Y %H:%M:%S %z"}</lastBuildDate>
		<ttl>30</ttl>
		{foreach from=$items item=item}
			<item>
				<title>{$item.title}</title>
				<link>{$item.url}</link>
				<description>{$item.description|escape:"br"}</description>
				<pubDate>{$item.date|date_format:"%a, %d %b %Y %H:%M:%S %z"}</pubDate>
				<guid isPermaLink="true">{$item.url}</guid>
			</item>
		{/foreach}
	</channel>
</rss>