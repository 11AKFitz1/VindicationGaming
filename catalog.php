<?php
include('database.php');
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['catalog.php']))
    {
        func3();
    }

function func3(){
    $user = $_SESSION['userUid'];
    
    $currentwallet = (int)$_SESSION['wallet'] - (int)$_SESSION['carttotal'];
    
    $sql = "UPDATE users SET wallet = ? WHERE uidUsers=?;";  
    $stmt = mysqli_stmt_init($conn);
    
        mysqli_stmt_bind_param($stmt, "si", $user, $currentwallet);
        mysqli_stmt_execute($stmt);
        unset($_SESSION['cart']);

       
}


$sql = "SELECT * FROM products;";
$query = mysqli_query($conn, $sql);


?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CAE Center - Software</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        #filter {
            background-color: gray;
        }

        .filterDiv {
            display: none;
        }

        .show{
            display: block;
        }
    </style>
</head>
<body>
    <?php
    include 'Navbar.php';

    ?>
	<div class="cotainer-fluid">
        <div class="row text-center">
            <div class="col-md-1" id="filter">
                <br>
                <h2>Catalog</h2>
                <h3>Sort by</h3>
                <div class="btn-group-vertical sortButtons" role="group" aria-label="...">
                    <br>
                    <a role="button" class="btn btn-info fbutton" onclick="filterSelection('all')" href="catalog.php">All</a>
                    <br>
                    <a href="#" role="button" class="btn btn-info fbutton" onclick="filterSelection('Office')">Office</a>
                    <br>
                    <a href="#" role="button" class="btn btn-info fbutton" onclick="filterSelection('Development')">Development</a>
                    <br>
                    <a href="#" role="button" class="btn btn-info fbutton" onclick="filterSelection('OS')">Operating System</a>
                    <br>
                    <a href="#" role="button" class="btn btn-info fbutton" onclick="filterSelection('Graphics')">Graphics</a>
                    <br>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                <br>
                <table id="tableFilter" class="table table-borderless" align="Center">
                    <tbody>
                        <tr>
                    <?php
                         while ($row = mysqli_fetch_array($query)){
                     ?>
                            <td class="pr-4 filterDiv <?php echo $row['ptype']; ?>">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="<?php echo $row['pimg']; ?>" alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Name: <?php echo $row['pname']; ?></h4>
                                        <p class="card-text">Description: <?php echo $row['pdesc']; ?></p>
                                        <p class="card-text">Type: <?php echo $row['ptype']; ?></p>
                                        <p class="card-text">Price: <?php echo $row['price']; ?></p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="addtocart.php?id=<?php echo $row['productid']; ?>" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?></tbody>
                       <!--     <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info.</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info.</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info.</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info..</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info.</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info.</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info.</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info.</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                            <td class="pr-4">
                                <div class="card border-info mb-3" style="width: 300px;">
                                    <img class="card-img-top" src="..." alt="Product Image">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Name</h4>
                                        <p class="card-text">Some product info..</p>
                                        <a href="#" role="button" class="btn btn-info">View</a>
                                        <a href="#" role="button" class="btn btn-info">Add to Cart</a>
                                     </div>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include 'Footer.php'
    ?>
</body>
 <!--Scripts needed for bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/catalog.js"></script>
</html>