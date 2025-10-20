@extends('temas.Dentista24h.layouts.app')

@section('html')
  <html data-wf-page="68dd1530bcbf8eb2a9e0cf45" data-wf-site="68dd152dbcbf8eb2a9e0ce11" lang="en">
@endsection

@section('content')
        <div class="banner-content-area">
            <div class="w-layout-blockcontainer container w-container">
                <div data-w-id="c7703357-fa5e-d038-1187-ad523f406217" style="opacity:0" class="banner-title-wrap">
                    <h1 class="banner-title">blogs</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-section">
        <div class="w-layout-blockcontainer container w-container">
            <div class="blog-post-area">
                <div class="w-dyn-list">
                    <div role="list" class="w-dyn-items w-row">
                        @foreach($blogs as $blog)
                            <div data-w-id="94f53a50-8743-a5d4-4fb3-32231269c6ac" style="opacity:0" role="listitem" class="blog-collection-item blog-page w-dyn-item w-col w-col-6">
                                <div class="blog-post">
                                    <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="blog-post-image-wrap w-inline-block">
                                        <img src="{{ $blog['image'] }}" loading="lazy" alt="{{ $blog['title'] }}" class="blog-post-image">
                                    </a>
                                    <div>
                                        <p class="article-post-date">{{ $blog['created_at'] ? \Carbon\Carbon::parse($blog['created_at'])->format('d/m/Y') : '' }}</p>
                                        <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="blog-post-title">{{ $blog['title'] }}</a>
                                    </div>
                                    <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="blog-post-link dark w-inline-block">
                                        <img src="{{ asset('temas/Dentista24h/assets/images/Testimonial-arrow-02.svg') }}" loading="lazy" alt="Abrir post" class="article-post-arrow">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--
    <style>
        .blog-post.card:hover {
          transform: translateY(-4px);
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .blog-post-image:hover {
          transform: scale(1.05);
        }
        
        .blog-post-title:hover {
          color: #3b82f6 !important;
        }
        
        .blog-post-link:hover {
          color: #1d4ed8 !important;
        }
        
        .blog-post-image-wrap {
            min-height: 100px;
            margin-bottom: 0px;
        }
    </style>
    <div class="banner-content-area">
      <div class="w-layout-blockcontainer container w-container">
        <div data-w-id="c7703357-fa5e-d038-1187-ad523f406217" style="opacity:0" class="banner-title-wrap">
          <h1 class="banner-title">Blogs</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="blog-post-area">
        <div class="w-dyn-list">
          <div role="list" class="w-dyn-items w-row">
            @forelse($blogs as $blog)
              <div data-w-id="94f53a50-8743-a5d4-4fb3-32231269c6ac" style="opacity:0" role="listitem" class="blog-collection-item blog-page w-dyn-item w-col w-col-6">
                <div class="blog-post card" style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #e5e7eb; overflow: hidden; background: white; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                  <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="blog-post-image-wrap w-inline-block" style="display: block; overflow: hidden;">
                    <img src="{{ $blog['image'] }}" loading="lazy" alt="{{ $blog['title'] }}" class="blog-post-image" style="width: 100%; height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                  </a>
                  <div style="padding: 20px;">
                    <p class="article-post-date" style="color: #6b7280; font-size: 14px; margin-bottom: 8px;"></p>
                    <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="blog-post-title" style="color: #1f2937; text-decoration: none; font-weight: 600; font-size: 18px; line-height: 1.4; display: block; margin-bottom: 12px;">{{ $blog['title'] }}</a>
                    <a href="{{ url('/detail_blogs/' . $blog['slug']) }}" class="blog-post-link dark w-inline-block" style="display: inline-flex; align-items: center; color: #3b82f6; text-decoration: none; font-weight: 500; font-size: 14px;">
                      
                      <img src="{{ asset('temas/Dentista24h/assets/images/Testimonial-arrow-02.svg') }}" loading="lazy" alt="Testimonial Arrow" class="article-post-arrow" style="width: 16px; height: 16px;">
                    </a>
                  </div>
                </div>
              </div>
            @empty
              <div class="w-dyn-empty">
                <div>Nenhum post encontrado</div>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>--}}
@endsection


