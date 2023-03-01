<!-- Coded by https://beproblemsolver.com  Visit for more such code -->
<?php
require_once("connect.php");
require_once("function.php");
session_start();

if (isset($_SESSION['login_active'])) {
  header("Location: dashboard.php");
  exit();
} else {

  if (isset($_POST['login'])) {
    $email = santize($_POST['email']);
    $inputpassword = santize($_POST['password']);
    $password = md5($inputpassword);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['login_active'] = [$row["name"], $row["email"]];
        $_SESSION['msg'] = "Welcome to Dashboard";
        $_SESSION['class'] = "text-bg-success";
        header("Location: dashboard.php");
        exit();
      }
    } else {
      $_SESSION['msg'] = "Check Email & Password";
      $_SESSION['class'] = "text-bg-danger";
      header("Location: index.php");
      exit();
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section class="main-section">
    <div class="container">

      <?php if (isset($_SESSION['msg'])) : ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
          <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header <?php echo $_SESSION['class']; ?>">
              <strong class="me-auto">Message</strong>
              <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              <?php
              $message = $_SESSION['msg'];
              unset($_SESSION['msg']);
              echo $message;
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="row justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-7 col-lg-4">
          <div class="box rounded">
            <div class="img"></div>
            <div class="login-box p-5">
              <h2 class="pb-4">Login</h2>
              <form action="" method="post">
                <div class="mb-4">
                  <input type="email" class="form-control" placeholder="Enter Email address" name="email">
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control" placeholder="Enter Password" name="password">
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
              </form>

              <div class="py-4 text-center">
                Join now, <a href="signup.php" class="link">Sign Up</a>
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