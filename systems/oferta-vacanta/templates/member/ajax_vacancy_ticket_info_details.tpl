<br />
<span class="description-title">Locatie</span><br />
<table>
<tr>
	<td><span class="description-text">Oras plecare: </span></td>
	<td><span class="description-text">{$location.start_region_title}</span></td>
</tr>
<tr>
	<td><span class="description-text">Tara plecare: </span></td>
	<td><span class="description-text">{$location.start_country_title}</span></td>
</tr>
<tr>
	<td><span class="description-text">Oras destinatie: </span></td>
	<td><span class="description-text">{$location.end_region_title}</span></td>
</tr>
<tr>
	<td><span class="description-text">Tara destinatie: </span></td>
	<td><span class="description-text">{$location.end_country_title}</span></td>
</tr>
</table>
{if $offer_type eq 'Avion'}
<br/>
<span class="description-text">{tr key="flight_description_bottom_message"}</span>
{/if}
<br />

<h2>Alte informatii 
{if $offer_type eq 'Autocar'}
- Bilete autocar 
{elseif $offer_type eq 'Avion'}
- Bilete avion 
{/if}
{if $location.start_region_title neq '' && $location.end_region_title neq ''}
{$location.start_region_title} - {$location.end_region_title}
{/if}
</h2><br />
<span class="description-text" itemprop="description">{$location.description}</span>