<?php
if (isset($_GET['id']);) {
    $id = isset($_GET['id']);
    $sql = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
    $productCount = mysql_num_rows($sql);
    if ($productCount > 0) {
        # code...
        while ($row =mysql_fetch_array($sql)) {
            $id = $row['productid'];
            $product_name = $row['pname'];
            $price = $row['price'];
            $desc = $row['pdesc'];
        }
    } else {
        echo "Item doesn't exist";
    }
} else {
    echo "data is missing";
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>WebTech Catalog</title>

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
	<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><h3>Company Name</h3></a>
		<div class="collapse navbar-collapse flex-md-column">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><h4>Catalog</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><h4>My Account</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter"><h4 class="text-info">Log In</h4></a>
            </li>
            </ul>
		</div>
	</nav>-->
    <?php
    include 'Navbar.php';

    ?>
	<div class="cotainer-fluid">
        <div id="bgimg">
        <br>
        <br>
        <br>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <table class="table table-borderless">
                <tbody>
                    <thead>
                        <th><h4 align="Center"><?php $product_name ?></h4></th>
                        <th><h4 align="Center">$$</h4></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div align="Center">
                                    <img src="#" alt="Product Image" height="300">
                                </div>
                            </td>
                            <td class="align-middle">
                                <h4>Product Details</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><div align="Center"><a href="catalog.php" role="button" class="btn btn-info">Back to Catalog</a></div></td>
                            <td><div align="Center"><a href="#" role="button" class="btn btn-info">Add to Cart</a></div></td>
                        </tr>
                    </tbody>
                </tbody>
            </table>
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