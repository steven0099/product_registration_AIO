<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/headbar')?>
<?= $this->include('partials/sidebar')?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelola Tipe Refrigrant</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Custom Styles for Modal -->
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
      background-color: rgba(0,0,0,0.4);
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

    .close:hover, .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <!-- Main content -->
    <section class="content" style="margin-left: 290px; padding: 20px; margin-top: 80px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Daftar Tipe Refrigrant</h3>
                <button id="createRefrigrantBtn" class="btn btn-primary ml-auto">+ Tambah Tipe Refrigrant</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="refTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Refrigrant</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($refrigrant as $refrigrants): ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($refrigrants['type']) ?></td>
                        <td>
                          <button data-id="<?= esc($refrigrants['id']) ?>" data-type="<?= esc($refrigrants['type']) ?>" class="btn-edit btn btn-primary">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button data-id="<?= esc($refrigrants['id']) ?>" class="btn-delete btn btn-danger">
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

    <!-- Modal for Adding Refrigrant -->
    <div id="RefrigrantModal" class="modal">
      <div class="modal-content">
        <span class="close" id="closeRefrigrantModal">&times;</span>
        <h3>Tambah Tipe Refrigrant</h3>
        <form method="post" action="<?= base_url('/admin/refrigrant/saveRefrigrant') ?>" enctype="multipart/form-data">
          <?= csrf_field() ?>    
          <div class="form-group">
            <label for="type">Refrigrant</label>
            <input type="text" class="form-control" name="type" placeholder="Tipe Refrigrant" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

    <!-- Modal for Editing Refrigrant -->
    <div id="editRefrigrantModal" class="modal">
      <div class="modal-content">
        <span class="close" id="closeEditRefrigrantModal">&times;</span>
        <h3>Edit Tipe Refrigrant</h3>
        <form id="editRefrigrantForm" method="post" action="" enctype="multipart/form-data">
          <?= csrf_field() ?> 
          <div class="form-group">
            <label for="editRefrigrant">Tipe Refrigrant</label>
            <input type="text" class="form-control" name="type" id="editRefrigrant" placeholder="Tipe Refrigrant" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

    <!-- Modal for Delete Confirmation -->
    <div id="deleteConfirmationModal" class="modal">
      <div class="modal-content">
        <span class="close" id="closeDeleteConfirmationModal">&times;</span>
        <h3>Konfirmasi</h3>
        <p>Hapus Tipe Refrigrant Ini?</p>
        <div class="button-container">
          <button id="confirmDeleteBtn" class="btn btn-danger">Hapus</button>
          <button id="cancelDeleteBtn" class="btn btn-secondary">Batal</button>
        </div>
      </div>
    </div>

    <script>
      // Modal for Adding Refrigrant
      var refrigrantModal = document.getElementById("RefrigrantModal");
      var createBtn = document.getElementById("createRefrigrantBtn");
      var closeRefrigrantModal = document.getElementById("closeRefrigrantModal");

      createBtn.onclick = function() {
        refrigrantModal.style.display = "block";
      }

      closeRefrigrantModal.onclick = function() {
        refrigrantModal.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == refrigrantModal) {
          refrigrantModal.style.display = "none";
        }
      }

      // Modal for Editing Refrigrant
      var editRefrigrantModal = document.getElementById("editRefrigrantModal");
      var closeEditRefrigrantModal = document.getElementById("closeEditRefrigrantModal");

      document.querySelectorAll('.btn-edit').forEach(function(button) {
        button.addEventListener('click', function() {
          var id = this.getAttribute('data-id');
          var type = this.getAttribute('data-type'); // Corrected to 'data-type'

          // Set the form action dynamically
          document.getElementById('editRefrigrantForm').action = '<?= base_url('/admin/refrigrant/updateRefrigrant') ?>/' + id;
          document.getElementById('editRefrigrant').value = type; // Changed to correct id

          editRefrigrantModal.style.display = "block";
        });
      });

      closeEditRefrigrantModal.onclick = function() {
        editRefrigrantModal.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == editRefrigrantModal) {
          editRefrigrantModal.style.display = "none";
        }
      }

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
        // Redirect to delete function
        window.location.href = '<?= base_url('/admin/refrigrant/deleteRefrigrant') ?>/' + deleteId;
      }

      // DataTables Initialization
      $(document).ready(function() {
        $('#refTable').DataTable({
          responsive: true
        });
      });
    </script>
</body>
</html>
