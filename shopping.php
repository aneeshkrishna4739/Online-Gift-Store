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

if(isset($_POST['checkout'])){
	$q1="select * from cart where userid=$id";
	$result=mysqli_query($db,$q1);
	if(!($res=mysqli_fetch_array($result))){
		echo "<script type='text/javascript'>alert('There are no items in cart'); window.location.href='shopping.php';</script>";	
	}else{
		header('location:order.php');
	}
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
                
                color: white;
                
                font-size: 25px;
                
            }
			
			div.gallery:hover {
				
				background-color:#9999ff;
			}
			
.select-style {
	
    border: 1px solid #ccc;
    width: 150px;
    border-radius: 3px;
    overflow: hidden;
    background: #fafafa no-repeat 90% 50%;
}

.select-style select {
    padding: 5px 8px;
    width: 130%;
    border: none;
    box-shadow: none;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
}

.select-style select:focus {
    outline: none;
}

</style>
<body>
 <div id="topYellowBar">
            <div class="pageContainer">
                <!--<h1 align="center"><dt>giftHUB</dt></h1></br>-->
				<h1><img src="images/logo.png" style="width:250px;height:100px;"></h1>
                <hr id="topBarHr">
                <h2 align="center">your dream giftstore at your fingertips</h2>
				<h4 align="right"></h4>                
            </div>
</div>
<?php 
$q="SELECT *from cart where userid='$id'";
$res=mysqli_query($db,$q);
$count=mysqli_num_rows($res);


?>
<div class="container-fluid" align="right">
		<label><b><span><?php print $count;?></span></b></label><img src="images/cart.png" width="40" height="40"><br>
		<form action="" method="post">
		<input type="submit" name="checkout" class="btn btn-primary" value="checkout"/>
		</form>
	</div>
<div id="banner" align="center">
	<label>Choose the category:</label>
	<div  class="inline-block" align="center">
	<div class="select-style">
	<form action="" method="get">
	<select name="cat" onchange="javascript:submit();">
		<option value="">select</option>
		<option value="anni">Anniversary cards</option>
		<option value="bday">Birthday cards</option>
		<option value="rakhi">Rakhis</option>
		<option value="bouquets">Bouquets</option>
	</select>
	</form>
	</div>
	</div>
	
</div>
<?php 
$val="";
if(isset($_GET['cat']))
{
	$val=$_GET['cat'];
	if($val=="anni")
	{	
		
		echo '<div class="container">
  <h2 align="center"><b><strong>Anniversary cards</strong></b></h2>
  <div class="card-columns">';
		$query="SELECT * from anni order by giftid";
		$result=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($result))
		{
			echo '<div class="card">
	<div class="gallery">
		<div class="card-body text-center">
		<img class="card-img-top" src="'.$row['img'].'" style="width:200px;height:250px;">    
		<h4 class="card-text">'.$row['giftname'].'<br>Rs:'.$row['price'].'</h4>
		
			<a href="processcart.php?id='.$row['giftid'].'&cat=anni" class="btn btn-primary">Add to cart</a>
		</div>
    </div>
	</div>';
		}
		
		echo '</div>
 </div>';
	}
}
if($val=="bday")
	{
		echo '<div class="container">
  <h2 align="center"><b><strong>Birthday cards</strong></b></h2>
  <div class="card-columns">';
		$query="SELECT * from bday order by giftid";
		$result=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($result))
		{
			echo '<div class="card">
	<div class="gallery">
		<div class="card-body text-center">
		<img class="card-img-top" src="'.$row['img'].'" style="width:200px;height:250px;">    
		<h4 class="card-text">'.$row['giftname'].'<br>Rs:'.$row['price'].'</h4>
			<a href="processcart.php?id='.$row['giftid'].'&cat=bday" class="btn btn-primary">Add to cart</a>
		</div>
    </div>
	</div>';
		}
		
		echo '</div>
 </div>';
	}
	if($val=="rakhi")
	{
		echo '<div class="container">
  <h2 align="center"><b><strong>Rakhis</strong></b></h2>
  <div class="card-columns">';
		$query="SELECT * from rakhi order by giftid";
		$result=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($result))
		{
			echo '<div class="card">
	<div class="gallery">
		<div class="card-body text-center">
		<img class="card-img-top" src="'.$row['img'].'" style="width:200px;height:250px;">    
		<h4 class="card-text">'.$row['giftname'].'<br>Rs:'.$row['price'].'</h4>
		
		<a href="processcart.php?id='.$row['giftid'].'&cat=rakhi" class="btn btn-primary">Add to cart</a>
		</div>
    </div>
	</div>';
		}
		
		echo '</div>
 </div>';
	}
	if($val=="bouquets")
	{
		echo '<div class="container">
  <h2 align="center"><b><strong>Bouquets</strong></b></h2>
  <div class="card-columns">';
		$query="SELECT * from bouquets order by giftid";
		$result=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($result))
		{
			echo '<div class="card">
	<div class="gallery">
		<div class="card-body text-center">
			<img class="card-img-top" src="'.$row['img'].'" style="width:200px;height:250px;">    
			<h4 class="card-text">'.$row['giftname'].'<br>Rs:'.$row['price'].'</h4>
			
			<a href="processcart.php?id='.$row['giftid'].'&cat=bouquets" class="btn btn-primary">Add to cart</a>
			
		</div>
    </div>
	</div>';
		}
		
		echo '</div>
 </div>';
	}
	
	?>	

<h2 align="center">
	<button align="center-left"><a href="logout.php">Log out</a></button>	
</h2>
<p style="top: 15px;text-align: center;color: black;font-size: 25px">
	<strong>Customer Care:<br>9663224114<br>help@giftHUB.com</strong>
</p>
<?php include('footer.php');?>
</body>

</html>