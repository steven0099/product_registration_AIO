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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Pengaturan Roda</h3>
                        <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addSegmentModal">+
                            Tambah Segmen
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="wheelTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Foto (Modal)</th>
                                    <th>Nama Segmen</th>
                                    <th>Kesempatan (%)</th>
                                    <th>Stok Hadiah</th>
                                    <th>Jackpot?</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($segments as $segment): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td>
                                        <?php if ($segment['image'] != null): ?>
                                        <img src="<?= base_url('uploads/images/' . esc($segment['image'])) ?>"
                                            alt="Image" style="width: 50px; height: 50px;">
                                    </td>
                                    <?php endif; ?>
                                    <td>
                                        <?php if ($segment['modal_img'] != null): ?>
                                        <img src="<?= base_url('uploads/images/' . esc($segment['modal_img'])) ?>"
                                            alt="Modal Image" style="width: 50px; height: 50px;">
                                    </td>
                                    <?php endif; ?>
                                    <td><?= esc($segment['label']) ?></td>
                                    <td><?= esc($segment['odds']) ?>%</td>
                                    <td><?= esc($segment['stock']) ?></td>
                                    <td><?= esc($segment['jackpot']) ?></td>
                                    <td>
                                        <button class="btn-primary btn btn-edit" data-toggle="modal"
                                            data-target="#editSegmentModal<?= esc($segment['id']) ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn-danger btn btn-delete" data-id="<?= esc($segment['id']) ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Segment Modal -->
                                <div class="modal fade" id="editSegmentModal<?= esc($segment['id']) ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editSegmentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editSegmentModalLabel">Edit Segmen</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post"
                                                action="<?= base_url('/admin/wheel/updateSegment/' . esc($segment['id'])) ?>"
                                                enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="label">Nama Segmen</label>
                                                        <input type="text" class="form-control" name="label"
                                                            value="<?= esc($segment['label']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="odds">Kesempatan (%)</label>
                                                        <input type="number" class="form-control" name="odds"
                                                            placeholder="Enter Odds Percentage" min="0" max="100"
                                                            step="0.01" value="<?= esc($segment['odds']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="stock">Stok Hadiah</label>
                                                        <input type="number" class="form-control" name="stock"
                                                            placeholder="Enter Stock" min="0"
                                                            step="1" value="<?= esc($segment['stock']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                    <label for="jackpot">Jackpot?</label>
                    <select name="jackpot" id="jackpot" class="form-control" value="<?= esc($segment['jackpot']) ?>" required>
                    <option value="no" <?= $segment['jackpot'] === 'no' ? 'selected' : '' ?>>No</option>
                        <option value="yes" <?= $segment['jackpot'] === 'yes' ? 'selected' : '' ?>>Yes</option>
                    </select>
                </div>
                                                    <div class="form-group">
                                                        <label for="image">Gambar Segmen</label>
                                                        <div>
                                                            <img src="<?= base_url('uploads/images/' . esc($segment['image'])) ?>"
                                                                alt="Image" style="width: 100px; height: 100px;">
                                                        </div>
                                                        <input type="file" class="form-control" name="image"
                                                            accept="image/*">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="modal_img">Gambar Modal</label>
                                                        <div>
                                                            <img src="<?= base_url('uploads/images/' . esc($segment['modal_img'])) ?>"
                                                                alt="Image" style="width: 100px; height: 100px;">
                                                        </div>
                                                        <input type="file" class="form-control" name="modal_img"
                                                            accept="image/*">

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <!-- Add Segment Modal -->
                    <div class="modal fade" id="addSegmentModal" tabindex="-1" role="dialog"
                        aria-labelledby="addSegmentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addSegmentModalLabel">Tambah Segmen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="<?= base_url('/admin/wheel/saveSegment') ?>"
                                    enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="label">Nama Segmen</label>
                                            <input type="text" class="form-control" name="label"
                                                placeholder="Enter Segment Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="odds">Kesempatan (%)</label>
                                            <input type="number" class="form-control" name="odds"
                                                placeholder="Enter Odds Percentage" min="0" max="100" step="0.01"
                                                required>
                                        </div>
                                        <div class="form-group">
                                                        <label for="stock">Stok Hadiah</label>
                                                        <input type="number" class="form-control" name="stock"
                                                            placeholder="Enter Stock" min="0"
                                                            step="1" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="jackpot">Jackpot?</label>
                    <select name="jackpot" id="jackpot" class="form-control" required>
                    <option value="no" <?= $segment['jackpot'] === 'no' ? 'selected' : '' ?>>No</option>
                    <option value="yes" <?= $segment['jackpot'] === 'yes' ? 'selected' : '' ?>>Yes</option>
                    </select>
                </div>
                                        <div class="form-group">
                                            <label for="image">Gambar Segmen</label>
                                            <input type="file" class="form-control" name="image" accept="image/*"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="modal_img">Gambar Modal</label>
                                            <input type="file" class="form-control" name="modal_img" accept="image/*"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div id="deleteConfirmationModal" class="modal">
                        <div class="modal-content">
                            <span class="close" id="closeDeleteConfirmationModal">&times;</span>
                            <h3>Hapus Bagian Ini?</h3>
                            <div class="button-container">
                                <button id="confirmDeleteBtn" class="btn btn-danger">Hapus</button>
                                <button id="cancelDeleteBtn" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Modal for Delete Confirmation
var deleteConfirmationModal = document.getElementById("deleteConfirmationModal");
var closeDeleteConfirmationModal = document.getElementById("closeDeleteConfirmationModal");
var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
var deleteId = null;

document.querySelectorAll('.btn-delete').forEach(function(button) {
    button.addEventListener('click', function() {
        deleteId = this.getAttribute('data-id');
        deleteConfirmationModal.style.display = "block";
    });
});

closeDeleteConfirmationModal.onclick = function() {
    deleteConfirmationModal.style.display = "none";
}

cancelDeleteBtn.onclick = function() {
    deleteConfirmationModal.style.display = "none";
}

confirmDeleteBtn.onclick = function() {
    window.location.href = "wheel/deleteSegment/" +
        deleteId; // Adjust as necessary for your delete action
}

window.onclick = function(event) {
    if (event.target == deleteConfirmationModal) {
        deleteConfirmationModal.style.display = "none";
    }
}

$(document).ready(function() {
    $('#wheelTable').DataTable({
        responsive: true
    });
});
</script>

<?= $this->endSection() ?>