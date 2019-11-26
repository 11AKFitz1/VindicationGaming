<?php
include('database.php');
session_start();

if(isset($_GET['id']) & !empty($_GET['id'])){
    $items = $_GET['id'];
    $_SESSION['cart'] = $items;
    header('location: catalog.php?status=success');
}else{
header('location: catalog.php?status=failed');
}

if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
	$items = $_SESSION['cart'];
	$cartitems = explode(",", $items);
	if(in_array($_GET['id'], $cartitems)){
        header('location: catalog.php?status=incart');
    }else{
        $items .= "," . $_GET['id'];
        $_SESSION['cart'] = $items;  
        header('location: catalog.php?status=success'); 
    }
}

    ?>