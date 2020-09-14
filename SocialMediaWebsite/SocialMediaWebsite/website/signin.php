<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css?version=51">
  <link rel="stylesheet" href="style.css">
</head>
<!-- <style>
    .cont{
        width: 50%;
        margin: 10px auto;
        background-color: #fff;
        border: 2px solid #e6e6e6;
        padding: 40px 50px;
    }
    .well{
        background-color: #660066;
    }
    #login{
        width: 20%;
        background-color: gray;
        color: white;
        transition: 0.5s;
    }
    #login:hover{
        width: 20%;
        background-color:#660066;
        color: white;
        transition: 0.5s;
    }


    
</style> -->
<body>

<!-- <div class="row"> -->
    <!-- <div class="col-sm-12"> -->
       <!--  <div class="well">
            <center><h1 style="color: white;">Connect to your buddies! ^_^</h1></center>
        </div> -->
    <!-- </div> -->
<!-- </div> -->
<!-- <div class="row"> -->
    <!-- <div class="col-sm-12"> -->
       <div class="well"> 
            <center><h1 style="color: aliceblue;">Connect to your buddies! ^_^</h1></center>
        </div> 
    <!-- </div> -->
<!-- </div> -->

    <div class="cont">
                <center><h3><strong>log in  ^_^</strong></h3></center>
                <form action="" method="post">
                        <h5>Enter your email</h5>
                        <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                    <br>
                    <h5>Enter your password</h5>
                        <input type="password" class="form-control" placeholder="Password" name="pw" required="required">
                    <br>
                    <center><button id="login" class="btn btn-outline-danger" name="login">log in</button></center>
                </form>
                  </div>


                  
            <div style="background: #fff; border-radius: 3px; max-width: 420px; padding: 15px; margin:auto;margin-top: 15px;color: #7b7b7b;" align="center">
                Don't have an account? <a href="signup.php">Sign Up</a> for free.<hr style="margin: 8px;">
            </div>
        </div>
    </div>

</body>
</html>

<?php
 session_start();
 if(isset($_POST['login'])){
 
    $con = mysqli_connect("localhost","root","","smapp") or die(mysql_error());
   

    $mail = $_POST['email'];
    $pass = $_POST['pw'];
    $pass = md5($pass);


  $qu = "select * from users where email = '$mail' and pw ='$pass'";
 	
 	$result = mysqli_query($con,$qu);
 	$row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id'];

 	if(mysqli_num_rows(mysqli_query($con , $qu)) > 0){

 		
 		header("Location: welcome.php");
 	}
 	else {
 		echo 'wrong email or password';
 	}
 }
?> 