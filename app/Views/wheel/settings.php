<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<style>
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    padding-left: 300px;
    padding-right: 300px;
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 400px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Manajemen Roda
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Wheel Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Roda</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Pengaturan Roda</h3>
                </div>
                <div class="card-body">
                    <table id="wheelTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SFX Spin</th>
                                <th>SFX Hadiah</th>
                                <th>SFX Jackpot</th>
                                <th>Video Jackpot</th>
                                <th>Background Jackpot</th>
                                <th>Countdown SFX</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($settings as $setting): ?>
                            <tr>
                                <td>
                                    <audio controls>
                                        <source src="<?= base_url('audio/' . esc($setting['spin_sfx'])) ?>"
                                            type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="<?= base_url('audio/' . esc($setting['prize_sfx'])) ?>"
                                            type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="<?= base_url('audio/' . esc($setting['jp_sfx'])) ?>"
                                            type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                </td>
                                <td>
                                    <video controls width="200" height="200">
                                        <source src="<?= base_url('video/' . esc($setting['jackpot_vid'])) ?>"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td>
                                    <?php if ($setting['jackpot_bg'] != null): ?>
                                    <img src="<?= base_url('images/' . esc($setting['jackpot_bg']) ?? '') ?>"
                                        alt="Jackpot BG" style="width: 50px; height: 50px;">
                                </td>
                                <?php endif; ?>
                                <td>
                                    <audio controls>
                                        <source src="<?= base_url('audio/' . esc($setting['cd_sfx'])) ?>"
                                            type="audio/mpeg">
                                        Your browser does not support the audio tag.
                                    </audio>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-edit" data-toggle="modal"
                                        data-target="#settingsModal<?= esc($setting['id']) ?>">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="modal fade" id="settingsModal<?= esc($setting['id']) ?>" tabindex="-1"
                        aria-labelledby="settingsModalLabel<?= esc($setting['id']) ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/admin/update-wheel-settings/<?= esc($setting['id']) ?>" method="post"
                                    enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="settingsModalLabel<?= esc($setting['id']) ?>">Edit
                                            Wheel Settings</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="spinSFX<?= esc($setting['id']) ?>">Spin Sound</label>
                                            <input type="file" id="spinSFX<?= esc($setting['id']) ?>" name="spin_sfx"
                                                class="form-control" accept=".mp3">
                                        </div>
                                        <div class="form-group">
                                            <label for="prizeSFX<?= esc($setting['id']) ?>">Prize Sound</label>
                                            <input type="file" id="prizeSFX<?= esc($setting['id']) ?>" name="prize_sfx"
                                                class="form-control" accept=".mp3">
                                        </div>
                                        <div class="form-group">
                                            <label for="JPSFX<?= esc($setting['id']) ?>">Jackpot Sound</label>
                                            <input type="file" id="JPSFX<?= esc($setting['id']) ?>" name="jp_sfx"
                                                class="form-control" accept=".mp3">
                                        </div>
                                        <div class="form-group">
                                            <label for="jackpotVideo<?= esc($setting['id']) ?>">Jackpot Video</label>
                                            <input type="file" id="jackpotVideo<?= esc($setting['id']) ?>"
                                                name="jackpot_vid" class="form-control" accept=".mp4">
                                        </div>
                                        <div class="form-group">
                                            <label for="jackpot_bg">Background Jackpot</label>
                                            <div>
                                                <img src="<?= base_url('images/' . esc($setting['jackpot_bg']) ?? '') ?>"
                                                    alt="Image" style="width: 100px; height: 100px;">
                                            </div>
                                            <input type="file" class="form-control" name="jackpot_bg" accept="image/*">

                                        </div>
                                        <div class="form-group">
                                            <label for="CDSFX<?= esc($setting['id']) ?>">Countdown Sound</label>
                                            <input type="file" id="CDSFX<?= esc($setting['id']) ?>" name="cd_sfx"
                                                class="form-control" accept=".mp3">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->endSection() ?>

                <?= $this->section('js') ?>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

                <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const settingsForm = document.getElementById('settingsForm');

                    // Fetch current settings when the modal is opened
                    document.getElementById('settingsModal').addEventListener('show.bs.modal', () => {
                        fetch('/wheel-settings')
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('spinSFX').value = data.spin_sfx;
                                document.getElementById('prizeSFX').value = data.prize_sfx;
                                document.getElementById('jackpotVideo').value = data.jackpot_vid;
                            });
                    });

                    // Submit form data to the backend
                    settingsForm.addEventListener('submit', (e) => {
                        e.preventDefault();

                        const formData = new FormData(settingsForm);

                        fetch('/admin/update-wheel-settings', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    alert('Settings updated successfully.');
                                    location.reload(); // Reload to apply changes
                                } else {
                                    alert('Failed to update settings.');
                                }
                            });
                    });
                });
                </script>

                <?= $this->endSection() ?>