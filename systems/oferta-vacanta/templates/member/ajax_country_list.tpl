<ul>
	{if $countries|@count gt 0}
	{foreach from=$countries name=countriesName item=country}
		{if $smarty.foreach.countriesName.index eq 15 || $smarty.foreach.countriesName.index eq 30}
		</ul>
			{if $smarty.foreach.countriesName.index eq 15}
			<ul class="second">
			{elseif $smarty.foreach.countriesName.index eq 30}
			<ul class="third">
			{/if}
		{/if}
		<li class="country" onmouseover="$('#towns-list-{$country.code}').addClass('towns-list-visible');" onmouseout="$('#towns-list-{$country.code}').removeClass('towns-list-visible');">
			<a href="{url o=$object m=country country=$country.code}" style="text-decoration:none;margin:0;padding:0;color:inherit">
				{$country.title}
			</a>
			
			<div id="towns-list-{$country.code}" class="towns-list">
			<ul>
			{foreach from=$country.towns name=townsName item=town}
			
				<li class="town"><a href="{url o=$object m=region region=$town.code}">{$town.title}</a></li>
			
			{/foreach}
			</ul>
			</div>
		</li>
	{/foreach}
	{else}
		<li style="width:200px;">Nu exista oferte pentru continentul ales !</li>
	{/if}
</ul>