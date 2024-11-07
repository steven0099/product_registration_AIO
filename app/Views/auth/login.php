<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Axoma" />
    <meta name="keywords" content="Axoma" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>User Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="aio1.png" />
    <link
      href="static\plugin\bootstrap\css\bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="static\plugin\font-awesome\css\fontawesome-all.min.css"
      rel="stylesheet"
    />
    <link href="static\plugin\et-line\style.css" rel="stylesheet" />
    <link
      href="static\plugin\themify-icons\themify-icons.css"
      rel="stylesheet"
    />
    <link
      href="static\plugin\owl-carousel\css\owl.carousel.min.css"
      rel="stylesheet"
    />
    <link href="static\plugin\magnific\magnific-popup.css" rel="stylesheet" />
    <link href="static\css\style.css" rel="stylesheet" />
    <link
      href="static\css\color\default.css"
      rel="stylesheet"
      id="color_theme"
    />
  </head>

  <body class="home-banner-03 theme-bg bg-effect-box">
    <!-- Main content -->
    <section id="home" >
      <div class="bg-effect bg-cover"></div>
      <div id="particles_effect" class="particles-effect"></div>
    <div class="container">
      <div class="row align-items-center justify-content-md-center mt-5">
        <div class="col-lg-6  text-center ">
          <img
            class="logo-utdi"
            src="static\img\aio.png"
            width="80%"
            title="logo AIO"
            alt="logo AIO"
          />
        </div>
        <div class="col-lg-6">
          <h2 class="font-alt text-warning mt-4 text-center">Login User <br>Product Registration</h2>
          <h6 class="white-color-light text-center"> </h6>
          <form
            id="loginForm"
            class="md-form form-light"
            role="form"
            name="login"
            action="<?= base_url('/login/auth') ?>" 
            method="post"
            $(if chap-id) onSubmit="return doLogin()" $(endif)
          >
    <?= csrf_field() ?>
        <div>
        <div class="form-group col-md-12">
              <label for="username" class="form-label white-color-light">Username</label>
              <input
                  id="username"
                  type="text"
                  name="username"
                  placeholder="Username"
                  class="form-control"
                  autofocus
                  required
                  style="border-radius: 5px;"/>
            </div>
        </div>
        <div class="form-group col-md-12">
              <label for="password" class="form-label white-color-light">Password</label>
              <input
                  id="password"
                  type="password"
                  name="password"
                  placeholder="Password"
                  class="form-control "
                  required
                  style="border-radius: 5px;"
                />
            </div>
                <!-- /.card-body -->
                <div class="form-group col-md-12 mt-3">
                <button
                  type="submit"
                  class="btn btn-warning w-100 btn-lg"
                  style="color: #293158"
                >
                  Login
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
      </div>
    </div>
    </section>

    <script src="static\js\jquery-3.2.1.min.js"></script>
    <script src="static\js\jquery-migrate-3.0.0.min.js"></script>
    <script src="static\plugin\appear\jquery.appear.js"></script>
    <script src="static\plugin\bootstrap\js\popper.min.js"></script>
    <script src="static\plugin\bootstrap\js\bootstrap.js"></script>
    <script src="static\plugin\particles\particles.min.js"></script>
    <script src="static\plugin\particles\particles-app.js"></script>
    <script src="static\js\jquery.parallax-scroll.js"></script>
    <script src="static\js\custom.js"></script>