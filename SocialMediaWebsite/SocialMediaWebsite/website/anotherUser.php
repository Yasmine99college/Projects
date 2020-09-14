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
</head>
<style>
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
        #post {

  background: white;

    border-radius: 4px;
    box-shadow: 0px 0px 18px rgba(63, 81, 181, 0.16);
    max-width: 440px;
    margin: 50px 5px;
    border: 1px solid transparent;
}

  </style>
<body>
	<div class="cont">
            <form action="" method="post">
                    <center><button id="logout" class="btn btn-outline-danger" name="back">
                    Back to your home page
                	</button></center>
                    <br>
                    
            <?php
 $friendId = $_GET['id_user'];
 $friend =$_GET['friend'];
 //echo $friend;
 $myId=$_SESSION['id'];
 //$isFriend = False;
 $queryyy="select * from friend_requests where recipient ='$myId' and sender='$friendId'  ";
        $resu = mysqli_query($con,$queryyy);
        $quee="select * from friend where (my_id = $myId and friend_id =$friendId) or (my_id = $friendId and friend_id =$myId)";
 $res=mysqli_query($con,$quee);
    if( $rows = mysqli_fetch_assoc($resu) || $friend=='reciver'){
        
         echo '<center><button id="logout" type="submit" name="accept" class="button btn-outline-danger">Accept</button><center>';
         echo '<center><button id="logout" type="submit" name="reject" class="button btn-outline-danger">Reject</button><center>';
                    }
 
   else if($rowss = mysqli_fetch_assoc($res) ){
    echo '<center><button id="logout" type="submit" name="unfriend" class="button btn-outline-danger">Unfriend</button><center>'; 
   }
    else{

        $queryy="select * from friend_requests where recipient ='$friendId' and sender='$myId'  ";
        $resul = mysqli_query($con,$queryy);
       if($row = mysqli_fetch_assoc($resul)){
                     echo '<center><button id="logout" type="submit" name="cancel" class="btn btn-outline-danger" >Cancel Request</button></center>';
                     }
                     else{
                        echo '<center><button id="logout" type="submit" name="add" class="btn btn-outline-danger" >Send Request</button></center>';

                     }}
           
if(isset($_POST['back'])){
 		header("Location: welcome.php");
 } 
 if(isset($_POST['add'])){
       $request = "insert into friend_requests (sender,recipient) 
    value ('$myId','$friendId')";
    $query = mysqli_query($con,$request);
    if($query){
        header("refresh: 0.5"); 
    }

 }
 if(isset($_POST['cancel'])){
     $request = "delete from friend_requests where sender = '$myId' and recipient = '$friendId'";
    $query = mysqli_query($con,$request);
    if($query){
        header("refresh: 0.5"); 
    }
 }
 if(isset($_POST['accept'])){
    $request = "insert into friend (my_id,friend_id) 
    value ('$myId','$friendId')";
    $query = mysqli_query($con,$request);
    $requests = "delete from friend_requests where sender = '$friendId' and recipient = '$myId'";
    $quer = mysqli_query($con,$requests);
    $friend="sender";
    if($query && $quer){

        $friend="sender";
        //echo '<a href="anotherUser.php?id_user='.$friendId.'&amp;friend='.$friend.'"></a>';
        header('Location: anotherUser.php?id_user='.$friendId.'&amp;friend='.$friend.''); 
    }
 }
 if(isset($_POST['reject'])){
     $request = "delete from friend_requests where sender = '$friendId' and recipient = '$myId'";
    $query = mysqli_query($con,$request);
    
    if($query){
        $friend="sender";
        //echo '<a href="anotherUser.php?id_user='.$friendId.'&amp;friend='.$friend.'"></a>';
        header('Location: anotherUser.php?id_user='.$friendId.'&amp;friend='.$friend.''); 
    }
 }
 if(isset($_POST['unfriend'])){
      $request = "delete from friend where (my_id = $myId and friend_id =$friendId) or (my_id = $friendId and friend_id =$myId)";
    $query = mysqli_query($con,$request);
    if($query){
        header("refresh: 0.5"); 
    }

 }


 //get other user info from database by his id
 $q="select * from friend where (my_id = $myId and friend_id =$friendId) or (my_id = $friendId and friend_id =$myId)";
 $r=mysqli_query($con,$q);
 	$qu = "select * from users where id = '$friendId'";
 	$result = mysqli_query($con,$qu);
 	$row = mysqli_fetch_assoc($result);
  if( $ro = mysqli_fetch_assoc($r)){
 	echo "<center>".$row['fname']." ".$row['lname']."</center><br>";
  echo "<center>"."<img width='110' height='110' src='uploadedPics/".$row['photo']."'alt = 'Default Profile Pic'"."</center><br>";
  echo "Gender : ".$row['gender'];
  echo "<br>";
  echo "Birthdate : ".$row['date'];
  echo "<br>";
  echo "Phone number : ".$row['phone'];
  echo "<br>";
  echo "Home town : ".$row['home'];
 	echo "<br>";
 	echo "Relationship status : ".$row['relationship'];
  echo "<br>";
  echo "About me:".$row['aboutMe'];
}
  else{
    echo "<center>".$row['fname']." ".$row['lname']."</center><br>";
    echo "<center>"."<img width='110' height='110' src='uploadedPics/".$row['photo']."'alt = 'Default Profile Pic'"."</center><br>";
    echo "Gender : ".$row['gender'];
    echo "<br>";
    echo "Phone number : ".$row['phone'];
    echo "<br>";
    echo "Home town : ".$row['home'];
    echo "<br>";
    echo "Relationship status : ".$row['relationship'];
  }

 	// get his posts by his id
 	$id = $row['id'];
 	$db ="SELECT * from posts  WHERE user_id = '".$id."' ORDER BY id DESC";
 	$username ="SELECT * from users  WHERE id = '".$id."'";
 	$que = mysqli_query($con,$db);
 	$qui =mysqli_query($con,$username);
 		while($row = mysqli_fetch_assoc($qui)){
            $fname = $row['fname'];
            $lname = $row['lname'];
      while($row = mysqli_fetch_assoc($que)){
            $postbody = $row['body'];
            $time = $row['time'];
            $_SESSION['id_post']=$row['id'];
            $photos =$row['photo'];
            $privacy=$row['privacy'];
            
       $q="select * from friend where (my_id = $myId and friend_id =$friendId) or (my_id = $friendId and friend_id =$myId)";
       $r=mysqli_query($con,$q);    
    if( $rows = mysqli_fetch_assoc($r)){
        echo '<div id = "post"><h4 style="margin-left:-130px;">'.$fname." ".$lname.'<p style="font-size:10px; margin-left: 3em;">'
      .$time.'</p></h4>';
        if($privacy=='0'){
        echo ' <p style="font-size:10px; margin-left: 18em; margin-top:-2.2em;">Private</p>';
       
      
      }
      else{
        echo'<p style="font-size:10px; margin-left: 18em; margin-top:-2.2em;">Public</p>';
        
    }
    echo'<br><p style="margin-left: 1.5em;">'.$postbody.'</p><br>';
      if(!empty($photos)){
       echo  '<center><img  width="310" height="210" src="uploadedPics/'.$photos.'" ></center><button id="logout" class="button btn-outline-danger">LIKE</button><button id="logout" class="button btn-outline-danger">DISLIKE</button> </div>';}
     else{echo '<button id="logout" class="button btn-outline-danger">LIKE</button><button id="logout" class="button btn-outline-danger">DISLIKE</button> </div>';}
     
      }
      else {
       
        if($privacy=='1'){
             echo '<div id = "post"><h4 style="margin-left:-130px;">'.$fname." ".$lname.'<p style="font-size:10px; margin-left: 3em;">'
      .$time.'</p></h4>';
      echo'<p style="font-size:10px; margin-left: 18em; margin-top:-2.2em;">Public</p>';
      echo'<br><p style="margin-left: 1.5em;">'.$postbody.'</p><br>';
      if(!empty($photos)){
       echo  '<center><img  width="310" height="210" src="uploadedPics/'.$photos.'" ></center><button id="logout" class="button btn-outline-danger">LIKE</button><button id="logout" class="button btn-outline-danger">DISLIKE</button> </div>';}
     else{echo '<button id="logout" class="button btn-outline-danger">LIKE</button><button id="logout" class="button btn-outline-danger">DISLIKE</button> </div>';}
     
      }

        }
      }
       }
 ?>
  </form>
  </div>

  

</body>
</html>