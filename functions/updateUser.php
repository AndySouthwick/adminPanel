<?php 

header('Location: ../index.php?layout=1&page=users');
$unique_id = $_POST["id"];
$email = $_POST["email"];
$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$permission  = $_POST["permission"];
$deleted = $_POST["deleted"];



echo $unique_id;
?>

<?php
if (isset($_POST["Submit"])) {
  $dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
    or die('Error connecting to MySQL server.');



  $query = "UPDATE user SET u_id ='$unique_id', u_name ='$email', 
  first_name ='$f_name', last_name ='$l_name ', 
  permission ='$permission', deleted ='$deleted'  WHERE u_id ='$unique_id'";

  mysqli_query($dbc, $query) or die('Error querying database.');

     
  

  mysqli_close($dbc);

  echo 'it worked';
}

?>