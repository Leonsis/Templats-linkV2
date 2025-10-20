<?php $__env->startSection('title', 'Páginas do Tema'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-file-alt me-2"></i>
                        Páginas do Tema: <?php echo e($temaAtivo); ?>

                    </h5>
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
                                                <button type="button" 
                                                        class="btn btn-outline-secondary btn-sm" 
                                                        onclick="openDuplicateModal('<?php echo e($pagina); ?>')"
                                                        title="Duplicar página">
                                                    <i class="fas fa-copy"></i>
                                                </button>
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
        routePreview.textContent = `<?php echo e(route('tema.Dentista24h.blogs')); ?>`.replace('blogs', routeName);
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hooglicl/griffo.hoogli.cloud/resources/views/dashboard/theme-pages/index.blade.php ENDPATH**/ ?>