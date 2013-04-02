<link rel="stylesheet" href="/css/oferta-vacanta/jquery.ui.all.css">
<link rel="stylesheet" href="/css/oferta-vacanta/jquery.jscrollpane.css">
<link rel="stylesheet" href="/css/oferta-vacanta/lytebox.css">

<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-ui-1.8.18.custom.min.js"></script>
<link rel="stylesheet" href="{$smarty.const.LOCAL_URL}style.css" type="text/css" media="all" />
<div id="page">
<div id="detail-reservation-form">
<div id="detail-feedback">
{if $saved eq 1}
<span class="description-text-white">Datele au fost salvate !</span>
{else}
<span class="description-text-red">{$err}</span>
{$form_image}
{/if}
</div>
</div>
</div>