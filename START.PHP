<?php  
session_start(); 
?><!doctype html> 
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
gradient(rgba(0,0,40,0.8),rgba(0,0,40,0.8)),url(tech2.jpg); 
height: 100vh; 
background-repeat: no-repeat; 
background-size: cover; 
display: flex;  
align-items: center; 
justify-content: center; 
 
 
  background-attachment: fixed; 
  background-position: center; 
} 
h3{ 
  color:deeppink; 
  font-weight: bolder; 
} 
p{ 
  color: whitesmoke; 
} 
.btn-success{ 
  padding:10px 15px 10px 15px; 
  font-family: sans-serif; 
  font-size: 18px; 
  font-weight:bold; 
} 
</style> 
  </head> 
  <body> 
    <div class="bg-image"> 
    <div> 
    <h3>PHP Quiz</h3> 
      <p>Test your knowledge by attempting this quiz.</p> 
      <h3>The Test</h3> 
      <p>The test contains of 10 questions. There is no time limit.<br> 
      The test is not official, it's just a nice way to see how much you know, or don't 
know, about PHP.</p> 
      <h3>Count your score</h3> 
      <p>You will get 1 point for each correct answer. At the end of the Quiz, your 
total score will be displayed.<br>Maximum score is 10 points.</p> 
       <div class="alert alert-success" role="alert"> 
  <h4 class="alert-heading">Let's get started</h4> 
  <p style="color:darkgreen; font-weight: bold;">Good luck :)</p> 
  <a href="userpanel/take_quiz.php?n=1"> 
  <button type="button" class="btn btn-success">Start the quiz</button></a> 
  <hr> 
</div> 
</div> 
</div> 
</body> 
</html> 