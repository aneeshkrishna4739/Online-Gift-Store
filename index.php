<?php
include('conn.php');
if (isset($_POST['login_usr'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if($email=="admin@gmail.com" and $password=="admin"){
	  header('location:admin.php');
  }
  	$password = md5($password);
  	$query = "SELECT * FROM register WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
        $name= mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) //return a row if success
            {
  	 // $_SESSION['email'] = $name['email'];
          $_SESSION['id']=$name['userid'];
          $_SESSION['success']=TRUE;
  	  header('location: shopping.php');
  	}else {
  		array_push($errors, "<script type='text/javascript'>alert('Wrong Email/Password Combination');</script>");
  	}
  
}
if (isset($_POST['register_usr'])){
	header('location: register.php');
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
            
            #topBarHr{
                
                width: 400px;
                
                height: 1px;
                
                border: none;
                
                background-color: black;
            }
            
            #loginForm{
                
                height: 210px;
                
                width: 100%;
                
                background-color:aqua;
                
            }
            
            #loginFormTable{
                text-align: center;
                
                float: left;
                
                border-right: 1px grey solid;
                
                padding-right: 200px;
                
                position: relative;
                
                top: 15px;
                
                left: 130px;

            }
            
            #signUpFormTable{
                                
                margin-left: 300px;
                
                position:relative;
                
                top: 30px;
                
                float: left;
                
                text-align: center;
            }
            
            #login{
                
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
            
            #featuresBar{
                
                width: 100%;
                
                height:380px;
                
                background-color: #FF3E41;
                
            }
            
            h3{
                
                margin-top: 0;
                
                position: relative;
                
                top: 10px;
                
                text-align: center;
                
                color: white;
                
                font-size: 40px;
                
                
                
            }
            
            #featuresHr{
                
                border: none;
                
                height: 1px;
                
                background-color: white;
            }
            
            #featureTable{
                
                color: white;
                
                font-size: 30px;
                
                margin: 0 auto;
                
                text-align: center;
                
            }
            
            .featureTd{
                
                padding: 20px 170px;
            }
            
        </style>
    </head>
    <body>
        <div id="topYellowBar">
            <div class="pageContainer">
                <h1>giftHUB</h1>
				<!--<h1><img src="images/logo.png" style="width:250px;height:100px;"></h1>-->
                <hr id="topBarHr">
                <h2>your dream giftstore at your fingertips</h2>
                
            </div>
        </div>
		<form action="" method="post">
        <div id="loginForm">
            <div class="pageContainer">
                <table id="loginFormTable">
                    <tr><td><h2>Already a member, Login!</h2></td></tr>
                    <tr><td>Email</td></tr>
                    <tr><td><input type="email" name="email" placeholder="enter your email" ></td></tr>
                    <tr><td>Password</td></tr>
                    <tr><td><input type="password" placeholder="enter password" name="password" ></td></tr>
                    <tr><td><button id="login" type="submit" name="login_usr" style="background-color:blue"><strong>Login</strong></button></td></tr>
                </table>
            </div>
			</form>
			<form action="" method="post">
            <div id="signUpForm">
                <table id="signUpFormTable">
                    <tr><td><h2>Haven't Signed Up yet?</h2></td></tr>
                    <tr><td><button id="register" type="submit" name="register_usr" style="background-color:blue"><strong>Sign Up</strong></a></button></td></tr>
                    
                </table>
            </div>
                
			</form>
			
        </div>
	
        <div class="clear"></div>
        <div id="featuresBar">
            <div class="pageContainer">
                <h3>Our Features</h3>
                <hr id="featuresHr">
                <table id="featureTable">
                    <tr>
                        <td class="featureTd">Fast Delivery</td>
                        <td class="featureTd">Premium Quality</td>
                    </tr>
                    <tr>
                        <td class="featureTd">Low Pricing</td>
                        <td class="featureTd">Refund</td>
                    </tr>
                    <tr>
                        <td class="featureTd">Exciting discounts</td>
                        <td class="featureTd">Customer Care</td>
                    </tr>
					<center><button style="background-color:yellow"><a href="about.php" ><b>About us</b></a></button></center>
                </table>
				
            </div>
                
        </div>

		<?php include('footer.php');?>
    </body>
</html>