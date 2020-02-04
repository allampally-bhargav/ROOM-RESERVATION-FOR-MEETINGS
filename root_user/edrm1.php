<?php
    if ( isset($_POST['submit']) ) {
        require_once '../cnntdb.php';
        require_once("../url.php");

        connect();

        $check = 0;

        $RoomCapacity =$_POST['room_capacity'];
        $RoomType =$_POST['room_type'];
        $RoomDetails =$_POST['room_details'];
        $RommAddCost =$_POST['room_addCost'];
       // echo "$RoomCapacity";

        $sql = "UPDATE ROOM
                SET
                RM_CAPACITY=' $RoomCapacity',
                RM_TYPE ='$RoomType',
                RM_DETAILS ='$RoomDetails',
                ADD_COST = $RommAddCost

                
               WHERE RM_ID = '".$_COOKIE['rnum']."'";
                
                

     //   $conn->query($sql);

      //  header("Location: $rootURL/index.php");    

         if (mysqli_query($conn, $sql)) {
            $check = 1;
             
        } else {
            $check = 2;
            }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/RmBkingSys.css">
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"></head>

<body>

    <!--Navigation Bar-->
    <nav class = "navbar navbar-default">
        <div class = "container-fluid">
            <div class = "navbar-header">
                <a class = "navbar-brand" href="../index.php"></a>
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
                                ."<a href = \"../root_user/rtloginform.php\">Admin Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Admin <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                             ."<li><a href=\"adrm.php\">Add Room</a></li>"
                                             ."<li><a href=\"edrm.php\">Edit Room</a></li>"
                                            ."<li><a href=\"delrm.php\">Delete Room</a></li>"
                                             ."<li><a href=\"bookinghistory.php\">Reservation History</a></li>"
                                           
                                            ."<li><a href = \"rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"rtlogout.php\">Log Out</a></li>"
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
                                            ."<li><a href=\"shwple.php\">Show Profile</a></li>"
                                            ."<li class = \"active\"><a href=\"#\">Edit</a></li>"
                                            ."<li><a href=\"chnpass.php\">Change Password</a></li>"
                                            ."<li><a href=\"bkinghtry.php\">Booking History</a></li>"
                                            ."<li><a href=\"logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!--Page Content-->
    <div class = "container">
        <form role = "form" action = "edrm1.php" method = "post">
            <?php
    
                require_once '../cnntdb.php';

                connect();
                

                $sql = "SELECT * FROM ROOM R INNER JOIN ROOM_TYPE RT ON RT.RM_TYP_ID = R.RM_TYPE WHERE RM_ID = '".$_COOKIE['rnum']."'";


                if ($result = $conn->query($sql)) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                           
                            <div class = \"form-group\">
                                <label>Room Capacity:</label>
                                <input  type=\"number\" name = \"room_capacity\" value = \"".$row['RM_CAPACITY']."\" class = \"form-control\"/>
                            </div>
                            <div class = \"form-group\">
                                <label>RoomType:</label>
                                <select name=\"room_type\" class = \"form-control\">";

                                $sql = "SELECT *  FROM room_type";
                       // $result = $conn->query($sql);

                        $output = mysqli_query($conn,$sql);

                        while($record = mysqli_fetch_array($output))
                        {                            
                             if($roomType == $row["RM_TYP_ID"])
                              echo "<option selected=\"true\" value=".$record["RM_TYP_ID"].">".$record["RM_TYP_NAME"]."</option>";
                            else

                            echo "<option value=".$record["RM_TYP_ID"].">".$record["RM_TYP_NAME"]."</option>";
                        }
                                echo "<select>
                                
                            </div>
                            <div class = \"form-group\">
                                <label>Additional Cost:</label>
                                <input  type=\"number\" step=\"0.5\" name = \"room_addCost\" value = \"".$row['ADD_COST']."\" class = \"form-control\"/>
                            </div>
                            <div class = \"form-group\">
                                <label>Room Details:</label>
                                <input type = \"text\" name = \"room_details\" value = \"".$row['RM_DETAILS']."\" class = \"form-control\"/>
                            </div>
                            
                            ";
                    }
                }
            ?>
            <input type = "submit" name = "submit" class = "btn btn-default" value = "Submit"/><br/><br/>
            <!--<a href="chnpass.php" class = "btn btn-default">Change Password</a>-->


        </form>
    </div>

     <div class = "container">
        <?php
            if (isset($_POST['submit'])) {
                if ($check == 1) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Room updated successfully!</div>";
                }
                elseif($check == 2)
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Something went wrong, please try again!</div>";
            }
        ?>
    </div>

    <!--Javascript files-->
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    </body>
</html>



