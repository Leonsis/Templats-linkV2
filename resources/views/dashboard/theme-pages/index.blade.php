@extends('dashboard.layouts.admin')

@section('title', 'Páginas do Tema')

@section('content')

@php
    $allowedEmails = ['admin@templats-link.com'];
    $userCanAccessThemes = in_array(auth()->user()->email, $allowedEmails);
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-file-alt me-2"></i>
                            Páginas do Tema: {{ $temaAtivo }}
                        </h5>
                        @if($userCanAccessThemes)
                            @if($temaAtivo !== 'main-Thema')
                                <button type="button" 
                                        class="btn btn-warning btn-sm" 
                                        onclick="openRenameModal('{{ $temaAtivo }}')"
                                        title="Editar nome do tema">
                                    <i class="fas fa-edit me-2"></i>
                                    Editar Nome do Tema
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if(empty($paginas))
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Nenhuma página encontrada neste tema.
                        </div>
                    @else
                        <div class="row">
                            @foreach($paginas as $pagina)
                                @php
                                    $configuracao = $configuracoes->where('pagina', $pagina)->first();
                                    $temConfiguracao = $configuracao && ($configuracao->meta_title || $configuracao->meta_description || $configuracao->meta_keywords);
                                @endphp
                                
                                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle me-3">
                                                    <i class="fas fa-file-alt text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-0">{{ ucfirst($pagina) }}</h6>
                                                    <small class="text-muted">{{ $pagina }}.blade.php</small>
                                                </div>
                                            </div>
                                            
                                            @if($temConfiguracao)
                                                <div class="mb-3">
                                                    @if($configuracao->meta_title)
                                                        <div class="d-flex align-items-center mb-1">
                                                            <i class="fas fa-tag text-success me-2"></i>
                                                            <small class="text-success">Meta Title configurado</small>
                                                        </div>
                                                    @endif
                                                    @if($configuracao->meta_description)
                                                        <div class="d-flex align-items-center mb-1">
                                                            <i class="fas fa-align-left text-info me-2"></i>
                                                            <small class="text-info">Meta Description configurada</small>
                                                        </div>
                                                    @endif
                                                    @if($configuracao->meta_keywords)
                                                        <div class="d-flex align-items-center">
                                                            <i class="fas fa-key text-warning me-2"></i>
                                                            <small class="text-warning">Meta Keywords configuradas</small>
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="mb-3">
                                                    <span class="badge bg-secondary">
                                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                                        Não configurado
                                                    </span>
                                                </div>
                                            @endif
                                            
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('dashboard.theme-pages.show', $pagina) }}" 
                                                   class="btn btn-primary btn-sm flex-fill">
                                                    <i class="fas fa-cog me-2"></i>
                                                    Configurar
                                                </a>
                                                
                                                @if($userCanAccessThemes)
                                                    <button type="button" 
                                                            class="btn btn-outline-secondary btn-sm" 
                                                            onclick="openDuplicateModal('{{ $pagina }}')"
                                                            title="Duplicar página">
                                                        <i class="fas fa-copy"></i>
                                                    </button>
                                                    @if(!in_array($pagina, ['home', 'sobre', 'contato']))
                                                        <button type="button" 
                                                                class="btn btn-outline-danger btn-sm" 
                                                                onclick="openDeleteModal('{{ $pagina }}')"
                                                                title="Excluir página">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    @endif
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
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
                @csrf
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
                @csrf
                @method('DELETE')
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
    document.getElementById('duplicateForm').action = '{{ route("dashboard.theme-pages.duplicate", ":page") }}'.replace(':page', originalPage);
    
    // Mostrar modal
    const modal = new bootstrap.Modal(document.getElementById('duplicateModal'));
    modal.show();
}

function openDeleteModal(pageName) {
    document.getElementById('pageToDelete').textContent = pageName + '.blade.php';
    document.getElementById('deleteForm').action = '{{ route("dashboard.theme-pages.destroy", ":page") }}'.replace(':page', pageName);
    
    // Mostrar modal
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function openRenameModal(nomeTema) {
    document.getElementById('temaAtual').value = nomeTema;
    document.getElementById('novoNome').value = '';
    document.getElementById('novoNomePreview').textContent = '';
    document.getElementById('renameForm').action = '{{ route("dashboard.temas.rename", ":nomeTema") }}'.replace(':nomeTema', nomeTema);
    
    // Mostrar modal
    const modal = new bootstrap.Modal(document.getElementById('renameModal'));
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
        const temaAtivo = '{{ \App\Helpers\ThemeHelper::getActiveTheme() }}';
        routePreview.textContent = `{{ route('tema.Dentista24h.blogs') }}`.replace('blogs', routeName);
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
                @csrf
                @method('PUT')
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
                               class="form-control @error('novo_nome') is-invalid @enderror" 
                               id="novoNome" 
                               name="novo_nome" 
                               placeholder="Digite o novo nome do tema"
                               required>
                        @error('novo_nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

@endsection
