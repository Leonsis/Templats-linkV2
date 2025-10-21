<?php $__env->startSection('content'); ?>
<div class="banner-content-area service-single">
  <div class="w-layout-blockcontainer container w-container">
    <div data-w-id="c6ba8cc8-bc13-a1c0-ae63-eed94380a761" style="opacity: 1;" class="banner-title-wrap">
      <h1 class="banner-title">Segurança de Eventos</h1>
      <div>
        <p class="banner-title-content">
            Assegure eventos com planejamento dinâmico, monitoramento em tempo real e profissionais ágeis para proteção completa em ocasiões especiais.
        </p>
      </div>
    </div>
  </div>
</div>
</section>
<section class="service-single-section">
  <div class="w-layout-blockcontainer container w-container">
    <div data-w-id="44ceae40-6b60-4157-27c8-8d83622c6576" style="opacity: 1;" class="service-single-image-wrap">
        <img src="<?php echo e(asset('temas/Griffo/assets/images/img1.jpg')); ?>" loading="lazy" alt="Service Single Image" class="service-single-image">
    </div>
  </div>
  <div class="w-layout-blockcontainer container w-container">
    <div class="service-single-grid-wrap">
      <div class="w-layout-grid service-single-grid">
        <div data-w-id="22804936-9b33-c1ef-ef1e-98a9230e9803" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
          <div class="service-summary w-richtext">
            <!-- Titulo -->
            <!--<h2>Dentista 24 Horas em Brasília: Atendimento de Emergência Odontológica Imediata</h2>-->
            <p>
                No Grupo Griffo, entregamos segurança de eventos corporativos e internacionais com planejamento dinâmico adaptável, 
                monitoramento em tempo real via sistemas integrados e profissionais ágeis certificados para proteção completa em ocasiões de alto impacto. 
                Nossa avaliação de riscos customizada antecipa ameaças potenciais com precisão, assegurando fluidez operacional, 
                conformidade regulatória e redução de riscos em 85% para eventos escaláveis sem interrupções ou surpresas.
            </p>
            <p>
                Essa proteção holística mitiga desafios como gerenciamento de multidões, logística VIP e coordenação com autoridades, 
                elevando a reputação e o sucesso do seu evento. Garanta sucesso total: marque uma consulta estratégica gratuita agora 
                e proteja sua próxima ocasião com nossa expertise comprovada de 30 anos.
            </p>
          </div>
        </div>
        <div data-w-id="bebfe786-5457-48ce-8870-a0f37502c7c6" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;" class="service-form-area">
          <h2 class="service-form-title">Fale Conosco Agora!</h2>
          <div class="service-form-block w-form">
            <form method="POST" action="<?php echo e(route('leads.store')); ?>">
                <?php echo csrf_field(); ?> 
                <div class="contact-form-input-area">
                    <div class="contact-form-input-wrap small">
                        <input type="text" name="nome" placeholder="Nome" required class="contact-form-input w-input">
                    </div>
                    <div class="contact-form-input-wrap small">
                        <input type="email" name="email" placeholder="Email" required class="contact-form-input w-input">
                    </div>
                    <div class="contact-form-input-wrap small">
                        <input type="tel" name="telefone" placeholder="Telefone" required class="contact-form-input w-input">
                    </div>
                </div>
                <!--<input type="submit" data-wait="Aguarde..."  value="Enviar">-->
                <button class="contact-button w-button" type="submit">Enviar</button>
            </form>
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?> 
            
            <?php if(session('error')): ?> 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?php echo e(session('error')); ?> 
                </div>
            <?php endif; ?> 
            <!--<div class="success-message w-form-done" tabindex="-1" role="region" aria-label="Service Form success">-->
            <!--    <div>Thank you! Your submission has been received!</div>-->
            <!--</div>-->
            <!--<div class="error-message w-form-fail" tabindex="-1" role="region" aria-label="Service Form failure">-->
            <!--    <div>Oops! Something went wrong while submitting the form.</div>-->
            <!--</div>-->
          </div>
          <div class="service-form-line-break"></div>
          <div class="service-contact-area">
            <div class="contact-information-card-wrap">
              <div data-w-id="f4dc21ef-c777-277b-f385-83df68ef4e46" class="contact-information-address">
                <div class="contact-information-icon-wrap"><img src="https://cdn.prod.website-files.com/68d2e59d5d2e8a01fe822683/68d2e59e5d2e8a01fe822714_Contact-information-icon-dark-01.svg" loading="lazy" style="opacity: 1;" alt="Contact Icon" class="contact-initial-icon"><img src="https://cdn.prod.website-files.com/68d2e59d5d2e8a01fe822683/68d2e59e5d2e8a01fe82271a_Contact-information-icon-yellow-01.svg" loading="lazy" style="opacity: 0;" alt="Contact Icon" class="contact-hover-icon"></div>
                <div>St. de Habitações Individuais Sul QI 7 BLOCO D LOJA 12 - Lago Sul, Brasília</div>
              </div><a href="tel:(123)348-3842" class="contact-information-card w-inline-block">
                <div class="contact-information-icon-wrap"><img src="https://cdn.prod.website-files.com/68d2e59d5d2e8a01fe822683/68d2e59e5d2e8a01fe822713_Contact-information-icon-dark-02.svg" loading="lazy" alt="Contact Icon" class="contact-initial-icon" style="opacity: 1;"><img src="https://cdn.prod.website-files.com/68d2e59d5d2e8a01fe822683/68d2e59e5d2e8a01fe822712_Contact-information-icon-yellow-02.svg" loading="lazy" alt="Contact Icon" class="contact-hover-icon" style="opacity: 0;"></div>
                <div>(61) 99609-7561</div>
              </a><a href="mailto:info@therpyflow.com" class="contact-information-card w-inline-block">
                <div class="contact-information-icon-wrap"><img src="https://cdn.prod.website-files.com/68d2e59d5d2e8a01fe822683/68d2e59e5d2e8a01fe82271f_Contact-information-icon-dark-03.svg" loading="lazy" alt="Contact Icon" class="contact-initial-icon" style="opacity: 1;"><img src="https://cdn.prod.website-files.com/68d2e59d5d2e8a01fe822683/68d2e59e5d2e8a01fe822720_Contact-information-icon-yellow-03.svg" loading="lazy" alt="Contact Icon" class="contact-hover-icon" style="opacity: 0;"></div>
                <div>Email</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="service-post-section">
  <div class="w-layout-blockcontainer container w-container">
    <div data-w-id="a716ebeb-fd64-550b-a228-5461e8063dcd" style="opacity: 1;" class="more-service-title-area">
      <div class="more-service-title-wrap">
        <p class="mb0">Sua jornada para uma vida sem dor começa aqui. Conte com nosso cuidado para voltar a fazer o que ama com um sorriso confiante e saudável.</p>
      </div>
      <div><a data-w-id="ad7ef649-bf10-ce17-7bd0-11641f1b2da3" href="/services" class="primary-button w-inline-block">
          <div class="primary-button-text">Fale com um Atendente</div>
          <div style="transform: translate3d(-110%, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(45deg, 0deg); width: 60%; transform-style: preserve-3d;" class="primary-button-arrow-area"></div>
          <div class="primary-button-bg dark"></div>
        </a></div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temas.Griffo.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Templats-linkV2/resources/views/temas/Griffo/seguranca-de-eventos.blade.php ENDPATH**/ ?>