<?php
    //session_start();
    //$cash = $name;

    if(isset($_REQUEST["access"])){
        $name = $_REQUEST["access"];

        $result = mysqli_query($connect, "SELECT username from admin_acc WHERE hashed = '$name'");
        $admin_username1 = mysqli_fetch_assoc($result);
        
    }

    //echo "<br><br>JACK";
    //echo $admin_username1["username"];
    //echo "JACK<br><br>";
    //echo $_SESSION['hashed'];

    //echo $cash;

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
        /*#nav{
            width: 100%;
            position: sticky;
            /*top: -70px;
            /*display: block;
            transition: top 0.3s;
            z-index: 9999;
        }*/
        img{
            width: 60px;
            height: 60px;
        }
        /*.nav-link{
          /*padding-left: .5em !important;
          padding-right: .5em !important;
        }*/
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
        add staff
        edit staff
        update customer acc status
        update customer loyalty points
        logout
    -->
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark" id="navbar">
            <a class="navbar-brand" href="index.php">
                <!-- <img class="logo horizontal-logo" src="img/logo/logo.png" alt="REX Foodipedia logo"> -->
                <img class="logo horizontal-logo" src="../img/logo/logo.png" alt="REX Foodipedia logo">
            </a>
            <!-- Button for mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item active">
                        <a class="nav-link text-center" href="dashboard?access=<?php echo $cash ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage Accounts
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item" href="add-staff?access=<?php echo $cash ?>">Add Staff</a>
                            <a class="dropdown-item" href="add-admin?access=<?php echo $cash ?>">Add Admin</a>
                            <a class="dropdown-item" href="edit-accounts?access=<?php echo $cash ?>">Edit Accounts</a>
                            <!--a class="dropdown-item" href="our-background">Our Background</a>
                            <a class="dropdown-item" href="faq">FAQ</a-->
                            <!--div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage Customer Information
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item" href="cus-status?access=<?php echo $cash ?>">Update Customer Account Status</a>
                            <a class="dropdown-item" href="cus-points-landing?access=<?php echo $cash ?>">Update Customer Loyalty Points</a>
                            <!--a class="dropdown-item" href="our-background">Our Background</a>
                            <a class="dropdown-item" href="faq">FAQ</a-->
                            <!--div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a-->
                        </div>
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
        var sticky = 0;
        
        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.remove("sticky")
          } else {
            navbar.classList.add("sticky");
          }
        }
        </script>
    
    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>