<?php

session_start();
if (!isset ($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
   header ("location: index.php");
   exit();
}
// echo var_dump($_SESSION['email']);

// $exitsql = "SELECT * FROM `users` WHERE Email = '$_SESSION["email"]'";
//   $result = mysqli_query($conn, $exitsql);
//   $num_row_exits = mysqli_num_rows($result);
//   if ($num_row_exits > 0) {

//   }
include "compo/_db_conn.php";

$uemail = $_SESSION['email'];

$namsql = "SELECT * FROM `users` WHERE Email = '$uemail'";
$result = mysqli_query($conn, $namsql);
$num_row_exits = mysqli_num_rows($result);
if ($num_row_exits > 0) {
    while ($rw = mysqli_fetch_assoc($result)) {
    //    echo var_dump($rw);
       if ($rw["Username"]) {
           $showName = $rw["Username"];
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
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Wellcome to SecureLock</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">SecureLock</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            
           
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log out</a>
            </li>
           
           
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>


    <h1 class="text-center my-4">Hello <?php echo $showName;?> Welcome to SecureLock</h1>
    
    <div class="container">
        <p class="text-center text-light">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ea placeat nobis expedita ducimus vero explicabo unde eligendi, officia repudiandae eveniet veniam temporibus provident delectus amet eum cupiditate mollitia in.
        </p>
    </div>

    <!-- <button class="btn btn-primary"><a href="logout.php">Logout</a></button> -->
    <h2 class="text-center"><a href="/login-v.2/logout.php" class="lnk">logout here</a></h2>
</body>
</html>