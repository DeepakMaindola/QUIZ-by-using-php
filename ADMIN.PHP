<?php  
session_start(); 
?> 
<!doctype html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Bootstrap demo</title> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font
awesome/6.5.2/css/all.min.css" integrity="sha512
SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3p
 BnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" 
referrerpolicy="no-referrer" /> 
<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+AL
 EwIH" crossorigin="anonymous"> 
<style type="text/css"> 
* { 
margin: 0; 
padding: 0; 
box-sizing: border-box; 
} 
.bg-image { 
background-image: linear-gradient(rgba(0,0,50,0.7),rgba(0,0,50,0.7)), 
url(tech2.jpg); 
height: 100vh; 
 
 
      background-repeat: no-repeat; 
      background-size: cover; 
      display: flex;  
      align-items: center; 
      justify-content: center; 
      background-attachment: fixed; 
      background-position: center; 
    } 
   
 
nav{ 
  width: 100%; 
  max-width: 100%; 
  margin-top: -535px; 
  background-color: whitesmoke; 
} 
.navbar-toggler{ 
  color: darkblue; 
  font-weight: bolder; 
  background-color: whitesmoke; 
  font-size: 21px; 
padding: 8px 17px 6px 2px; 
  margin-right: 880px; 
  font-family: Gabriola; 
} 
 
   .full-width-navbar { 
      width: 100%; 
      padding-top: 18px; 
      padding-bottom: 14px; 
      padding-left: 10px; 
      background-color: whitesmoke; 
    } 
    .heading { 
  color: whitesmoke; 
  position: absolute; 
  top: 50%; 
  left: 50%; 
  transform: translate(-50%, -50%); 
  text-align: center; 
  z-index: 1; 
  font-size: 30px; 
  font-weight: bold; 
} 
 
 
.dv1{  
  background-color:ghostwhite;  
}  
ul{ 
 list-style: none; 
 } 
 
  li a 
 {  
  text-decoration: none; 
  color:darkblue; 
  font-weight:bold; 
  font-size:21px; 
} 
   li a:hover { 
  background-color:cadetblue; 
  padding: 11px; 
  border-radius: 2px; 
} 
.navbar-brand { 
  font-family:Bell MT; 
  font-size: 20px; 
} 
#new{ 
  padding-left: 9px; 
  font-size: 20px; 
  margin-top: 4px; 
} 
  </style> 
</head> 
<body> 
  <div class="bg-image"> 
      <nav class="navbar full-width-navbar bg-dark navbar-dark" > 
      <div class="container-fluid"> 
        <a href="#" class="navbar-brand navbar-expand"> Click there to create 
changes     <i class="fa-solid fa-arrow-right" id="new"></i> 
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs
target="#cnvs" >  </a> CLICK ME</button> 
        <div class="offcanvas offcanvas-end dv1" tabindex="-1" id="cnvs"> 
          <div class="offcanvas-header"> 
            <h2 class="offcanvas-title" style="color: darkolivegreen;">User profile and 
Question Management</h2> 
            <button class="btn btn-close" data-bs-dismiss="offcanvas"></button> 
          </div> 
 
 
          <div class="offcanvas-body"> 
            <ul> 
              <li><a href="add_qu.php">Add questions</a></li><br> 
              <li><a href="update.php">Update questions</a></li><br> 
               <li><a href="del_qu.php">Delete questions</a></li><br> 
                <li><a href="show_user.php">Show user's info.</a></li> 
              </ul> 
          </div> 
        </div> 
      </div> 
    </nav> 
    <script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
     <p class="heading">Welcome to the admin panel ! <br>From here on, you can 
make changes in the quiz.</p> 
</div> 
</body> 
</html>