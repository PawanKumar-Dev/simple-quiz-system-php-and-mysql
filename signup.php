<!-- Coded by https://beproblemsolver.com  Visit for more such code -->
<?php
require_once("connect.php");
require_once("function.php");
session_start();

if (isset($_POST['signup'])) {
  $name = santize($_POST['name']);
  $email = santize($_POST['email']);
  $inputpassword = santize($_POST['password']);

  $password = md5($inputpassword);

  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password');";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['msg'] = "You have Signed Up Successfully";
    $_SESSION['class'] = "text-bg-success";
    header("Location: index.php");
    exit();
  } else {
    $_SESSION['msg'] = "Sign Up failed";
    $_SESSION['class'] = "text-bg-danger";
    header("Location: index.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz SignUp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section class="main-section">
    <div class="container">
      <div class="row justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-7 col-lg-4">
          <div class="box rounded">
            <div class="img-2"></div>
            <div class="login-box p-5">
              <h2 class="pb-4">Sign Up</h2>
              <form action="" method="post">
                <div class="mb-4">
                  <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                </div>
                <div class="mb-4">
                  <input type="email" class="form-control" placeholder="Enter Email address" name="email" required>
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary-1" name="signup">Sign Up</button>
                </div>
              </form>

              <div class="py-4 text-center">
                <a href="index.php" class="link">Login</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<!-- Coded by https://beproblemsolver.com  Visit for more such code -->

</html>