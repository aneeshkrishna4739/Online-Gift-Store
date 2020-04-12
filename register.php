<?php
include("conn.php");

$username = "";
$email    = "";


// REGISTER USER
if (isset($_POST['Submit'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phno = mysqli_real_escape_string($db, $_POST['phno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
//echo $username.$email.$phno.$password;


  $user_check_query = "SELECT * FROM register WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] == $email) {
      array_push($errors, "<script type='text/javascript'>alert('Email already exists');</script>");
    }
	
  }

  
  if (count($errors) == 0) {
  	$password = md5($password);

  	$query = "INSERT INTO register (username,phone,email, password) 
  			  VALUES('$username','$phno', '$email', '$password')";
  	mysqli_query($db, $query);
        $reg=TRUE;
  array_push($errors, "<script type='text/javascript'>alert('Registered Successfully Please Login');window.location.href='index.php';</script>");
  }
}
?>
<html>

    <head>
    
        <title>Register!</title>
        
        <style type="text/css">
        
            body{
                
                margin: 0;
                
                padding: 0;
                
                font-family: helvetica;
            
            }
            
            #topBar{
                
                width: 100%;
                
                height: 200px;
                
                background-color: yellow;
                
            }
            
            .pageContainer{
                
                width: 1200px;
                
                margin: 0 auto;
                
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
            
            #registerForm{
                
                background-color: aqua;
                
                height: 460px;
                
                margin: 0 auto;
                
                text-align: center;
                
            }
            
            table{
                
                text-align: center;
                
                margin: 0 auto;
                
                position: relative;
                
                top: 30px;
                
            }
            
            td{
                
                font-size: 20px;
                
                padding: 10px;
                                
            }
            
            input{
                
                padding: 10px;
                
                border-radius: 100px;
                
                border: none;
                
                font-size: 20px;
                
            }
            
            button{
                
                background-color: #FF3E41;
                
                border: none;
                
                padding: 15px 30px;
                
                color: white;
                
                font-size: 20px;
                
                border-radius: 100px;
                
                margin-top: 10px;
                
                text-align: center;
                
            }
            
            p{
                
                margin-top: 50px;
                
            }
        
        </style>
    
    </head>
    
    <body>
        
        <div id="topBar">
            
            <div class="pageContainer">

                <!--<h1>giftHUB</h1>-->
				<h1><img src="images/logo.png" style="width:250px;height:100px;"></h1>
                
                <hr id="topBarHr">
                
                <h2>Register</h2>

            </div>
    
        </div>
        <form action="" method="post">
        <div id="registerForm">
        
            <div class="pageContainer">

                
                    
                    <table>
                
                        <tr>

                            <td>FULL NAME</td>

                            <td>MOBILE NO.</td>

                        </tr>

                        <tr>

                            <td><input name="username" type="text" placeholder="John Wick" required></td>

                            <td><input name="phno" type="tel" placeholder="+91" required></td>

                        </tr>

                        <tr>

                            <td>EMAIL</td>

                            <td>PASSWORD</td>

                        </tr>

                        <tr>

                            <td><input name="email" type="email" placeholder="johnwick@mail.com" required></td>

                            <td><input name="password" type="password" placeholder="**********" required></td>

                        </tr>

                    </table>
					<p>
                    <input id="accept" name="accept" type="checkbox" />I have read terms and conditions<br>  
					</p>
					<p>
					<input id="submitbtn" disabled="disabled" name="Submit" type="submit" value="Submit">
					</p>
            </div>
            
        </div>
		</form>
		<script type="text/javascript">
           
           var checker = document.getElementById('accept');
		   var sendbtn = document.getElementById('submitbtn');
		   checker.onchange = function(){
		   if(this.checked){
		   sendbtn.disabled = false;
		   } else {
		   sendbtn.disabled = true;
}

}           
        </script>
		<?php include("footer.php");?>
        
    </body>

</html>