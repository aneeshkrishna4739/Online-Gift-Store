<?php 
include('conn.php');
if(!isset($_SESSION['success']))
{
	header('location:index.php');
}
else
{
	$id=$_SESSION['id'];
}
if(isset($_POST['place'])){
	$q="select * from cart where userid=$id";
	$result=mysqli_query($db,$q);
	while($res=mysqli_fetch_array($result))
	{
	$userid=$res['userid'];
	$giftid=$res['giftid'];	
	$giftname=$res['giftname'];
	$quantity=$res['quantity'];
	$price=$res['price'];
	$address=mysqli_real_escape_string($db, $_POST['address']);
	$mode=mysqli_real_escape_string($db, $_POST['mode']);
	$query = "INSERT INTO ord (userid,giftid,giftname,quantity,price,address,mode) 
  			  VALUES('$userid','$giftid','$giftname','$quantity','$price','$address','$mode')";
	mysqli_query($db, $query);
	}
	$q1="select * from cart where userid=$id";
	$result=mysqli_query($db,$q1);
	if(!($res=mysqli_fetch_array($result))){
		echo "<script type='text/javascript'>alert('There are no orders'); window.location.href='order.php';</script>";
	}else{
	echo "<script type='text/javascript'>alert('order placed'); window.location.href='final.php';</script>";
	}
}
if(isset($_POST['logout'])){
		header('location:logout.php');
	}
	if(isset($_POST['shop'])){
		header('location:shopping.php');
	}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style >
body{
background-color: orange;
                margin:0;
                
                padding:0;
                
                font-family: helvetica;
            }
			button{
                
                background-color: #c3cfef;
                
                padding: 5px 15px;
                
                color:black;
                
                border: none;
                
                border-radius: 10%;
            }
#topYellowBar{
                
                width:100%;
                
                height: 200px;
                
                background-color:yellow;
            
            }
            
            .pageContainer{
                
                width: 1200px;
                
                margin:0 auto;
            }
			#topBarHr{
                
                width: 400px;
                
                height: 1px;
                
                border: none;
                
                background-color: black;
            }
			 h1{
                
                text-align: center;
                
                position:relative;
                
                top: 20px;
                
                font-size: 60px;
                
            }
            
            h2{
                text-align: center;
                
                font-size: 35px;
                
                font-weight: 100;
            }
			h3{
                
                margin-top: 0;
                
                position: relative;
                
                top: 15px;
                
                text-align: center;
                
                color: black;
                
                font-size: 25px;                               
            }
			div.absolute {
			position: absolute;
			width: 30%;
			bottom: 10px;
			border: black;
			}
			footer {
			font-size: 25px;
			text-align: center;
			position: absolute;
			bottom: 0;
			width: 100%;
			height: 50px;
}

			table {
  width:60%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
<body>
 <div id="topYellowBar">
        <div class="pageContainer">
            <!--<h1 align="center"><dt>giftHUB</dt></h1>-->
			<h1><img src="images/logo.png" style="width:250px;height:90px;"></h1></br>
            <hr id="topBarHr">
            <h2 align="center">your dream giftstore at your fingertips</h2>    
        </div>
 </div>
<h2 align="center">Your cart:</h2>
 <center>
<table>
<tr><th>Giftname</th><th>quantity</th><th>price</th><th>Remove</th></tr>
<?php 
$query="select * from cart where userid=$id";
$result=mysqli_query($db,$query);
$total_price=0;
while($row=mysqli_fetch_array($result)){
	$giftid=$row['giftid'];
	$quan=$row['quantity'];
	$total_price=$total_price+$row['price']*$quan;
echo '
<tr><td>'.$row['giftname'].'</td><td>'.$row['quantity'].'</td><td>'.$row['price']*$quan.'</td>
<form action="" method="post">
<td><button class="btn btn-primary" name="del_cart" value="'.$row['giftid'].'">delete</button>
</form>';
if(isset($_POST['del_cart'])){
	$giftid=$_POST["del_cart"];
	if($quan==1){
	$query="delete from cart where userid=$id and giftid=$giftid and quantity=1";
	}
	else{
		$quan=$quan-1;
	$query="update cart set quantity=$quan where userid=$id and giftid=$giftid";
	}
	mysqli_query($db,$query);
	echo "<meta http-equiv='refresh' content='0'>";
};

}
echo'</td></tr></table></center>';
echo '<h3>total cost:'.$total_price.'</h3>';
?>
<section>
<form action="" method="post">
<h3 align="center">Enter Your Address:<br><input name="address" type="text" placeholder="enter your address" required></h3>
<h3 align="center">Mode of delivery</h3>
<p align="center">
  <select name="mode" required>
	<option value="">select</option>
	<option value="cod">Cash on delivery</option>
	<option value="upi"> UPI</option>
	<option value="card">Debit card or Credit card</option>
  </select>	
</p>
<h3 align="center">
	<button id="add" type="submit" name="place" style="background-color:blue; color:white"><strong>place order</strong></button>
</h3>
</form>
</section>
<section>
<form action="" method="post">
<center><br>
<button id="add" type="submit" name="shop" style="background-color:blue; color:white"><strong>go back to shopping</strong></button>
<br>
<br><button id="add" type="submit" name="logout"  style="background-color:blue; color:white"><strong>logout</strong></button>
</center>
</form>
</section>


<div class="absolute">
	<strong>Customer Care:<br>9663224114<br>help@giftHUB.com</strong>
</div>

<script>
function myFunction() {
  document.getElementById("demo1").innerHTML = "Your order is cancelled";
}
</script>
<?php include("footer.php");?>
</body>
</html>		
		