<?php

    require_once '../url.php';
   
   // require_once 'reserveSlots.php';

    session_start();

    require_once '../cnntdb.php';

    connect();

    $check = 1;

    
    $cancelId = $_GET['val'];
  //echo $cancelId;
       
        if (!$conn) {
			die("<div class=\"alert alert-danger\" role=\"alert\">Connection failed: ".mysqli_connect_error()."</div>");
		}


       
     $sql = " UPDATE ENROLLMENTS E SET E.IS_ACTIVE = 0 WHERE E.EN_ID = $cancelId ";

          if (mysqli_query($conn, $sql)) {
             
        } else {
            $check = 0;
            }

       

   


   
            
   // }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="../dist/css/RmBkingSys.css">
</head>

<body>

    <!--Navigation Bar-->
    <nav class = "navbar navbar-default">
        <div class = "container-fluid">
            <div class = "navbar-header">
                <a class = "navbar-brand" href="index.php"></a>
            </div>
            <div>
                <ul class = "nav navbar-nav">
                    <li><a href = "../index.php">Home</a></li>
                    <li class = "active"><a href = "#">Reservation</a></li>
                    <li><a href = "../brwsrm.php">Room Availability</a></li>
                   <!-- <li><a href = "upmingents.php">Upcoming Events</a></li>-->
                    <li><a href = "../index.php#cntctus">Contact</a></li>
                    <li><a href = "../index.php#faq">FAQ</a></li>
               
                </ul>
                <ul class = "nav navbar-nav navbar-right">
                    <?php
                        if (!isset( $_COOKIE['root_user'] )) {
                            echo "<li>"
                                ."<a href = \"rtloginform.php\">Admin Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Admin <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"root_user/adrm.php\">Add Room</a></li>"
                                            ."<li><a href=\"root_user/edrm.php\">Edit Room</a></li>"
                                            ."<li><a href=\"root_user/delrm.php\">Delete Room</a></li>"
                                            ."<li><a href=\"root_user/bookinghistory.php\">Reservation History</a></li>"
                                            ."<li><a href = \"root_user/rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"root_user/rtlogout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>

                    <?php
                        if (!isset( $_COOKIE['user'] )) {
                            echo "<li>"
                                ."<a href = \"../loginform.php\">Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"../My_Account/shwple.php\">Show Profile</a></li>"
                                            ."<li><a href=\"../My_Account/edit.php\">Edit</a></li>"
                                            ."<li><a href=\"../My_Account/bkinghtry.php\">Booking History</a></li>"
                                            ."<li><a href=\"../My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!--Page Content-->
    <?php
    if($check)
        echo "<div class = \"container\"><div class=\"alert alert-success\" role=\"alert\">Successfully cancelled the reservation!</div></div>";
     else
        echo "<div class = \"container\"><div class=\"alert alert-danger\" role=\"alert\">So,ething went wrong!</div></div>";
     ?>

        <!--JavaScript Files-->
        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/js/bootstrap.min.js"></script>
      
    </body>
</html>
