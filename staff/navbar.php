<?php

    ob_start();

    if(isset($_REQUEST["access"])){
        $name = $_REQUEST["access"];

        $result = mysqli_query($connect, "SELECT username from staff_acc WHERE hashed = '$name'");
        $staff_username1 = mysqli_fetch_assoc($result);
        
    }

    $cash = $_REQUEST["access"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar | REX Foodipedia</title>

    <link rel="stylesheet" href="css/nav.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .sticky{
            position: fixed;
            top: 0;
            width: 100%;
            padding-top: -100%;
        }
        
        img{
            width: 60px;
            height: 60px;
        }
        
        #navbar{
            background-color: #5eaaa8;
        }

        body{
            background-color: #e8ded2;
        }
        
    </style>
</head>
<body>
    <!-- 
        //add products
        //edit menu
        //sales report
        //check order
        //view transactions
        //view order list
        //add, delete, update items
        logout
    -->
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark" id="navbar">
            <a class="navbar-brand" href="dashboard.php">
                <img class="logo horizontal-logo" src="../img/logo/logo.png" alt="REX Foodipedia logo">
            </a>
            <!-- Button for mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="dashboard?access=<?php echo $cash ?>">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="edit-menu-landing?access=<?php echo $cash ?>">Edit Menu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item" href="add-product?access=<?php echo $cash ?>">Add New Products</a>
                            <a class="dropdown-item" href="edit-menu-landing?access=<?php echo $cash ?>">Update Current Products</a>
                            <a class="dropdown-item" href="delete-product?access=<?php echo $cash ?>">Delete Current Products</a>
                            <!--a class="dropdown-item" href="faq">FAQ</a-->
                            <!--div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a-->
                        </div>
                    </li>
                    <!--li class="nav-item active">
                        <a class="nav-link text-center" href="">123</a>
                    </li-->
                    
                    <!--li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item" href="my-orders">My Orders</a>
                            <a class="dropdown-item" href="profile">Profile</a>
                            <a class="dropdown-item" href="loyalty-points">Loyalty Points</a>
                            <a class="dropdown-item" href="feedback">Feedback to Us</a>
                            <!--div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a->
                        </div>
                    </li-->
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="check-order?access=<?php echo $cash ?>"><i class="fas fa-shopping-cart"></i> View Transactions</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage Orders
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <!-- <a class="dropdown-item" href="edit-menu?access=<?php echo $cash ?>">Edit Menu</a> -->
                            <a class="dropdown-item" href="check-order?access=<?php echo $cash ?>">View Order List</a>
                            <!--a class="dropdown-item" href="delete-products">Delete Current Products</a-->
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="sales-report?access=<?php echo $cash ?>">Sales Report</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="logout">Logout</a>
                    </li>
                </ul>
            </div>
        <!--/div-->
    </nav>

      <script>
        window.onscroll = function() {myFunction()};
        
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;
        
        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
        </script>
    
    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>