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
if(isset($_POST['logout'])){
		header('location:logout.php');
	}
	if(isset($_POST['shop'])){
		header('location:shopping.php');
	}
if(isset($_POST['delivered'])){
		$id=$_SESSION['id'];
		$q="delete from ord where userid=$id";
		mysqli_query($db,$q);
		sleep(2);
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
                
                padding: 10px 20px;
                
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
            <!--<h1 align="center"><dt>giftHUB</dt></h1></br>-->
			<h1><img src="images/logo.png" style="width:250px;height:90px;"></h1>
            <hr id="topBarHr">
            <h2 align="center">your dream giftstore at your fingertips</h2>    
        </div>
 </div><br><br>
 <h2 align="center">Your Order details:</h1>
<center>
<table>
<tr><th>Giftname</th><th>quantity</th><th>price</th><th>address</th><th>Cancel order</th></tr>
 <?php
	$cquery="delete from cart where userid=$id";
	mysqli_query($db,$cquery);
	$query="select * from ord where userid=$id";
	$result=mysqli_query($db,$query);
	while($row=mysqli_fetch_array($result))
	{
	$quan=$row['quantity'];
	echo '<tr><td>'.$row['giftname'].'</td><td>'.$row['quantity'].'</td><td>'.$row['price'].'</td><td>'.$row['address'].'</td>
<form action="" method="post">
<td><button class="btn btn-primary" name="del_ord" value="'.$row['ord_id'].'">Cancel</button></td>
</form>';
if(isset($_POST['del_ord'])){
	$ord_id=$_POST["del_ord"];
	if($quan==1){
	$query="delete from ord where userid=$id and ord_id=$ord_id and quantity=1";
	}
	else{
	$quan=$quan-1;
	$query="update ord set quantity=$quan where userid=$id and ord_id=$ord_id";
	}
	mysqli_query($db,$query);
	echo "<meta http-equiv='refresh' content='0'>";
}
}
echo'</tr></table></center>';
$query="select * from ord where userid=$id";
$result=mysqli_query($db,$query);
if($row=mysqli_fetch_array($result)){
echo '
 <h2 align="center">Your Order is Successfully Placed</h2>
<h3 align="center">Did the product delivered?<br><form action="" method="post">
<button class="btn btn-primary" name="delivered" onclick="myFunction()">Yes</button></form><p id="demo1"></p></h3>';}
?>

<form action="" method="post">
<center><br>
<button id="add" type="submit" name="shop" style="background-color:blue; color:white"><strong>go back to shopping</strong></button>
<br>
<br><button id="add" type="submit" name="logout"  style="background-color:blue; color:white"><strong>logout</strong></button>
</center>
</form>

<div class="absolute">
	<strong>Customer Care:<br>9663224114<br>help@giftHUB.com</strong>
</div>
<script type="text/javascript">
function myFunction() {
  document.getElementById("demo1").innerHTML = "Thank you for shopping with us";
}
</script>
</body>
 </html>
 
