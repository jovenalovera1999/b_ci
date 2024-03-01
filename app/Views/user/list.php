<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Navbar -->
<?= $this->include('include/nav') ?>
<div class="container">
    <div class="table-responsive mt-3">
        <table class="table">
            <!-- Alert message -->
            <?= $this->include('include/message') ?>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Show list of users from users table in database -->
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user->first_name ?></td>
                        <td><?= $user->middle_name ?></td>
                        <td><?= $user->last_name ?></td>
                        <td><?= $user->created_at ?></td>
                        <td><?= $user->updated_at ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?= base_url() ?>user/edit/<?= $user->user_id ?>" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection('content') ?>