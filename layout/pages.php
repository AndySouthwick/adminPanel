<?php 

if ($layout == 1){
    
    if($page == dashboard){
        include 'includes/dashboard.inc.php';
        $title = "Dashboard";
       
    }
    if($page == users){
        include 'includes/users.inc.php';
        $title = "Users";
    }
    if($page == orders){
        include 'includes/orders.inc.php';
        $title = "Orders";
    }
    if($page == products){
        include 'includes/products.inc.php';
        $title = "Products";
    }
     if($page == edituser){
        include 'includes/editusers.inc.php';
        $title = "Edit Users";
    }
}
?>
