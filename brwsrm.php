<?php
	require_once 'cnntdb.php';

	connect();

	//$sql = "SELECT Room.RM_NUM, Room.RM_TYP, Rcapacity, Rdetails, Rprice, fdate, tdate FROM Room, Enrollments WHERE Room.RM_ID = Enrollments.EN_RM_ID;";
    $sql = "SELECT r.RM_NUM, rt.RM_TYP_NAME, r.RM_CAPACITY, r.RM_DETAILS, e.EN_DATE, e.EN_TIME FROM Room r inner join Enrollments e 
    on r.RM_ID = e.EN_RM_ID
    inner join Room_Type rt on rt.rm_typ_id = r.rm_type;";
	$result = $conn->query($sql);

	$sql = "SELECT * FROM Room WHERE RM_ID NOT IN (SELECT EN_RM_ID FROM Enrollments)";
	$result1 = $conn->query($sql);
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    </head>

    <body>
    <!--Navigation Bar-->
    <nav class = "navbar navbar-default">
        <div class = "container-fluid">
            <div class = "navbar-header">
                <a class = "navbar-brand" href="index.php">RmBkingSys</a>
            </div>
            <div>
                <ul class = "nav navbar-nav">
                    <li><a href = "index.php">Home</a></li>
                    <li><a href = "reservation_form1.php">Reservation</a></li>
                    <li class = "active"><a href = "#">Room Availability</a></li>
                    <li><a href = "upmingents.php">Upcoming Events</a></li>
                    <li><a href = "index.php#cntctus">Contact</a></li>
                    <li><a href = "index.php#faq">FAQ</a></li>
                    <li><a href = "index.php#about">About Us</a></li>
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
                                            ."<li><a href=\"root_user/rmresvion.php\">Cancel Reservation</a></li>"
                                            ."<li><a href = \"root_user/rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"root_user/rtlogout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>

                    <?php
                        if (!isset( $_COOKIE['user'] )) {
                            echo "<li>"
                                ."<a href = \"loginform.php\">Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"My_Account/shwple.php\">Show Profile</a></li>"
                                            ."<li><a href=\"My_Account/edit.php\">Edit</a></li>"
                                            ."<li><a href=\"My_Account/bkinghtry.php\">Booking History</a></li>"
                                            ."<li><a href=\"My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

        <div class = "container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Room Capacity</th>
                        <th>Room Details</th>
                        <!--<th>Room Price</th>-->
                        <th>Booked  Date</th>
                        <th>Booked Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>"
                                    ."<td>".$row['RM_NUM']."</td>"
                                    ."<td>".$row['RM_TYP_NAME']."</td>"
                                    ."<td>".$row['RM_CAPACITY']."</td>"
                                    ."<td>".$row['RM_DETAILS']."</td>"
                                    
                                    ."<td>".$row['EN_DATE']."</td>"
                                    ."<td>".$row['EN_TIME']."</td></tr>";
                            }
                        }
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                echo "<tr>"
                                    ."<td>".$row['RM_NUM']."</td>"
                                    ."<td>".$row['RM_TYP_NAME']."</td>"
                                    ."<td>".$row['RM_CAPACITY']."</td>"
                                    ."<td>".$row['RM_DETAILS']."</td>"
                                   
                                    ."<td>---</td>"
                                    ."<td>---</td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

    <!--Javascript files-->
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	</body>

</html>