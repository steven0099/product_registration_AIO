<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/headbar') ?>
<?= $this->include('partials/sidebar') ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelola Merek</title>

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
    #deleteConfirmationModal .btn {
  width: 80px; /* Adjust this to your preferred size, like 150px */
  padding: 10px 20px; /* Adjust padding for better size control */
  font-size: 14px; /* You can control the font size here */
  margin: 5px; /* Adds space between the buttons */
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
              <h3 class="card-title">List of Brands</h3>
              <button id="createBrandBtn" class="btn btn-primary ml-auto">+ Tambah Merek</button>
            </div>
            <div class="card-body">
              <table id="brandTable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Merek</th>
                    <th>Merek</th>
                    <th>Opsi</th>
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
                      <button class="btn-primary btn btn-edit" data-id="<?= esc($merk['id']) ?>" data-code="<?= esc($merk['code']) ?>" data-name="<?= esc($merk['name']) ?>">
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
        <h3>Tambah Merek</h3>
        <form method="post" action="<?= base_url('/brand/saveBrand') ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="code">Kode Merek</label>
            <input type="text" class="form-control" name="code" placeholder="Kode Merek" required>
          </div>
          <div class="form-group">
            <label for="name">Merek</label>
            <input type="text" class="form-control" name="name" placeholder="Merek" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

    <!-- Modal for Editing Brand -->
    <div id="editBrandModal" class="modal">
      <div class="modal-content">
        <span class="close" id="closeEditBrandModal">&times;</span>
        <h3>Edit Merek</h3>
        <form id="editBrandForm" method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="code">Kode Merek</label>
            <input type="text" class="form-control" name="code" id="editBrandCode" placeholder="Kode Merek" required>
          </div>
          <div class="form-group">
            <label for="name">Merek</label>
            <input type="text" class="form-control" name="name" id="editBrandName" placeholder="Merek" required>
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
    <p>Hapus Merek Ini?</p>
    <div class="button-container">
      <button id="confirmDeleteBtn" class="btn btn-danger">Hapus</button>
      <button id="cancelDeleteBtn" class="btn btn-secondary">Batal</button>
    </div>
  </div>
</div>


    <script>
      // Modal for Adding Brand
      var brandModal = document.getElementById("BrandModal");
      var createBtn = document.getElementById("createBrandBtn");
      var closeBrandModal = document.getElementById("closeBrandModal");

      createBtn.onclick = function() {
        brandModal.style.display = "block";
      }

      closeBrandModal.onclick = function() {
        brandModal.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == brandModal) {
          brandModal.style.display = "none";
        }
      }

      // Modal for Editing Brand
      var editBrandModal = document.getElementById("editBrandModal");
      var closeEditBrandModal = document.getElementById("closeEditBrandModal");

      document.querySelectorAll('.btn-edit').forEach(function(button) {
        button.addEventListener('click', function() {
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

      closeEditBrandModal.onclick = function() {
        editBrandModal.style.display = "none";
      }

      window.onclick = function(event) {
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
        window.location.href = "/brand/deleteBrand/" + deleteId; // Adjust as necessary for your delete action
      }

      window.onclick = function(event) {
        if (event.target == deleteConfirmationModal) {
          deleteConfirmationModal.style.display = "none";
        }
      }
    </script>
    <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<script>
  $(document).ready(function() {
    $('#brandTable').DataTable({
      "paging": true, // Enable pagination
      "pageLength": 10, // Show 10 records per page by default
      "lengthMenu": [5, 10, 25, 50, 100], // Options for number of rows
      "searching": true, // Enable search functionality
      "ordering": true, // Enable ordering
      "info": true, // Show info about the table
      "autoWidth": false, // Disable automatic width adjustment
      "responsive": true, // Make table responsive
      "columnDefs": [
        { "orderable": false, "targets": 3 } // Disable sorting on the 'Options' column
      ]
    });
  });
</script>

  </section>
</body>
</html>
