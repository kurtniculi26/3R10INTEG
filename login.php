<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bloodinate</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="50x50" href="assets/img/don.png">
  <link rel="icon" type="image/png" sizes="80x80" href="assets/img/don.png">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      background-color: #eee;
    }

    .gradient-form {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      border-radius: 10px;
    }

    .gradient-custom-2 {
      background: linear-gradient(to right, #681807, #a83232);
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
    }

    .btn-custom {
      background-color: #681807;
      border-color: #681807;
      color: white;
    }
    /* spacing for form fields */
    .form-outline {
      margin-bottom: 20px; /* Space between fields */
    }

    .form-outline input {
      padding: 12px; /* padding inside the input */
      margin-top: 5px; /* Space between label and input */
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .form-outline label {
      margin-bottom: 5px; /* label and input field */
      display: block;
      font-weight: bold;
    }

    /* the container spacing */
    .card-body {
      padding: 40px; 
    }

    .container.py-5 {
      padding-top: 20px;
      padding-bottom: 20px;
    }

    /* Ensure full height alignment */
    .row.d-flex.justify-content-center.align-items-center.h-100 {
      min-height: 90vh;
    }
  </style>
</head>
<?php session_start(); ?>
<body>

  <section class="gradient-form">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img src="assets/img/don.png" style="width: 100px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Blood Donation</h4>
                  </div>
                  <form method="POST" action="./controller/loginProcess.php" class="row g-3 needs-validation" novalidate>
                    <p>Please login to your account</p>
                    <div class="form-outline">
                      <label class="form-label">Email Address</label>
                      <input type="text" name="email" class="form-control" required>
                      <div class="invalid-feedback">Please enter your email address!</div>
                    </div>
                    <div class="form-outline">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-custom w-100" type="submit" name="login">Login</button>
                    </div>
                    <div class="col-12 text-center">
                      <p class="small mb-0">Don't have an account? <a href="registration.php">Create an account</a></p>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2 text-white text-center p-4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php
  if(isset($_SESSION['message']) && $_SESSION['code'] !='') {
      ?>
      <script>
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: "<?php echo $_SESSION['code']; ?>",
          title: "<?php echo $_SESSION['message']; ?>"
        });
      </script>
      <?php
      unset($_SESSION['message']);
      unset($_SESSION['code']);
  }     
?>
</body>
</html>