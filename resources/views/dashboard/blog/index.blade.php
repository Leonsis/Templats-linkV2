@extends('dashboard.layouts.admin')

@section('title', 'Blog - Gerenciar Posts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Gerenciar Blog</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title mb-0">Posts do Blog</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('dashboard.blog.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Criar Postagem
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($posts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagem</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Status</th>
                                        <th>Data de Criação</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>
                                                @if($post->imagem_apresentacao)
                                                    <img src="{{ $post->imagem_url }}" alt="{{ $post->titulo }}" 
                                                         class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                                         style="width: 60px; height: 60px;">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>{{ $post->titulo }}</strong>
                                                    @if($post->meta_title)
                                                        <br><small class="text-muted">{{ \Illuminate\Support\Str::limit($post->meta_title, 50) }}</small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-info">{{ $post->autor ?: 'Não informado' }}</span>
                                            </td>
                                            <td>
                                                @if($post->ativo)
                                                    <span class="badge bg-success">Ativo</span>
                                                @else
                                                    <span class="badge bg-secondary">Inativo</span>
                                                @endif
                                            </td>
                                            <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('dashboard.blog.edit', $post) }}" class="btn btn-sm btn-outline-primary" title="Editar" style="border-radius: var(--radius-md) !important;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    
                                                    <form action="{{ route('dashboard.blog.toggle-status', $post) }}" 
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" 
                                                                class="btn btn-sm {{ $post->ativo ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                                title="{{ $post->ativo ? 'Desativar' : 'Ativar' }}"
                                                                onclick="return confirm('Tem certeza que deseja {{ $post->ativo ? 'desativar' : 'ativar' }} este post?')">
                                                            <i class="fas {{ $post->ativo ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                                        </button>
                                                    </form>
                                                    
                                                    <form action="{{ route('dashboard.blog.destroy', $post) }}" 
                                                          method="POST" class="d-inline"
                                                          onsubmit="return confirm('Tem certeza que deseja deletar este post? Esta ação não pode ser desfeita.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Deletar">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginação -->
                        <div class="d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-blog fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Nenhum post encontrado</h5>
                            <p class="text-muted">Comece criando sua primeira postagem!</p>
                            <a href="{{ route('dashboard.blog.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Criar Primeira Postagem
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
