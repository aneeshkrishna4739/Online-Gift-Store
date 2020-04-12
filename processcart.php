<?php
include('conn.php');
if(!isset($_SESSION['id']))
{
	header('location:index.php');
}
else
{
	$id=$_SESSION['id'];
}

if(isset($_GET['id']) and isset($_GET['cat']))
{
	$giftid=$_GET['id'];
	$cat=$_GET['cat'];
	//echo $giftid." ".$cat;
	$cart_check_query = "SELECT * FROM cart WHERE giftid='$giftid' and userid='$id'";
  $result = mysqli_query($db, $cart_check_query);
  $cart = mysqli_fetch_assoc($result);
  
  if ($cart) { // if user exists
  $quan=$cart['quantity'];
  $quan=$quan+1;
   $q1="UPDATE cart SET quantity='$quan' WHERE userid='$id' and giftid='$giftid'";
   mysqli_query($db,$q1);
   echo "<script type='text/javascript'>window.location.href='shopping.php?cat=$cat';</script>";
	
  }
  else{
$q="SELECT * from ".$cat." WHERE giftid=$giftid";
$result=mysqli_query($db,$q);
$res=mysqli_fetch_assoc($result);
$price=$res['price'];
$giftname=$res['giftname'];
	$query="INSERT INTO cart VALUES(null,'$id','$giftid','$giftname','1','$cat','$price')";
	mysqli_query($db,$query);
	echo "<script type='text/javascript'>window.location.href='shopping.php?cat=$cat';</script>";
}
}

?>