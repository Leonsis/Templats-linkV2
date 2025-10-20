    <?php
    $currentPath = request()->path();
    $currentRoute = request()->route()->getName();
    ?>

    <style>
    /* Menu Mobile Styles */
    .mobile-menu-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
    padding: 10px;
    background: none;
    border: none;
    z-index: 1001;
    }

    .mobile-menu-toggle span {
    width: 25px;
    height: 3px;
    background: #333;
    margin: 3px 0;
    transition: 0.3s;
    border-radius: 2px;
    }

    .mobile-menu-toggle.active span:nth-child(1) {
    transform: rotate(-45deg) translate(-5px, 6px);
    }

    .mobile-menu-toggle.active span:nth-child(2) {
    opacity: 0;
    }

    .mobile-menu-toggle.active span:nth-child(3) {
    transform: rotate(45deg) translate(-5px, -6px);
    }

    .nav-menu-area {
    display: flex;
    align-items: center;
    }

    .mobile-menu-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
    }

    .mobile-menu {
    display: none;
    position: fixed;
    top: 0;
    right: -100%;
    width: 80%;
    max-width: 300px;
    height: 100%;
    background: #fff;
    z-index: 1000;
    transition: right 0.3s ease;
    padding: 80px 20px 20px;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .mobile-menu.active {
    right: 0;
    }

    .mobile-menu .nav-link-area {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 30px;
    }

    .mobile-menu .nav-link {
    display: block;
    padding: 15px 0;
    text-decoration: none;
    color: #333;
    font-size: 18px;
    border-bottom: 1px solid #eee;
    }

    .mobile-menu .nav-button-wrap {
    margin-top: 20px;
    }

    .mobile-menu .primary-button {
    width: 100%;
    text-align: center;
    padding: 15px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
    .mobile-menu-toggle {
        display: flex;
    }
    
    .nav-menu-whole-area {
        display: none;
    }
    
    .mobile-menu-overlay.active,
    .mobile-menu {
        display: block;
    }
    
    .navbar-whole-area {
        justify-content: space-between;
        align-items: center;
    }
    }

    @media (min-width: 769px) {
    .mobile-menu-overlay,
    .mobile-menu {
        display: none !important;
    }
    }
    </style>

    <?php if($currentPath === '' || $currentPath === '/'): ?>      
    <section class="home-banner first-version">
        <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
        <div class="container-large w-container">
            <div class="navbar-whole-area">
            <a href="<?php echo e(route('home')); ?>" aria-current="page" class="navbar-brand w-nav-brand w--current">
                <img src="<?php echo e(\App\Helpers\NavbarHelper::getLogo()); ?>" loading="lazy" width="127" sizes="127px" alt="" class="navbar-brand-logo">
            </a>
            
            <!-- Botão do menu mobile -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <div class="nav-menu-whole-area">
                <nav role="navigation" class="nav-menu-area w-nav-menu">
                <div class="nav-link-area">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link w-nav-link">Home</a>
                    <a href="<?php echo e(route('sobre')); ?>" class="nav-link w-nav-link">Sobre Nós</a>
                    <div data-hover="true" data-delay="0" class="nav-dropdown large w-dropdown">
                        <div class="nav-dropdown-toggle w-dropdown-toggle">
                            <div class="text-block">Serviços</div>
                        </div>
                        <nav class="nav-dropdown-list large w-dropdown-list">
                            <div class="nav-dropdown-link-holder">
                                <div>
                                    <div>
                                        <a href="<?php echo e(route('tema.Dentista24h.blogs')); ?>"  class="nav-dropdown-link w-dropdown-link">Emergência 24 Horas</a>
                                        <a href="pricing.html" class="nav-dropdown-link w-dropdown-link">Segurança de Eventos</a>
                                        <a href="contact-us.html" class="nav-dropdown-link w-dropdown-link">Gerenciamento Condomínios</a>
                                        <a href="pricing.html" class="nav-dropdown-link w-dropdown-link">Segurança Patrimonial</a>
                                        <a href="contact-us.html" class="nav-dropdown-link w-dropdown-link">Terceirização Geral</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <a href="<?php echo e(route('contato')); ?>" class="nav-link w-nav-link">Contato</a>
                    <a href="<?php echo e(route('tema.Dentista24h.blogs')); ?>" class="nav-link w-nav-link">Blog</a>
                    
                </div>
                <div class="nav-button-wrap">
                    <a data-w-id="33b11859-9ca4-bcca-749a-e6f600664eba" onclick="openWhatsAppModal()" class="primary-button w-inline-block">
                    <div class="primary-button-content">
                        <div class="primary-button-text">Fale conosco</div>
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
        
        <!-- Menu Mobile -->
        <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
        <div class="mobile-menu" id="mobile-menu">
        <div class="nav-link-area">
            <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
            <a href="<?php echo e(route('sobre')); ?>" class="nav-link">Sobre Nós</a>
            <a href="<?php echo e(route('contato')); ?>" class="nav-link">Contato</a>
            <a href="<?php echo e(route('tema.Dentista24h.blogs')); ?>" class="nav-link">Blog</a>
        </div>
        <div class="nav-button-wrap">
            <a onclick="openWhatsAppModal()" class="primary-button">
            <div class="primary-button-content">
                <div class="primary-button-text">Fale conosco</div>
            </div>
            </a>
        </div>
        </div>
        <div class="banner-content-area style-guide">
          <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="a38023cb-ed75-2e38-f90e-3dc609c6e559" style="opacity:0" class="banner-title-wrap">
              <h1 class="banner-title">Excelência em Terceirização<span class="banner-title-sub-text"><br>de Serviços em Brasília </span></h1>
              <div class="banner-button-wrap">
                <a data-w-id="8b221586-8fc8-aee9-02f9-392e2dcd3829" href="#about" class="primary-button w-inline-block">
                  <div class="primary-button-text">Saiba Mais</div>
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
                
                <!-- Botão do menu mobile -->
                <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
                </button>
                
                <div class="nav-menu-whole-area">
                <nav role="navigation" class="nav-menu-area w-nav-menu">
                    <div class="nav-link-area">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link w-nav-link">Home</a>
                    <a href="<?php echo e(route('sobre')); ?>" class="nav-link w-nav-link">Sobre Nós</a>
                    <a href="<?php echo e(route('contato')); ?>" class="nav-link w-nav-link">Contato</a>
                    <a href="<?php echo e(route('tema.Dentista24h.blogs')); ?>" class="nav-link w-nav-link">Blog</a>
                    </div>
                    <div class="nav-button-wrap">
                    <a data-w-id="33b11859-9ca4-bcca-749a-e6f600664eba" onclick="openWhatsAppModal()" class="primary-button w-inline-block">
                        <div class="primary-button-content">
                        <div class="primary-button-text">Fale conosco</div>
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
        
        <!-- Menu Mobile -->
        <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
        <div class="mobile-menu" id="mobile-menu">
            <div class="nav-link-area">
            <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
            <a href="<?php echo e(route('sobre')); ?>" class="nav-link">Sobre Nós</a>
            <a href="<?php echo e(route('contato')); ?>" class="nav-link">Contato</a>
            <a href="<?php echo e(route('tema.Dentista24h.blogs')); ?>" class="nav-link">Blog</a>
            </div>
            <div class="nav-button-wrap">
            <a onclick="openWhatsAppModal()" class="primary-button">
                <div class="primary-button-content">
                <div class="primary-button-text">Fale conosco</div>
                </div>
            </a>
            </div>
        </div>
    <?php endif; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    
    if (mobileMenuToggle && mobileMenu && mobileMenuOverlay) {
        // Toggle menu mobile
        mobileMenuToggle.addEventListener('click', function() {
        mobileMenuToggle.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        mobileMenuOverlay.classList.toggle('active');
        document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        });
        
        // Fechar menu ao clicar no overlay
        mobileMenuOverlay.addEventListener('click', function() {
        mobileMenuToggle.classList.remove('active');
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
        document.body.style.overflow = '';
        });
        
        // Fechar menu ao clicar nos links
        const mobileMenuLinks = mobileMenu.querySelectorAll('.nav-link');
        mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileMenuToggle.classList.remove('active');
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
        });
        
        // Fechar menu ao redimensionar a tela para desktop
        window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            mobileMenuToggle.classList.remove('active');
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
        });
    }
    });
    </script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hoogli-templats-link/resources/views/temas/Dentista24h/inc/nav.blade.php ENDPATH**/ ?>