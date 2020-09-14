<?php
  session_start();
  $con = mysqli_connect("localhost","root","","smapp");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css?version=51">
    <link rel="stylesheet" href="style.css">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script> 
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">  </script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
    <script src="vendor/emoji-picker/lib/js/config.js"></script>
    <script src="vendor/emoji-picker/lib/js/util.js"></script>
    <script src="vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="vendor/emoji-picker/lib/js/emoji-picker.js"></script>
</head>
<body>
          <div class="cont">
      <center><h1 style="color: skyblue;">
        <?php 
        $con = mysqli_connect("localhost","root","","smapp") or die(mysql_error());
        $id = $_SESSION['id'];
        $qu = "select * from users where id = $id";
        $result = mysqli_query($con,$qu);
        $row = mysqli_fetch_assoc($result);
        echo "Welcome Home  ".$row['fname']." ;)";
        ?>
      </h1></center>
    
           <form action=""method="post" name="myForm" id="myForm">
           <input type="text" class="form-control" placeholder="Type Friend's email" name="sname" style="margin-right:auto; width: 40%; ">
           
          <button id="signup" type="submit" name="search" class="btn btn-outline-danger" style="margin-left: 40%; " >Search</button>
        </form>
</div>



<div class="navbar" >
  <a href="welcome.php">Profile</a>
  
   <a href="#" class="notification">
  <span class="badge" >
    <?php 
    $query = "select COUNT(my_id) from friend where my_id ='".$_SESSION['id']."' or friend_id ='".$_SESSION['id']."' ";
    $resultss = mysqli_query($con,$query);
    while($rows = mysqli_fetch_assoc($resultss)){
    echo  $rows['COUNT(my_id)'];}

    ?>
  </span>
</a>
<?php
$where ="home";
echo " <a href='friend.php?where=".$where."'>Friends </a>";
?>
   
              <a href="#" class="notification">

          <?php 
    $query = "select COUNT(recipient) from friend_requests where recipient ='".$_SESSION['id']."'  ";
    $resultss = mysqli_query($con,$query);
    while($rows = mysqli_fetch_assoc($resultss)){
      if($rows['COUNT(recipient)']>0){
    echo  '<span class="badge" >'.$rows['COUNT(recipient)'].'</span>';}}
    ?>
</a>
<div class="dropdown">
    <button class="dropbtn">Request 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">


 <?php
    $recipient=$_SESSION['id'];
        $qu ="SELECT * from friend_requests  WHERE recipient='$recipient'";
        $result=mysqli_query($con,$qu);
        while ($row=mysqli_fetch_assoc($result)) {
            
        
        $sender=$row['sender'];
        $que = "select * from users where id = '$sender'";
    $results = mysqli_query($con,$que);
    
    while($rows = mysqli_fetch_assoc($results)){

            $fname = $rows['fname'];
            $lname = $rows['lname'];
            $friend="reciver";
            echo '<a href="anotherUser.php?id_user='.$sender.'&amp;friend='.$friend.'" style="color:black;">'.$fname." ".$lname.'</a>';
            echo '<form action="" method="post"><button id="logout" type="submit" name="accept" class="button btn-outline-danger">Accept</button>';
            echo '<button id="logout" type="submit" name="reject" class="button btn-outline-danger">Reject</button></form>';

          }}

if(isset($_POST['accept'])){
    $request = "insert into friend (my_id,friend_id) 
    value ('$recipient','$sender')";
    $query = mysqli_query($con,$request);
    $requests = "delete from friend_requests where sender = '$sender' and recipient = '$recipient'";
    $quer = mysqli_query($con,$requests);
    $friend="sender";
    if($query && $quer){
        $friend="sender";
        
        header('Location: anotherUser.php?id_user='.$sender.'&amp;friend='.$friend.''); 
    }
 }
 if(isset($_POST['reject'])){
     $request = "delete from friend_requests where sender = '$sender' and recipient = '$recipient'";
    $query = mysqli_query($con,$request);
    
    if($query){
        $friend="sender";
        
        header('Location: anotherUser.php?id_user='.$sender.'&amp;friend='.$friend.''); 
    }
 }
    ?>
    
</div>
</div>
<a href="website.php" style="float:right;">Logout</a>
</div>


<div id="to2">
<form action="welcome.php " method="Post"  enctype = "multipart/form-data">

  <div class="textarea" >
    <p class="emoji-picker-container">
    <textarea class="fakeimg"  rows = "5" cols = "60" name = "body" data-emojiable="true"
              data-emoji-input="unicode" type="text" >  </textarea>
</p>
    <script>     
           

  $(function () {
                // Initializes and creates emoji set from sprite sheet
                window.emojiPicker = new EmojiPicker({
                    emojiable_selector: '[data-emojiable=true]',
                    assetsPath: 'vendor/emoji-picker/lib/img/',
                    popupButtonClasses: 'icon-smile'
                });

                window.emojiPicker.discover();
            });
  </script>
     <input id="choose" type="file" name="file">
     <select class="form-control" name="privacy">
                              <option selected="">Private</option>
                              <option >Public</option>
                        </select>
    <input type="submit"id = "choose"  name="share" value="Post">


  </div>
</form>
</div>
<br>
<?php 
if (isset($_POST['share'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"uploadedPics/".$_FILES['file']['name']);
  $photo=$_FILES['file']['name'];
  $body = $_POST['body'];
  $user_id=$_SESSION['id'];
  $privacy = $_POST['privacy'];
  if($privacy == 'Private')
  {
    $pr='0';
  }
  else
  {
    $pr='1';
  }
  if (strlen($body) > 160 || strlen($body)<1) {
                                die('Incorrect length!');
                        }
  $qu =" insert into posts (body,user_id,time,likes,photo,privacy) values ('$body','$user_id',now(),'0','$photo','$pr')";
  $query = mysqli_query($con,$qu);
  if($query){
    echo " <script> alert(' Posted')</script>";
  }
   
}

  $qu = "select * from posts where privacy = 1";
  $result = mysqli_query($con,$qu);
   $friend="sender";
  while($row = mysqli_fetch_assoc($result)){
   $userID = $row['user_id'];
   $getUser = "select * from users where id = '$userID'";
   $userResult = mysqli_query($con,$getUser);
   $r = mysqli_fetch_assoc($userResult);

    echo "<div id = 'to2' style='float:center;' ><img width='80' height='80' src='uploadedPics/".$r['photo']."'alt = 'Default Profile Pic'";
   if($userID != $recipient){
    echo "<br><div ><a href='anotherUser.php?id_user=".$userID."&amp;friend=".$friend."' style='color:black;'>".$r['fname']." ".$r['lname']."</a>";}
    else{
      echo "<br><div ><a href='welcome.php' style='color:black;'>".$r['fname']." ".$r['lname']."</a>";
    }
   echo "<br><h6 style='margin-left:1em; '>".$row['time']."</h6>";
   echo "<center>".$row['body']."</center>";
   echo "<br> <hr>";
   if(!empty($row['photo']))
    { echo "<center>"."<img width='300' height='300' src='uploadedPics/".$row['photo']."'alt = 'Default Profile Pic'"."</center><br>";}
  echo "</div></div><br> <hr>";
}




$qu = "select * from posts where privacy = 0";
  $result = mysqli_query($con,$qu);
  while($row = mysqli_fetch_assoc($result)){
   
   $friendId = $row['user_id'];
   $myId = $_SESSION['id'];
   $testFriendship = "select * from friend where (my_id = '$myId' and friend_id = '$friendId')
   OR (my_id = '$friendId' and friend_id = '$myId')";
   
   if(mysqli_num_rows(mysqli_query($con , $testFriendship)) > 0)
   {
   $getUser = "select * from users where id = '$friendId'";
   $userResult = mysqli_query($con,$getUser);
   $rr = mysqli_fetch_assoc($userResult);
    echo "<div id = 'to2' style='float:center;' ><img width='80' height='80' src='uploadedPics/".$rr['photo']."'alt = 'Default Profile Pic'";
   if($userID != $recipient){
    echo "<br><div ><a href='anotherUser.php?id_user=".$userID."&amp;friend=".$friend."' style='color:black;'>".$rr['fname']." ".$rr['lname']."</a>";}
    else{
      echo "<br><div ><a href='welcome.php' style='color:black;'>".$rr['fname']." ".$rr['lname']."</a>";
    }
   echo "<br><h6 style='margin-left:1em; '>".$row['time']."</h6>";
   echo "<center>".$row['body']."</center>";
   echo "<br> <hr>";
   if(!empty($row['photo']))
    { echo "<center>"."<img width='300' height='300' src='uploadedPics/".$row['photo']."'alt = 'Default Profile Pic'"."</center><br>";}
  echo "</div></div><br> <hr>";
   } 
}
?>

<?php
  $qu = "SELECT * from posts WHERE id = '".$_SESSION['id']."'";
      $result = mysqli_query($con,$qu);
    $row = mysqli_fetch_assoc($result);



  ?>

</body>
</html>