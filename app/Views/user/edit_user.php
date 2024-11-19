<?= $this->extend('partials/main') ?>

<?= $this->section('title') ?>
    Edit User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit User</h3>
        </div>
        <div class="card-body">
            <!-- Form Start -->
            <form action="<?= base_url('superadmin/user/updateUser/' . esc($user['id'])) ?>" method="post">
                <?= csrf_field() ?>

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= esc($user['name']) ?>" required>
                </div>

                <!-- Brand -->
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="<?= esc($user['brand']) ?>">
                </div>

                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= esc($user['username']) ?>" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= esc($user['email']) ?>" required>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea name="address" id="address" class="form-control" rows="3" required><?= esc($user['address']) ?></textarea>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">No. Telp</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= esc($user['phone']) ?>" required>
                </div>

                <!-- Role -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                        <option value="visitor" <?= $user['role'] === 'visitor' ? 'selected' : '' ?>>Visitor</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update User</button>
                    <a href="<?= base_url('superadmin/user') ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>
