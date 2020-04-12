<!doctype html>
<html>
    <head>
        <title>About Us</title>
        <style type="text/css">
            body{
                margin: 0;
                padding: 0;
                font-family: helvetica;
                text-align: center;
            }
            
            #topYellowBar{
                width: 100%;
                height: 200px;
                background-color: yellow;
                
            }
            h1{
                text-align: center;
                font-size: 60px;
                position: relative;
                top: 20px;
                margin: 0;
            }
            #topBarHr{
                width: 400px;
                height: 1px;
                border: none;
                background-color: black;
                margin-top: 40px;
            }
            .pageContainer{
                width: 1200px;
                margin: 0 auto;
                
            }
            h2{
                text-align: center;
                font-size: 23px;
            }
            .content{
                float: left;
                color: white;
                width: 200px;
                text-align: center;
                margin: 0 50px;
                position: relative;
                top: 40px;
            }
            h3{
                font-weight: 100;
            }
            .clear{
               clear: both;
               
            }
			
            #bottomYellowBar{
                width: 100%;
                height: 80px;
                background-color: #FFC30A;
            }
            input{
                padding: 10px;
                border-radius: 5px;
                border: none;
                width: 200px;
            }
            #subButton{
                padding: 10px;
                border-radius: 5px;
                border: none;
                background-color: white;
            }
            #subForm{
                position: relative;
                top: 25px;
            }
            #bottomGreyBar{
                width: 100%;
                height: 50px;
                background-color: #EEEEEE;
            }
            #copyright{
                position: relative;
                top: 18px;
                margin: 0;
                font-size: 15px;
            }
			
        </style>
    </head>
    <body>
        <div id="topYellowBar">
            <div class="pageContainer">
                <!--<h1>giftHUB</h1>-->
				<h1><img src="images/logo.png" style="width:250px;height:100px;"></h1>
                <hr id="topBarHr">
                <h2>About Us</h2>
            </div>    
        </div>
        
        <div class="pageContainer">
            <div>
                <h2>GIFTS</h2>
            </div>
            <br>
            <div>
                <img src="images/gifts.png">
            </div>
            <br><br>
			
            <div>
                <h2>EXPERIENCES</h2>
            </div>
            <br>
            <div>
                <img src="images/Experiences.png">
            </div>
            <br><br>
        </div>
		<a href="index.php" class="btn btn-primary">Go back to home page</a>
        <div id="bottomYellowBar">
            <div id="subForm">
                <input type="email" placeholder="Enter Email">
                <a href=""><button id="subButton">Subscribe</button></a>				
            </div>
        </div>
        <div id="bottomGreyBar">
            <p id="copyright">© 2019 GiftHUB Pvt. Ltd.</p>
        </div>
    </body>
</html>