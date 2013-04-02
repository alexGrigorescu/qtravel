{foreach from=$priceImages7Night item=priceImage}
<img src="{$priceImage.path}">
{/foreach}
<span class="description-text">
	{foreach from=$prices item=new_price_format}
		{assign var='price_single' value=0}
		{assign var='price_double' value=0}
		{assign var='price_3adult' value=0}
		{assign var='price_triple' value=0}
		{assign var='price_1child' value=0}
		{assign var='price_2child' value=0}
		{assign var='price_extra1' value=0}
		{assign var='price_extra2' value=0}
		{assign var='price_extra3' value=0}
		{assign var='w' value=0}
		{foreach from=$new_price_format.prices item=new_price}
			{if $new_price.price_single != -1}{assign var='price_single' value=1}{/if}
			{if $new_price.price_double != -1}{assign var='price_double' value=1}{/if}
			{if $new_price.price_3adult != -1}{assign var='price_3adult' value=1}{/if}
			{if $new_price.price_triple != -1}{assign var='price_triple' value=1}{/if}
			{if $new_price.price_1child != -1}{assign var='price_1child' value=1}{/if}
			{if $new_price.price_2child != -1}{assign var='price_2child' value=1}{/if}
			{if $new_price.price_extra1 != -1}{assign var='price_extra1' value=1}{/if}
			{if $new_price.price_extra2 != -1}{assign var='price_extra2' value=1}{/if}
			{if $new_price.price_extra3 != -1}{assign var='price_extra3' value=1}{/if}
		{/foreach}
		
		{if $price_single}{assign var='w' value="`$w+1`"}{/if}
		{if $price_double}{assign var='w' value="`$w+1`"}{/if}
		{if $price_3adult}{assign var='w' value="`$w+1`"}{/if}
		{if $price_triple}{assign var='w' value="`$w+1`"}{/if}
		{if $price_1child}{assign var='w' value="`$w+1`"}{/if}
		{if $price_2child}{assign var='w' value="`$w+1`"}{/if}
		{if $price_extra1}{assign var='w' value="`$w+1`"}{/if}
		{if $price_extra2}{assign var='w' value="`$w+1`"}{/if}
		{if $price_extra3}{assign var='w' value="`$w+1`"}{/if}
		
		<span class="description-title">{$new_price_format.title|substr:2}</span>
		<table class="prices" cellpadding="0" cellspacing="0">
		<tr>
			<td class="left header date">De la</td>
			<td class="left header date">Pana la</td>
			{if $price_single}<td class="right header w{$w}">{$location.price_single}</td>{/if}
			{if $price_double}<td class="right header w{$w}">{$location.price_double}</td>{/if}
			{if $price_3adult}<td class="right header w{$w}">{$location.price_3adult}</td>{/if}
			{if $price_triple}<td class="right header w{$w}">{$location.price_triple}</td>{/if}
			{if $price_1child}<td class="right header w{$w}">{$location.price_1child}</td>{/if}
			{if $price_2child}<td class="right header w{$w}">{$location.price_2child}</td>{/if}
			{if $price_extra1}<td class="right header w{$w}">{$location.price_extra1}</td>{/if}
			{if $price_extra2}<td class="right header w{$w}">{$location.price_extra2}</td>{/if}
			{if $price_extra3}<td class="right header w{$w}">{$location.price_extra3}</td>{/if}
		</tr>
		{foreach from=$new_price_format.prices item=new_price}
			<tr>
				<td class="left">{$new_price.date_start_format}</td>
				<td class="left">{$new_price.date_end_format}</td>
				{if $price_single}<td class="right">{$new_price.night7.price_single_format}</td>{/if}
				{if $price_double}<td class="right">{$new_price.night7.price_double_format}</td>{/if}
				{if $price_3adult}<td class="right">{$new_price.night7.price_3adult_format}</td>{/if}
				{if $price_triple}<td class="right">{$new_price.night7.price_triple_format}</td>{/if}
				{if $price_1child}<td class="right">{$new_price.night7.price_1child_format}</td>{/if}
				{if $price_2child}<td class="right">{$new_price.night7.price_2child_format}</td>{/if}
				{if $price_extra1}<td class="right">{$new_price.night7.price_extra1_format}</td>{/if}
				{if $price_extra2}<td class="right">{$new_price.night7.price_extra2_format}</td>{/if}
				{if $price_extra3}<td class="right">{$new_price.night7.price_extra3_format}</td>{/if}
			</td>
		{/foreach}
		</table>
		<br/><br/>
	{/foreach}
</span><br />
<span class="description-text" style="font-style:italic;">
* Preturile sunt exprimate in 
{if $location.currency_code == 'usd'}
	dolari ($)
{elseif $location.currency_code == 'lei'}
	lei (RON)
{else }
	euro (&euro;)
{/if} si sunt calculate pe o perioada de 7 zile
</span><br /><br />	

{if $location.description|strlen gt 0}
<span class="description-title">Descriere</span>
<span class="description-text" itemprop="description">{$location.description}</span><br /><br />
{/if}
{if $location.description_included|strlen gt 0}
<span class="description-title">Tariful include:</span>
<span class="description-text">{$location.description_included}</span><br /><br />
{/if}
{if $location.description_not_included|strlen gt 0}
<span class="description-title">Tariful nu include:</span>
<span class="description-text">{$location.description_not_included}</span><br /><br />
{/if}
{if $location.description_early_booking|strlen gt 0}
<span class="description-title">Early booking:</span>
<span class="description-text">{$location.description_early_booking}</span><br /><br />
{/if}
{if $location.description_special_offer|strlen gt 0}
<span class="description-title">Oferta speciala:</span>
<span class="description-text">{$location.description_special_offer}</span><br /><br />
{/if}