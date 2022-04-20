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
<div class="content-wrapper">
  <div class="header-spacer"></div>
  <div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
      <h1 class="stunning-header-title">Tag</h1>
      <ul class="breadcrumbs">
        <li class="breadcrumbs-item">
          <a href="<?php echo e(route('front.home')); ?>">Home</a>
          <i class="seoicon-right-arrow"></i>
        </li>
        <li class="breadcrumbs-item active">
          <span href="#">Tag</span>
          <i class="seoicon-right-arrow"></i>
        </li>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="row medium-padding120">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <main class="main">
          <div id="latest_all_blog"></div>
        </main>
      </div>
      <?php echo $__env->make('front.common.blog-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
$(document).ready(function(){
    $(document).on('click', '.pagination a', function(event){
      event.preventDefault(); 
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
      $('html, body').animate({scrollTop:50}, 'slow');
    });
    function fetch_data(page)
    {   
      var tag =  "<?php echo e($tagDetail->slug); ?>"
      $.ajax({
       url:"<?php echo e(route('front.tag.tag_ajax')); ?>?page="+page,
       data:{"_token": "<?php echo e(csrf_token()); ?>",tag:tag},
       success:function(data)
       {
        $('#latest_all_blog').html(data);
       }
      });
    }
    fetch_data(1)
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/i1qxzjn7zpro/public_html/softtechover_phase_3/newlaunch/resources/views/front/tag/index.blade.php ENDPATH**/ ?>