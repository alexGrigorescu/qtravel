<?php /* Smarty version 2.6.18, created on 2013-02-07 22:43:20
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/feedback.tpl */ ?>
<link rel="stylesheet" href="/css/oferta-vacanta/jquery.ui.all.css">
<link rel="stylesheet" href="/css/oferta-vacanta/jquery.jscrollpane.css">
<link rel="stylesheet" href="/css/oferta-vacanta/lytebox.css">

<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/javascript/oferta-vacanta/jquery-ui-1.8.18.custom.min.js"></script>
<link rel="stylesheet" href="<?php echo @LOCAL_URL; ?>
style.css" type="text/css" media="all" />
<div id="page">
<div id="detail-reservation-form">
<div id="detail-feedback">
<?php if ($this->_tpl_vars['saved'] == 1): ?>
<span class="description-text-white">Datele au fost salvate !</span>
<?php else: ?>
<span class="description-text-red"><?php echo $this->_tpl_vars['err']; ?>
</span>
<?php echo $this->_tpl_vars['form_image']; ?>

<?php endif; ?>
</div>
</div>
</div>