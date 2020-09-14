<?php
    session_start();
    $con = mysqli_connect("localhost","root","","smapp");
?>


<!DOCTYPE html>
<html>
<head>
    <title>another user</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css?version=51">
    <link rel="stylesheet" type="text/css" href="style.css?version=51">
  <link rel="stylesheet" href="style.css">
</head>
<!-- <style>
    .cont{
        width: 40%;
        margin: 10px auto;
        background-color: #fff;
        border: 2px solid #e6e6e6;
        padding: 40px 50px;
    }
    #contLeft{
        width: 10%;
        float: left;
        height: 200px;
        background-color: #fff;
         border-radius: 100%;
        overflow: hidden;
       box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.34);
      border: 2px solid #ffffff;
        
    }
    #contRight{
        width: 47%;
        float: left;
       height: 150px;
        background-color: #fff;
        margin-top: 45px;
    }
    .contSmall{
        width: 25%;
        height: 10%;
        margin: 10px auto;
        background-color: #fff;
        border: 2px solid #e6e6e6;
        padding: 40px 50px;
    }

     #logout{
        width: 40%;
        height: 30px;
        background-color: #7777ff;
        color: white;
        transition: 0.5s;
    }
    #logout:hover{
        width: 40%;
        background-color:red;
        color: white;
        transition: 0.5s;
    }

    #choose{
        width: 40%;
        background-color: #7777ff;
        color: white;
        transition: 0.5s;
    }
    #choose:hover{
        width: 40%;
        background-color:red;
        color: white;
        transition: 0.5s;
    }
    #sub{
        width: 40%;
        background-color: #7777ff;
        color: white;
        transition: 0.5s;
    }
    #sub:hover{
        width: 40%;
        background-color:red;
        color: white;
        transition: 0.5s;
    }
#signup{
        width: 20%;
        background-color: gray;
        color: white;
        transition: 0.5s;
    }
    #signup:hover{
        width: 20%;
        background-color:#7777ff;
        color: white;
        transition: 0.5s;
    }
  </style> -->
<body>
    <div class="cont">
            <form action="" method="post">
                    <center><button id="logout" class="btn btn-outline-danger" name="back">
                    Back to your home page
                    </button></center>
            </form>
<div>
    <?php
    $recipient=$_SESSION['id'];
        $qu ="SELECT * from friend_requests  WHERE recipient='$recipient'";
        $result=mysqli_query($con,$qu);
        while ($row=mysqli_fetch_assoc($result)) {
            
        
        $sender=$row['sender'];
        $que = "select * from users where id = '$sender'";
    $results = mysqli_query($con,$que);
    
    while($row = mysqli_fetch_assoc($results)){

            $fname = $row['fname'];
            $lname = $row['lname'];
            $friend="reciver";
            echo '<div id = "post"><a href="anotherUser.php?id_user='.$sender.'&amp;friend='.$friend.'" style="color:black;">'.$fname." ".$lname.'</a></div>';
            echo '<center><button id="logout" type="submit" name="accept" class="button btn-outline-danger">Accept</button><center>';
         echo '<center><button id="logout" type="submit" name="reject" class="button btn-outline-danger">Reject</button><center>';
    // echo "<center>"."<img width='110' height='110' src='uploadedPics/".$row['photo']."'alt = 'Default Profile Pic'"."</center><br>";
    // echo "Gender : ".$row['gender'];
    // echo "<br>";
    // echo "Phone number : ".$row['phone'];
    // echo "<br>";
    // echo "Home town : ".$row['home'];
    // echo "<br>";
    // echo "Relationship status : ".$row['relationship'];
          }}



if(isset($_POST['accept'])){
    $request = "insert into friend (my_id,friend_id) 
    value ('$recipient','$sender')";
    $query = mysqli_query($con,$request);
    $requests = "delete from friend_requests where sender = '$sender' and recipient = '$recipient'";
    $quer = mysqli_query($con,$requests);
    $friend="sender";
    if($query && $quer){
echo " <script> alert(' eshtghal')</script>";
        //$friend="sender";
        
        //header('Location: anotherUser.php?id_user='.$sender.'&amp;friend='.$friend.''); 
    }
    else{
      echo " <script> alert(' no connection')</script>";
    }
 }
 // if(isset($_POST['reject'])){
 //     $request = "delete from friend_requests where sender = '$sender' and recipient = '$recipient'";
 //    $query = mysqli_query($con,$request);
    
 //    if($query){
 //        $friend="sender";
        
 //        header('Location: anotherUser.php?id_user='.$sender.'&amp;friend='.$friend.''); 
 //    }
 // }
    ?>

</div>
            <?php

if(isset($_POST['back'])){
        header("Location: welcome.php");
 }
  
 ?>
 </div>

  

</body>
</html>
<div>
    



 </div>