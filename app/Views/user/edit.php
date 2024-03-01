<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Navbar -->
<?= $this->include('include/nav') ?>
<div class="container">
    <!-- Form -->
    <form action="<?=base_url()?>updateUser/<?=$user->user_id?>" method="post">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Add User</h5>
                <!-- Alert message -->
                <?= $this->include('include/message') ?>
                <!-- First name field -->
                <div class="mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?= set_value('first_name', $user->first_name) ?>" />
                </div>
                <!-- Middle name field -->
                <div class="mb-3">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?= set_value('middle_name', $user->middle_name) ?>" />
                </div>
                <!-- Last name field -->
                <div class="mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?= set_value('last_name', $user->last_name) ?>" />
                </div>
                <!-- Age field -->
                <div class="mb-3">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" value="<?= set_value('age', $user->age) ?>" />
                </div>
                <!-- Gender field -->
                <div class="mb-3">
                    <label for="gender_id">Gender</label>
                    <select class="form-select" id="gender_id" name="gender_id">
                        <option value="">N/A</option>
                        <!-- Show genders from genders table in database -->
                        <?php foreach ($genders as $gender) : ?>
                            <option value="<?= $gender->gender_id ?>"><?= $gender->gender ?></option>
                            <!-- If gender id has value -->
                            <?php if (set_value('gender_id') == $gender->gender_id) : ?>
                                <option value="<?= $gender->gender_id ?>" selected hidden><?= $gender->gender ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                        <option value="<?=$gender->gender_id?>" selected hidden><?=$gender->gender?></option>
                    </select>
                </div>
                <!-- Email field -->
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email', $user->email) ?>" />
                </div>
                <!-- Save button -->
                <div class="col-12 col-sm-3 float-end">
                    <button type="submit" class="btn btn-success w-100">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection('content') ?>