<?php 
header('Location: ../index.php?layout=1&page=users');
?>

<?php
if (isset($_POST["Submit"])) {
  $dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
    or die('Error connecting to MySQL server.');

$u_name = $_POST["u_name"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$phone = $_POST["phone"];
$permission = $_POST["permission"];


  $query = "INSERT INTO user (u_name, first_name, last_name, phone, permission)  VALUES ('$u_name', '$first_name', '$last_name', '$phone', '$permission')";
  mysqli_query($dbc, $query)
    or die('Error querying database.');

     
  

  mysqli_close($dbc);

}

?>