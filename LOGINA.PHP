<?php 
$login=false; 
$showerror=false; 
$showsuccess=false; 
if($_SERVER['REQUEST_METHOD']=='POST'){ 
  $servername="localhost"; 
  $username="root"; 
  $password=""; 
  $database="user15"; 
  $conn=mysqli_connect($servername,$username,$password,$database); 
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $loginType = $_POST['loginType'];  
  $username = mysqli_real_escape_string($conn, $username); 
  $password = mysqli_real_escape_string($conn, $password); 
  $sql = "SELECT * FROM users WHERE username='$username'"; 
  $result= mysqli_query($conn,$sql); 
  $num= mysqli_num_rows($result); 
   if ($num == 1) { 
        $row = mysqli_fetch_assoc($result); 
        if (password_verify($password, $row['password'])) { 
            $login = true; 
            echo "Success variable is true"; 
            $showsuccess = true;  
            if ($loginType == 'admin') { 
                header("Location: Adminpanel/admin.php"); 
                exit(); 
            } else { 
                header("Location: start.php"); 
                exit(); 
            } 
        } else { 
            $showerror = "Invalid credentials"; 
        } 
    } else { 
        $showerror = "Invalid credentials"; 
 
 
    } 
  } 
  ?> 
 <!doctype html> 
<html lang="en"> 
  <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Bootstrap demo</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+AL
 EwIH" crossorigin="anonymous"> 
    <style type="text/css"> 
      *{ 
         margin: 0; 
        padding: 0; 
        box-sizing: border-box; 
  } 
      .bg-image{ 
      background-image:linear
gradient(rgba(0,0,50,0.3),rgba(0,0,50,0.3)),url(here8.jpeg); 
      height: 100vh; 
      background-repeat: no-repeat; 
      width: 100%; 
      background-size:cover ; 
      display: flex;  
      align-items: center; 
      justify-content: center; 
      background-attachment: fixed; 
      background-position: center; 
} 
.container{ 
    width: 400px; 
    height: 380px; 
    margin: 8% auto; 
    background: whitesmoke; 
    border-radius: 5px; 
    position: relative; 
    overflow: hidden; 
} 
h3{ 
  text-align: center; 
margin-bottom: 40px; 
color: darkblue; 
font-size: 26px; 
} 
.container form { 
width: 300px; 
position: absolute; 
top: 100px; 
left: 40px; 
transition: 0.5s; 
} 
form input{ 
width: 105%; 
padding: 10px 5px; 
margin: 5px 0; 
border: 0; 
border-bottom: 1px solid gray; 
outline: none; 
background: transparent; 
} 
#btn1,#btn2 
{ 
padding: 8px 23px !important; 
font-weight: bold; 
background: linear-gradient(to right,deeppink,darkblue); 
color: whitesmoke; 
margin-right: 10px; 
margin-top: 25px; 
margin-left: 100px; 
margin-bottom: 0; 
outline: none; 
border: 0; 
cursor: pointer; 
border-radius: 6px; 
font-size: 19px; 
} 
#f2{ 
left: 450px; 
} 
.step-row{ 
width: 410px; 
height: 40px; 
background: linear-gradient(to right,deeppink,darkblue); 
margin: 0 auto; 
margin-left: -20px; 
display: flex; 
align-items: center; 
box-shadow: 0 -1px 5px -1px gray; 
position: relative; 
} 
.step-col{ 
width: 200px; 
text-align: center; 
position: relative; 
font-weight: bold; 
} 
#progress{ 
position: absolute; 
height: 100%; 
width: 214px; 
transition: 0.6s; 
background: linear-gradient(to right,deeppink,darkblue); 
} 
#progress::after{ 
content: ''; 
position: absolute; 
height:0; 
width:0 ; 
margin-left: -80px; 
border-top: 20px solid transparent; 
border-bottom: 20px solid transparent; 
position: absolute; 
top: 0; 
border-left: 20px solid darkblue; 
} 
#next,#back{ 
background: none; 
outline: none; 
border: 0; 
width: 150px; 
color: whitesmoke; 
font-weight: bold; 
font-size: 17px; 
} 
#d1,#d2{ 
margin-top:0px; 
 
 
  width: 100%; 
  max-width: 100%; 
 
} 
  </style> 
  </head> 
  <body> 
    <?php 
  if($showerror){ 
   echo ' <div class="alert alert-danger alert-dismissible fade show position-fixed 
top-0 start-50 translate-middle-x" id="d2" role="alert"> 
  <strong>Error!</strong> Invalid credentials, please try again. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria
label="Close"></button> 
</div> '; 
} 
if($showsuccess){ // Add this block 
   echo ' <div class="alert alert-success alert-dismissible fade show position-fixed 
top-0 start-50 translate-middle-x" id="d3" role="alert"> 
  <strong>Success!</strong> You are logged in. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria
label="Close"></button> 
</div> '; 
}?> 
<script> 
  document.addEventListener('DOMContentLoaded', function() { 
  var alertCloseButtons = document.querySelectorAll('.alert button[data-bsdismiss="alert"]'); 
  alertCloseButtons.forEach(function(button) { 
    button.addEventListener('click', function() { 
      var alert = button.closest('.alert'); 
      alert.remove(); 
    }); 
  }); 
}); 
</script> 
    <div class="bg-image"> 
      <div class="container"> 
        <form id="f1" method="post" action="<?php echo $_SERVER['PHP_SELF']; 
?>"> 
           <input type="hidden" name="loginType" value="user">  
          <h3>Logging in as user</h3> 
          <input type="text" placeholder="username" name= "username" required> 
 
 
          <input type="password" placeholder="password" name="password" 
required> 
            <a href="start.php"> 
          <button type="submit" id="btn1">Submit</button></a> 
        </form> 
        <form id="f2" method="post" action="<?php echo $_SERVER['PHP_SELF']; 
?>"> 
           <input type="hidden" name="loginType" value="admin"> 
          <h3>Logging in as admin</h3> 
          <input type="text" placeholder="username" name="username" required> 
          <input type="password" placeholder="password" name="password" 
required> 
          <a href="Adminpanel/admin.php"> 
          <button type="submit" id="btn2">Submit</button></a> 
        </form> 
        <div class="step-row"> 
          <div id="progress"></div> 
          <div class="step-col"><small><button 
id="next">User</button></small></div> 
          <div class="step-col"><small><button 
id="back">Admin</button></small></div> 
        </div> 
      </div> 
    </div>     
      <script> 
      var f1= document.getElementById('f1'); 
      var f2=document.getElementById('f2'); 
      var next = document.getElementById('next'); 
      var back = document.getElementById('back'); 
      back.onclick=function(){ 
        f1.style.left="-450px"; 
        f2.style.left="40px"; 
        progress.style.width="400px"; 
      } 
      next.onclick=function(){ 
        f1.style.left="40px"; 
        f2.style.left="400px"; 
        progress.style.width="205px"; 
      } 
    </script> 
    </body> 
    </html>