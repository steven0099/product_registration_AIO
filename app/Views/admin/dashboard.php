<?= $this->extend('partials/main') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('breadcumb') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-check-circle mr-1"></i>
                            Dashboard
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="row" style="margin-top: 10px; margin-left: 5px; margin-right:5px">
                        <div class="col-lg-3 col-6" id="boxAll">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= esc($count_all) ?></h3>
                                    <p>Jumlah Produk Masuk</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" id="boxConfirmed">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= esc($count_confirmed) ?></h3>
                                    <p>Produk Terkonfirmasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" id="boxRejected">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= esc($count_rejected) ?></h3>
                                    <p>Produk Ditolak</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" id="boxApproved">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= esc($count_approved) ?></h3>
                                    <p>Produk Diterima</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="admproducts" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Merek</th>
                                    <th>Tipe Produk</th>
                                    <th>Diajukan Oleh</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($all_products as $products): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= esc($products['brand']) ?></td> <!-- Display Brand Name -->
                                    <td><?= esc($products['product_type']) ?></td> <!-- Display Category Name -->
                                    <td><?= esc($products['submitted_by']) ?></td> <!-- Display Subcategory Name -->
                                    <td style="text-align: center">
                                        <?php if ($products['status'] === 'confirmed'): ?>
                                        <h6 style="background-color: #ffdb23; color: #ffffff; text-align: center; display: inline; border-radius: 5px; font-size: 18px">Menunggu Persetujuan</h6>
                                        <?php elseif ($products['status'] === 'rejected'): ?>
                                            <h6 style="background-color: #ff0404; color: #ffffff; text-align: center; display: inline; border-radius: 5px; font-size: 18px">Ditolak</h6>
                                        <?php elseif ($products['status'] === 'approved'): ?>
                                            <h6 style="background-color: #00ff24; color: #ffffff; text-align: center; display: inline; border-radius: 5px; font-size: 18px">Disetujui</h6>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($products['status'] === 'confirmed'): ?>
                                        <?= esc($products['confirmed_at']) ?>
                                        <?php elseif ($products['status'] === 'rejected'): ?>
                                        <?= esc($products['rejected_at']) ?>
                                        <?php elseif ($products['status'] === 'approved'): ?>
                                        <?= esc($products['approved_at']) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    <button class="button btn btn-success" onclick="location.href='/admin/details/<?= esc($products['id']) ?>'"><i class="fas fa-eye"></i></button>
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
    <!-- /.card -->
</section>
<!-- /.Left col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>
$('#admproducts').DataTable();

$(document).ready(function() {
    // Initialize DataTable
    const table = $('#admproducts').DataTable();

    // Filter function based on status
    function filterTable(status) {
        table.column(4).search(status).draw();
    }

    // Event listeners for each box
    $('#boxAll').on('click', function() {
        table.column(4).search('').draw(); // Show all statuses
    });

    $('#boxConfirmed').on('click', function() {
        filterTable('Menunggu Persetujuan');
    });

    $('#boxRejected').on('click', function() {
        filterTable('Ditolak');
    });

    $('#boxApproved').on('click', function() {
        filterTable('Disetujui');
    });
});
</script>
<?= $this->endSection() ?>