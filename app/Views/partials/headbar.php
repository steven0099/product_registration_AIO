  <!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="height:60px">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="margin-top: 0px">
            <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li>
   </ul>

   <!-- User Dropdown -->
   <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
         <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 740px; margin-bottom: 10px;">
            <?= session()->get('name') ? esc(session()->get('name')) : 'Guest'; ?>
         </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a href="/reset/reset-password" class="dropdown-item">
               <i class="fas fa-key mr-2"></i> Lupa Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="/logout" class="dropdown-item">
               <i class="fas fa-sign-out-alt mr-2"></i> Log Out
            </a>
         </div>
      </li>
   </ul>
</nav>
