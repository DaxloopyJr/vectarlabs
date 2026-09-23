<?php $__env->startSection('content'); ?>
<?php ($editing = $post->exists); ?>
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;"><?php echo e($editing ? 'Edit article' : 'New article'); ?></h1>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger small"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($e); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
<?php endif; ?>

<form method="POST" action="<?php echo e($editing ? route('admin.posts.update', $post) : route('admin.posts.store')); ?>" class="card-soft p-4" style="max-width: 44rem;">
    <?php echo csrf_field(); ?>
    <?php if($editing): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
    <div class="row g-3">
        <div class="col-12">
            <label class="form-label small fw-bold">Title *</label>
            <input name="title" class="form-control" required value="<?php echo e(old('title', $post->title)); ?>">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Excerpt</label>
            <textarea name="excerpt" rows="2" class="form-control"><?php echo e(old('excerpt', $post->excerpt)); ?></textarea>
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Body</label>
            <textarea name="body" rows="6" class="form-control"><?php echo e(old('body', $post->body)); ?></textarea>
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Tag</label>
            <input name="tag" class="form-control" value="<?php echo e(old('tag', $post->tag)); ?>" placeholder="Engineering">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Cover style</label>
            <select name="cover_style" class="form-select">
                <?php $__currentLoopData = ['gradient-a' => 'Navy / orange', 'gradient-b' => 'Navy / blue', 'gradient-c' => 'Navy / violet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($v); ?>" <?php if(old('cover_style', $post->cover_style) === $v): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="published" value="1" id="published" <?php if(old('published', $post->published ?? true)): echo 'checked'; endif; ?>>
                <label class="form-check-label small fw-semibold" for="published">Published</label>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn-brand" style="padding: .6rem 1.4rem;">Save</button>
        <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn-dark-pill">Cancel</a>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/posts/form.blade.php ENDPATH**/ ?>