<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Helpers\ThemeHelper;

class RobotsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Verificar status do robots.txt e meta tag
     */
    public function status()
    {
        $temaAtivo = ThemeHelper::getActiveTheme();
        $robotsPath = public_path('robots.txt');
        $robotsExists = File::exists($robotsPath);
        
        // Verificar se tem meta tag de indexação
        $hasIndexMeta = $this->hasIndexMetaTag($temaAtivo);
        
        return response()->json([
            'robots_exists' => $robotsExists,
            'has_index_meta' => $hasIndexMeta,
            'tema_ativo' => $temaAtivo
        ]);
    }

    /**
     * Criar robots.txt e meta tag de indexação
     */
    public function enable()
    {
        try {
            $temaAtivo = ThemeHelper::getActiveTheme();
            
            // Criar robots.txt
            $this->createRobotsFile();
            
            // Adicionar meta tag de indexação
            $this->addIndexMetaTag($temaAtivo);
            
            return response()->json([
                'success' => true,
                'message' => 'Robots.txt criado e meta tag de indexação adicionada com sucesso!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao habilitar indexação: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remover robots.txt e meta tag de indexação
     */
    public function disable()
    {
        try {
            $temaAtivo = ThemeHelper::getActiveTheme();
            
            // Remover robots.txt
            $this->removeRobotsFile();
            
            // Remover meta tag de indexação
            $this->removeIndexMetaTag($temaAtivo);
            
            return response()->json([
                'success' => true,
                'message' => 'Robots.txt removido e meta tag de indexação desabilitada com sucesso!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao desabilitar indexação: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Criar arquivo robots.txt
     */
    private function createRobotsFile()
    {
        $robotsPath = public_path('robots.txt');
        $sitemapUrl = url('/sitemap.xml');
        
        $robotsContent = "User-agent: *\n";
        $robotsContent .= "Allow: /\n";
        $robotsContent .= "Disallow: /dashboard/\n";
        $robotsContent .= "Disallow: /admin/\n";
        $robotsContent .= "Disallow: /storage/\n";
        $robotsContent .= "Disallow: /vendor/\n";
        $robotsContent .= "Disallow: /bootstrap/\n";
        $robotsContent .= "Disallow: /config/\n";
        $robotsContent .= "Disallow: /database/\n";
        $robotsContent .= "Disallow: /resources/\n";
        $robotsContent .= "Disallow: /routes/\n";
        $robotsContent .= "Disallow: /app/\n";
        $robotsContent .= "Disallow: /artisan\n";
        $robotsContent .= "Disallow: /composer.json\n";
        $robotsContent .= "Disallow: /composer.lock\n";
        $robotsContent .= "Disallow: /package.json\n";
        $robotsContent .= "Disallow: /webpack.mix.js\n";
        $robotsContent .= "Disallow: /yarn.lock\n";
        $robotsContent .= "Disallow: /node_modules/\n";
        $robotsContent .= "Disallow: /tests/\n";
        $robotsContent .= "Disallow: /phpunit.xml\n";
        $robotsContent .= "Disallow: /storage/\n";
        $robotsContent .= "Disallow: /bootstrap/cache/\n";
        $robotsContent .= "Disallow: /.*\n";
        $robotsContent .= "\n";
        $robotsContent .= "Sitemap: {$sitemapUrl}\n";
        
        File::put($robotsPath, $robotsContent);
    }

    /**
     * Remover arquivo robots.txt
     */
    private function removeRobotsFile()
    {
        $robotsPath = public_path('robots.txt');
        if (File::exists($robotsPath)) {
            File::delete($robotsPath);
        }
    }

    /**
     * Adicionar meta tag de indexação
     */
    private function addIndexMetaTag($tema)
    {
        try {
            // Verificar se já existe configuração para este tema
            $existingConfig = DB::table('head_configs')
                ->where('tema', $tema)
                ->where('pagina', 'global')
                ->first();

            if ($existingConfig) {
                // Atualizar configuração existente
                DB::table('head_configs')
                    ->where('tema', $tema)
                    ->where('pagina', 'global')
                    ->update([
                        'meta_robots' => 'index, follow',
                        'updated_at' => now()
                    ]);
            } else {
                // Criar nova configuração
                DB::table('head_configs')->insert([
                    'tema' => $tema,
                    'pagina' => 'global',
                    'meta_robots' => 'index, follow',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Erro ao adicionar meta tag de indexação: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Remover meta tag de indexação
     */
    private function removeIndexMetaTag($tema)
    {
        try {
            DB::table('head_configs')
                ->where('tema', $tema)
                ->where('pagina', 'global')
                ->update([
                    'meta_robots' => 'noindex, nofollow',
                    'updated_at' => now()
                ]);
        } catch (\Exception $e) {
            \Log::error('Erro ao remover meta tag de indexação: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Verificar se tem meta tag de indexação
     */
    private function hasIndexMetaTag($tema)
    {
        try {
            $config = DB::table('head_configs')
                ->where('tema', $tema)
                ->where('pagina', 'global')
                ->first();

            if ($config && isset($config->meta_robots)) {
                return $config->meta_robots === 'index, follow';
            }

            return false;
        } catch (\Exception $e) {
            \Log::error('Erro ao verificar meta tag de indexação: ' . $e->getMessage());
            return false;
        }
    }
}
