<?php 
$servername="localhost"; 
$username="root"; 
$password=""; 
$database="user15"; 
$conn=mysqli_connect($servername,$username,$password,$database); 
$showalert=false; 
$error_message=""; 
if($_SERVER["REQUEST_METHOD"]=="POST"){ 
$username=$_POST['user1']; 
$password=$_POST['pass1']; 
$cpassword=$_POST['cpass1']; 
if (empty($username)) { 
$error_message = "Please enter a username."; 
} 
elseif($password!=$cpassword){ 
$error_message="passwords do not match"; 
} 
else{ 
//check if the user already exists 
$check_query = "SELECT * FROM users WHERE username = '$username'"; 
$check_result = mysqli_query($conn, $check_query); 
if (mysqli_num_rows($check_result) > 0) { 
$exist = true; 
$error_message="user already exists !"; 
} 
else{ 
 
 
    $hash= password_hash($password, PASSWORD_BCRYPT); 
} 
    $exist=false; 
     $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES 
('$username', '$hash', current_timestamp())"; 
    $result = mysqli_query($conn, $sql); 
      if ($result) { 
        $showalert = true; 
        header("Location: login.php"); 
        exit(); 
      } 
      else { 
           $error_message = "Failed to create account. Please try again later"; 
        } 
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
form{ 
position: absolute; 
top: 50%; 
left: 50%; 
transform: translate(-50%,-50%); 
width: 480px; 
background: ghostwhite; 
border-radius: 5px; 
text-align: center; 
padding: 30px 30px 5px 30px; 
box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.2); 
} 
form header{ 
font-size: 30px; 
font-weight:bold; 
color: darkblue; 
} 
form input{ 
height: 50px; 
width: 100%; 
padding: 0 15px; 
padding-left: 20px; 
font-size: 18px; 
border-radius: 5px; 
} 
form input::placeholder{ 
color: gray; 
font-size: 16px; 
} 
.form-label{ 
margin-top:20px; 
margin-left:-280px; 
} 
#btn1, 
#btn2 { 
padding: 12px 29px !important; 
font-weight: bold; 
margin-right: 10px; 
margin-top: 15px; 
margin-bottom: 30px; 
border-radius: 5px; 
 
 
} 
.button-container{ 
  margin-top: 20px; 
  display: flex; 
  flex-direction: row; 
  align-items: center; 
  justify-content: center; 
} 
.form-check-label{ 
  margin-right: 260px; 
} 
.mb-3{ 
  margin-top: 20px; 
} 
  </style> 
   <script> 
     const form = document.getElementById("signup-form"); 
  form.addEventListener("submit", function(event)); 
  function checkPasswords(event) { 
    event.preventDefault(); 
    const username = document.getElementById("username").value; 
    const password = document.getElementById("password").value; 
    const confirmpassword = document.getElementById("confirm-password").value; 
    if (username.trim() === "") { 
      alert("Please enter a username."); 
      return false; 
    } 
     form.submit(); 
    return true; 
  } 
        function displayAlert() { 
            alert("Account created successfully! You can now log into your account."); 
        } 
    </script> 
</head> 
  <body> 
    <div class="bg-image"> 
    <div class="mb-3"> 
      <form id="signup-form" method="post" action="<?php echo 
$_SERVER['PHP_SELF']; ?>"> 
        <header>Sign up</header> 
  <label for="username" class="form-label">Enter your name:</label> 
 
 
  <input type="text" class="form-control" id="username" placeholder="username" 
name="user1" required> 
  <label for="password" class="form-label">Create password:</label> 
  <input type="password" class="form-control" id="password" 
placeholder="password" name="pass1" required> 
 <label for="cpassword" class="form-label">Confirm password:</label> 
  <input type="password" class="form-control" id="confirm-password" 
placeholder="confirm password" name="cpass1"> 
   <?php if (!empty($error_message)) : ?> 
              <div class="alert alert-danger" role="alert"> 
                <?php echo $error_message; ?> 
             </div> 
                <?php endif; ?> 
<div class="button-container"> 
<button type="submit" id="btn1" class="btn btn-outline-success" 
onclick="checkPasswords()">Submit</button> 
<a href="index.php"> 
<button type="button" id="btn2" class="btn btn-outline
dark">Back</button></a> 
</div> 
</form> 
</div> 
</div> 
</body>  
</html>