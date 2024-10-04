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
#mytag{ 
color: white; 
font-size: 20px; 
font-weight: bold; 
text-decoration: none; 
} 
.bg-image{ 
background-image:linear-gradient(rgba(0,0,50,0.7),rgba(0,0,50,0.7)),url(rob.jpg); 
height: 100vh; 
background-repeat: no-repeat; 
background-size: cover; 
display: flex;  
align-items: center; 
justify-content: center; 
background-attachment: fixed; 
background-position: center; 
} 
.mydiv{ 
display: flex; 
align-items: center; 
flex-direction: column; 
} 
#btn-user{ 
padding: 10px 40px !important; 
font-weight: bold; 
font-size: 22px; 
margin-bottom: -18px; 
border-radius: 0px 0px 0px 0px; 
} 
#btn3{ 
color: white; 
font-weight: bold; 
font-size: 18px; 
padding: 8px 20px 8px 20px; 
border-radius: 12px; 
} 
h3{ 
margin: 0px; 
} 
</style> 
</head> 
<body> 
<div class="bg-image"> 
<div class="mydiv"> 
<a href="login.php"> 
<button type="button" id="btn-user" class="btn btn-primary btn-lg p
3">Login</button></a><br> 
<br> 
<a id="mytag" href="">New here ? click below to sign up</a><br> 
<form action="signup.php"> 
<button class="btn btn-success" type="submit" id="btn3">Sign up</button> 
</form> 
</div> 
</div> 
</body> 
</html>