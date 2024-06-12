<?php 
session_start();
$invalidUser = false;
$InvalidPassword = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  include("../php/conn.php");

  $aname = $_POST["aname"];
  $pass = $_POST["pass"];

  $storedPassSql = "select * from admin where admin = '$aname'";
  $storedPassResult = mysqli_query( $conn, $storedPassSql );

  if (mysqli_num_rows($storedPassResult) > 0) {

      $storedPassRow = mysqli_fetch_assoc($storedPassResult);
      $storedHashedPassword = $storedPassRow['password'];

          if (password_verify($pass, $storedHashedPassword)) {

              $_SESSION['authenticated'] = true;
              $_SESSION['admin'] = $aname;
              header("location: Dashboard.php");
              exit();
          } else {
              $InvalidPassword = true;
          }
      }
  else {
    $invalidUser = true;
  }

mysqli_close($conn);
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
    <?php 
    if (isset($_SESSION["registred"])) {
        echo '
        <div class="alert alert-success alert-dismissible fade show mb-0 rounded-0" role="alert">
        <strong>' . htmlspecialchars("New Admin Added Successfully") . '</strong> Login Once Again.
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        session_destroy();   
    } 
    if ($invalidUser == true) {
      echo '
        <div class="alert alert-danger alert-dismissible fade show mb-0 rounded-0" role="alert">
        <strong>' . htmlspecialchars("Invalid Admin") . '</strong> Admin not found.
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($InvalidPassword == true) {
      echo '
        <div class="alert alert-danger alert-dismissible fade show mb-0 rounded-0" role="alert">
        <strong>' . htmlspecialchars("Invalid Password") . ' </strong> You Entered Wrong Password.
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
    ?>
    <main>
      <section class="py-5" style="background-color: #2d2d2d68">
        <div
          class="shadow container p-5 mt-5 rounded-5"
          style="max-width: 500px; background-color: #d0efffc7"
        >
          <h3 class="text-center mb-5">Login as Admin</h3>
          <!-- Form -->
          <form action="" method="post">
            <div class="mb-3">
              <label for="" class="form-label">Admin Name</label>
              <input
                type="text"
                class="form-control shadow-none"
                name="aname"
                id=""
                aria-describedby="helpId"
                placeholder="User Name"
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
                placeholder="Password"
                required
              />
            </div>
            <div
              class="d-flex align-items-center justify-content-between mb-3 mt-5"
            >
              <a class="text-primary fw-medium fs-6" href=""
                >Forgot Password ?</a
              >
            </div>
            <button type="submit" class="btn rounded-5 w-100 text-white">
              Login
            </button>
          </form>
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
