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
    
@include('temas.Griffo.inc.head')

<body>
    <!-- Google Tag Manager (noscript) -->
    @if(\App\Helpers\HeadHelper::getGtmBody($currentPage))
        {!! \App\Helpers\HeadHelper::getGtmBody($currentPage) !!}
    @endif

    <div class="banner-bg-wrap">
       @include('temas.Griffo.inc.nav')
        @yield('content')
    <!-- /div está dentro de content -->
    @include('temas.Griffo.inc.footer')

    @include('temas.Griffo.inc.scripts')
    @include('floatingButton.index')
</body>
</html>