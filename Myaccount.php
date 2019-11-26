<?php
include('database.php');
session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Myaccount.php']))
    {
        func();
    }

    function func()
    {
        $user = $_SESSION['userUid'];
        $newpwrd = $_POST['newpwrd'];
        $sql = "UPDATE users SET pwdUsers = ? WHERE uidUsers=?;";  
        $stmt = mysqli_stmt_init($conn);
        
            mysqli_stmt_bind_param($stmt, "ss", $newpwrd, $user);
            mysqli_stmt_execute($stmt);
    }

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Webtech my account</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
</head>
<body>
    <?php
    include 'Navbar.php';

    ?>
	<div class="cotainer-fluid">
		<br>
		<div class="row text-center">
			<div class="col-md-12">
				<h1 class="text-primary" align="Center">My Account</h1>
			</div>
        </div>
        <br>
        <div class="row justify-content-center align-items-center">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                    <form action='Myaccount.php' method='post'>
                        <div class="form-group row">
                            <div class="col">
                                <h2 align="Center">Account Settings</h2>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <div class="input-group input-group-lg">
                                    <input type="Password" class="form-control" placeholder="Current Password" name="origpwrd">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="Password" class="form-control"  placeholder="New Password" name="newpwrd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <div class="input-group input-group-lg">
                                    <input type="Password" class="form-control" placeholder="Confirm New Password" name="pwrd">
                                </div>
                            </div>
                        </div>
                        <div align="Center">
                            <button type="submit" class="btn btn-info">
                                <h4>Change Password</h4>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <br>
                    <h2 align="Center">Delete Account</h2>
                    <form method = 'post' action='Landingpage.php'><div align="Center">
                        <button type="submit" onclick= class="btn btn-info">
                                <h4>Delete Account</h4>
                            </button>
                    </div>
    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'Footer.php';
    ?>
</body>
 <!--Scripts needed for bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>