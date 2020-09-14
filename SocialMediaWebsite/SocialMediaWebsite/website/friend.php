<?php
    session_start();
    $con = mysqli_connect("localhost","root","","smapp");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Friends</title>
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
$myId=$_SESSION['id'];
$query="select * from friend where my_id = $myId or friend_id = $myId";
$result=mysqli_query($con,$query);
    while( $row = mysqli_fetch_assoc($result)){
        $my_id=$row['my_id'];
        $friend_id=$row['friend_id'];
        if($my_id != $myId)
        {
             $que = "select * from users where id = '$my_id'";
    $results = mysqli_query($con,$que);
    
    while($rows = mysqli_fetch_assoc($results)){

            $fname = $rows['fname'];
            $lname = $rows['lname'];
            $friend="sender";
            echo '<div id = "post"><a href="anotherUser.php?id_user='.$my_id.'&amp;friend='.$friend.'" style="color:black;">'.$fname." ".$lname.'</a></div>';
            
        }}
        else{
            $que = "select * from users where id = '$friend_id'";
    $results = mysqli_query($con,$que);
    
    while($rows = mysqli_fetch_assoc($results)){

            $fname = $rows['fname'];
            $lname = $rows['lname'];
            $friend="sender";
            echo '<div id = "post"><a href="anotherUser.php?id_user='.$friend_id.'&amp;friend='.$friend.'" style="color:black;">'.$fname." ".$lname.'</a></div>';
            
        }}
        }

    
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