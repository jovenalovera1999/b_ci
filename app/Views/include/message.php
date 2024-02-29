<?php if (session()->get('success_save_user')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo session()->get('success_save_user') ?>
    </div>
<?php endif; ?>
<?php if (isset($validation)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>