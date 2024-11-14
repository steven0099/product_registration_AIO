<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Kapasitas Management
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kapasitas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Kapasitas</li>
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
                        <h3 class="card-title">Daftar Kapasitas</h3>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addCapacityModal">+
                            Tambah Kapasitas</button>
                    </div>
                    <div class="card-body">
                        <table id="capacityTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>Subkategori</th>
                                    <th>Kapasitas</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kapasitas as $capacity): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= esc($capacity['category_name']) ?></td>
                                    <td><?= esc($capacity['subcategory_name']) ?></td>
                                    <td><?= esc($capacity['capacity_value']) ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-edit" data-toggle="modal"
                                            data-target="#editCapacityModal<?= esc($capacity['id']) ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn btn-danger btn-delete" data-id="<?= esc($capacity['id']) ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Edit Capacity Modal -->
                                <div class="modal fade" id="editCapacityModal<?= esc($capacity['id']) ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="editCapacityModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Kapasitas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post"
                                                action="<?= base_url('/admin/kapasitas/updateKapasitas/' . esc($capacity['id'])) ?>"
                                                enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="modal-body">
                                                <div class="form-group">
                                                <label for="subcategory_id">Subkategori</label>
<select name="subcategory_id" class="form-control">
    <?php if (isset($subcategories) && !empty($subcategories)): ?>
        <?php foreach ($subcategories as $subcategory): ?>
            <option value="<?= esc($subcategory['id']) ?>"
                <?= isset($capacity['subcategory_id']) && $capacity['subcategory_id'] == $subcategory['id'] ? 'selected' : '' ?>>
                <?= esc($subcategory['category_name'] . ' - ' . $subcategory['name']) ?> <!-- Display both category and subcategory names -->
            </option>
        <?php endforeach; ?>
    <?php else: ?>
        <option value="">No SubCategories Available</option>
    <?php endif; ?>
</select>

                                                    <div class="form-group">
                                                        <label for="value">Kapasitas</label>
                                                        <input type="text" class="form-control" name="value"
                                                            value="<?= esc($capacity['capacity_value']) ?>"
                                                            placeholder="Kapasitas" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Capacity Modal -->
<div class="modal fade" id="addCapacityModal" tabindex="-1" role="dialog" aria-labelledby="addCapacityModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kapasitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('/admin/kapasitas/saveKapasitas') ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subcategory_id">Subkategori</label>
                        <select class="form-control" name="subcategory_id" required>
                            <option value="">Pilih Subkategori</option>
                            <?php foreach ($subcategories as $subcategory): ?>
                            <option value="<?= esc($subcategory['id']) ?>"><?= esc($subcategory['category_name'] . ' - ' . $subcategory['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="value">Kapasitas</label>
                        <input type="text" class="form-control" name="value" placeholder="Kapasitas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Capacity Modal -->
<div id="deleteConfirmationModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeDeleteConfirmationModal">&times;</span>
        <h3>Hapus Kapasitas Ini?</h3>
        <div class="button-container">
            <button id="confirmDeleteBtn" class="btn btn-danger">Hapus</button>
            <button id="cancelDeleteBtn" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    // Delete confirmation modal setup
    var deleteConfirmationModal = document.getElementById("deleteConfirmationModal");
    var closeDeleteConfirmationModal = document.getElementById("closeDeleteConfirmationModal");
    var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
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
        window.location.href = "/admin/kapasitas/deleteKapasitas/" + deleteId;
    }

    window.onclick = function(event) {
        if (event.target == deleteConfirmationModal) {
            deleteConfirmationModal.style.display = "none";
        }
    }
    $(document).ready(function() {
        $('#capacityTable').DataTable({
          responsive: true
        });
      });
</script>


<?= $this->endSection() ?>
