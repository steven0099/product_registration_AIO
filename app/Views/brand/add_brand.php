<!DOCTYPE html>
<html lang="en">
<?= $this->include('partials/sidebar')?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Brand</title>

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
</head>
<body>
    <!-- Main content -->
    <section class="content" style="margin-left: 290px; padding: 20px; margin-top: 80px;">    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
<!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Brand</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= base_url('/brand/saveBrand') ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="code">Brand Code</label>
                    <input type="text" class="form-control" name="code" placeholder="Enter Brand Code">
                  </div>
                  <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Brand Name">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->