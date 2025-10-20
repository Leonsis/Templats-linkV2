<head>
    <meta charset="utf-8">
    <?php if(isset($blog) && isset($blog['meta_title'])): ?>
        <title><?php echo e($blog['meta_title']); ?></title>
        <meta name="description" content="<?php echo e($blog['meta_description']); ?>">
        <meta name="keywords" content="<?php echo e($blog['meta_keywords']); ?>">
    <?php else: ?>
        <title><?php echo e(\App\Helpers\HeadHelper::getMetaTitle($currentPage ?? 'global', 'Griffo')); ?></title>
        <meta name="description" content="<?php echo e(\App\Helpers\HeadHelper::getMetaDescription($currentPage ?? 'global', 'Griffo')); ?>">
        <meta name="keywords" content="<?php echo e(\App\Helpers\HeadHelper::getMetaKeywords($currentPage ?? 'global', 'Griffo')); ?>">
    <?php endif; ?>
    <meta content="TherpyFlow Webflow template suits for therapy, chiropractors, therapists, health &amp; wellness, clinics, rehabilitation, physiotherapist, acupuncture, healthcare, mental health, physiotherapy, psychology, massage centers, trauma counseling, psychotherapist, psychologist, psychiatrist, personal trainer, life coaches, injury prevention, geriatric care &amp; medical related service websites" name="description">
    <meta content="TherpyFlow - Webflow Ecommerce website template" property="og:title">
    <meta content="TherpyFlow Webflow template suits for therapy, chiropractors, therapists, health &amp; wellness, clinics, rehabilitation, physiotherapist, acupuncture, healthcare, mental health, physiotherapy, psychology, massage centers, trauma counseling, psychotherapist, psychologist, psychiatrist, personal trainer, life coaches, injury prevention, geriatric care &amp; medical related service websites" property="og:description">
    <meta content="https://cdn.prod.website-files.com/67a0ac47a8fdf9b14caf1504/6876155ba03250f6631960c2_TherpyFlow-Therphy%20and%20Chiropractor%20Webflow%20Template.webp" property="og:image">
    <meta content="TherpyFlow - Webflow Ecommerce website template" property="twitter:title">
    <meta content="TherpyFlow Webflow template suits for therapy, chiropractors, therapists, health &amp; wellness, clinics, rehabilitation, physiotherapist, acupuncture, healthcare, mental health, physiotherapy, psychology, massage centers, trauma counseling, psychotherapist, psychologist, psychiatrist, personal trainer, life coaches, injury prevention, geriatric care &amp; medical related service websites" property="twitter:description">
    <meta content="https://cdn.prod.website-files.com/67a0ac47a8fdf9b14caf1504/6876155ba03250f6631960c2_TherpyFlow-Therphy%20and%20Chiropractor%20Webflow%20Template.webp" property="twitter:image">
    <meta property="og:type" content="website">
    <meta content="summary_large_image" name="twitter:card">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="<?php echo e(asset('temas/Griffo/assets/css/normalize.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('temas/Griffo/assets/css/webflow.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('temas/Griffo/assets/css/griffo-ef20db.webflow.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Funnel Display:300,regular,500,600,700,800","Italiana:regular","Inter:300,regular,500,600,700,800,900"]  }});</script>
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="<?php echo e(\App\Helpers\HeadHelper::getFavicon()); ?>" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo e(asset('temas/Griffo/assets/images/webclip.webp')); ?>" rel="apple-touch-icon">
    <?php
        $gtmHead = \App\Helpers\HeadHelper::getGtmHead($currentPage ?? 'global');
    ?>
    <?php if($gtmHead): ?>
        <?php echo $gtmHead; ?>

    <?php endif; ?>
</head><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Templats-linkV2/resources/views/temas/Griffo/inc/head.blade.php ENDPATH**/ ?>