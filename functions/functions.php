<?

//function grabs user data in db and displays it

function show_user_data() {
  $dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
   or die('Error connecting to MySQL server.');



   $query = "SELECT u_id, u_name, first_name, last_name, phone, permission, deleted  FROM user";
   $data = mysqli_query($dbc, $query);

   while($row = $data->fetch_array()){
  
      echo '<div class="col-md-12"><div class="panel panel-default"><div class="panel-body">';
      echo '<div class="col-md-1">ID:' . $row['u_id'] .' </div>';
      echo  '<div class="col-md-2">Email: ' . $row['u_name'] . '</div>';
      echo '<div class="col-md-2">First Name <br/>' . $row['first_name'] . '</div>';
      echo '<div class="col-md-2">Last Name: <br/>' . $row['last_name'] . '</div>';
      echo '<div class="col-md-2">Phone <br/>' . $row['phone'] . '</div>';   
      echo '<div class="col-md-1">Permission <br/>' . $row['permission'] . '</div>';
      echo '<div class="col-md-1">Deleted <br/>' . $row['deleted'] . '</div>';
      echo '<div class="col-md-1"><a href="index.php?layout=1&page=edituser&user=' . $row['u_id'] . '">Edit</a>';
      echo '</div></div></div></div>';

      }
}; 

//function edits single user data

function edit_user(){

       $user_id = $_GET['user'];
    

       if (isset($user_id)) {
        $dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
   or die('Error connecting to MySQL server.');

       $query = "SELECT u_id, u_name, first_name, last_name, phone, permission, deleted  FROM user WHERE u_id = $user_id";
           $data = mysqli_query($dbc, $query);
       
            while($row = $data->fetch_array()){
   echo '<div class="col-md-12">
  ';
        echo  '<form  method="post" action="functions/updateUser.php">';
        echo ' <input class="form-control" type="hidden" name="id"  value="'. $row['u_id'] .'"></div>';
        echo  '<div class="col-md-2">Email: 
        <input class="form-control" type="text" name="email"  value="'. $row['u_name'] . '"> </div>';
        echo '<div class="col-md-2">First Name <br/>
        <input class="form-control" type="text" name="f_name" value="'. $row['first_name'] .'"></div>';
        echo '<div class="col-md-2">Last Name: <br/>
      <input class="form-control" type="text" name="l_name" value="'. $row['last_name'] . '"></div>';
        echo '<div class="col-md-2">Phone <br/>
        <input class="form-control" type="text" name="phone" value="' . $row['phone'] . '"></div>';
        echo '<div class="col-md-2">Permission <br/>
              <select class="form-control" name="permission">
              <option value="'. $row['permission'] . '">'. $row['permission'] .'</option>
              <option value="Customer">Customer</option>
              <option value="CS">CS</option>
              <option value="Admin">Admin</option>
              </select>
              </div>';
        echo '<div class="col-md-1">Deleted <br/>
            <select class="form-control" name="deleted">
            <option value="'. $row['deleted'] . '">'. $row['deleted'] .'</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            </select>
            </div>';

        echo '<br/><button type="Submit button" class="btn btn-primary btn-lg" name="Submit">
  Update
</button>
        </form>'; 

        echo '<a href="index.php?layout=1&page=users">Back</a>';
        echo '</div></div>';

            }
       }
;}

function show_orders(){
  $page= $_GET['page'];
  $dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
   or die('Error connecting to MySQL server.');
      $query = "SELECT 
      o.unique_id,
      o.Time_Stamp,
      u.first_name,
      u.last_name,
      u.address_1,
      u.zip,
      p.product_price,
      p.product_name AS pn1,
      p2.product_name AS pn2
      FROM user_orders AS o 
      INNER JOIN user AS u ON o.u_id=u.u_id
      INNER JOIN my_products AS p ON o.product_key=p.unique_id
      INNER JOIN my_products AS p2 ON o.upsell_purchased=p2.unique_id ";

 $data = mysqli_query($dbc, $query)or die('Error querying tables');
    

        if ($page == dashboard){
         while($row = $data->fetch_array()){ 
        echo' <tr>
               <td>' .$row['unique_id']. '</td>
              <td>' .$row['Time_Stamp']. '</td>
              <td>' .$row['pn1']. '</td>
              <td>$' .$row['product_price']. '</td>
              </tr>';
              mysqli_close($dbc);
         } 
         } if ($page != dashboard){
           $page= $_GET['page'];
   while($row = $data->fetch_array()){ 
      echo'<div class="col-md-12"><div class="panel panel-default">
      <div class="panel-body">';
      echo '<div class="col-md-1">' .$row['unique_id']. '</div>';
      echo '<div class="col-md-1">' .$row['first_name']. '</div>';
      echo '<div class="col-md-2">' .$row['last_name']. '</div>';
      echo '<div class="col-md-2">' .$row['address_1']. '<br/>' .$row['zip']. '</div>';
      echo '<div class="col-md-2">' .$row['pn1']. '</div>';
      echo '<div class="col-md-2">' .$row['pn2']. '</div>';
       echo '<div class="col-md-2">' .$row['Time_Stamp']. '</div>';
      
      echo '</div></div></div>';
      mysqli_close($dbc);
        }
     
      }
};

function orders_totals() {
$dbc=mysqli_connect("localhost","root","root","music_app");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM user_orders";

if ($result=mysqli_query($dbc,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }
mysqli_close($dbc);

}

function week_day_orders($day) {

      $dbc=mysqli_connect("localhost","root","root","music_app");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     
    $sql="SELECT * FROM user_orders WHERE day = '$day'";

    if ($result=mysqli_query($dbc,$sql))
      {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
      printf($rowcount);
      // Free result set
      mysqli_free_result($result);
      }
    mysqli_close($dbc);
}

function most_popular() {
  $dbc=mysqli_connect("localhost","root","root","music_app");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     $query = "SELECT
                o.product_key,
                p.unique_id,
                p.product_name
                FROM
                user_orders AS o
                INNER JOIN my_products AS p ON o.product_key=p.unique_id
                GROUP BY
                product_key
                ORDER BY COUNT(*) DESC";
 

 $data = mysqli_query($dbc, $query)or die('Error querying tables');
  while($row = $data->fetch_array()){ 
echo '<div class="col-lg-2"> ' .$row['product_name']. '</div>';
  }
    
};

function repeat_customers(){
  $dbc=mysqli_connect("localhost","root","root","music_app");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     $query = "SELECT
                o.u_id,
                u.u_id,
                u.first_name,
                u.last_name
                FROM
                user_orders AS o
                INNER JOIN user AS u ON o.u_id=u.u_id
                GROUP BY
                u.u_id
                ORDER BY COUNT(*) DESC";
 

 $data = mysqli_query($dbc, $query)or die('Error querying tables');
  while($row = $data->fetch_array()){ 
echo '<div class="col-lg-2"> ' .$row['first_name']. ' ' .$row['last_name']. '</div>';
  }
}
?>

