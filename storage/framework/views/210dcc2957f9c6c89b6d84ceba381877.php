<?php $__env->startSection('title', 'Páginas do Tema'); ?>

<?php $__env->startSection('content'); ?>

<?php
    $allowedEmails = ['admin@templats-link.com'];
    $userCanAccessThemes = in_array(auth()->user()->email, $allowedEmails);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-file-alt me-2"></i>
                            Páginas do Tema: <?php echo e($temaAtivo); ?>

                        </h5>
                         <?php if($userCanAccessThemes): ?>
                             <?php if($temaAtivo !== 'main-Thema'): ?>
                                 <button type="button" 
                                         class="btn btn-warning btn-sm me-2" 
                                         onclick="openRenameModal('<?php echo e($temaAtivo); ?>')"
                                         title="Editar nome do tema">
                                     <i class="fas fa-edit me-2"></i>
                                     Editar Nome do Tema
                                 </button>
                             <?php endif; ?>
                             <button type="button" 
                                     class="btn btn-info btn-sm" 
                                     onclick="generateSitemap('<?php echo e($temaAtivo); ?>')"
                                     title="Gerar sitemap.xml do tema">
                                 <i class="fas fa-sitemap me-2"></i>
                                 Gerar Sitemap
                             </button>
                         <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(empty($paginas)): ?>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Nenhuma página encontrada neste tema.
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <?php $__currentLoopData = $paginas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $configuracao = $configuracoes->where('pagina', $pagina)->first();
                                    $temConfiguracao = $configuracao && ($configuracao->meta_title || $configuracao->meta_description || $configuracao->meta_keywords);
                                ?>
                                
                                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle me-3">
                                                    <i class="fas fa-file-alt text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-0"><?php echo e(ucfirst($pagina)); ?></h6>
                                                    <small class="text-muted"><?php echo e($pagina); ?>.blade.php</small>
                                                </div>
                                            </div>
                                            
                                            <?php if($temConfiguracao): ?>
                                                <div class="mb-3">
                                                    <?php if($configuracao->meta_title): ?>
                                                        <div class="d-flex align-items-center mb-1">
                                                            <i class="fas fa-tag text-success me-2"></i>
                                                            <small class="text-success">Meta Title configurado</small>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($configuracao->meta_description): ?>
                                                        <div class="d-flex align-items-center mb-1">
                                                            <i class="fas fa-align-left text-info me-2"></i>
                                                            <small class="text-info">Meta Description configurada</small>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($configuracao->meta_keywords): ?>
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-key text-warning me-2"></i>
                                                            <small class="text-warning">Meta Keywords configuradas</small>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="mb-3">
                                                    <span class="badge bg-secondary">
                                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                                        Não configurado
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="d-flex gap-2">
                                                <a href="<?php echo e(route('dashboard.theme-pages.show', $pagina)); ?>" 
                                                   class="btn btn-primary btn-sm flex-fill">
                                                    <i class="fas fa-cog me-2"></i>
                                                    Configurar
                                                </a>
                                                
                                                <?php if($userCanAccessThemes): ?>
                                                    <button type="button" 
                                                            class="btn btn-outline-secondary btn-sm" 
                                                            onclick="openDuplicateModal('<?php echo e($pagina); ?>')"
                                                            title="Duplicar página">
                                                        <i class="fas fa-copy"></i>
                                                    </button>
                                                    <?php if(!in_array($pagina, ['home', 'sobre', 'contato'])): ?>
                                                        <button type="button" 
                                                                class="btn btn-outline-danger btn-sm" 
                                                                onclick="openDeleteModal('<?php echo e($pagina); ?>')"
                                                                title="Excluir página">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Duplicação -->
<div class="modal fade" id="duplicateModal" tabindex="-1" aria-labelledby="duplicateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="duplicateModalLabel">
                    <i class="fas fa-copy me-2"></i>
                    Duplicar Página
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="duplicateForm" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="originalPage" class="form-label">Página Original:</label>
                        <input type="text" class="form-control" id="originalPage" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newPageName" class="form-label">Nome da Nova Página:</label>
                        <input type="text" class="form-control" id="newPageName" name="new_page_name" 
                               placeholder="Digite o nome da nova página" required>
                        <div class="form-text">
                            <div>A nova página será criada como: <span id="newPagePreview" class="text-muted"></span></div>
                            <div>Rota dinâmica: <code id="routePreview" class="text-muted"></code></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-copy me-2"></i>
                        Duplicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Exclusão -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Confirmar Exclusão
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Atenção!</strong> Esta ação não pode ser desfeita.
                    </div>
                    <p>Você está prestes a excluir a página:</p>
                    <div class="bg-light p-3 rounded">
                        <strong id="pageToDelete"></strong>
                    </div>
                    <p class="mt-3 mb-0">Esta ação irá:</p>
                    <ul class="list-unstyled mt-2">
                        <li><i class="fas fa-trash text-danger me-2"></i> Excluir o arquivo da página</li>
                        <li><i class="fas fa-cog text-danger me-2"></i> Remover todas as configurações</li>
                        <li><i class="fas fa-route text-danger me-2"></i> Deletar a rota dinâmica</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>
                        Excluir Página
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.icon-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
}
</style>

<script>
function openDuplicateModal(originalPage) {
    document.getElementById('originalPage').value = originalPage;
    document.getElementById('newPageName').value = '';
    document.getElementById('newPagePreview').textContent = '';
    document.getElementById('duplicateForm').action = '<?php echo e(route("dashboard.theme-pages.duplicate", ":page")); ?>'.replace(':page', originalPage);
    
    // Mostrar modal
    const modal = new bootstrap.Modal(document.getElementById('duplicateModal'));
    modal.show();
}

function openDeleteModal(pageName) {
    document.getElementById('pageToDelete').textContent = pageName + '.blade.php';
    document.getElementById('deleteForm').action = '<?php echo e(route("dashboard.theme-pages.destroy", ":page")); ?>'.replace(':page', pageName);
    
    // Mostrar modal
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function openRenameModal(nomeTema) {
    document.getElementById('temaAtual').value = nomeTema;
    document.getElementById('novoNome').value = '';
    document.getElementById('novoNomePreview').textContent = '';
    document.getElementById('renameForm').action = '<?php echo e(route("dashboard.temas.rename", ":nomeTema")); ?>'.replace(':nomeTema', nomeTema);
    
    // Mostrar modal
    const modal = new bootstrap.Modal(document.getElementById('renameModal'));
    modal.show();
}

function generateSitemap(nomeTema) {
    console.log('Iniciando geração de sitemap para tema:', nomeTema);
    
    if (confirm('Deseja gerar o sitemap.xml para o tema "' + nomeTema + '"?\n\nIsso irá analisar todas as páginas do tema e criar um arquivo sitemap.xml na raiz do site.')) {
        console.log('Usuário confirmou a geração do sitemap');
        
        // Mostrar loading
        const button = event.target;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Gerando...';
        button.disabled = true;
        
        // Criar formulário dinâmico
        const form = document.createElement('form');
        form.method = 'POST';
        const actionUrl = '<?php echo e(route("dashboard.temas.generate-sitemap", ":nomeTema")); ?>'.replace(':nomeTema', nomeTema);
        form.action = actionUrl;
        form.style.display = 'none';
        
        console.log('URL da ação:', actionUrl);
        
        // Adicionar token CSRF
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '<?php echo e(csrf_token()); ?>';
        form.appendChild(csrfToken);
        
        console.log('Token CSRF:', csrfToken.value);
        
        // Adicionar ao body e submeter
        document.body.appendChild(form);
        console.log('Formulário criado e adicionado ao DOM');
        console.log('Submetendo formulário...');
        form.submit();
        
        // Restaurar botão após 5 segundos (fallback)
        setTimeout(() => {
            button.innerHTML = originalText;
            button.disabled = false;
        }, 5000);
    } else {
        console.log('Usuário cancelou a geração do sitemap');
    }
}

// Atualizar preview do nome da nova página
document.getElementById('newPageName').addEventListener('input', function() {
    const newName = this.value.trim();
    const preview = document.getElementById('newPagePreview');
    const routePreview = document.getElementById('routePreview');
    
    if (newName) {
        // Converter para formato de nome de arquivo (lowercase, sem espaços, etc.)
        const fileName = newName.toLowerCase()
            .replace(/[^a-z0-9]/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
        
        preview.textContent = fileName + '.blade.php';
        preview.className = 'text-success';
        
        // Mostrar rota dinâmica
        const routeName = fileName.replace(/-/g, '-');
        const temaAtivo = '<?php echo e(\App\Helpers\ThemeHelper::getActiveTheme()); ?>';
        routePreview.textContent = `<?php echo e(route('tema.Griffo.blogs')); ?>`.replace('blogs', routeName);
        routePreview.className = 'text-success';
    } else {
        preview.textContent = '';
        preview.className = 'text-muted';
        routePreview.textContent = '';
        routePreview.className = 'text-muted';
    }
});

// Validação do formulário
document.getElementById('duplicateForm').addEventListener('submit', function(e) {
    const newName = document.getElementById('newPageName').value.trim();
    
    if (!newName) {
        e.preventDefault();
        alert('Por favor, digite um nome para a nova página.');
        return;
    }
    
    // Validar nome (apenas letras, números e hífen)
    if (!/^[a-zA-Z0-9-]+$/.test(newName)) {
        e.preventDefault();
        alert('O nome da página deve conter apenas letras, números e hífen (-).');
        return;
    }
    
    // Mostrar loading no botão
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Duplicando...';
    submitBtn.disabled = true;
    
    // Restaurar botão em caso de erro (será feito pelo servidor)
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 10000);
});

// Validação do formulário de exclusão
document.getElementById('deleteForm').addEventListener('submit', function(e) {
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    // Mostrar loading no botão
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Excluindo...';
    submitBtn.disabled = true;
    
    // Restaurar botão em caso de erro (será feito pelo servidor)
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 10000);
});

// Adicionar preview do novo nome do tema
const novoNomeInput = document.getElementById('novoNome');
if (novoNomeInput) {
    novoNomeInput.addEventListener('input', function() {
        const novoNome = this.value.trim();
        const preview = document.getElementById('novoNomePreview');
        
        if (novoNome) {
            // Validar nome (apenas letras, números, hífen e underscore)
            if (/^[a-zA-Z0-9-_]+$/.test(novoNome)) {
                preview.textContent = novoNome;
                preview.className = 'text-success';
            } else {
                preview.textContent = 'Nome inválido - use apenas letras, números, hífen (-) e underscore (_)';
                preview.className = 'text-danger';
            }
        } else {
            preview.textContent = '';
            preview.className = 'text-muted';
        }
    });
}

// Validação do formulário de renomeação
const renameForm = document.getElementById('renameForm');
if (renameForm) {
    renameForm.addEventListener('submit', function(e) {
        const novoNome = document.getElementById('novoNome').value.trim();
        
        if (!novoNome) {
            e.preventDefault();
            alert('Por favor, digite um novo nome para o tema.');
            return;
        }
        
        // Validar nome (apenas letras, números, hífen e underscore)
        if (!/^[a-zA-Z0-9-_]+$/.test(novoNome)) {
            e.preventDefault();
            alert('O nome do tema deve conter apenas letras, números, hífen (-) e underscore (_).');
            return;
        }
        
        // Mostrar loading no botão
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Renomeando...';
        submitBtn.disabled = true;
        
        // Restaurar botão em caso de erro (será feito pelo servidor)
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 10000);
    });
}
</script>

<!-- Modal de Renomeação do Tema -->
<div class="modal fade" id="renameModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>
                    Editar Nome do Tema
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="renameForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Importante!</strong> Esta ação irá renomear o tema em todo o sistema.
                    </div>
                    <div class="mb-3">
                        <label for="temaAtual" class="form-label">Tema Atual:</label>
                        <input type="text" class="form-control" id="temaAtual" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="novoNome" class="form-label">Novo Nome do Tema:</label>
                        <input type="text" 
                               class="form-control <?php $__errorArgs = ['novo_nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="novoNome" 
                               name="novo_nome" 
                               placeholder="Digite o novo nome do tema"
                               required>
                        <?php $__errorArgs = ['novo_nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-text">
                            <div>O novo nome será: <span id="novoNomePreview" class="text-muted"></span></div>
                            <div><small class="text-muted">Use apenas letras, números, hífen (-) e underscore (_)</small></div>
                        </div>
                    </div>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Esta ação irá:</strong>
                        <ul class="mb-0 mt-2">
                            <li>Renomear as pastas de assets e views</li>
                            <li>Atualizar todas as configurações no banco de dados</li>
                            <li>Atualizar as rotas dinâmicas</li>
                            <li>Se for o tema ativo, atualizar a configuração principal</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>
                        Renomear Tema
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Templats-linkV2/resources/views/dashboard/theme-pages/index.blade.php ENDPATH**/ ?>