{if $news_count > 0}
	<div style="margin:5px;">
		<div><h3 class="acch3">{tr key='layout_news' class="layout"}</h3></div>
		<div class="news-list">
		{foreach from=$news item=news_item}
			<div class="subpage">
				<div class="header"><h2 title="{$news_item.title}"><a href="{url o='news' m='details' code=$news_item.code}" title="{$news_item.title}">{$news_item.title}</a></h2></div>
				<div class="leadtext">{$news_item.description}</div>				
				<div class="permalink">
					<span class="feed_title">Sursa: <a href="{$news_item.permalink}" title="{$news_item.title}"  rel="nofollow"> {$news_item.feed_title}</span></a>
					|
					<span class="date">Publicat: {$news_item.date_format}</span>			
				</div>
			</div>
		{/foreach}
		</div>
		<div class="pageing">
		{$pageing}
		</div>
	</div>
{else}
	<div>
		<div><h3 class="acch3">{tr key='layout_news' class="layout"}</h3></div>
		<div>{tr key='news_count_0' class="layout"}</div>
	</div>
{/if}