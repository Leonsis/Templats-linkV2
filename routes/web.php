<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\TemasController;
use App\Http\Controllers\ThemePageController;
use App\Http\Controllers\FloatingButtonController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadManagementController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RobotsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rota para servir favicons
Route::get('/favicon/{filename}', function ($filename) {
    $path = storage_path('app/uploads/favicons/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path, [
        'Content-Type' => 'image/webp',
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->name('favicon');

// Rota para servir logos
Route::get('/logo/{filename}', function ($filename) {
    $path = storage_path('app/uploads/logos/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path, [
        'Content-Type' => 'image/' . pathinfo($filename, PATHINFO_EXTENSION),
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->name('logo');

// Rota para servir favicon.ico padrão
Route::get('/favicon.ico', function () {
    $faviconPath = public_path('temas/Lumialto/assets/images/favicon.png');
    
    if (file_exists($faviconPath)) {
        return response()->file($faviconPath, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }
    
    abort(404);
})->name('favicon.ico');

// Rota para servir assets CSS
Route::get('/css/{filename}', function ($filename) {
    $path = public_path('css/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    $contentType = 'text/css';
    if (pathinfo($filename, PATHINFO_EXTENSION) === 'css') {
        $contentType = 'text/css';
    }
    
    return response()->file($path, [
        'Content-Type' => $contentType,
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->name('css.asset');

// Rota para servir assets JS
Route::get('/js/{filename}', function ($filename) {
    $path = public_path('js/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path, [
        'Content-Type' => 'application/javascript',
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->name('js.asset');

// Rota para servir assets de temas
Route::get('/temas/{tema}/assets/{type}/{filename}', function ($tema, $type, $filename) {
    $path = public_path("temas/{$tema}/assets/{$type}/{$filename}");
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    // Determinar Content-Type baseado na extensão
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $contentType = match($extension) {
        'css' => 'text/css',
        'js' => 'application/javascript',
        'png' => 'image/png',
        'jpg', 'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp',
        'ico' => 'image/x-icon',
        default => 'application/octet-stream'
    };
    
    return response()->file($path, [
        'Content-Type' => $contentType,
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->name('theme.asset');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::post('/contato', [ContatoController::class, 'enviar'])->name('contato.enviar');

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas (requerem login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin')->middleware('can:admin');
    
    // Rotas do Head (apenas para admins)
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/head', [HeadController::class, 'index'])->name('head');
        Route::put('/head', [HeadController::class, 'update'])->name('head.update');
        Route::get('/head/images', [HeadController::class, 'getImages'])->name('head.images');
        
        // Rotas da Navbar
        Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar');
        Route::put('/navbar', [NavbarController::class, 'update'])->name('navbar.update');
        Route::get('/navbar/images', [NavbarController::class, 'getImages'])->name('navbar.images');
        
        // Rotas dos Temas
        Route::get('/temas', [TemasController::class, 'index'])->name('temas');
        Route::post('/temas', [TemasController::class, 'store'])->name('temas.store');
        Route::get('/temas/{nomeTema}/preview', [TemasController::class, 'preview'])->name('temas.preview');
        Route::get('/temas/{nomeTema}/preview/{pagina}', [TemasController::class, 'previewPage'])->name('temas.preview.page');
        Route::post('/temas/{nomeTema}/select', [TemasController::class, 'select'])->name('temas.select');
        Route::put('/temas/{nomeTema}/rename', [TemasController::class, 'rename'])->name('temas.rename');
        Route::post('/temas/{nomeTema}/generate-sitemap', [TemasController::class, 'generateSitemap'])->name('temas.generate-sitemap');
        Route::delete('/temas/{nomeTema}', [TemasController::class, 'destroy'])->name('temas.destroy');
        
        // Rotas das Páginas dos Temas
        Route::get('/theme-pages', [ThemePageController::class, 'index'])->name('theme-pages');
        Route::get('/theme-pages/{pagina}', [ThemePageController::class, 'show'])->name('theme-pages.show');
        Route::put('/theme-pages/{pagina}', [ThemePageController::class, 'update'])->name('theme-pages.update');
        Route::post('/theme-pages/{pagina}/duplicate', [ThemePageController::class, 'duplicate'])->name('theme-pages.duplicate');
        Route::delete('/theme-pages/{pagina}', [ThemePageController::class, 'destroy'])->name('theme-pages.destroy');
        
        
        // Rotas de edição de páginas dos temas
        Route::get('/temas/home/edit', [TemasController::class, 'editHome'])->name('temas.home.edit');
        Route::get('/temas/about/edit', [TemasController::class, 'editAbout'])->name('temas.about.edit');
        Route::get('/temas/contact/edit', [TemasController::class, 'editContact'])->name('temas.contact.edit');
        
        // Rota de serviços (placeholder)
        Route::get('/servico', function() {
            return redirect()->route('dashboard.temas')->with('info', 'Página de serviços em desenvolvimento.');
        })->name('servico.index');
        
        // Rotas dos Botões Flutuantes
        Route::get('/floating-buttons', [FloatingButtonController::class, 'index'])->name('floating-buttons');
        Route::put('/floating-buttons', [FloatingButtonController::class, 'update'])->name('floating-buttons.update');
        
        // Rotas do Blog
        Route::get('/blog', [BlogController::class, 'index'])->name('blog');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');
        Route::patch('/blog/{post}/toggle-status', [BlogController::class, 'toggleStatus'])->name('blog.toggle-status');
        
        // Rotas dos Leads
        Route::get('/leads', [LeadManagementController::class, 'index'])->name('leads');
        Route::get('/leads/{lead}', [LeadManagementController::class, 'show'])->name('leads.show');
        Route::delete('/leads/{lead}', [LeadManagementController::class, 'destroy'])->name('leads.destroy');
        
        // Rotas do Robots.txt
        Route::get('/robots/status', [RobotsController::class, 'status'])->name('robots.status');
        Route::post('/robots/enable', [RobotsController::class, 'enable'])->name('robots.enable');
        Route::post('/robots/disable', [RobotsController::class, 'disable'])->name('robots.disable');
    });
});

// Rota pública para captura de leads (não precisa de autenticação)
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

// Rotas públicas do blog
Route::get('/blog', [BlogController::class, 'publicIndex'])->name('blog.public.index');

// Rota para página single do post - verificar se deve usar tema dinâmico ou padrão
Route::get('/blog/{post:slug}', function(\App\Models\Post $post) {
    // Verificar se existe um tema ativo que tenha a página detail_blogs
    $temaAtivo = \DB::table('temas')
        ->where('ativo', 1)
        ->where('nome', '!=', 'Lumialto') // Excluir tema padrão
        ->first();
    
    if ($temaAtivo) {
        // Verificar se o tema tem a página detail_blogs
        $rotaDetailBlogs = \DB::table('rotas_dinamicas')
            ->where('tema', $temaAtivo->nome)
            ->where('pagina', 'detail_blogs')
            ->where('ativo', 1)
            ->first();
        
        if ($rotaDetailBlogs) {
            // Usar o TemasController para renderizar a página detail_blogs
            $controller = new \App\Http\Controllers\TemasController();
            return $controller->renderizarPaginaDinamica($temaAtivo->nome, 'detail_blogs', $post->slug);
        }
    }
    
    // Fallback para a rota padrão do blog (main-Thema)
    $blogController = new \App\Http\Controllers\BlogController();
    return $blogController->publicShow($post);
})->name('blog.public.show');

// Rota para servir imagens do blog
Route::get('/storage/posts/{filename}', function($filename) {
    $path = storage_path('app/public/posts/' . $filename);
    if (file_exists($path)) {
        return response()->file($path);
    }
    return response('Imagem não encontrada', 404);
})->name('blog.image');

// Rota pública para gerar sitemap (para teste)
Route::get('/generate-sitemap/{nomeTema}', [TemasController::class, 'generateSitemapPublic'])->name('generate-sitemap-public');

// Rota para servir o sitemap.xml
Route::get('/sitemap.xml', function() {
    $sitemapPath = base_path('sitemap.xml');
    if (file_exists($sitemapPath)) {
        return response()->file($sitemapPath, [
            'Content-Type' => 'application/xml'
        ]);
    }
    return response('Sitemap não encontrado', 404);
})->name('sitemap');
