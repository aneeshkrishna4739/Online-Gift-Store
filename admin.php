<?php
	include('conn.php');
	
	if(isset($_POST['add_gift'])){
		$category= mysqli_real_escape_string($db, $_POST['category']);
		$giftname = mysqli_real_escape_string($db, $_POST['giftname']);
		$price = mysqli_real_escape_string($db, $_POST['price']);
		$img = mysqli_real_escape_string($db, $_POST['img']);
		$query = "INSERT INTO ".$category." (giftname,price,img) 
  			  VALUES('$giftname', '$price','$img')";
	    mysqli_query($db, $query);
		$reg=TRUE;
		array_push($errors, "<script type='text/javascript'>alert('Gift added successfully');window.location.href='admin.php';</script>");
	}
	if(isset($_POST['del_gift'])){
		header('location:del_gift');
	}
	if(isset($_POST['logout'])){
		header('location:logout.php');
	}
?>

<html>
    
    <head>
        
        <title>giftHUB</title>
        
        <style type="text/css">
            
            body{
                margin:0;
                
                padding:0;
                
                font-family: helvetica;
				background-color:aqua;
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
            
            h1{
                
                text-align: center;
                
                position:relative;
                
                top: 20px;
                
                font-size: 60px;
                
            }
            
            h2{
                text-align: center;
                
                font-size: 23px;
                
                font-weight: 100;
            }
			h3{
                text-align: center;
                
                font-size: 35px;
                
                font-weight: 100;
            }
            
            #topBarHr{
                
                width: 400px;
                
                height: 1px;
                
                border: none;
                
                background-color: black;
            }
            
            #adminForm{
                
                height: 420px;
                
                width: 100%;
                
                background-color:aqua;
                
            }
            
            #gift_add_table{
                text-align: center;
                
                float: left;
                
                border-right: 1px grey solid;
                
                padding-right: 200px;
                
                position: relative;
                
                top: 15px;
                
                left: 130px;

            }
            
            #del_gift_table{
                                
                margin-left: 300px;
                
                position:relative;
                
                top: 30px;
                
                float: left;
                
                text-align: center;
            }
            
            #add{
                
                position:relative;
                
                top: 5px;
            }
			#del{
                
                position:relative;
                
                top: 5px;
            }
            
            button{
                
                background-color: #c3cfef;
                
                padding: 5px 15px;
                
                color:white;
                
                border: none;
                
                border-radius: 10%;
            }
            
            .clear{
                
                float: none;
            }
            
            
        </style>
    </head>
    <body>
        <div id="topYellowBar">
            <div class="pageContainer">
                <!--<h1>giftHUB</h1>-->
				<h1><img src="images/logo.png" style="width:250px;height:100px;"></h1>
                <hr id="topBarHr">
                <h2>your dream giftstore at your fingertips</h2>
                
            </div>
        </div>
	<form action="" method="post">
		<div id="adminForm">
            <div class="pageContainer">
		<table id="gift_add_table">
					<tr><td><h2><b>Enter gift details</b></h2></tr></td>
					<tr><td>select the category</tr></td>
                    <tr><td>
					<select name="category" required>
						<option value="">category</option>
						<option value="anni" >anniversary card</option>
						<option value="bday" >Birthday</option>
						<option value="rakhi" >Rakhi</option>
						<option value="bouquets" >Bouquets</option>
					</select>
					</td></tr>
                    <tr><td> Enter Gift name</td></tr>
                    <tr><td><input type="text" name="giftname" placeholder="enter giftname" required></td></tr>
					<tr><td>Price</td></tr>
                    <tr><td><input type="int" name="price" placeholder="enter price" required></td></tr>
					<tr><td>Image source</td></tr>
                    <tr><td><input type="text" name="img" placeholder="enter image location" required></td></tr>
                    <tr><td><button id="add" type="submit" name="add_gift" style="background-color:blue"><strong>Add</strong></button></td></tr>
					
        </table>
		</div>
	</form>
	<form action="" method="post">
		<div class="pageContainer">
			<table id="del_gift_table">
			<tr><td><h2><b>delete gifts</b></h2></td></tr>
			<tr><td><button id="del" type="submit" name="del_gift" style="background-color:blue"><strong>delete</strong></button></td></tr>	
			</table>			
		</div>
		
		</div>
		
	</form>
	<form action="" method="post">
	<center>
	<button id="add" type="submit" align="center-left" style="background-color:blue" name="logout"><h2>Log out</h2></button>	
	</center>
	</form>
	<?php include("footer.php");?>
        
	</body>
</html>