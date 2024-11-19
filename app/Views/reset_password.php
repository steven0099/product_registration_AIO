<?= $this->extend('partials/main') ?>

<?= $this->section('title') ?>
    Ganti Password
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Ganti Password</h3>
        </div>
        <div class="card-body">
            <!-- Form Start -->
            <form action="/reset/reset_password" method="post">
                <?= csrf_field() ?>
                
                <!-- Flash Error Message -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Current Password -->
                <div class="form-group">
                    <label for="current_password">Password Sekarang</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Masukkan Password Sekarang" required>
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Masukkan Password Baru" required>
                </div>

                <!-- Confirm New Password -->
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password Baru" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Ganti Password</button>
                    <a href="<?= base_url('/') ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>
