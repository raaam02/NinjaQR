<?php 
session_start();

if (!isset($_SESSION["authenticated"])) {
  header("location: AdminLogin.php");
}


include("../php/conn.php");

$id = $_GET["id"];

$sql = "SELECT * FROM `products` WHERE `products`.`id` = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
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
    <header>
      <!-- place navbar here -->
      <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid px-4">
          <div class="admin d-flex justify-content-center">
            <a class="navbar-brand p- 0 m-0 text-white" href="#"
              >
              <img
                src="../images/AdminDP.png"
                class="img-fluid rounded-5"
                alt=""
              />
          </a>
          </div>
          <button
            class="navbar-toggler shadow-none border-0"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar"
          >
            <i class="fa-solid fa-bars" style="color: #e3e3e3"></i>
          </button>
          <div
            class="sidebar offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel"
          >
            <div class="offcanvas-header border-bottom">
              <h5
                class="offcanvas-title mx-auto text-white"
                id="offcanvasNavbarLabel"
              >
                Vivana Developers
              </h5>
              <button
                type="button"
                class="btn-close btn-close-white text-reset shadow-none border-0 text-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              ></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    aria-current="page"
                    href="Dashboard.php"
                    >Dashboard</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link activeted" href="Product.php">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ContactManage.php">Contacts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Help.html">Help</a>
                </li>
              </ul>
              <div class="d-flex align-items-center justify-content-center">
                <a
                  name=""
                  id=""
                  class="btn logout-btn rounded-5 text-white px-4 d-flex align-items-center justify-content-center"
                  href="logout.php"
                  role="button"
                  ><i
                    class="fa-solid fa-right-from-bracket"
                    style="color: #ffffff"
                  ></i>
                  &nbsp;Logout</a
                >
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
      <main>
  <!-- Section -->
        <section class="py-5" style="background-color: #2d2d2d68">
        
          <div
            class="shadow container p-5 mt-5 rounded-5"
            style="max-width: 1000px; background-color: #d0efffc7"
          >
            <h3 class="text-center mb-5">Edit Project Detail</h3>
            
            <div
                class="row justify-content-center align-items-center g-2"
            >
                <div class="col-md-6 col-sm-12">

            <?php 
            echo "<div class='col-md-9 g-3'>

            <div class='card mb-4 box-shadow'>
              <img style='height: 200px;
              object-fit: cover;' 
              class='card-img-top' src='projects/{$row['image']}'>

              <div class='card-body'>
                <h3>{$row['name']}</h3>
                <p class='card-text'>{$row['location']}</p>
              </div>
            </div>
          </div>
          ";
            ?>


                </div>
                
                
                <div class="col">


            <!-- form -->
            <form action="editProductUpdate.php" method="post">
              <div class="mb-3">
                <input
                  type="text"
                  class="form-control shadow-none"
                  name="id"
                  id=""
                  aria-describedby="helpId"
                  required
                  value="<?php echo $row['id'];?>"
                  hidden
                />
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Edit Name</label>
                <input
                  type="text"
                  class="form-control shadow-none"
                  name="name"
                  id=""
                  aria-describedby="helpId"
                  required
                  value="<?php echo $row['name'];?>"
                />
              </div>
              <div class="mb-3">
              <label for="" class="form-label">Edit Desription</label>
              <textarea
                class="form-control shadow-none"
                name="desc"
                id=""
                rows="3"
                required
              ><?php echo $row['location'];?></textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Choose file</label>
              <input
                type="file"
                class="form-control shadow-none"
                name="image"
                id=""
                placeholder=""
                aria-describedby="fileHelpId"
              />
            </div>
              <button type="Update" class="btn rounded-5 w-100 text-white mt-3">
                Update
              </button>
            </form>

            </div>
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

