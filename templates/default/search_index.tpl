<div style="margin:5px;">
	{if $locations_count > 0}
		<div>
			<h3 class="acch3">S-au gasit {$locations_count} rezultate pentru <span style="color:#ff0000;">{$q|strip_tags}</span> ({$locations_time} secunde):</h3>
			{foreach from=$locations item=new_location}
			<div class="accs">
				<div class="acctitle">
						<div><a href="{url o=$new_location.class m='location' region=$new_location.region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.title|truncate:100} | {$new_location.region_title} | {$new_location.country_title} | {$new_location.price} {$new_location.currency_title} </a></div>
					</div>
					<div class="accbody">
						{if $new_location.location_description > ''}
							<div>{$new_location.location_description|strip_tags|truncate:400}</div>
						{else}
							<div>{$new_location.description|strip_tags|truncate:400}</div>
						{/if}
						<div style="padding-top:5px;"><span class="url">{url o=$new_location.class m='location' region=$new_location.region_code location=$new_location.code}</span></div>						
					</div>
			</div>
			{foreachelse}
			<div class="accs">
				<b>Nu exista rezultate pentru cautarea dumneavoastra.</b>
			</div>	
			{/foreach}
		</div>
	{else}
		<div class="accs">
			<b>Nu exista rezultate pentru cautarea dumneavoastra.</b>
		</div>
	{/if}
</div>