<?php $__env->startSection('html'); ?>
  <html data-wf-page="68d2e59e5d2e8a01fe822758" data-wf-site="68d2e59d5d2e8a01fe822683" lang="en">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
.blog-post.card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.blog-post-image:hover {
  transform: scale(1.05);
}

.blog-post-title:hover {
  color: #3b82f6 !important;
}

.blog-post-link:hover {
  color: #1d4ed8 !important;
}

.blog-post-image-wrap {
    min-height: 100px;
    margin-bottom: 0px;
}
</style>
<div class="banner-content-area">
      <div class="w-layout-blockcontainer container w-container">
        <div data-w-id="c7703357-fa5e-d038-1187-ad523f406217" style="opacity:0" class="banner-title-wrap">
          <h1 class="banner-title">Blogs</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-section">
    <div class="w-layout-blockcontainer container w-container">
      <div class="blog-post-area">
        <div class="w-dyn-list">
          <div role="list" class="w-dyn-items w-row">
            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div data-w-id="94f53a50-8743-a5d4-4fb3-32231269c6ac" style="opacity:0" role="listitem" class="blog-collection-item blog-page w-dyn-item w-col w-col-6">
                <div class="blog-post card" style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #e5e7eb; overflow: hidden; background: white; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                  <a href="<?php echo e(url('/detail_blogs/' . $blog['slug'])); ?>" class="blog-post-image-wrap w-inline-block" style="display: block; overflow: hidden;">
                    <img src="<?php echo e($blog['image']); ?>" loading="lazy" alt="<?php echo e($blog['title']); ?>" class="blog-post-image" style="width: 100%; height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                  </a>
                  <div style="padding: 20px;">
                    <a href="<?php echo e(url('/detail_blogs/' . $blog['slug'])); ?>" class="blog-post-title" style="color: #1f2937; text-decoration: none; font-weight: 600; font-size: 18px; line-height: 1.4; display: block; margin-bottom: 12px;"><?php echo e($blog['title']); ?></a>
                    <a href="<?php echo e(url('/detail_blogs/' . $blog['slug'])); ?>" class="blog-post-link dark w-inline-block" style="display: inline-flex; align-items: center; color: #3b82f6; text-decoration: none; font-weight: 500; font-size: 14px;">
                      
                      <img src="<?php echo e(asset('temas/Dentista24h/assets/images/Testimonial-arrow-02.svg')); ?>" loading="lazy" alt="Testimonial Arrow" class="article-post-arrow" style="width: 16px; height: 16px;">
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="w-dyn-empty">
                <div>Nenhum post encontrado</div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temas.Dentista24h.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hoogli-templats-link/resources/views/temas/Dentista24h/blogs.blade.php ENDPATH**/ ?>