<?php

session_start();
if (!isset($_SESSION["authenticated"])) {
  header("location: AdminLogin.php");
}


$showError = false;
$emailExist = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("../php/conn.php");

    $aname = $_POST["aname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    
    $existQuery = "SELECT * FROM `admin` WHERE `admin` = '$aname' OR `email` = '$email'";
    $result = mysqli_query($conn, $existQuery);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['admin'] == $aname) {
                $showError = true; 
            }
            if ($row['email'] == $email) {
                $emailExist = true;
            }
        }
    } else {
        $sql = "INSERT INTO `admin`(`admin`, `email`, `password`) VALUES ('$aname','$email','$hashedPass')";

        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION["registred"] = true;
            header("location: AdminLogin.php");
        } else {
            echo "Server Not Responding";
        }

        mysqli_close($conn);
    }
}
?>


  <!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Vivana Developers</title>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
      />

      <!-- Bootstrap CSS v5.2.1 -->
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
      />
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
      />
      <!-- Favicon -->
      <link
        rel="icon"
        type="image/x-icon"
        href="images/Vindhya Developers bg.png"
      />
      <!-- Style.css -->
      <link rel="stylesheet" href="../style.css" />
    </head>

    <body class="login-body">
      <main>
        <!-- Alert -->
  <?php
    if ($showError == true) {
      echo '
      <div class="alert alert-danger alert-dismissible fade show mb-0 rounded-0" role="alert">
      <strong>' . htmlspecialchars("Admin Name Already Exists!") . '</strong> Try with different User Name.
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';  
    }
    if ($emailExist == true) {  
    echo '
    <div class="alert alert-danger alert-dismissible fade show mb-0 rounded-0" role="alert">
    <strong>' . htmlspecialchars("Email Already Exits!") . '</strong> Try with different Email Id.
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  ?>
  <!-- Section -->
        <section class="py-5" style="background-color: #2d2d2d68">
        
          <div
            class="shadow container p-5 mt-5 rounded-5"
            style="max-width: 500px; background-color: #d0efffc7"
          >
            <h3 class="text-center mb-5">Welcome to Vivana Developer</h3>
            <!-- form -->
            <form action="" method="post">
              <div class="mb-3">
                <label for="" class="form-label">Admin Name</label>
                <input
                  type="text"
                  class="form-control shadow-none"
                  name="aname"
                  id=""
                  aria-describedby="helpId"
                  placeholder="Vivana Developer"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control shadow-none"
                  name="email"
                  id=""
                  aria-describedby="helpId"
                  placeholder="vivanadev@gmail.com"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control shadow-none"
                  name="pass"
                  id=""
                  placeholder="make strong password"
                  required
                />
              </div>
              <button type="submit" class="btn rounded-5 w-100 text-white mt-3">
                Register
              </button>
            </form>
            <div
              class="mb-5 mt-3 ms-2 d-flex align-items-center justify-content-center"
            >
              <p class="fs-6 mb-0 fw-medium">Member in Vivana?</p>
              <a class="text-primary fw-medium ms-2" href="Login.php"  
                >Login here</a
              >
            </div>
          </div>
        </section>
      </main>
      <footer>
        <!-- place footer here -->
      </footer>
      <!-- Bootstrap JavaScript Libraries -->
      <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
      ></script>

      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
      ></script>
    </body>
  </html>
