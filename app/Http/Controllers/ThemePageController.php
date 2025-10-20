<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Helpers\HeadHelper;
use App\Helpers\ThemeHelper;

class ThemePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            /** @var \App\Models\Usuario $user */
            $user = Auth::user();
            if (!$user || !$user->isAdmin()) {
                if ($request->ajax() || $request->expectsJson()) {
                    return response()->json(['error' => 'Acesso negado. Você não tem permissão de administrador.'], 403);
                }
                return redirect()->route('dashboard')->with('error', 'Acesso negado. Você não tem permissão de administrador.');
            }
            return $next($request);
        });
    }
    
    /**
     * Listar todas as páginas do tema ativo
     */
    public function index(Request $request)
    {
        $temaAtivo = ThemeHelper::getActiveTheme();
        
        // Verificar se é um tema personalizado
        if ($temaAtivo === 'main-Thema') {
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json(['error' => 'As configurações de páginas são aplicadas apenas aos temas personalizados.'], 400);
            }
            return redirect()->route('dashboard.temas')->with('info', 'As configurações de páginas são aplicadas apenas aos temas personalizados.');
        }
        
        // Verificar se o tema personalizado existe
        $temaViewsPath = resource_path('views/temas/' . $temaAtivo);
        if (!file_exists($temaViewsPath)) {
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json(['error' => 'Tema personalizado não encontrado.'], 404);
            }
            return redirect()->route('dashboard.temas')->with('error', 'Tema personalizado não encontrado.');
        }
        
        // Obter páginas do tema
        $paginas = $this->obterPaginasDoTema($temaAtivo);
        
        // Obter configurações existentes
        $configuracoes = HeadHelper::getAllConfigs($temaAtivo);
        
        return view('dashboard.theme-pages.index', compact('paginas', 'configuracoes', 'temaAtivo'));
    }
    
    /**
     * Mostrar formulário para uma página específica
     */
    public function show($pagina)
    {
        $temaAtivo = ThemeHelper::getActiveTheme();
        
        // Verificar se é um tema personalizado
        if ($temaAtivo === 'main-Thema') {
            return redirect()->route('dashboard.temas')->with('error', 'As configurações de páginas são aplicadas apenas aos temas personalizados.');
        }
        
        // Verificar se a página existe no tema
        $paginas = $this->obterPaginasDoTema($temaAtivo);
        if (!in_array($pagina, $paginas)) {
            return redirect()->route('dashboard.theme-pages')->with('error', 'Página não encontrada no tema.');
        }
        
        // Obter configuração da página
        $configuracao = HeadHelper::getConfigs($pagina, $temaAtivo);
        
        // Converter datas para Carbon se necessário (apenas se as propriedades existirem)
        if ($configuracao && isset($configuracao->created_at) && $configuracao->created_at) {
            $configuracao->created_at = \Carbon\Carbon::parse($configuracao->created_at);
        }
        if ($configuracao && isset($configuracao->updated_at) && $configuracao->updated_at) {
            $configuracao->updated_at = \Carbon\Carbon::parse($configuracao->updated_at);
        }
        
        return view('dashboard.theme-pages.show', compact('pagina', 'configuracao', 'temaAtivo'));
    }
    
    /**
     * Atualizar configurações de uma página
     */
    public function update(Request $request, $pagina)
    {
        $temaAtivo = ThemeHelper::getActiveTheme();
        
        // Verificar se é um tema personalizado
        if ($temaAtivo === 'main-Thema') {
            return redirect()->route('dashboard.temas')->with('error', 'As configurações de páginas são aplicadas apenas aos temas personalizados.');
        }
        
        $request->validate([
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
        ]);
        
        try {
            // Verificar se a configuração já existe
            $configExistente = DB::table('head_configs')
                ->where('pagina', $pagina)
                ->where('tema', $temaAtivo)
                ->first();
            
            if ($configExistente) {
                // Atualizar configuração existente
                DB::table('head_configs')
                    ->where('id', $configExistente->id)
                    ->update([
                        'meta_title' => $request->input('meta_title'),
                        'meta_description' => $request->input('meta_description'),
                        'meta_keywords' => $request->input('meta_keywords'),
                        'updated_at' => now(),
                    ]);
            } else {
                // Criar nova configuração
                DB::table('head_configs')->insert([
                    'pagina' => $pagina,
                    'tema' => $temaAtivo,
                    'meta_title' => $request->input('meta_title'),
                    'meta_description' => $request->input('meta_description'),
                    'meta_keywords' => $request->input('meta_keywords'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            
            return redirect()->route('dashboard.theme-pages.show', $pagina)
                ->with('success', 'Configurações da página "' . ucfirst($pagina) . '" atualizadas com sucesso!');
                
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar configurações da página: ' . $e->getMessage());
            return back()->with('error', 'Erro ao atualizar configurações. Tente novamente.');
        }
    }
    
    /**
     * Obter todas as páginas de um tema
     */
    private function obterPaginasDoTema($tema)
    {
        $temaViewsPath = resource_path('views/temas/' . $tema);
        
        if (!file_exists($temaViewsPath)) {
            return [];
        }
        
        $paginas = collect(File::files($temaViewsPath))
            ->filter(function($arquivo) {
                $nome = $arquivo->getFilename();
                $caminho = $arquivo->getPathname();
                
                // Incluir apenas arquivos .blade.php que não estão em subdiretórios
                return str_ends_with($nome, '.blade.php') && 
                       !str_contains($caminho, 'inc') &&
                       !str_contains($caminho, 'layouts') &&
                       !str_contains($caminho, 'auth') &&
                       !str_contains($caminho, '\\inc\\') &&
                       !str_contains($caminho, '\\layouts\\') &&
                       !str_contains($caminho, '\\auth\\');
            })
            ->map(function($arquivo) {
                return strtolower(basename($arquivo->getFilename(), '.blade.php'));
            })
            ->sort()
            ->values()
            ->toArray();
        
        return $paginas;
    }
    
    /**
     * Duplicar uma página do tema
     */
    public function duplicate(Request $request, $pagina)
    {
        $temaAtivo = ThemeHelper::getActiveTheme();
        
        // Verificar se é um tema personalizado
        if ($temaAtivo === 'main-Thema') {
            return redirect()->route('dashboard.theme-pages')->with('error', 'As configurações de páginas são aplicadas apenas aos temas personalizados.');
        }
        
        $request->validate([
            'new_page_name' => 'required|string|max:50|regex:/^[a-zA-Z0-9-]+$/',
        ], [
            'new_page_name.required' => 'O nome da nova página é obrigatório.',
            'new_page_name.regex' => 'O nome da página deve conter apenas letras, números e hífen (-).',
        ]);
        
        $newPageName = strtolower($request->input('new_page_name'));
        $temaViewsPath = resource_path('views/temas/' . $temaAtivo);
        
        try {
            // Verificar se a página original existe
            $originalPagePath = $temaViewsPath . '/' . $pagina . '.blade.php';
            if (!File::exists($originalPagePath)) {
                return redirect()->route('dashboard.theme-pages')->with('error', 'Página original não encontrada.');
            }
            
            // Verificar se a nova página já existe
            $newPagePath = $temaViewsPath . '/' . $newPageName . '.blade.php';
            if (File::exists($newPagePath)) {
                return redirect()->route('dashboard.theme-pages')->with('error', 'Já existe uma página com esse nome.');
            }
            
            // Copiar o arquivo da página
            File::copy($originalPagePath, $newPagePath);
            
            // Copiar configurações da página original (se existirem)
            $configOriginal = DB::table('head_configs')
                ->where('pagina', $pagina)
                ->where('tema', $temaAtivo)
                ->first();
            
            if ($configOriginal) {
                DB::table('head_configs')->insert([
                    'pagina' => $newPageName,
                    'tema' => $temaAtivo,
                    'meta_title' => $configOriginal->meta_title,
                    'meta_description' => $configOriginal->meta_description,
                    'meta_keywords' => $configOriginal->meta_keywords,
                    'email_formulario' => $configOriginal->email_formulario,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            
            // Criar rota dinâmica para a nova página
            $this->criarRotaDinamica($temaAtivo, $newPageName);
            
            return redirect()->route('dashboard.theme-pages')->with('success', 
                'Página "' . ucfirst($newPageName) . '" criada com sucesso! A rota dinâmica foi configurada automaticamente.');
                
        } catch (\Exception $e) {
            Log::error('Erro ao duplicar página: ' . $e->getMessage());
            return redirect()->route('dashboard.theme-pages')->with('error', 
                'Erro ao duplicar página. Tente novamente.');
        }
    }
    
    /**
     * Excluir uma página do tema
     */
    public function destroy($pagina)
    {
        $temaAtivo = ThemeHelper::getActiveTheme();
        
        // Verificar se é um tema personalizado
        if ($temaAtivo === 'main-Thema') {
            return redirect()->route('dashboard.temas')->with('error', 'As páginas do tema principal não podem ser excluídas.');
        }
        
        // Verificar se a página existe no tema
        $paginas = $this->obterPaginasDoTema($temaAtivo);
        if (!in_array($pagina, $paginas)) {
            return redirect()->route('dashboard.theme-pages')->with('error', 'Página não encontrada no tema.');
        }
        
        // Verificar se é uma página essencial (não pode ser excluída)
        $paginasEssenciais = ['home', 'sobre', 'contato'];
        if (in_array($pagina, $paginasEssenciais)) {
            return redirect()->route('dashboard.theme-pages')->with('error', 'Páginas essenciais (home, sobre, contato) não podem ser excluídas.');
        }
        
        try {
            $temaViewsPath = resource_path('views/temas/' . $temaAtivo);
            $arquivoPagina = $temaViewsPath . '/' . $pagina . '.blade.php';
            
            // Verificar se o arquivo existe
            if (!File::exists($arquivoPagina)) {
                return redirect()->route('dashboard.theme-pages')->with('error', 'Arquivo da página não encontrado.');
            }
            
            // Excluir arquivo da página
            File::delete($arquivoPagina);
            
            // Excluir configurações da página (se existirem)
            DB::table('head_configs')
                ->where('pagina', $pagina)
                ->where('tema', $temaAtivo)
                ->delete();
            
            // Excluir rota dinâmica (se existir)
            DB::table('rotas_dinamicas')
                ->where('tema', $temaAtivo)
                ->where('pagina', $pagina)
                ->delete();
            
            Log::info("Página '{$pagina}' excluída do tema '{$temaAtivo}' com sucesso");
            
            return redirect()->route('dashboard.theme-pages')->with('success', 
                'Página "' . ucfirst($pagina) . '" excluída com sucesso! Arquivo, configurações e rota dinâmica foram removidos.');
                
        } catch (\Exception $e) {
            Log::error('Erro ao excluir página: ' . $e->getMessage());
            return redirect()->route('dashboard.theme-pages')->with('error', 
                'Erro ao excluir página. Tente novamente.');
        }
    }
    
    /**
     * Criar rota dinâmica para uma página
     */
    private function criarRotaDinamica($tema, $pagina)
    {
        try {
            // Gerar nome da rota baseado na página
            $nomeRota = str_replace('_', '-', $pagina);
            $rota = '/' . $nomeRota;
            
            // Verificar se já existe uma rota para esta página
            $rotaExistente = DB::table('rotas_dinamicas')
                ->where('tema', $tema)
                ->where('pagina', $pagina)
                ->first();
            
            if ($rotaExistente) {
                Log::info("Rota dinâmica já existe para {$tema}/{$pagina}");
                return;
            }
            
            // Inserir nova rota dinâmica
            DB::table('rotas_dinamicas')->insert([
                'tema' => $tema,
                'pagina' => $pagina,
                'rota' => $rota,
                'nome_rota' => $nomeRota,
                'controller' => 'TemasController',
                'metodo' => 'renderizarPaginaDinamica',
                'ativo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            Log::info("Rota dinâmica criada: {$rota} para {$tema}/{$pagina}");
            
        } catch (\Exception $e) {
            Log::error('Erro ao criar rota dinâmica: ' . $e->getMessage());
        }
    }
}
