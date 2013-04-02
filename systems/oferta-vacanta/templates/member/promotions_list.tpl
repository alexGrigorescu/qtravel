<div id="promo-offers">
	<ul>
		{foreach from=$locations item=location}
			<div itemscope itemtype="http://schema.org/Place">
				<a itemprop="url" href="{$url}cazare/{$location.region_code}/{$location.code}.html"><li>
					<div class="promo-item-container">
						<!--<img src="{$img_path}{$location.promo_thumb}">-->
						<img src="{$location.location_thumb_url}" width="174" height="90">
					</div>
					<div class="promo-text-container">
						<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<span class="promo-title-violet" itemprop="addressLocality">{$location.region_title}</span>
						</div>
						<span itemprop="name" class="promo-text-violet">{$location.promo_title}</span>
					</div>
					<div class="regular-buble">
						<span>{$location.price}</span>
					</div>
				</li></a>
			</div>
		{/foreach}
	</ul>
</div>
<div id="promo-buttons">
	<ul>
		<li id="promo-back" class="{if $page gt 0}back-active{else}back-inactive{/if}"></li>
		<li id="promo-next" class="{if $page lt $pageTotalCount}next-active{else}next-inactive{/if}"></li>
	</ul>
</div>
{literal}
<script>
$(function() {
	{/literal}{if $page gt 0}{literal}
	$("#promo-back").click(function() {
		$("#hid-page-promotion").val("{/literal}{$page-1}{literal}")
		getPromotionList({/literal}"{$method}"{literal});
	});
	{/literal}{/if}{literal}
	{/literal}{if $page lt $pageTotalCount}{literal}
	$("#promo-next").click(function() {
		$("#hid-page-promotion").val("{/literal}{$page+1}{literal}")
		getPromotionList({/literal}"{$method}"{literal});
	});
	{/literal}{/if}{literal}
});
</script>
{/literal}				
			