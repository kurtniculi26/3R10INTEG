<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bloodinate</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      color: #333;
    }

    header {
      background-color: #e63946;
      color: white;
      padding: 20px 0;
    }

    header .container {
      width: 90%;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    h1 {
      font-size: 24px;
    }

    nav ul {
      list-style-type: none;
      display: flex;
    }

    nav ul li {
      margin-right: 20px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    main {
      width: 90%;
      margin: 20px auto;
    }

    .section {
      background-color: white;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-bottom: 15px;
    }

    .profile-info p {
      margin-bottom: 10px;
    }

    form label {
      display: block;
      margin-bottom: 8px;
    }

    form input {
      padding: 10px;
      width: 100%;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    form button {
      padding: 10px 15px;
      background-color: #e63946;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    form button:hover {
      background-color: #d62828;
    }

    .donation-result {
      margin-top: 10px;
      font-weight: bold;
      color: green;
    }

    footer {
      background-color: #222;
      color: white;
      text-align: center;
      padding: 10px 0;
    }

    footer p {
      font-size: 14px;
    }

    /* Styling for profile image */
    .profile-info img.profile-image {
      width: 100px; /* Adjust size as needed */
      height: 100px;
      border-radius: 50%; /* Makes the image circular */
      object-fit: cover; /* Ensures the image fits inside the circular container */
      margin-bottom: 15px; /* Space between the image and text */
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Blood Donation</h1>
      <nav>
        <ul>
          <li><a href="#profile">Profile</a></li>
          <li><a href="#donate">Donate</a></li>
          <li><a href="#history">Donation History</a></li>
          <li><a href="#contact">Contact</a></li>
          <a class="dropdown-item d-flex align-items-center" href="../../view/admin/controller/logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section id="profile" class="section">
      <h2>Your Profile</h2>
      <div class="profile-info">
        <!-- Profile Image -->
        <img src="assets/img/messages-1.jpg" alt="Profile Image" class="profile-image">
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Email:</strong> john@example.com</p>
        <p><strong>Blood Type:</strong> O+</p>
        <p><strong>Last Donation:</strong> 2024-01-10</p>
      </div>
    </section>

    <section id="donate" class="section">
      <h2>Make a Donation</h2>
      <form id="donateForm">
        <label for="donationAmount">Donation Amount (in liters):</label>
        <input type="number" id="donationAmount" name="donationAmount" required min="0.1" step="0.1">
        <button type="submit">Donate</button>
      </form>
      <div id="donationResult" class="donation-result"></div>
    </section>

    <section id="history" class="section">
      <h2>Donation History</h2>
      <ul>
        <li>2024-01-10: 0.5L donated</li>
        <li>2023-11-15: 0.4L donated</li>
        <li>2023-08-20: 0.6L donated</li>
      </ul>
    </section>

    <section id="contact" class="section">
      <h2>Contact Us</h2>
      <p>If you have any questions, feel free to reach out to us at <a href="mailto:support@blooddonation.com">support@blooddonation.com</a>.</p>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2025 Blood Donation. All rights reserved.</p>
    </div>
  </footer>

  <script>
    document.getElementById("donateForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const donationAmount = document.getElementById("donationAmount").value;
      const donationResult = document.getElementById("donationResult");

      if (donationAmount && donationAmount > 0) {
        donationResult.textContent = `You have donated ${donationAmount}L. Thank you for your generosity!`;
        donationResult.style.color = "green";
      } else {
        donationResult.textContent = "Please enter a valid donation amount.";
        donationResult.style.color = "red";
      }

      document.getElementById("donateForm").reset();
    });
  </script>

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
