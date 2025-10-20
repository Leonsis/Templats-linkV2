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
    if (str_starts_with($routeName, 'tema.Mental-ice.')) {
        $currentPage = str_replace('tema.Mental-ice.', '', $routeName);
    }
@endphp

<!DOCTYPE html>
<html data-wf-page="68b82e6fb673119cd04087a3" data-wf-site="68b82d5cdad81f04d6aadee1">
    
@include('temas.Mental-ice.inc.head')

<body>
    <!-- Google Tag Manager (noscript) -->
    @if(\App\Helpers\HeadHelper::getGtmBody($currentPage))
        {!! \App\Helpers\HeadHelper::getGtmBody($currentPage) !!}
    @endif
    
    @include('temas.Mental-ice.inc.nav')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    @include('temas.Mental-ice.inc.footer')

    @include('temas.Mental-ice.inc.scripts')
    @include('floatingButton.index')
</body>
</html>