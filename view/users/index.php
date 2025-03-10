<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodinate</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color:rgb(74, 71, 71);
            color: #333;
        }

        /* Header Section */
        header {
            background-color: #D74624;
            padding: 20px;
            color: #fff;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            list-style-type: none;
        }

        .nav-links li {
            display: inline;
            margin-right: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        /* Hero Section */
        .hero {
            background: url('https://via.placeholder.com/1500x800') no-repeat center center/cover;
            color: #fff;
            padding: 80px 20px;
            text-align: center;
        }

        .hero h2 {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .hero .btn {
            background-color: #ff6347;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .hero .btn:hover {
            background-color: #ff4500;
        }

        /* About Section */
        .about {
            padding: 50px 20px;
            background-color: #fff;
            text-align: center;
        }

        .about h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Donate Section */
        .donate {
            padding: 50px 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .donate h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .donate form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .donate label {
            display: block;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .donate input, .donate select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .donate button {
            background-color: #e60000;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .donate button:hover {
            background-color: #ff4500;
        }

        /* Contact Section */
        .contact {
            padding: 50px 20px;
            text-align: center;
            background-color: #fff;
        }

        .contact h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .contact p {
            font-size: 18px;
        }

        /* Footer Section */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <div class="logo">
                <h1>Donate Blood, Save Life</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#donate">Donate</a></li>
                <li><a href="#contact">Contact</a></li>
                <a class="dropdown-item d-flex align-items-center" href="../../view/admin/controller/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </ul>
        </nav>
    </header>

    <!-- About Section -->
    <section id="about" class="about">
        <h2>About Blood Donation</h2>
        <p>Blood donation plays a crucial role in saving lives, especially during emergencies or for patients battling chronic illnesses. By donating blood, you’re making a direct impact on the lives of others—your donation could be the one that helps someone in need.</p>
    </section>

    <!-- Donate Section -->
    <section id="donate" class="donate">
        <h2>Become a Donor</h2>
        <p>Fill in the form below to begin your donation journey.</p>

        <form action="#" method="POST" id="donation-form">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" required>

            <label for="blood-type">Blood Type</label>
            <select id="blood-type" name="blood-type" required>
                <option value="A+">A+</option>
                <option value="B+">B+</option>
                <option value="O+">O+</option>
                <option value="AB+">AB+</option>
                <option value="A-">A-</option>
                <option value="B-">B-</option>
                <option value="O-">O-</option>
                <option value="AB-">AB-</option>
            </select>

            <button type="submit" class="btn">Submit Donation</button>
        </form>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <p>If you have any questions or would like more information, feel free to reach out.</p>
        <p>Email: dayaomahinay@blooddonate.org</p>
        <p>Phone: +1 800 123 4567</p>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Blood Donation Organization. All rights reserved.</p>
    </footer>

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
