<!-- Message will show if user successfully saved in database -->
<?php if (session()->get('success_save_user')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo session()->get('success_save_user') ?>
    </div>
<?php endif; ?>
<!-- Message will show if there are any invalid value in form -->
<?php if (isset($validation)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>