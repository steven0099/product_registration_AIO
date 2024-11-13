<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Sub-Kategori
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sub-Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Sub-Kategori</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Subkategori</h3>
                        <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addSubcategoryModal">+
                            Tambah Subkategori
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="subcatTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>Subkategori</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subkategori as $subcategory): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= esc($subcategory['category_name']) ?></td> <!-- Display Category Name -->
                                    <td><?= esc($subcategory['subcategory_name']) ?></td>
                                    <!-- Display Subcategory Name -->
                                    <td>
                                        <button class="btn-primary btn btn-edit" data-toggle="modal"
                                            data-target="#editSubcategoryModal<?= esc($subcategory['id']) ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                            <button class="btn-danger btn btn-delete" data-id="<?= esc($subcategory['id']) ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                    </td>
                                </tr>

<!-- Edit Subcategory Modal -->
<div class="modal fade" id="editSubcategoryModal<?= esc($subcategory['id']) ?>"
    tabindex="-1" role="dialog" aria-labelledby="editSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubcategoryModalLabel">Edit Subkategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"
                action="<?= base_url('/admin/subkategori/updateSubkategori/' . esc($subcategory['id'])) ?>"
                enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                    <div class="form-group">
    <label for="category_id">Kategori</label>
    <select name="category_id" class="form-control">
        <?php if (isset($categories) && !empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <!-- Check if this category is the selected one -->
                <option value="<?= esc($category['id']) ?>"
                    <?= isset($subcategory['category_id']) && $subcategory['category_id'] == $category['id'] ? 'selected' : '' ?>>
                    <?= esc($category['name']) ?>
                </option>
            <?php endforeach; ?>
                        <label for="name">Subkategori</label>
                        <input type="text" class="form-control" name="name" value="<?= esc($subcategory['subcategory_name']) ?>"
                            placeholder="Enter Subcategory Name">
                    </div>
                    <!-- Categories dropdown -->
        <?php else: ?>
            <option value="">Tidak Ada Kategori</option>
        <?php endif; ?>
    </select>
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

<!-- Add Subcategory Modal -->
<div class="modal" id="addSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="addSubcategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubcategoryModalLabel">Tambah Subkategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('/admin/subkategori/saveSubkategori') ?>"
                enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select class="form-control" name="category_id">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?= esc($category['id']) ?>"><?= esc($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Subkategori</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Subcategory Name"
                            required>
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

<!-- Delete Subcategory Modal -->
<div id="deleteConfirmationModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeDeleteConfirmationModal">&times;</span>
                <h3>Hapus Subkategori Ini?</h3>
                <div class="button-container">
                    <button id="confirmDeleteBtn" class="btn btn-danger">Hapus</button>
                    <button id="cancelDeleteBtn" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
// Modal for Delete Confirmation
        var deleteConfirmationModal = document.getElementById("deleteConfirmationModal");
        var closeDeleteConfirmationModal = document.getElementById("closeDeleteConfirmationModal");
        var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
        var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
        var deleteId = null;

        document.querySelectorAll('.btn-delete').forEach(function (button) {
            button.addEventListener('click', function () {
                deleteId = this.getAttribute('data-id');
                deleteConfirmationModal.style.display = "block";
            });
        });

        closeDeleteConfirmationModal.onclick = function () {
            deleteConfirmationModal.style.display = "none";
        }

        cancelDeleteBtn.onclick = function () {
            deleteConfirmationModal.style.display = "none";
        }

        confirmDeleteBtn.onclick = function () {
            window.location.href = "subkategori/deleteSubkategori/" + deleteId; // Adjust as necessary for your delete action
        }

        window.onclick = function (event) {
            if (event.target == deleteConfirmationModal) {
                deleteConfirmationModal.style.display = "none";
            }
        }

        $(document).ready(function() {
        $('#subcatTable').DataTable({
          responsive: true
        });
      });
    </script>
<?= $this->endSection() ?>