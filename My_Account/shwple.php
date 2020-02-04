<?php
	require_once '../cnntdb.php';

	connect();

	$sql = "SELECT * FROM Users WHERE USR_USERNAME = '".$_COOKIE['user']."'";
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
                                            ."<li><a href=\"../root_user/adrm.php\">Add Room</a></li>"
                                            ."<li><a href=\"../root_user/delrm.php\">Delete Room</a></li>"
                                            ."<li><a href=\"../root_user/rmresvion.php\">Cancel Reservation</a></li>"
                                            ."<li><a href = \"../root_user/rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"../root_user/rtlogout.php\">Log Out</a></li>"
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
                                            ."<li class = \"active\"><a href=\"#\">Show Profile</a></li>"
                                            ."<li><a href=\"edit.php\">Edit</a></li>"
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

    <!--div class = "container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                </tr>
            </tbody>
        </table>
    </div-->

    <div class = "container">
    	<table class="table table-hover">
        	<thead>
          		<tr>
            		<th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
            	</tr>
        	</thead>
        	<tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>".$row['USR_USERNAME']."</td>
                                    <td>".$row['USR_FNAME']."</td>
                                    <td>".$row['USR_LNAME']."</td>
                                    <td>".$row['USR_EMAIL']."</td>
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