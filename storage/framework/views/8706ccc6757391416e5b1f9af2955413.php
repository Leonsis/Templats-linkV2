<?php $__env->startSection('title', 'Editar Postagem'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">                
                <h4 class="page-title">Editar Postagem</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Editar: <?php echo e($post->titulo); ?></h5>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('dashboard.blog.update', $post)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <div class="row">
                            <!-- Meta Tags -->
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Meta Tags (SEO)</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="meta_title" class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                           id="meta_title" name="meta_title" value="<?php echo e(old('meta_title', $post->meta_title ?? '')); ?>"
                                                           placeholder="Título para SEO (máximo 255 caracteres)">
                                                    <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                                    <input type="text" class="form-control <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                           id="meta_keywords" name="meta_keywords" value="<?php echo e(old('meta_keywords', $post->meta_keywords ?? '')); ?>"
                                                           placeholder="Palavras-chave separadas por vírgula">
                                                    <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea class="form-control <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                      id="meta_description" name="meta_description" rows="3"
                                                      placeholder="Descrição para SEO (máximo 500 caracteres)"><?php echo e(old('meta_description', $post->meta_description ?? '')); ?></textarea>
                                            <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Conteúdo Principal -->
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Conteúdo da Postagem</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="titulo" class="form-label">Título da Postagem <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="titulo" name="titulo" value="<?php echo e(old('titulo', $post->titulo)); ?>" required
                                                   placeholder="Digite o título da postagem">
                                            <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="autor" class="form-label">Autor da Postagem <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['autor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="autor" name="autor" value="<?php echo e(old('autor', $post->autor)); ?>" required
                                                   placeholder="Digite o nome do autor">
                                            <?php $__errorArgs = ['autor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug" class="form-label">URL Personalizada (Slug)</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="slug" name="slug" value="<?php echo e(old('slug', $post->slug)); ?>"
                                                   placeholder="Ex: como-participar-de-licitacoes">
                                            <div class="form-text">
                                                <strong>Dica:</strong> URL personalizada para a postagem. Deixe vazio para gerar automaticamente baseado no título.<br>
                                                <strong>URL atual:</strong> <code>/blog/<?php echo e($post->slug); ?>/detail</code>
                                            </div>
                                            <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <!-- Imagem Atual -->
                                        <?php if($post->imagem_apresentacao): ?>
                                            <div class="mb-3">
                                                <label class="form-label">Imagem Atual</label>
                                                <div class="border rounded p-2">
                                                    <img src="<?php echo e($post->imagem_url); ?>" alt="<?php echo e($post->titulo); ?>" 
                                                         class="img-fluid" style="max-height: 200px;">
                                                <div class="form-text mt-2">
                                                    <strong>Arquivo:</strong> <?php echo e($post->imagem_apresentacao); ?>

                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="mb-3">
                                            <label for="imagem_apresentacao" class="form-label">
                                                <?php echo e($post->imagem_apresentacao ? 'Nova Imagem de Apresentação' : 'Imagem de Apresentação'); ?>

                                            </label>
                                            <input type="file" class="form-control <?php $__errorArgs = ['imagem_apresentacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="imagem_apresentacao" name="imagem_apresentacao" 
                                                   accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                            <div class="form-text">
                                                <?php echo e($post->imagem_apresentacao ? 'Deixe em branco para manter a imagem atual.' : ''); ?>

                                                Formatos aceitos: JPEG, PNG, JPG, GIF, WEBP. Tamanho máximo: 10MB
                                            </div>
                                            <?php $__errorArgs = ['imagem_apresentacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="conteudo" class="form-label">Conteúdo da Postagem <span class="text-danger">*</span></label>
                                            
                                            <!-- Textarea com formatação básica -->
                                            <textarea class="form-control <?php $__errorArgs = ['conteudo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                      id="conteudo" name="conteudo" rows="15" required
                                                      placeholder="Digite o conteúdo da postagem. Você pode usar HTML básico como: &lt;b&gt;negrito&lt;/b&gt;, &lt;i&gt;itálico&lt;/i&gt;, &lt;ul&gt;&lt;li&gt;listas&lt;/li&gt;&lt;/ul&gt;, &lt;h2&gt;subtítulos&lt;/h2&gt;"><?php echo e(old('conteudo', $post->conteudo)); ?></textarea>
                                            
                                            <div class="form-text">
                                                <strong>Dicas de formatação:</strong><br>
                                                • <code>&lt;b&gt;texto&lt;/b&gt;</code> para <b>negrito</b><br>
                                                • <code>&lt;i&gt;texto&lt;/i&gt;</code> para <i>itálico</i><br>
                                                • <code>&lt;h2&gt;título&lt;/h2&gt;</code> para subtítulos<br>
                                                • <code>&lt;ul&gt;&lt;li&gt;item&lt;/li&gt;&lt;/ul&gt;</code> para listas<br>
                                                • <code>&lt;p&gt;parágrafo&lt;/p&gt;</code> para parágrafos
                                            </div>
                                            <?php $__errorArgs = ['conteudo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="ativo" name="ativo" value="1"
                                                       <?php echo e(old('ativo', $post->ativo) ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="ativo">
                                                    Postagem ativa (visível no site)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo e(route('dashboard.blog')); ?>" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Voltar
                                    </a>
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Salvar Alterações
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Preview da Nova Imagem -->
<script>
document.getElementById('imagem_apresentacao').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Remover preview anterior se existir
            const existingPreview = document.getElementById('new-image-preview');
            if (existingPreview) {
                existingPreview.remove();
            }
            
            // Criar novo preview
            const preview = document.createElement('div');
            preview.id = 'new-image-preview';
            preview.className = 'mt-2';
            preview.innerHTML = `
                <label class="form-label">Preview da Nova Imagem:</label>
                <div class="border rounded p-2">
                    <img src="${e.target.result}" alt="Preview" class="img-fluid" style="max-height: 200px;">
                </div>
            `;
            
            document.getElementById('imagem_apresentacao').parentNode.appendChild(preview);
        };
        reader.readAsDataURL(file);
    }
});

// Gerar slug automaticamente baseado no título
document.getElementById('titulo').addEventListener('input', function(e) {
    const titulo = e.target.value;
    const slugField = document.getElementById('slug');
    
    // Só gerar slug se o campo slug estiver vazio
    if (!slugField.value.trim()) {
        const slug = titulo
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '') // Remove acentos
            .replace(/[^a-z0-9\s-]/g, '') // Remove caracteres especiais
            .replace(/\s+/g, '-') // Substitui espaços por hífens
            .replace(/-+/g, '-') // Remove hífens duplicados
            .trim('-'); // Remove hífens do início e fim
        
        slugField.value = slug;
    }
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hooglicl/griffo.hoogli.cloud/resources/views/dashboard/blog/edit.blade.php ENDPATH**/ ?>