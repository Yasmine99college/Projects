<?php
  session_start();
  $con = mysqli_connect("localhost","root","","smapp");
?>

<?php
  if(isset($_POST['submit'])){

    move_uploaded_file($_FILES['file']['tmp_name'],"uploadedPics/".$_FILES['file']['name']);
    $con = mysqli_connect("localhost","root","","smapp");
    $q = mysqli_query($con,"UPDATE users SET photo = '".$_FILES['file']['name']."'WHERE id = '".$_SESSION['id']."'");
  
  }
  ?> 


  <!DOCTYPE html>
  <html >
  <head>
    <title>welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css?version=51">
  <link rel="stylesheet" href="style.css">

    <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> 
  </script> 
    <script src= 
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> 
  </script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
<script src="vendor/emoji-picker/lib/js/config.js"></script>
<script src="vendor/emoji-picker/lib/js/util.js"></script>
<script src="vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
<script src="vendor/emoji-picker/lib/js/emoji-picker.js"></script>
  
  </head>

  <body>
    <div class="cont">
    

           <form action="" method="post" name="myForm" id="myForm">
      
           <input type="text" class="form-control" placeholder="Type Friend's email" name="sname" style="margin-right:auto; width: 60%; ">
           <br>
          <button id="signup" type="submit" name="search" class="btn btn-outline-danger" style="margin-left: 48%; " >Search</button>
           </form>
         

   
 
           
</div>
       <!--  </div> -->
    <!-- </div> -->
<div class="navbar" >
  <a href="homePage.php">Home</a>
  <a href="website.php">Logout</a>
  <a href="editProfile.php">Edit</a>
  
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
    <a href="friend.php">Friends </a>
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

</div>
<br><br>


<?php
 if(isset($_POST['search'])){
 $con = mysqli_connect("localhost","root","","smapp") or die(mysql_error());
 $name = $_POST['sname']; 
 $qu = "select * from users where fname LIKE '$name' OR lname LIKE '$name' OR email LIKE '$name' OR phone LIKE '$name' OR home LIKE '$name'";
 $result = mysqli_query($con,$qu);
  

while($row = mysqli_fetch_assoc($result)){
  
    $fn = $row['fname'];
    $ln = $row['lname'];
    $ph = $row['photo'];
    $mm = $row['email'];
    $id_user=$row['id'];
    $friend="sender";
    $id=$row['id'];
    if($id != $_SESSION['id']){
    echo  '
    <a href="anotherUser.php?id_user='.$id_user.'&amp;friend='.$friend.'">
    <center><img  width="110" height="110" src="uploadedPics/'.$ph.'" >
    </a>
    ';
    echo '<div ><h4>'.$fn." ".$ln.'</h4>';
    }}

  
  
  
 }
 ?>

   <br><br>
<div id="contLeft">
<div  class="profile-img">
    <?php

      $qu = "SELECT * from users WHERE id = '".$_SESSION['id']."'";
      $result = mysqli_query($con,$qu);
      $row = mysqli_fetch_assoc($result);
        
        echo "<center>".$row['fname']." ".$row['lname']."</center>";
        echo "<br>";
        $gender= $row['gender'];

        if(isset($_POST['remove'])){
          if($gender == "Male")
            {
              $str = "boy";
              $qu = "update users SET photo = '".$str."'where id = '".$row['id']."'";
        $query = mysqli_query($con,$qu);
            }
            elseif($gender == 'Female'){
              $str = "girl";
              $qu = "update users SET photo ='".$str."'where id = '".$row['id']."'";
        $query = mysqli_query($con,$qu);
            }
        }

        if($row['photo'] == "boy"){
          echo "<center>"."<img width='110' height='110' src='uploadedPics/boy.png' alt = 'Default Profile Pic'"."</center>";
        }
        else if($row['photo'] == "girl"){
          echo "<center>"."<img width='110' height='110' src='uploadedPics/girl.png' alt = 'Default Profile Pic'"."</center>";
        }
        else {

          echo "<center>"."<img width='110' height='110' src='uploadedPics/".$row['photo']."'alt = 'Default Profile Pic'"."</center>";
        }
  
  ?>
 </div> 
 </div>


 <div class="leftcolumn ">


    <form action="" method="post" enctype = "multipart/form-data">
      <input id="choose" type="file" name="file">
      <br>
      
      <input id="sub" type="submit" name="submit">

    </form>
    
<br><br>
    <form action="welcome.php" method="post">
        <button id="sub" type="edit" name="remove" class="btn btn-outline-danger" >remove pic</button>
 </form>
      <br>
    
 </div>


<br><br><br><br><br><br><br><br><br><br>
<div class="leftcolumn">
  <h2>User Information </h2>
  <?php
      $qu = "SELECT * from users WHERE id = '".$_SESSION['id']."'";
      $result = mysqli_query($con,$qu);
    $row = mysqli_fetch_assoc($result);
    echo "Name : ".$row['fname']." ".$row['lname'];
    echo "<br><br>";
    echo "Email : ".$row['email'];
    echo "<br><br>";
    echo "Gender : ".$row['gender'];
    echo "<br><br>";
    echo "Birthday : ".$row['date'];
    echo "<br><br>";
    echo "Phone number : ".$row['phone'];
    echo "<br><br>";
    echo "Home town : ".$row['home'];
    echo "<br><br>";
    echo "Relationship status : ".$row['relationship'];
    echo "<br><br>";
    echo "About me : ".$row['aboutMe'];
    
    ?>
    <br><br>
</div>
<!-- <div id = "btnRight">
 
</div> -->
<div id="contRight"style="height:500px;">
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
    <input type="submit" name="share" value="Post" id="b">


  </div>
</form>
</div>

<br><br>
<div id="contRight">


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

$db ="SELECT * from posts  WHERE user_id = '".$_SESSION['id']."' ORDER BY id DESC";
$username ="SELECT * from users  WHERE id = '".$_SESSION['id']."'";
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
        

      echo '<br><div id = "to" "><h4>'.$fname." ".$lname.'<p style="font-size:10px; margin-left: 3em;">'
      .$time.'</p></h4>';
      if($privacy=='0'){
        echo ' <p style="font-size:10px; margin-left: 18em; margin-top:-2.2em;">Private</p>';
      }
      else{
        echo' <p style="font-size:10px; margin-left: 18em; margin-top:-2.2em;">Public</p>';
      }
      echo '<br><p style="margin-left: 1.5em;">'.$postbody.'</p><br>';
      if(!empty($photos)){
       echo  '<center><img  width="310" height="210" src="uploadedPics/'.$photos.'" ></center><button id="logout" class="button btn-outline-danger">LIKE</button><button id="logout" class="button btn-outline-danger">DISLIKE</button> </div>';}
     else{echo '<button id="logout" class="button btn-outline-danger">LIKE</button><button id="logout" class="button btn-outline-danger">DISLIKE</button> </div>';}
     
    } }?>
</div>


  </body>

  </html>

  <?php
if(isset($_POST['edit'])){
  header("Location: editProfile.php");
}
   ?>
   <?php 
 if (isset($_POST['homep'])){

  header("location: homePage.php");
 }

 ?>
   
            