
<?php

$check = 1;
require_once '../cnntdb.php';
require_once("../url.php");

    connect();

if ( isset($_POST['proceed']) ) {
    echo "proceed";

     require_once '../cnntdb.php';
     require_once("../url.php");


    $room_num = $_POST['room_num'];

    

    $sql = "SELECT * FROM room WHERE RM_ID = '$room_num'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "$room_num";           
        setcookie("rnum", $room_num, time() + 60*60, '/');
        echo "$room_num";
        header("Location: $rootURL/root_user/edrm1.php");
    }
    else
        $check = 0;
    }




?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    </head>

    <body>
        <nav class = "navbar navbar-default">
            <div class = "container-fluid">
                <div class = "navbar-header">
                    <a class = "navbar-brand" href="../index.php">RmBkingSys</a>
                </div>
                <div>
                    <ul class = "nav navbar-nav">
                        <li><a href = "../index.php">Home</a></li>
                        <li><a href = "../reservation_form1.php">Reservation</a></li>
                        <li><a href = "../brwsrm.php">Room Availability</a></li>
                      
                        <li><a href = "../index.php#cntctus">Contact</a></li>
                        <li><a href = "../index.php#faq">FAQ</a></li>
                        
                    </ul>

                    <ul class = "nav navbar-nav navbar-right">
                        <?php
                        if (!isset( $_COOKIE['root_user'] )) {
                            echo "<li>"
                                ."<a href = \"root_user/rtloginform.php\">Admin Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Admin <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"root_user/adrm.php\">Add Room</a></li>"
                                            ."<li><a href=\"root_user/delrm.php\">Delete Room</a></li>"
                                            ."<li><a href=\"root_user/bookinghistory.php\">Reservation History</a></li>"
                                            ."<li><a href = \"root_user/rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"root_user/rtlogout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>

                    <?php
                        if (!isset( $_COOKIE['user'] )) {
                            echo "<li class = \"active\">"
                                ."<a href = \"../loginform.php\">Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"../My_Account/shwple.php\">Show Profile</a></li>"
                                            ."<li><a href=\"../My_Account/edit.php\">Edit</a></li>"
                                            ."<li><a href=\"../My_Account/chnpass.php\">Change Password</a></li>"
                                            ."<li><a href=\"../My_Account/bkinghtry.php\">Booking History</a></li>"
                                            ."<li><a href=\"../My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class = "container">
            <form role = "form" name = "Edit_room"  onsubmit="return validateForm()" method = "post"  action = 'edrm.php' >
                <div class = "form-group">
                    <select name="room_num" class = "form-control">
                    <?php
                        $sql = "SELECT * FROM ROOM";
                       // $result = $conn->query($sql);

                        $output = mysqli_query($conn,$sql);

                        while($record = mysqli_fetch_array($output))
                        {                            
                            echo "<option value=\"".$record["RM_ID"]."\">".$record["RM_NUM"]."</option>";
                        }


                      
                    ?>
                </select>
                </div>
                
                <div>
                    <button type="submit" name="proceed" class = "btn btn-default">Proceed</button>
                </div>
            </form>
            <br>
            <?php
                if (!$check) {
                    echo "<br><div class = \"alert alert-danger\" role = \"alert\">Room Number doesnt exist</div>";
                }
            ?>
        </div>

        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/js/bootstrap.min.js"></script>


    </body>

</html>








