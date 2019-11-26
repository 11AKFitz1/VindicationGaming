<?php 
session_start();


echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">';
echo '<a class="navbar-brand" href="Landingpage.php"><img src="Images/Webtechlogo.png" alt="Logo" height="75"></a>';
echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>';
echo '<div class="collapse navbar-collapse flex-md-column" id="navbarColor03">';
echo '<ul class="navbar-nav ml-auto">';                     
echo '<li class="nav-item"><a class="nav-link" href="catalog.php"><h4>Catalog</h4></a></li>';
echo '<li class="nav-item"><a class="nav-link" href="cart.php"><h4>My Cart</h4></a></li>';


//echo '<li class="nav-item"><a class="nav-link" href="Myaccount.php"><h4>My Account</h4></a></li></ul>';
//echo '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter"><h4 class="text-info">Log In</h4></a></li></ul></div></nav>';

if (isset($_SESSION['userId'])) {    
	echo '<li class="nav-item"><a class="nav-link" href="Myaccount.php"><h4>Wallet: '.$_SESSION['wallet'].'</h4></a></li></ul>';
	echo '<li class="nav-item"><a class="nav-link" href="Myaccount.php"><h4>My Account</h4></a></li></ul>';
} else {
	echo "</ul>";
}
if (isset($_SESSION['userId'])) {
	echo '<form class="form-inline ml-auto" action="/logout.php" method="post">
					<button type="submit" class="btn btn-info" name="logout-submit">
						Log out
					</button>
				</form>';
} else {
	echo '<form class="form-inline ml-auto" action="/Loginpage.php" method="post">
					<button type="submit" class="btn btn-info my-2- my-sm-0" name="login-submit">
					Log in
					</button>
				</form>';}
echo '</div></nav>';

?>
