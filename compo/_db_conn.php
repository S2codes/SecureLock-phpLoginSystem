<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "login-v.2";

$conn = mysqli_connect($server, $username, $password, $db);


if (!$conn) {
    echo "Connection was not Successful";
}
// else {
//     echo "Connection was Successful";
// }



?>