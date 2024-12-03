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
                                    <th>Foto</thh>
                                    <th>Nama Segmen</th>
                                    <th>Kesempatan (%)</th>
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
    <img src="<?= base_url('uploads/images/' . esc($segment['image'])) ?>" alt="Image" style="width: 50px; height: 50px;">
</td>
<?php endif; ?>
                                        <td><?= esc($segment['label']) ?></td>
                                        <td><?= esc($segment['odds']) ?>%</td>
                                        <td>
                                            <button class="btn-primary btn btn-edit" data-toggle="modal"
                                                data-target="#editSegmentModal<?= esc($segment['id']) ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button class="btn-danger btn btn-delete" data-id="<?= esc($segment['id']) ?>" data-toggle="modal" data-target="#deleteModal">
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
                                                <form method="post" action="<?= base_url('/admin/wheel/updateSegment/' . esc($segment['id'])) ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="modal-body">
        <div class="form-group">
            <label for="label">Nama Segmen</label>
            <input type="text" class="form-control" name="label" value="<?= esc($segment['label']) ?>" required>
        </div>
        <div class="form-group">
            <label for="odds">Kesempatan (%)</label>
            <input type="number" class="form-control" name="odds" placeholder="Enter Odds Percentage" min="0" max="100" step="0.01" value="<?= esc($segment['odds']) ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar Segmen</label>
            <div>
                <img src="<?= base_url('uploads/images/' . esc($segment['image'])) ?>" alt="Image" style="width: 100px; height: 100px;">
            </div>
            <input type="file" class="form-control" name="image" accept="image/*">

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

<!-- Add Segment Modal -->
<div class="modal fade" id="addSegmentModal" tabindex="-1" role="dialog" aria-labelledby="addSegmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSegmentModalLabel">Tambah Segmen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('/admin/wheel/saveSegment') ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="modal-body">
        <div class="form-group">
            <label for="label">Nama Segmen</label>
            <input type="text" class="form-control" name="label" placeholder="Enter Segment Name" required>
        </div>
        <div class="form-group">
            <label for="odds">Kesempatan (%)</label>
            <input type="number" class="form-control" name="odds" placeholder="Enter Odds Percentage" min="0" max="100" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar Segmen</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<!-- Delete Segment Modal -->
<!-- Delete Segment Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Segmen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus segmen ini?</p>
                <p id="deleteSegmentName"></p> <!-- Display the segment name dynamically -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <form id="deleteForm" method="post" action="<?= base_url('/admin/wheel/deleteSegment') ?>">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="segment_id" id="deleteSegmentId">
                    <button type="submit" class="btn btn-danger">Hapus</button>
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


$(document).ready(function() {
    // When a delete button is clicked
    $('.btn-delete').on('click', function() {
        var segmentId = $(this).data('id'); // Get the segment ID
        var segmentName = $(this).closest('tr').find('td:eq(2)').text(); // Get the segment name from the row

        // Set the ID and the segment name in the modal
        $('#deleteSegmentId').val(segmentId);
        $('#deleteSegmentName').text('Segmen: ' + segmentName); // Optionally display the segment name in the modal
        
        // Manually show the modal
        $('#deleteModal').modal('show');
    });

    $('#wheelTable').DataTable({
        responsive: true
    });
});


</script>

<?= $this->endSection() ?>
