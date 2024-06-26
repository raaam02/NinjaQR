<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ninja Stylish QR</title>
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
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/Ninja round.png" />
    <!-- Style.css -->
    <link rel="stylesheet" href="Style.css" />
  </head>

  <body>
    <header></header>
    <main>
      <div class="d-flex justify-content-center" style="height: 750px">
        <div
          class="div-box-shadow container mx-auto m-5 p-5 rounded bg-white"
          style="max-width: 500px"
        >
          <div class="container">
            <a
              href="index.html"
              class="d-flex mb-3 link-body-emphasis text-decoration-none"
            >
              <img
                style="height: 70px"
                class="nav-logo mx-auto"
                src="images/Ninja NO BG Sharp.png"
                alt="Logo"
              />
            </a>
            <h3 class="text-center mb-5">Login to Ninja QR</h3>
          </div>
          
<?php 

include("connection.php");

$uname = $_POST["uname"];
$pass = $_POST["pass"];

$sql = "select * from user where username = '$uname' and password= '$pass'";

$result = mysqli_query( $conn, $sql );

if (mysqli_num_rows($result)>0) {
    header("location:index.html");
}
else {
    echo " <small style='color:red;'> Invalid credential please try again</small>";
}

mysqli_close($conn);
?>
          <form action="" method="post">
            <label for="" class="form-label mb-1 ms-1"> User Name</label>
            <div class="div-box-shadow form-floating mb-3">
              <input
                type="text"
                class="form-control shadow-none"
                name="uname"
                id="formId1"
                placeholder=""
                required
              />
              <label for="formId1" class="floating-label-color"
                >Enter User Name</label
              >
            </div>
            <label for="" class="form-label mb-1 ms-1"> Password</label>
            <div class="div-box-shadow form-floating mb-3">
              <input
                type="password"
                class="form-control shadow-none"
                name="pass"
                id="formId1"
                placeholder=""
                required
              />
              <label for="formId1" class="floating-label-color"
                >Enter Your Password</label
              >
            </div>
            <div class="mt-5">
              <button
                type="submit"
                class="btn btn-primary w-100"
                style="border-color: #d6c2ff"
              >
                Log in
              </button>
            </div>
            <div class="mt-3">
              <label for="">Don't have account?</label>
              <a href="Registration.html" style="color: #8c52ff"
                >Create Account</a
              >
            </div>
            <small
              ><a href="Adminlogin.php" style="color: #8c52ff"
                >Login as Admin</a
              ></small
            >
          </form>
        </div>
      </div>
    </main>
    <!-- Footer -->
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-4 pt-5 border-top mx-0">
      <div class="col mb-3">
        <a
          href="index.html"
          class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none mt-4 ms-1"
        >
          <img
            style="height: 150px"
            class="nav-logo"
            src="images/Ninja NO BG Sharp.png"
            alt="Logo"
          />
        </a>
        <p class="ms-1 h6 nav-link foot-link-txt">
          Ninja Stylish QR ©2023 All Rights Reserved
        </p>
      </div>
      <div class="col col-sm-6 mb-3">
        <h5 class="h4 footer-section-heading">Usefull Links</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="#" class="nav-link foot-link-txt p-0">Home</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link foot-link-txt p-0">Features</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link foot-link-txt p-0">Pricing</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link foot-link-txt p-0">FAQs</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link foot-link-txt p-0">About</a>
          </li>
        </ul>
      </div>

      <div class="col col-sm-6 mb-3">
        <h5 class="h4 footer-section-heading">let's Create</h5>
        <ul class="nav flex-column mt-3">
          <li class="nav-item mb-2">
            <a href="index.html" class="nav-link foot-link-txt p-0"
              >Craete QR Code for instagram</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="index.html" class="nav-link foot-link-txt p-0"
              >Craete QR Code for youtube</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="index.html" class="nav-link foot-link-txt p-0"
              >Craete QR Code for facebook</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="index.html" class="nav-link foot-link-txt p-0"
              >Craete QR Code for Whatsapp</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="index.html" class="nav-link foot-link-txt p-0"
              >Create QR Code for any links</a
            >
          </li>
        </ul>
      </div>

      <div class="col mb-3">
        <h5 class="h4 footer-section-heading">Get in touch</h5>
        <div class="mb-3 mt-3">
          <i class="fa-solid fa-location-dot fa-lg" style="color: #e3d5ff"></i>
          <p class="h6 nav-link foot-link-txt" style="display: inline">
            &nbsp;103 Market9 Township<br />
            Station Road, Borivali(W)<br />
            Mumbai 4000 0002.
          </p>
        </div>
        <div class="mb-4 mt-3">
          <i class="fa-solid fa-envelope fa-lg" style="color: #e3d5ff"></i>
          <p class="h6 nav-link foot-link-txt" style="display: inline">
            <a
              class="nav-link"
              href="mailto:prajapatiram983@gmail.com"
              style="display: inline"
            >
              &nbsp;prajapatiram983@gmail.com</a
            >
          </p>
        </div>
        <div class="mt-3">
          <a class="nav-link" href="Home.html" style="display: inline">
            <i
              class="fa-brands fa-instagram fa-xl me-3"
              style="color: #e3d5ff"
            ></i>
            <i
              class="fa-brands fa-twitter fa-xl me-3"
              style="color: #e3d5ff"
            ></i>
            <i
              class="fa-brands fa-facebook fa-xl me-3"
              style="color: #e3d5ff"
            ></i>
            <i
              class="fa-brands fa-linkedin fa-xl me-3"
              style="color: #e3d5ff"
            ></i>
            <i
              class="fa-brands fa-pinterest fa-xl me-3"
              style="color: #e3d5ff"
            ></i>
          </a>
        </div>
      </div>
    </footer>
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
