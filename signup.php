<?php
// varibale for email exists
$mailE = false;
// varibale for unmatched password
$wpass = false;
// varibale for succes ful sign up
$succ = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include "compo/_db_conn.php";

  $username = $_POST['uname'];
  $email = $_POST['email'];
  $password = $_POST['hash'];
  $cpassword = $_POST['chash'];

  // email checking 
  $exitsql = "SELECT * FROM `users` WHERE Email = '$email'";
  $result = mysqli_query($conn, $exitsql);
  $num_row_exits = mysqli_num_rows($result);
  if ($num_row_exits > 0) {
    
    // echo "<br> You already sign up with this email";
    $mailE =true;
  }
  else {
    if ($password != $cpassword) {
      // echo "<br> Password are not matching";
      $wpass = true;
    }
    else {
      // password hasing
      $hash = password_hash($password, PASSWORD_DEFAULT );

      $sql = "INSERT INTO `users` ( `Username`, `Email`, `Password`) VALUES ('$username', '$email', '$hash')";
      $result = mysqli_query($conn, $sql);
      // echo var_dump($result);
      if ($result) {
        // echo "Succussful login";
        $succ = true;
      
      }
      // else {
      //   echo "<br> Try Again ".mysqli_error($conn);
      // }
  }
  }
  



}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

   
  <title>PHP Login System - v.0.2</title>
</head>
<style>
  body {
    overflow: hidden;
  }
</style>

<body>
  <!-- navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">SecureLock</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Sign Up</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>

          

        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
<!-- alert  -->
<?php
// eamil validation 
if ($mailE ) {
  echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alert!</strong> You already SignUp with this email.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  ';
}

// Password validation 
if ($wpass ) {
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Password are not matched.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  ';
}
// Sucessul login alert
if ($succ ) {
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Succeess!</strong> You are Successfully Sign up. You can login Now.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  ';
}


?>
  <!-- landing  -->

  <div class="container my-4">
    <h1 class="text-center">Sign up </h1>
    <form action="/login-v.2/signup.php" method="post">
      <div class="mb-3">
        <div class="mb-3">
          <label for="uname" class="form-label">User Name</label>
          <input type="text" class="form-control" id="uname" aria-describedby="emailHelp" name="uname">
        </div>

        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="hash" class="form-label">Password</label>
        <input type="password" class="form-control" id="hash" name="hash">
      </div>

      <div class="mb-3">
        <label for="chash" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="chash" name="chash">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>