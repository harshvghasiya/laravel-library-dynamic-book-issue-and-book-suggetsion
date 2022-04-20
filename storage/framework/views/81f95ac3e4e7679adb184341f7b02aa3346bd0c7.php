<?php $__env->startSection('title'); ?>
    <?php if(isset($title) && $title !=""): ?>
        <title><?php echo e($title); ?> - <?php echo e(trans('lang_data.softtechover_com_label')); ?></title>
    <?php else: ?>
        <title><?php echo e(trans('lang_data.welcome_to_softtechover_com')); ?></title>
    <?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="men_area pt-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9">
				<div class="product-filter">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-12">
			                <nav aria-label="breadcrumb">
			                    <ol class="breadcrumb">
			                        <li class="breadcrumb-item"><a href="<?php echo e(route('front.home')); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			                        <li class="breadcrumb-item" aria-current="page"> <a href="<?php echo e(route('front.category.index',$subCategory->category->slug)); ?>"><?php echo e($subCategory->category->name); ?></a></li>
			                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($subCategory->name); ?></li>
			                    </ol>
			                </nav>
			            </div>


					</div>
				</div>
				<div id="shop-all" class="row">
					<?php if(isset($products) && !$products->isEmpty()): ?>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-xs-12 col-sm-6 col-md-4 product-item filter-best">
								<div class="product-img">
									<img class="product_list_img" src="<?php echo e($v->getProductImageUrl('thumbnail_')); ?>" alt="<?php echo e($subCategory->name); ?>">
								</div>
								<div class="product-bio">
									<h4>
										<a href="<?php echo e(route('front.product.detail',$v->slug)); ?>" title="<?php echo e($v->name); ?>"><?php echo e(WORD_LIMIT($v->name,50)); ?></a>
									</h4>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-5">
							<?php echo e($products->links()); ?>

						</div>
					<?php else: ?>
						<div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-5">
							<h4>Product not found</h4>	
						</div>
					<?php endif; ?>
				</div>
			</div>
			<aside class="col-md-3 sidebar">

				<div class="widget category-widget">

					<h3>Categories</h3>

					<ul id="category-widget">

						<?php $__currentLoopData = $sidebarCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<li><a href="<?php echo e(route('front.category.index',$v->slug)); ?>"><?php echo e($v->name); ?>


								<span class="category-widget-btn"></span></a>
								<ul>
									
									<?php if(isset($v->subCategory) && !$v->subCategory->isEmpty()): ?>
										<?php $__currentLoopData = $v->subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$v2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
											<li><a href="<?php echo e(route('front.category.sub_category',$v2->slug)); ?>"><?php echo e($v2->name); ?></a></li>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</ul>
							</li>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			</aside>
		</div>
	</div>
</section>

<?php echo $__env->make('layouts.flashmessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel_ecommerce/resources/views/front/category/sub_category.blade.php ENDPATH**/ ?>