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
                            <h3 class="card-title">List of Subcategories</h3>
                            <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addSubcategoryModal">+
                                Create Subcategory
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Subcategory Name</th>
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
                                            <button class="btn-danger btn btn-delete" data-toggle="modal"
                                                    data-subcategory-id="<?= esc($subcategory['id']) ?>"
                                                    data-target="#deleteSubcategoryModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Subcategory Modal -->
                                    <div class="modal fade" id="editSubcategoryModal<?= esc($subcategory['id']) ?>"
                                         tabindex="-1" role="dialog" aria-labelledby="editSubcategoryModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editSubcategoryModalLabel">Edit
                                                        Subcategory</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post"
                                                      action="<?= base_url('/subkategori/updateSubkategori/' . esc($subcategory['id'])) ?>"
                                                      enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Subcategory Name</label>
                                                            <input type="text" class="form-control" name="name"
                                                                   value="<?= esc($subcategory['subcategory_name']) ?>"
                                                                   placeholder="Enter Subcategory Name">
                                                        </div>
                                                        <!-- Ensure the categories dropdown is handled safely -->
                                                        <div class="form-group">
                                                            <label for="category_id">Category</label>
                                                            <select name="category_id" class="form-control">
                                                                <option value="">Select Category</option>
                                                                <?php if (isset($categories) && !empty($categories)): ?>
                                                                    <?php foreach ($categories as $category): ?>
                                                                        <option value="<?= esc($category['id']) ?>">
                                                                            <?= esc($category['name']) ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                <?php else: ?>
                                                                    <option value="">No Categories Available</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
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
                    <h5 class="modal-title" id="addSubcategoryModalLabel">Add Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('/subkategori/saveSubkategori') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= esc($category['id']) ?>"><?= esc($category['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Subcategory Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Subcategory Name"
                                   required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Subcategory Modal -->
    <div class="modal fade" id="deleteSubcategoryModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteSubcategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSubcategoryModalLabel">Delete Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this subcategory?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>

<?= $this->endSection() ?>