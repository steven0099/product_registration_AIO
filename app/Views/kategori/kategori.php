<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Category
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
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
                        <h3 class="card-title">List of Categories</h3>
                        <button id="createCategoryBtn" class="btn btn-primary ml-auto">+ Create Category</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kategori as $category): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= esc($category['name']) ?></td>
                                        <td>
                                            <button data-id="<?= esc($category['id']) ?>"
                                                data-value="<?= esc($category['name']) ?>"
                                                class="btn-edit btn btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button data-id="<?= esc($category['id']) ?>" class="btn-delete btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal for Adding Category -->
<div id="catModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Tambah Kategori</h3>
        <form method="post" action="<?= base_url('/admin/kategori/saveKategori') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category_id" class="form-control">
                    <?php foreach ($kategori as $category): ?>
                        <option value="<?= esc($category['id']) ?>"><?= esc($category['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Kategori</label>
                <input type="text" class="form-control" name="name" placeholder="Kategori">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- Modal for Editing Category -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit Category</h3>
        <form id="editForm" method="post" action=""
            enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Category</label>
                <input type="text" id="editValue" class="form-control"
                    name="name" placeholder="Enter Category" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<!-- Modal for Deleting Category -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirm Deletion</h3>
        <p>Are you sure you want to delete this category?</p>
        <form id="deleteForm" method="post" action="">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-secondary"
                id="cancelDeleteBtn">Cancel
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
    $('#example2').DataTable();

    // Modal for Adding Category
    var addModal = document.getElementById("catModal");
    var addBtn = document.getElementById("createCategoryBtn");
    var closeAddModal = document.getElementsByClassName("close")[0];

    addBtn.onclick = function() {
        addModal.style.display = "block";
    }

    closeAddModal.onclick = function() {
        addModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == addModal) {
            addModal.style.display = "none";
        }
    }

    // Modal for Editing Category
    var editModal = document.getElementById("editModal");
    var closeEditModal = document.getElementsByClassName("close")[1];

    document.querySelectorAll('.btn-edit').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-value');

            // Set the form action and input name dynamically
            document.getElementById('editForm').action = '/kategori/updateKategori/' + id;
            document.getElementById('editValue').value = name;

            editModal.style.display = "block";
        });
    });

    closeEditModal.onclick = function() {
        editModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    }

    // Modal for Deleting Category
    // Modal for Deleting Category
    var deleteModal = document.getElementById("deleteModal");
    var closeDeleteModal = document.getElementsByClassName("close")[2];
    var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");

    document.querySelectorAll('.btn-delete').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');

            // Set the form action dynamically
            document.getElementById('deleteForm').action = '/kategori/deleteKategori/' + id;

            deleteModal.style.display = "block";
        });
    });

    closeDeleteModal.onclick = function() {
        deleteModal.style.display = "none";
    }

    cancelDeleteBtn.onclick = function() {
        deleteModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == deleteModal) {
            deleteModal.style.display = "none";
        }
    }
</script>
<?= $this->endSection() ?>