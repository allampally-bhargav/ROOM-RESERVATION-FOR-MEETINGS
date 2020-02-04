<?php
    require_once '../cnntdb.php';

    connect();

    $sql = "SELECT RM.RM_NUM,
    RM.RM_CAPACITY, RM.RM_DETAILS,
    RT.RM_TYP_NAME,
     T.TM_SLT_START, T.TM_SLT_END,
      E.EN_DATE , E.EN_ID
      FROM Enrollments E INNER JOIN ORDERS O ON O.ORDER_ID = E.EN_ORDER_ID
      INNER JOIN ROOM RM ON RM.RM_ID = E.EN_RM_ID INNER JOIN ROOM_TYPE RT ON RT.RM_TYP_ID = RM.RM_TYPE INNER JOIN  TIME_SLOTS T ON T.TM_SLT_ID = E.EN_TIME

       WHERE E.IS_ACTIVE = 1 AND  O.ORDER_USER = '".$_COOKIE['root_user']."' ORDER BY E.EN_ID DESC";
    $result = $conn->query($sql);
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
                    <!--<li><a href = "../upmingents.php">Upcoming Events</a></li>-->
                    <li><a href = "../index.php#cntctus">Contact</a></li>
                    <li><a href = "../index.php#faq">FAQ</a></li>
                    <li><a href = "../index.php#about">About Us</a></li>
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
                                            ."<li><a href=\"../My_Account/shwple.php\">Show Profile</a></li>"
                                            ."<li><a href=\"../My_Account/edit.php\">Edit</a></li>"
                                            ."<li class = \"active\"><a href=\"#\">Booking History</a></li>"
                                            ."<li><a href=\"../My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>

        <!--Table-->
        <div class = "container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Room Type</th>
                        <th>Date</th>
                        <th>Timings</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>"
                                    ."<td>".$row['RM_NUM']."</td>"
                                    ."<td>".$row['RM_TYP_NAME']."</td>"
                                    ."<td>".$row['EN_DATE']."</td>"
                                    ."<td>".$row['TM_SLT_START']." - ".$row['TM_SLT_END']."</td>"
                                     ."<td> <a href=\"cancelReservation.php?val=".$row['EN_ID']."\">  <button name=\"btnCancel\" value=\"btnCancel\" class = \"btn btn-info\" on>Cancel Reservation</button> </a></td>
                                    </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

    <!--Javascript files-->
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    </body>

</html>