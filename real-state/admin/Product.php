<?php 
session_start();
if (!isset($_SESSION["authenticated"])) {
  header("location: AdminLogin.php");
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

  <body>
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
          <div>
            <?php 
            
            ?>
          <a class="text-decoration-none text-white ms-2 h5" href="#"><?php echo $_SESSION['admin']; ?></a>
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
    <div class="d-flex align-items-center justify-content-end m-3 mt-5 pt-5 ">
                <a
                  name=""
                  id=""
                  class="btn add-btn rounded-3 p-2 text-white px-4 d-flex align-items-center justify-content-center"
                  href="AddProduct.php"
                  role="button"
                  ><i class="fa-solid fa-circle-plus fa-xl" style="color: #ffffff;"></i>
                  &nbsp;Add Product</a
                >
              </div>
      <!-- Products -->

      <div class="d-flex justify-content-center flex-column">
        <div class="container d-flex justify-content-center w-100">       
          <?php
              $alerts = [
                  'product_removed' => ['Deleted', 'Product Removed Successfully.', 'alert-success'],
                  'product_not_removed' => ["Can't Delete now", 'Try Again Later.', 'alert-danger'],
                  'product_edited' => ["Edited", 'Product Edited Successfully.', 'alert-success'],
                  'product_not_edited' => ["Can't Update now", 'Try Again Later.', 'alert-danger'],
                  'product_added' => ['<i class="fa-regular fa-circle-check" style="color: #00661f;"></i>', '1 New Product Added Successfully.', 'alert-success'],
                  'product_not_added' => ["Failed", 'Failed to Add New Product.', 'alert-danger'], 
              ];

              foreach ($alerts as $sessionKey => list($strong, $message, $alertClass)) {
                  if (isset($_SESSION[$sessionKey])) {
                      echo '
                      <div class="alert ' . $alertClass . ' alert-dismissible fade show mb-0 rounded-0" role="alert w-100">
                      <strong>' . htmlspecialchars($strong) . '</strong> ' . htmlspecialchars($message) . '
                      <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                      unset($_SESSION[$sessionKey]);
                  }
              }
              ?> 
        </div >     

  

          <?php
          include("../php/conn.php");


          $sql = "SELECT * FROM `products`";

          $result = mysqli_query($conn, $sql );

          if (mysqli_num_rows($result)>0) {
            
            echo "<div class='container'>
            <div class='row'>
          ";
            while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-3 g-3'>

                        <div class='card mb-4 box-shadow'>
                          <img style='height: 200px;
                          object-fit: cover;' 
                          class='card-img-top' src='projects/{$row['image']}'>

                          <div class='card-body'>
                            <h3>{$row['name']}</h3>
                            <p class='card-text'>{$row['location']}</p>

                            <div class='d-flex justify-content-end align-items-center flex-row'>
                                <a href='editProduct.php?id={$row['id']}' class='btn btn-sm btn-outline-secondary text-white me-1'><i class='fa-regular fa-pen-to-square' style='color: #ffffff;'></i></a>
                                <a href='deleteProduct.php?id={$row['id']}' class='btn btn-sm logout-btn text-white'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a>
                            </div>

                          </div>
                        </div>
                      </div>
                      
                      
              ";
            } 
            echo "</div>
            </div>";
          }
          else {
              echo " <small style='color: green;'>No Data Found</small>";
          }

          mysqli_close($conn);

          ?>
    </div>  
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
