<?= $this->extend('partials/main') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('title') ?>
Produk Ditolak
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Produk Ditolak</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Produk Ditolak</li>
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
                        <h3 class="card-title">Daftar Produk Ditolak</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Merek</th>
                                    <th>Tipe Produk</th>
                                    <th>Pengaju</th>
                                    <th>Tanggal</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($rejected_products as $products): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= esc($products['brand']) ?></td> <!-- Display Brand Name -->
                                    <td><?= esc($products['product_type']) ?></td> <!-- Display Category Name -->
                                    <td><?= esc($products['submitted_by']) ?></td> <!-- Display Subcategory Name -->
                                    <td><?= esc($products['confirmed_at']) ?></td>
                                    <td>
                                    <button class="button btn btn-success" onclick="location.href='/superadmin/details/<?= esc($products['id']) ?>'"><i class="fas fa-eye"></i></button>
                                    </button>
                                        </button>
                                        <button data-id="<?= esc($products['id']) ?>" class="btn-delete btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
</section>
</div>
</div>
</div>
</div>
</div>

]
<!-- Modal for Deleting Category -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirm Deletion</h3>
        <p>Hapus Produk Ini?</p>
        <form id="deleteForm" method="post" action="">
        <?= csrf_field();?>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-secondary" id="cancelDeleteBtn">Cancel
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
$('#example2').DataTable();

// Modal for Deleting Category
var deleteModal = document.getElementById("deleteModal");
var closeDeleteModal = document.getElementsByClassName("close")[2];
var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");

document.querySelectorAll('.btn-delete').forEach(function(button) {
    button.addEventListener('click', function() {
        var id = this.getAttribute('data-id');

        // Set the form action dynamically
        document.getElementById('deleteForm').action = '/product/deleteProduct/' + id;

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