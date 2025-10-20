<head>
    <meta charset="utf-8">
    @if(isset($blog) && isset($blog['meta_title']))
        <title>{{ $blog['meta_title'] }}</title>
        <meta name="description" content="{{ $blog['meta_description'] }}">
        <meta name="keywords" content="{{ $blog['meta_keywords'] }}">
    @else
        <title>{{ \App\Helpers\HeadHelper::getMetaTitle($currentPage ?? 'global', 'Mental-ice') }}</title>
        <meta name="description" content="{{ \App\Helpers\HeadHelper::getMetaDescription($currentPage ?? 'global', 'Mental-ice') }}">
        <meta name="keywords" content="{{ \App\Helpers\HeadHelper::getMetaKeywords($currentPage ?? 'global', 'Mental-ice') }}">
    @endif
    <meta content="Sobre Nós" property="og:title">
    <meta content="Sobre Nós" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">    
    <link href="{{ asset('temas/Mental-ice/assets/css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('temas/Mental-ice/assets/css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('temas/Mental-ice/assets/css/mental-ice.webflow.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="{{ \App\Helpers\HeadHelper::getFavicon() }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ asset('temas/Mental-ice/assets/images/webclip.png') }}" rel="apple-touch-icon"><!--  Keep this css code to improve the font quality -->
    <style>
        * { 
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -o-font-smoothing: antialiased;
        }
        
        /* Accordion Fix */
        .faq6_accordion {
            transition: all 0.3s ease;
        }
        
        .faq6_question {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .faq6_question:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .faq6_answer {
            transition: height 0.3s ease, opacity 0.3s ease;
            overflow: hidden;
        }
        
        .faq6_answer[style*="height: 0px"] {
            opacity: 0;
        }
        
        .faq6_answer:not([style*="height: 0px"]) {
            opacity: 1;
        }
    </style>
    @php
        $gtmHead = \App\Helpers\HeadHelper::getGtmHead($currentPage ?? 'global');
    @endphp
    @if($gtmHead)
        {!! $gtmHead !!}
    @endif
</head>