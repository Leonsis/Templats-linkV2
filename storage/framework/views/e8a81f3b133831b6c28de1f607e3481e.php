<?php $__env->startSection('html'); ?>
  <html data-wf-page="68dd1530bcbf8eb2a9e0cf45" data-wf-site="68dd152dbcbf8eb2a9e0ce11" lang="en">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="banner-content-area">
            <div class="w-layout-blockcontainer container w-container">
                <div data-w-id="c7703357-fa5e-d038-1187-ad523f406217" style="opacity:0" class="banner-title-wrap">
                    <h1 class="banner-title">blogs</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-section">
        <div class="w-layout-blockcontainer container w-container">
            <div class="blog-post-area">
                <div class="w-dyn-list">
                    <div role="list" class="w-dyn-items w-row">
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div data-w-id="94f53a50-8743-a5d4-4fb3-32231269c6ac" style="opacity:0" role="listitem" class="blog-collection-item blog-page w-dyn-item w-col w-col-6">
                                <div class="blog-post">
                                    <a href="<?php echo e(url('/detail_blogs/' . $blog['slug'])); ?>" class="blog-post-image-wrap w-inline-block">
                                        <img src="<?php echo e($blog['image']); ?>" loading="lazy" alt="<?php echo e($blog['title']); ?>" class="blog-post-image">
                                    </a>
                                    <div>
                                        <p class="article-post-date"><?php echo e($blog['created_at'] ? \Carbon\Carbon::parse($blog['created_at'])->format('d/m/Y') : ''); ?></p>
                                        <a href="<?php echo e(url('/detail_blogs/' . $blog['slug'])); ?>" class="blog-post-title"><?php echo e($blog['title']); ?></a>
                                    </div>
                                    <a href="<?php echo e(url('/detail_blogs/' . $blog['slug'])); ?>" class="blog-post-link dark w-inline-block">
                                        <img src="<?php echo e(asset('temas/Dentista24h/assets/images/Testimonial-arrow-02.svg')); ?>" loading="lazy" alt="Abrir post" class="article-post-arrow">
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('temas.Dentista24h.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hooglicl/griffo.hoogli.cloud/resources/views/temas/Dentista24h/blogs.blade.php ENDPATH**/ ?>