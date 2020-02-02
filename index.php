<?php
    require_once 'cnntdb.php';


    connect();

  //  $sql = "SELECT Uname, Rname, fdate FROM BkingDetail WHERE tdate < '".date('Y-m-d')."' AND status = 'active'";
    $sql = "SELECT * FROM users";

    while($record = mysqli_fetch_array($output))
{
    echo "<tr>";
    echo "<td>".$record['usr_id']."</td>";
   
    echo "</tr>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="">
  <title>Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/RmBkingSys.css">
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"></head>

<body>

    <!--Navigation Bar-->
    <nav class = "navbar navbar-default">
        <div class = "container-fluid">
            <div class = "navbar-header">
                <a class = "navbar-brand" href="index.php"></a>
            </div>
            <div>
                <ul class = "nav navbar-nav">
                    <li class = "active"><a href = "#">Home</a></li>
                    <li><a href = "reservation_form1.php">Reservation</a></li>
                    <li><a href = "brwsrm.php">Room Availability</a></li>
                    <li><a href = "upmingents.php">Upcoming Events</a></li>
                    <li><a href = "#cntctus">Contact</a></li>
                    <li><a href = "#faq">FAQ</a></li>
                    <li><a href = "#about">About Us</a></li>
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
    </nav>

    <!--Page Content-->

    <!-- Header -->
    <header>
        <!--<?php
                     if (!isset( $_COOKIE['success'] )) { echo "<div class=\"alert alert-success\" role=\"alert\">".$_COOKIE['success']."</div>";
                        }
                    ?>-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Room Reservation for Meetings</span>
                        <span class="skills">Book your room here!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class = "container-fluid" style = "background-color: grey; height: 20px"></div>
    <br><br><br><br>

    <!--Contact Us-->
    <div class = "container containerStyle" id = "cntctus">
        <div class="row ImageBackground">
            <!--<h1 class = "">Contact Us:</h1>-->
            <div class="col-sm-4">
                <div class="">
                    <h3>Meeting Rooms</h3>
                   <img src="Images\meetingroom.jpg" alt="Meeting Rooms">
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="">
                    <h3>Conference Rooms</h3>
                   <img src="Images\conference1.jpg" alt="Conference Rooms">
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="">
                     <h3>Co-working space</h3>
                   <img src="Images\coworkingspace.jpg" alt="Co-working space">
                 
                </div>
            </div>
        </div>
    </div>

    <div class = "container-fluid" style = "background-color: grey; height: 20px"></div>
    <br><br><br><br>

    <!--About Us-->
    <div class = "container" id = "description">
        <h2 class="textStyle">Points to know!</h2>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                <p class="font-italic">
                    Meeting rooms generally fit in 4 to 5 people. It is basically used for team stand ups or any personal discussions.
                </p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                    <p class="font-italic">
                    Conference rooms are for a larger group, for more official meetings and other high level meetings. It fits in upto 8 people.
                </p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
         <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                    <p class="font-italic">
                   Co-working spaces are for individual work environment, the atmosphere is so soothing and calming. 
                </p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>


    <div class = "container-fluid" style = "background-color: grey; height: 20px"></div>
    <br><br><br><br>

    <!--FAQ-->
    <div class="container" id = "faq">
        <h2>FAQ'S:</h2>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">How can I cancel the Booking?</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">Sorry! Still even I don't know that!!!</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">How can I see my Booking History?</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Sorry! Still even I don't know that!!!</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">How to book a room?</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Click on the 'Reservation' tab and follow the instructions in that page and proceed to book a room.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">How can I edit my User details?</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">First Login to your account. Then Click on 'My Account' tab in the top-right corner and select 'Edit' in the drop down menu.</div>
                </div>
            </div>
        </div> 
    </div>

    <br><br>
    <div class = "container-fluid" style = "background-color: green; height: 20px"></div>
    <br><br><br><br>

    <!--About Us-->
    <div class = "container" id = "about">
        <h2>About Us:</h2>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                <h4 class="text-justify">
                    
                </h4>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                    <h4 class="text-justify">
                   
                </h4>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>

    <!--Javascript Files-->
    <script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>