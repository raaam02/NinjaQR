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
                  <a class="nav-link" href="Product.php">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link activeted" href="ContactManage.php">Contacts</a>
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
      <!-- Table -->
      <div
        class="mt-5 pt-5 d-flex justify-content-center flex-column"
      >
      <div
        class="container d-flex justify-content-center w-100"
      >
        
      <?php

    if (isset($_SESSION['user_removed'])) {
      echo '
      <div class="alert alert-success alert-dismissible fade show mb-0 rounded-0" role="alert w-100">
      <strong class="text-danger">' . htmlspecialchars("Deleted") . '</strong> User Removed Successfully.
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      unset($_SESSION['user_removed']);  
    }
    if (isset($_SESSION['user_not_removed'])) {  
    echo '
    <div class="alert alert-danger alert-dismissible fade show mb-0 rounded-0" role="alert">
    <strong>' . htmlspecialchars("Can't Delete now") . '</strong> Try Again Later.
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['user_not_removed']);
    }
    if (isset($_SESSION['user_edited'])) {
      echo '
      <div class="alert alert-success alert-dismissible fade show mb-0 rounded-0" role="alert w-100">
      <strong>' . htmlspecialchars("Edited") . '</strong> User Edited Successfully.
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      unset($_SESSION['user_edited']);  
    }
    if (isset($_SESSION['user_not_edited'])) {  
    echo '
    <div class="alert alert-danger alert-dismissible fade show mb-0 rounded-0" role="alert">
    <strong>' . htmlspecialchars("Can't Update now") . '</strong> Try Again Later.
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['user_not_edited']);
    }
  ?> 
  </div >     
    
<?php
include("../php/conn.php");


$sql = "SELECT * FROM `contactus`";

$result = mysqli_query($conn, $sql );

if (mysqli_num_rows($result)>0) {
    echo "<div
    class='table-responsive-sm rounded'
>
    <table
        class='rounded table table-hover table-primary align-middle'
    >
        <thead class=''>
            <caption>
            </caption>
            <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>NAME</th>
                <th class='text-center'>EMAIL</th>
                <th class='text-center'>QUERY</th>
                <th class='text-center'>TIME</th>
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
    <td class='text-center'>{$row['query']}</td>
    <td class='text-center'>{$row['time']}</td>
    <td class='text-center'>
      <div class='d-flex justify-content-center'>
      <a href='edit.php?id={$row['id']}'><i class='fa-regular fa-pen-to-square fa-xl me-2'></i></i></a>
      <a href='delete.php?id={$row['id']}'><i class='fa-solid fa-trash fa-xl' style='color: #c70000;'></i></a>
      </div>
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