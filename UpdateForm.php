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

  <?php 
  
  include("connection.php");

  $id = $_GET["id"];

  $sql = "SELECT * FROM `user` WHERE `id` = $id";

  if ($result = mysqli_query($conn, $sql)) {
    $row = mysqli_fetch_assoc($result);
  } else {
    echo "Something Went Wrong Please Try Again Later";
  }
  
  mysqli_close($conn);
  
  
  ?>

    <main>
      <div class="d-flex justify-content-center">
        <div
          class="div-box-shadow container mx-auto m-5 p-5 rounded bg-white"
          style="max-width: 500px"
        >
          <h3 class="text-center mb-5">Update Details</h3>

          <form action="UpdateSave.php" method="post">

          <div class="mb-3">
            <label for="" class="form-label">Id</label>
            <input
              type="text"
              class="form-control"
              name="id"
              id=""
              aria-describedby="helpId"
              placeholder=""
              value="<?php echo $row['id']; ?>"
              hidden
            />
          </div>
          
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                name="name"
                id=""
                aria-describedby="helpId"
                placeholder=""
                value="<?php echo $row['name']; ?>"
              />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                name="email"
                id=""
                aria-describedby="emailHelpId"
                placeholder="abc@mail.com"
                value="<?php echo $row['email']; ?>"
              />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">User Name</label>
              <input
                type="text"
                class="form-control"
                name="uname"
                id=""
                aria-describedby="helpId"
                placeholder=""
                value="<?php echo $row['username']; ?>"
              />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input
                type=""
                class="form-control"
                name="pass"
                id=""
                placeholder=""
                value="<?php echo $row['password']; ?>"
              />
            </div>
            <button
              type="submit"
              class="btn btn-primary w-100 mt-2"
            >
              Submit
            </button>
          </form>
        </div>
      </div>
    </main>
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
