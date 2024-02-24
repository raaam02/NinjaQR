<?php     
    session_start();
    if (!isset($_SESSION['username'])) {
    header('location:Adminlogin.php'); 
    }
  
  ?>
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
    <header>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
          
          <button
            class="navbar-toggler p-0 border-0"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#navbarsExampleDefault"
            aria-label="Toggle navigation"
          >
          <div class="ms-auto border border-1 p-1 rounded nav-link-hover-effect">
                <i class="fa-solid fa-xl fa-user my-3" style="color: #e3d5ff;"></i>
              </div>
          </button>

          <div class="offcanvas offcanvas-end" id="navbarsExampleDefault">
            <div class="offcanvas-header justify-content-end">
              <button
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              ></button>
            </div>
            <div class="offcanvas-body">
              <!-- navigation links and other content -->
              <div class="navbar-nav justify-content-center m-auto">
                <ul
                  class="navbar-nav d-flex justify-content-center mb-2 mb-lg-0"
                >
                  <li class="nav-item">
                    <a
                      class="nav-link nav-link-txt active mx-2 py-1 m-1"
                      aria-current="page"
                      href="Home.html"
                      >Home</a
                    >
                  </li>
                  <li class="nav-item mx-2">
                    <a
                      class="nav-link nav-link-hover-effect nav-link-txt py-1 m-1"
                      href="Pricing.html"
                      >Profile</a
                    >
                  </li>
                  <li class="nav-item mx-2">
                    <a
                      class="nav-link nav-link-hover-effect nav-link-txt py-1 m-1"
                      href="FAQ.html"
                      >Customer</a
                    >
                  </li>
                  <li class="nav-item mx-2">
                    <a
                      class="nav-link nav-link-hover-effect nav-link-txt py-1 m-1"
                      href="Help.html"
                      >Add</a
                    >
                  </li>
                  <li class="nav-item mx-2">
                    <a
                      class="nav-link nav-link-hover-effect nav-link-txt py-1 m-1"
                      href="About.html"
                      >Mail</a
                    >
                  </li>
                  <li class="nav-item mx-2">
                    <a
                      class="nav-link nav-link-hover-effect nav-link-txt py-1 m-1"
                      href="Contact.html"
                      >Help</a
                    >
                  </li>
                </ul>
              </div>
            </div>
        </div>
        <div class="d-flex m-auto me-3">
              <a class="" href="Home.html">
            <img
              style="height: 42px"
              class="nav-logo ms-3"
              src="images/Ninja NO BG Sharp.png"
              alt="Logo"
            />
          </a>
          <a
            class="nav-link-txt mt-1"
            style="text-decoration: none"
            href="Home.html"
          >
            <p class="d-flex m-0 ms-1">NinjaQR</p>
          </a>
            
          </div>
          <div class="">
                <a
                  name=""
                  id="btn-hover"
                  class="btn nav-link-txt btn-txt py-1 me-1"
                  href="LogOut.php"
                  role="button"
                  >LogOut</a
                >
              </div>
        </div>
      </nav>
    </header>
    <main class="mt-5 mt-5">
    <div
        class="container mt-5 pt-5 d-inline"
    >
    <div
        class="container p-0 border border-1 mt-5"
        style="box-shadow: -1px -1px 7px #c2a3ff"
    >
    <?php 

include("connection.php");


$sql = "select * from user";

$result = mysqli_query( $conn, $sql );

if (mysqli_num_rows($result)>0) {
    echo "<div
    class='table-responsive-sm'
>
    <table
        class='table table-bordered table-striped table-hover table-primary table-border align-middle'
    >
        <thead class='table-light table-primary'>
            <caption>
            </caption>
            <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>NAME</th>
                <th class='text-center'>EMAIL</th>
                <th class='text-center'>USER NAME</th>
                <th class='text-center'>PASSWORD</th>
                <th class='text-center'>ACTION</th>
            </tr>
        </thead>
        <tbody class='table-group-divider'>
    ";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr
    class='table-secondary'
>
    <td scope='row' class='text-center'>{$row['id']}</td>
    <td class='text-center'>{$row['name']}</td>
    <td class='text-center'>{$row['email']}</td>
    <td class='text-center'>{$row['username']}</td>
    <td class='text-center'>{$row['password']}</td>
    <td class='d-flex'>
      <center><a
            name=''
            id=''
            class='btn btn-warning me-2'
            href='UpdateForm.php?id={$row['id']}'
            role='button'
            >EDIT</a
        >
        <a
            name=''
            id=''
            class='btn btn-danger'
            href='Delete.php?id={$row['id']}'
            role='button'
            >DELETE</a
        ></center>
        </td>
</tr>


    ";
  }
  
  
  echo "</tbody>
  <tfoot>
      
  </tfoot>
</table>
</div>
  ";
    
}
else {
    echo " <small style='color: green;'>No Data Found</small>";
}

mysqli_close($conn);
?>
    </div>
    </div>
    </main>
    <!-- Footer -->
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-4 py-5 border-top mx-0">
      <div class="col mb-3">
        <a
          href="Home.html"
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
          Ninja QR ©2023 All Rights Reserved
        </p>
      </div>
      <div class="col col-sm-6 mb-3">
        <h5 class="h4 footer-section-heading">Usefull Links</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="#" class="nav-link foot-link-txt p-0">Home</a>
          </li>
          <li class="nav-item mb-2">
            <a href="Pricing.html" class="nav-link foot-link-txt p-0"
              >Pricing</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="FAQ.html" class="nav-link foot-link-txt p-0">FAQs</a>
          </li>
          <li class="nav-item mb-2">
            <a href="About.html" class="nav-link foot-link-txt p-0">About</a>
          </li>
          <li class="nav-item mb-2">
            <a href="Contact.html" class="nav-link foot-link-txt p-0"
              >Contact Us</a
            >
          </li>
        </ul>
      </div>

      <div class="col col-sm-6 mb-3">
        <h5 class="h4 footer-section-heading">let's Create</h5>
        <ul class="nav flex-column mt-3">
          <li class="nav-item mb-2">
            <a href="Home.html" class="nav-link foot-link-txt p-0"
              >Create QR Code for instagram</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="Home.html" class="nav-link foot-link-txt p-0"
              >Create QR Code for youtube</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="Home.html" class="nav-link foot-link-txt p-0"
              >Create QR Code for facebook</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="Home.html" class="nav-link foot-link-txt p-0"
              >Create QR Code for Whatsapp</a
            >
          </li>
          <li class="nav-item mb-2">
            <a href="Home.html" class="nav-link foot-link-txt p-0"
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