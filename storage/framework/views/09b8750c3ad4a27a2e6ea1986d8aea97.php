<?php
  $currentPath = request()->path();
  $currentRoute = request()->route()->getName();
?>

<?php if($currentPath === '' || $currentPath === '/'): ?>      
  <section class="home-banner first-version">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
      <div class="container-large w-container">
        <div class="navbar-whole-area">
          <a href="<?php echo e(route('home')); ?>" aria-current="page" class="navbar-brand w-nav-brand w--current">
            <img src="<?php echo e(\App\Helpers\NavbarHelper::getLogo()); ?>" loading="lazy" width="127" sizes="127px" alt="" class="navbar-brand-logo">
          </a>
          <div class="nav-menu-whole-area">
            <nav role="navigation" class="nav-menu-area w-nav-menu">
              <div class="nav-link-area">
                <a href="<?php echo e(route('home')); ?>" class="nav-link w-nav-link">Home</a>
                <a href="<?php echo e(route('sobre')); ?>" class="nav-link w-nav-link">Sobre Nós</a>
                <a href="<?php echo e(route('contato')); ?>" class="nav-link w-nav-link">Contato</a>
                <a href="<?php echo e(route('tema.Dentista24h.blogs')); ?>" class="nav-link w-nav-link">Blog</a>
              </div>
              <div class="nav-button-wrap">
                <a data-w-id="33b11859-9ca4-bcca-749a-e6f600664eba" href="<?php echo e(route('tema.Dentista24h.emergencia24')); ?>" class="primary-button w-inline-block">
                  <div class="primary-button-content">
                    <div class="primary-button-text">Emergência 24 Horas</div>
                  </div>
                  <div class="primary-button-arrow-area"></div>
                  <div class="primary-button-bg"></div>
                </a>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="banner-content-area style-guide">
      <div class="w-layout-blockcontainer container w-container">
        <div data-w-id="a38023cb-ed75-2e38-f90e-3dc609c6e559" style="opacity:0" class="banner-title-wrap">
          <h1 class="banner-title">Dentista 24 Horas em Brasília<br>‍<span class="banner-title-sub-text"><strong>7 dias da semana!</strong></span></h1>
          <div class="banner-button-wrap">
            <a data-w-id="8b221586-8fc8-aee9-02f9-392e2dcd3829" href="<?php echo e(route('tema.Dentista24h.emergencia24')); ?>" class="primary-button w-inline-block">
              <div class="primary-button-text">Agendamento Imediato</div>
              <div style="-webkit-transform:translate3d(-110%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(45deg, 0);-moz-transform:translate3d(-110%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(45deg, 0);-ms-transform:translate3d(-110%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(45deg, 0);transform:translate3d(-110%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(45deg, 0);width:60%" class="primary-button-arrow-area"></div>
              <div class="primary-button-bg"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <section class="banner-section">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
        <div class="container-large w-container">
          <div class="navbar-whole-area">
            <a href="<?php echo e(route('home')); ?>" aria-current="page" class="navbar-brand w-nav-brand w--current">
              <img src="<?php echo e(\App\Helpers\NavbarHelper::getLogo()); ?>" loading="lazy" width="127" sizes="127px" alt="" class="navbar-brand-logo">
            </a>
            <div class="nav-menu-whole-area">
              <nav role="navigation" class="nav-menu-area w-nav-menu">
                <div class="nav-link-area">
                  <a href="<?php echo e(route('home')); ?>" class="nav-link w-nav-link">Home</a>
                  <a href="<?php echo e(route('sobre')); ?>" class="nav-link w-nav-link">Sobre Nós</a>
                  <a href="<?php echo e(route('contato')); ?>" class="nav-link w-nav-link">Contato</a>
                  <a href="<?php echo e(route('tema.Dentista24h.blogs')); ?>" class="nav-link w-nav-link">Blog</a>
                </div>
                <div class="nav-button-wrap">
                  <a data-w-id="33b11859-9ca4-bcca-749a-e6f600664eba" href="<?php echo e(route('tema.Dentista24h.emergencia24')); ?>" class="primary-button w-inline-block">
                    <div class="primary-button-content">
                      <div class="primary-button-text">Emergência 24 Horas</div>
                    </div>
                    <div class="primary-button-arrow-area"></div>
                    <div class="primary-button-bg"></div>
                  </a>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>    
<?php endif; ?><?php /**PATH C:\xampp\htdocs\hoogli-templats-link\resources\views/temas/Dentista24h/inc/nav.blade.php ENDPATH**/ ?>