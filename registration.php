<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registration</title>

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

  <style>
    /* Gradient background for the registration page */
    body {
        background: linear-gradient(135deg, rgb(219, 217, 217), rgb(219, 217, 217));
        width: 100%;
        min-height: 100vh; /* Changed from height: 100vh; */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: auto; /* Allow scrolling */
    }
    .section.register {
    width: 100%;
    min-height: 100vh; /* Ensure it covers the whole page */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: auto;
}
.row.justify-content-center {
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

    .card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .custom-btn {
        background-color: #681807 !important;
        border-color: #681807 !important;
        color: white !important;
    }

    .custom-btn:hover {
        background-color: #4d1205 !important;
        border-color: #4d1205 !important;
    }
    .container {
        width: 100%;
        max-width: 100%;
        overflow-y: auto;
    }
  </style>
</head>

<?php session_start(); ?>
<body>
  <main>
    <div class="container">
      <section class="section register d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create an account</p>
                  </div>

                  <form class="row g-3 needs-validation" action="./controller/createAccount.php" method="POST" novalidate>
                    <div class="col-12">
                      <label for="firstname" class="form-label">First Name</label>
                      <input type="text" name="firstname" class="form-control" id="firstname" required>
                      <div class="invalid-feedback">Please enter your first name!</div>
                    </div>

                    <div class="col-12">
                      <label for="lastname" class="form-label">Last Name</label>
                      <input type="text" name="lastname" class="form-control" id="lastname" required>
                      <div class="invalid-feedback">Please enter your last name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email Address</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email address!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="cpassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                      <div class="invalid-feedback">Enter confirm password!</div>
                    </div>

                    <div class="col-12">
                      <label for="phoneNumber" class="form-label">Phone Number</label>
                      <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" required>
                      <div class="invalid-feedback">Please enter your phone number!</div>
                    </div>

                    <div class="col-12">
                      <label class="col-12">Gender</label>
                        <div class="col-12">
                            <select name="gender" id="gender" class="form-select" required>
                              <option value="" disabled selected>Select Gender</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                            </select>
                            <div class="invalid-feedback">Please select a gender!</div>
                        </div>
                    </div>

                    <div class="col-12">
                      <label for="inputDate" class="form-label">Birthday</label>
                      <input type="date" name="birthday" class="form-control" required>
                      <div class="invalid-feedback">Please enter your birthda!.</div>
                    </div>

                    <div class="col-12 mt-4 mb-4 text-center">
                      <div class="form-check d-flex justify-content-center">
                        <input class="form-check-input me-2" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <button class="btn w-100 custom-btn" type="submit" name="register">Create Account</button>
                    </div>
                    <div class="col-12 text-center">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
<!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/chart.js/chart.umd.js"></script>
      <script src="assets/vendor/echarts/echarts.min.js"></script>
      <script src="assets/vendor/quill/quill.js"></script>
      <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
      if(isset($_SESSION['status'])&& $_SESSION['status_code']|=''){
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
        icon: "success",
        title: "Signed up successfully"
      });
      </script>
    <?php
    unset($_SESSION['status_code']);
    unset($_SESSION['status']);
        }
        ?>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>

</body>
</body>
</html>
