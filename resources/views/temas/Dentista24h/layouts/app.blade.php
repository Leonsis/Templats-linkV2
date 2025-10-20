@php
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
    if (str_starts_with($routeName, 'tema.teste.')) {
        $currentPage = str_replace('tema.teste.', '', $routeName);
    }
@endphp

<!DOCTYPE html>

@yield('html')
    
@include('temas.Dentista24h.inc.head')

<body>
    <!-- Google Tag Manager (noscript) -->
    @if(\App\Helpers\HeadHelper::getGtmBody($currentPage))
        {!! \App\Helpers\HeadHelper::getGtmBody($currentPage) !!}
    @endif

    <div class="banner-bg-wrap">
       @include('temas.Dentista24h.inc.nav')
        @yield('content')
    <!-- /div está dentro de content -->
    @include('temas.Dentista24h.inc.footer')

    @include('temas.Dentista24h.inc.scripts')
    @include('floatingButton.index')
</body>
</html>