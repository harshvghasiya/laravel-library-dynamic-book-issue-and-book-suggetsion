<?php $__env->startSection('content'); ?>
<ul class="page-breadcrumb breadcrumb">
  <li>
    <a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(trans('lang_data.home_label')); ?></a><i class="fa fa-circle"></i>
  </li>
  <li>
    <a href="<?php echo e(route('admin.email-template.index')); ?>"><?php echo e(trans('lang_data.email_template_list_label')); ?></a><i class="fa fa-circle"></i>
  </li>
  <li class="active">
    <?php if(isset($emailTemplate)): ?>
      <?php echo e(trans('lang_data.edit_email_template_label')); ?>

    <?php else: ?>
      <?php echo e(trans('lang_data.add_email_template_label')); ?>

    <?php endif; ?>
  </li>
</ul>
<div class="row">
    <div class="col-md-12">
      <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
        <div class="tab-content">
          <div class="" id="tab_2">
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-gift"></i>
                    <?php if(isset($emailTemplate)): ?>
                      <?php echo e(trans('lang_data.edit_email_template_label')); ?>

                    <?php else: ?>
                      <?php echo e(trans('lang_data.add_email_template_label')); ?>

                    <?php endif; ?>
                </div>
              </div>
              <div class="portlet-body form">
                  <?php if(isset($emailTemplate)): ?>
                    <?php echo e(Form::model($emailTemplate,
                      array(
                      'id'                => 'AddEditEmailTemplate',
                      'class'             => 'FromSubmit form-horizontal',
                      'data-redirect_url' => route('admin.email-template.index'),
                      'url'               => route('admin.email-template.update', $encryptedId),
                      'method'            => 'PUT',
                      'enctype'           =>"multipart/form-data"
                      ))); ?>

                  <?php else: ?>
                    <?php echo e(Form::open([
                      'id'=>'AddEditEmailTemplate',
                      'class'=>'FromSubmit form-horizontal',
                      'url'=>route('admin.email-template.store'),
                      'data-redirect_url'=>route('admin.email-template.index'),
                      'name'=>'emailTemplate',
                      'enctype' =>"multipart/form-data"
                      ])); ?>

                  <?php endif; ?>
                  <div class="form-body">
                    <h3 class="form-section"><?php echo e(trans('lang_data.email_info_label')); ?></h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3"><?php echo e(trans('lang_data.title_label')); ?></label>
                          <div class="col-md-9">
                            <?php echo e(Form::text('title',null,['placeholder'=>trans('lang_data.enter_title_label'),'id'=>'title','class'=>'form-control'])); ?>

                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3"><?php echo e(trans('lang_data.email_label')); ?></label>
                          <div class="col-md-9">
                            <?php echo e(Form::email('from',null,['placeholder'=>trans('lang_data.email_label'),'id'=>'from','class'=>'form-control'])); ?>

                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3"><?php echo e(trans('lang_data.subject_label')); ?></label>
                          <div class="col-md-9">
                            <?php echo e(Form::text('subject',null,['placeholder'=>trans('lang_data.subject_label'),'id'=>'subject','class'=>'form-control'])); ?>

                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-md-3"><?php echo e(trans('lang_data.status_label')); ?></label>
                          <div class="col-md-9">
                            <div class="radio-list">
                              <label class="radio-inline">
                              <input type="radio" name="status" value="1" <?php echo e(isset($banner)?($banner->status == 1)?'checked':'':'checked'); ?> />
                              <?php echo e(trans('lang_data.active_label')); ?> </label>
                              <label class="radio-inline">
                              <input type="radio" name="status" value="0" <?php echo e(isset($banner)?($banner->status == 0)?'checked':'':''); ?> />
                              <?php echo e(trans('lang_data.inactive_label')); ?> </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <h3 class="form-section"><?php echo e(trans('lang_data.descritoon_template_label')); ?></h3>
                     <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                              <?php echo e(Form::textarea('description',null,['id'=>'description','class'=>'form-control editor-tinymce'])); ?>

                          </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green"><?php echo e(trans('lang_data.submit_label')); ?></button>
                            <a href="<?php echo e(route('admin.email-template.index')); ?>" type="button" class="btn default"><?php echo e(trans('lang_data.cancel_label')); ?></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      </div>
                    </div>
                  </div>
                  <?php echo e(Form::close()); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
  
  $(document).ready(function(){
    $("#AddEditEmailTemplate").validate({
        rules: {
           from: { required: true },
           title: { required: true },
           subject: { required: true }
        },
        messages:{
          from:{ required:"<?php echo e(trans('lang_data.email_required')); ?>"},
          title:{ required:"<?php echo e(trans('lang_data.title_filed_required')); ?>"},
          subject:{ required:"<?php echo e(trans('lang_data.subject_required')); ?>"}
        }
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel_ecommerce/Modules/Admin/Resources/views/email_template/addedit.blade.php ENDPATH**/ ?>