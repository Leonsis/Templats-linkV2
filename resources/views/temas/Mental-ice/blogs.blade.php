@extends('temas.Mental-ice.layouts.app')

@section('content'){{--
<div class="page-wrap">    
    <header class="section_header62 color-scheme-1">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="header62_component">
                <div class="text-align-center">
                  <div class="max-width-large align-center">
                    <div class="margin-bottom margin-small">
                      <h1 class="heading-style-h1">Blog</h1>
                    </div>
                    <p class="text-size-medium">Veja nosssas postagens</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </header>
    <style>
        .card-grid {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
          gap: 1.5rem;
        }
        
        .card {
          background: #fff;
          border-radius: 12px;
          overflow: hidden;
          box-shadow: 0 4px 12px rgba(0,0,0,0.1);
          transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
          transform: translateY(-4px);
          box-shadow: 0 6px 16px rgba(0,0,0,0.15);
        }
        
        .card-link {
          display: block;
          color: inherit;
          text-decoration: none;
        }
        
        .card-thumb img {
          width: 100%;
          height: 200px;
          object-fit: cover;
        }
        
        .card-body {
          padding: 1rem;
        }
        
        .card-title {
          font-size: 1.2rem;
          font-weight: 600;
          margin: 0 0 0.5rem 0;
        }
        
        .card-tag {
          font-size: 0.85rem;
          color: #777;
        }
    </style>
    <section class="section top" style="padding: 20px 0px; background-color: #f4f4f4;">
      <div class="w-layout-blockcontainer container w-container">
        <div class="section-wrap">
    
          <div class="card-grid">
            @forelse($blogs as $blog)
              <div class="card">
                <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="card-link">
                  <div class="card-thumb">
                    <img src="{{ $blog['image'] }}" loading="lazy" alt="{{ $blog['title'] }}" class="cover-image">
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">{{ $blog['title'] }}</h3>
                    <p class="card-tag">Blog</p>
                  </div>
                </a>
              </div>
            @empty
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Nenhum post encontrado</h3>
                  <p class="card-tag">Em breve teremos conteúdo aqui!</p>
                </div>
              </div>
            @endforelse
          </div>
    
        </div>
      </div>
    </section>

    
  </div>--}}

  <main class="main-wrapper">
      <header id="blog-header-5" class="section_blog5 color-scheme-2">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="blog5_component">
                <div class="margin-bottom margin-xxlarge">
                  <div class="max-width-large">
                    <div class="margin-bottom margin-xsmall">
                      <div class="text-style-tagline">Blog</div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h1 class="heading-style-h1">Descubra o Poder do Frio</h1>
                    </div>
                    <p class="text-size-medium">Explorando os benefícios dos banhos de gelo</p>
                  </div>
                </div>
                @php
                    $blog = $blogs->first();
                @endphp

                @if($blog)
                  <div class="margin-bottom margin-xxlarge">
                    <div class="blog5_featured-list-wrapper">
                      <div class="blog5_featured-list">
                        <div class="blog5_featured-item">
                          <div class="blog5_featured-item-link">
                            <div class="blog5_image-wrapper">
                              <img src="{{ $blog['image'] }}" loading="lazy" alt="{{ $blog['title'] }}" class="blog5_featured-image">
                            </div>
                            <div class="blog5_featured-item-content">
                              <div class="margin-bottom margin-xxsmall">
                                <div class="tag is-text">Saúde</div>
                              </div>
                              <div class="margin-bottom margin-xsmall">
                                <h3 class="heading-style-h4">{{ $blog['title'] }}</h3>
                              </div>
                              <div class="text-size-regular">Como a exposição ao frio pode transformar sua mente.</div>
                              <!-- <div class="margin-top margin-small">
                                <div class="blog5_author-wrapper">
                                  <div class="blog5_author-image-wrapper"><img loading="eager" src="images/Design-sem-nome-27.png" alt="" class="blog5_author-image"></div>
                                  <div class="blog5_author-text">
                                    <div class="text-size-small">João Silva</div>
                                    <div class="blog5_date-wrapper">
                                      <div class="text-size-small">11 Jan 2022</div>
                                      <div class="blog5_text-divider">•</div>
                                      <div class="text-size-small">5 min read</div>
                                    </div>
                                  </div>
                                </div>
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                
                  </div>
                @endif
                <!-- <div class="blog5_content">
                  <div class="category-filter-menu">
                    <a href="#blog-header-5" class="category-filter-link w-inline-block">
                      <div>Ver todos</div>
                    </a>
                    <a href="#" class="category-filter-link w-inline-block">
                      <div>Saúde Mental</div>
                    </a>
                    <a href="#" class="category-filter-link w-inline-block">
                      <div>Bem-Estar</div>
                    </a>
                    <a href="#" class="category-filter-link w-inline-block">
                      <div>Terapias Alternativas</div>
                    </a>
                    <a href="#" class="category-filter-link w-inline-block">
                      <div>Exercícios Físicos</div>
                    </a>
                  </div> -->
                  <div class="blog5_list-wrapper">
                    <div class="w-layout-grid blog5_list">
                      
                      @forelse($blogs as $blog)
                        <div class="blog5_item">
                          <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="blog5_item-link w-inline-block">
                            <div class="margin-bottom margin-xsmall">
                              <div class="blog5_image-wrapper">
                                <img src="{{ $blog['image'] }}" loading="lazy" alt="{{ $blog['title'] }}" class="blog5_image">
                              </div>
                            </div>
                            <div class="margin-bottom margin-xxsmall">
                              <div class="tag is-text">Saúde</div>
                            </div>
                            <div class="margin-bottom margin-xxsmall">
                              <h3 class="heading-style-h5">{{ $blog['title'] }}</h3>
                            </div>
                            <div class="text-size-regular">Como o frio pode ajudar a melhorar seu humor.</div>
                            <!-- <div class="margin-top margin-small">
                              <div class="blog5_author-wrapper">
                                <div class="blog5_author-image-wrapper">
                                  <img loading="eager" src="images/Design-sem-nome-27.png" alt="" class="blog5_author-image"></div>
                                <div class="blog5_author-text">
                                  <div class="text-size-small">Carlos Lima</div>
                                  <div class="blog5_date-wrapper">
                                    <div class="text-size-small">15 Mar 2022</div>
                                    <div class="blog5_text-divider">•</div>
                                    <div class="text-size-small">4 min read</div>
                                  </div>
                                </div>
                              </div>
                            </div> -->
                          </a>
                        </div>
                        @empty
                          <div class="card">
                            <div class="card-body">
                              <h3 class="card-title">Nenhum post encontrado</h3>
                              <p class="card-tag">Em breve teremos conteúdo aqui!</p>
                            </div>
                          </div>
                        @endforelse
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- <section class="section_blog37 color-scheme-4">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="blog37_component">
                <div class="margin-bottom margin-xxlarge">
                  <div class="max-width-large">
                    <div class="margin-bottom margin-xsmall">
                      <div class="text-style-tagline">Blog</div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h2 class="heading-style-h2">Postagens Recentes</h2>
                    </div>
                    <p class="text-size-medium">Descubra as últimas novidades do nosso blog</p>
                  </div>
                </div>
                <div class="blog37_list-wrapper">
                  <div class="w-layout-grid blog37_list">
                    <div class="blog37_item">
                      <a href="#" class="blog37_item-link w-inline-block">
                        <div class="margin-bottom margin-small">
                          <div class="blog37_image-wrapper"><img sizes="(max-width: 2560px) 100vw, 2560px" srcset="images/relume-282081-p-500.jpeg 500w, images/relume-282081-p-800.jpeg 800w, images/relume-282081-p-1080.jpeg 1080w, images/relume-282081-p-1600.jpeg 1600w, images/relume-282081-p-2000.jpeg 2000w, images/relume-282081.jpeg 2560w" alt="" src="images/relume-282081.jpeg" loading="eager" class="blog37_image"></div>
                        </div>
                        <div class="margin-bottom margin-xxsmall">
                          <div class="tag is-text">Saúde</div>
                        </div>
                        <div class="margin-bottom margin-xxsmall">
                          <h3 class="heading-style-h5">Como os Banhos de Gelo Ajudam</h3>
                        </div>
                        <div class="text-size-regular">Entenda os benefícios dos banhos de gelo para a saúde mental.</div>
                        <div class="margin-top margin-small">
                          <div class="blog37_author-wrapper">
                            <div class="blog37_author-image-wrapper"><img loading="eager" src="images/Design-sem-nome-27.png" alt="" class="blog37_author-image"></div>
                            <div class="blog37_author-text">
                              <div class="text-size-small">João Silva</div>
                              <div class="blog37_date-wrapper">
                                <div class="text-size-small">11 Jan 2022</div>
                                <div class="blog37_text-divider">•</div>
                                <div class="text-size-small">5 min read</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="blog37_item">
                      <a href="#" class="blog37_item-link w-inline-block">
                        <div class="margin-bottom margin-small">
                          <div class="blog37_image-wrapper"><img sizes="(max-width: 2560px) 100vw, 2560px" srcset="images/relume-282083-p-500.jpeg 500w, images/relume-282083-p-800.jpeg 800w, images/relume-282083-p-1080.jpeg 1080w, images/relume-282083-p-1600.jpeg 1600w, images/relume-282083-p-2000.jpeg 2000w, images/relume-282083.jpeg 2560w" alt="" src="images/relume-282083.jpeg" loading="eager" class="blog37_image"></div>
                        </div>
                        <div class="margin-bottom margin-xxsmall">
                          <div class="tag is-text">Saúde</div>
                        </div>
                        <div class="margin-bottom margin-xxsmall">
                          <h3 class="heading-style-h5">Alimentação e Saúde Mental</h3>
                        </div>
                        <div class="text-size-regular">Como a dieta influencia seu bem-estar emocional.</div>
                        <div class="margin-top margin-small">
                          <div class="blog37_author-wrapper">
                            <div class="blog37_author-image-wrapper"><img loading="eager" src="images/Design-sem-nome-27.png" alt="" class="blog37_author-image"></div>
                            <div class="blog37_author-text">
                              <div class="text-size-small">Carlos Mendes</div>
                              <div class="blog37_date-wrapper">
                                <div class="text-size-small">15 Mar 2022</div>
                                <div class="blog37_text-divider">•</div>
                                <div class="text-size-small">4 min read</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="blog37_item">
                      <a href="#" class="blog37_item-link w-inline-block">
                        <div class="margin-bottom margin-small">
                          <div class="blog37_image-wrapper"><img sizes="(max-width: 2560px) 100vw, 2560px" srcset="images/relume-282082-p-500.jpeg 500w, images/relume-282082-p-800.jpeg 800w, images/relume-282082-p-1080.jpeg 1080w, images/relume-282082-p-1600.jpeg 1600w, images/relume-282082-p-2000.jpeg 2000w, images/relume-282082.jpeg 2560w" alt="" src="images/relume-282082.jpeg" loading="eager" class="blog37_image"></div>
                        </div>
                        <div class="margin-bottom margin-xxsmall">
                          <div class="tag is-text">Bem-Estar</div>
                        </div>
                        <div class="margin-bottom margin-xxsmall">
                          <h3 class="heading-style-h5">Benefícios da Meditação Diária</h3>
                        </div>
                        <div class="text-size-regular">Explore como a meditação pode transformar sua vida cotidiana.</div>
                        <div class="margin-top margin-small">
                          <div class="blog37_author-wrapper">
                            <div class="blog37_author-image-wrapper"><img loading="eager" src="images/Design-sem-nome-27.png" alt="" class="blog37_author-image"></div>
                            <div class="blog37_author-text">
                              <div class="text-size-small">Maria Oliveira</div>
                              <div class="blog37_date-wrapper">
                                <div class="text-size-small">10 Fev 2022</div>
                                <div class="blog37_text-divider">•</div>
                                <div class="text-size-small">6 min read</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="margin-top margin-xxlarge">
                  <div class="button-group is-right">
                    <a href="#" class="button is-secondary w-button">Ver todos</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <section class="section_cta8 color-scheme-1">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="cta8_component">
                <div class="cta8_content">
                  <div class="max-width-large">
                    <div class="margin-bottom margin-xsmall">
                      <h2 class="heading-style-h3">Inscreva-se no nosso boletim</h2>
                    </div>
                    <p class="text-size-medium">Receba atualizações diretamente no seu e-mail.</p>
                  </div>
                  <div class="cta8_form-block w-form">
                    <form id="email-form" name="email-form" data-name="Email Form" method="get" class="cta8_form" data-wf-page-id="68b82e9fef6d2249c6708e47" data-wf-element-id="3c44a798-725d-c06c-fb34-2944c50ae79b">
                      <div class="signup-form-wrapper"><input class="form_input is-alternate w-input" maxlength="256" name="email-4" data-name="Email 4" placeholder="Digite seu e-mail" type="email" id="email-4" required=""><input type="submit" data-wait="Please wait..." class="button is-alternate w-button" value="Inscrever-se"></div>
                      <div class="text-size-tiny">Ao clicar em Inscrever-se, você confirma que concorda com nossos Termos e Condições.</div>
                    </form>
                    <div class="form_message-success-wrapper is-alternate w-form-done">
                      <div class="form_message-success">
                        <div class="success-text">Obrigado! Sua inscrição foi recebida!</div>
                      </div>
                    </div>
                    <div class="form_message-error-wrapper is-alternate w-form-fail">
                      <div class="form_message-error">
                        <div class="error-text">Ops! Algo deu errado ao enviar o formulário.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection