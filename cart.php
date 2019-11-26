<?php
include('database.php');


$items = $_SESSION['cart'];
$cartitems = explode(",", $items);

/*    $username = mysqli_real_escape_string($db,$_POST['uname']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwrd']);

    $sql0 = 'insert into orders (username) VALUES ('.$_SESSION["username"].');';
    $sql1 = 'select orderid,productid FROM orders WHERE username ='.$_SESSION["username"].';';

    $sql2 = 'insert into order_products (orderid,productid,price) VALUES ('

    $result = mysqli_query($db,$sql0);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
*/

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>WebTech Cart</title>

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
				<h1 class="display-5 text-primary">Your Cart</h1>
			</div>
        </div>
        <br>
        <div class="row justify-content-center align-items-center">
             <div class="col-md-8">
                 <form method='post' action='cart.php'>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="row"><div align="Center">#</div></th>
                            <th scope="row"><div align="Center">Product</div></th>
                            <th scope="row"> <div align="Center">Price</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $i=1;
                        $balance ='';
                        foreach ($cartitems as $key=>$id){
                            $sql1 = "SELECT * FROM products where productid=".$id.";";
                            $query = mysqli_query($conn, $sql1);
                            $q = mysqli_fetch_assoc($query);
                            ?>
                        }
                        <tr>
                            <th class="align-middle" scope="row"><div align="Center">#</div></th>
                            <td><img src="" alt="Product Image" height="125"><?php echo $q['pname']; ?></td>
                            <td class="align-middle"><div align="Center"><?php echo $q['price']; ?></div></td>
                        </tr>
                        <?php
                        $total = $total + $q['price'];
                        $balance = $_SESSION['wallet'];
                        $i++;

                    }                    
                    $_SESSION['carttotal'] = $total;
                    ?>
                    </tbody>
                </table>
                <h3 class="text-primary" align="right">Your Balance: <?php echo $balance; ?></h3>
                <h3 align="right">Total Price: <?php echo $total; ?></h3>
                <div align="right"><button type="submit" class="btn btn-info">Purchase</button></div>
            </div>
        </div>
                </form>
        <?php
        include 'Footer.php';
        ?>
</body>
 <!--Scripts needed for bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>