<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    Brand
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brand</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/#">Home</a></li>
                        <li class="breadcrumb-item active">Brand</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">List of Brands</h3>
                            <button id="createBrandBtn" class="btn btn-primary ml-auto">+ Create Brand</button>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Brand Code</th>
                                    <th>Brand Name</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($brand as $merk): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= esc($merk['code']) ?></td>
                                        <td><?= esc($merk['name']) ?></td>
                                        <td>
                                            <button class="btn-primary btn btn-edit" data-id="<?= esc($merk['id']) ?>"
                                                    data-code="<?= esc($merk['code']) ?>"
                                                    data-name="<?= esc($merk['name']) ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button class="btn-danger btn btn-delete" data-id="<?= esc($merk['id']) ?>">
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

        <!-- Modal for Adding Brand -->
        <div id="BrandModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeBrandModal">&times;</span>
                <h3>Add Brand</h3>
                <form method="post" action="<?= base_url('/brand/saveBrand') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="code">Brand Code</label>
                        <input type="text" class="form-control" name="code" placeholder="Enter Brand Code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Brand Name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Modal for Editing Brand -->
        <div id="editBrandModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeEditBrandModal">&times;</span>
                <h3>Edit Brand</h3>
                <form id="editBrandForm" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="code">Brand Code</label>
                        <input type="text" class="form-control" name="code" id="editBrandCode"
                               placeholder="Enter Brand Code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="text" class="form-control" name="name" id="editBrandName"
                               placeholder="Enter Brand Name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Modal for Delete Confirmation -->
        <div id="deleteConfirmationModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeDeleteConfirmationModal">&times;</span>
                <h3>Are you sure you want to delete this brand?</h3>
                <p>This action cannot be undone.</p>
                <div class="button-container">
                    <button id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
                    <button id="cancelDeleteBtn" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
    <script>

        $('#example2').DataTable();
        // Modal for Adding Brand
        var brandModal = document.getElementById("BrandModal");
        var createBtn = document.getElementById("createBrandBtn");
        var closeBrandModal = document.getElementById("closeBrandModal");

        createBtn.onclick = function () {
            brandModal.style.display = "block";
        }

        closeBrandModal.onclick = function () {
            brandModal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == brandModal) {
                brandModal.style.display = "none";
            }
        }

        // Modal for Editing Brand
        var editBrandModal = document.getElementById("editBrandModal");
        var closeEditBrandModal = document.getElementById("closeEditBrandModal");

        document.querySelectorAll('.btn-edit').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');
                var code = this.getAttribute('data-code');
                var name = this.getAttribute('data-name');

                // Set the form action dynamically
                document.getElementById('editBrandForm').action = '<?= base_url('/brand/updateBrand') ?>/' + id;
                document.getElementById('editBrandCode').value = code;
                document.getElementById('editBrandName').value = name;

                editBrandModal.style.display = "block";
            });
        });

        closeEditBrandModal.onclick = function () {
            editBrandModal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == editBrandModal) {
                editBrandModal.style.display = "none";
            }
        }

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
            window.location.href = "/brand/deleteBrand/" + deleteId; // Adjust as necessary for your delete action
        }

        window.onclick = function (event) {
            if (event.target == deleteConfirmationModal) {
                deleteConfirmationModal.style.display = "none";
            }
        }
    </script>
<?= $this->endSection() ?>