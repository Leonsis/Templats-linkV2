<?php
    // Detectar página atual baseada na rota
    $currentPage = 'global';
    
    // Rotas principais
    if (request()->routeIs('home')) {
        $currentPage = 'home';
    } elseif (request()->routeIs('sobre')) {
        $currentPage = 'sobre';
    } elseif (request()->routeIs('contato')) {
        $currentPage = 'contato';
    } elseif (request()->routeIs('login')) {
        $currentPage = 'login';
    }
    
    // Rotas dinâmicas do tema
    $routeName = request()->route() ? request()->route()->getName() : '';
    if (str_starts_with($routeName, 'tema.Dentista24h.')) {
        $currentPage = str_replace('tema.Dentista24h.', '', $routeName);
    }
?>

<!DOCTYPE html>

<?php echo $__env->yieldContent('html'); ?>
    
<?php echo $__env->make('temas.Dentista24h.inc.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <!-- Google Tag Manager (noscript) -->
    <?php if(\App\Helpers\HeadHelper::getGtmBody($currentPage)): ?>
        <?php echo \App\Helpers\HeadHelper::getGtmBody($currentPage); ?>

    <?php endif; ?>

    <div class="banner-bg-wrap">
       <?php echo $__env->make('temas.Dentista24h.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    <!-- /div está dentro de content -->
    <?php echo $__env->make('temas.Dentista24h.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('temas.Dentista24h.inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('floatingButton.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Templats-linkV2/resources/views/temas/Dentista24h/layouts/app.blade.php ENDPATH**/ ?>