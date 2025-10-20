<?php $__env->startSection('content'); ?>
<style>
        .blog-header {
          margin-bottom: 1.5rem;
        }
        
        .blog-title {
          font-size: 2rem;
          font-weight: 700;
          margin-bottom: 0.5rem;
        }
        
        .blog-meta {
          font-size: 0.9rem;
          color: #fff;
          display: flex;
          gap: 1rem;
        }
        
        .blog-image {
          margin: 2rem 0;
        }
        
        .cover-image {
          width: 100%;
          height: 400px;
          object-fit: cover;
          border-radius: 8px;
        }
        
        .blog-content {
          line-height: 1.6;
        }
        
        .blog-content h2 {
          margin-top: 1.5rem;
          font-size: 1.5rem;
        }

  </style>
  <div class="page-wrap" style="color: #000000 !important;">
      <section class="section top">
        <div class="container w-container">
          
          <!-- Título e Autor -->
          <div class="blog-header">
            <h1 class="blog-title"><?php echo e($blog['title']); ?></h1>
            <div class="blog-meta">
              <span class="blog-author"><?php echo e($blog['author'] ?? 'Autor'); ?></span>
              <span class="blog-date"><?php echo e($blog['date'] ?? date('d M Y')); ?></span>
            </div>
          </div>
    
          <!-- Imagem Principal -->
          <div class="blog-image">
            <img src="<?php echo e($blog['image']); ?>" alt="<?php echo e($blog['title']); ?>" class="cover-image" loading="lazy">
          </div>
    
          <!-- Conteúdo do Blog -->
          <div class="blog-content" style="margin-bottom: 30px; color: #ffffff;">    
            <!-- Conteúdo adicional, se houver -->
            <?php if(!empty($blog['content'])): ?>
            <div class="rich-text w-richtext">
              <?php echo $blog['content']; ?>

            </div>
            <?php endif; ?>
          </div>
    
        </div>
      </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('temas.Dentista24h.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hooglicl/griffo.hoogli.cloud/resources/views/temas/Dentista24h/detail_blogs.blade.php ENDPATH**/ ?>