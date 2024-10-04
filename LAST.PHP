<?php 
session_start(); 
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
if (isset($_POST['retake'])) { 
header("Location: take_quiz.php"); 
exit(); 
} 
if (isset($_POST['logout'])) { 
header("Location: index.php"); 
exit(); 
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
h2{ 
color: black; 
} 
.container{ 
text-align: center; 
} 
#b1{ 
padding: 6px 10px 6px 10px; 
margin-bottom: 5px; 
} 
#b2{ 
padding: 6px 28px 6px 28px; 
} 
</style> 
</head> 
<body> 
<main> 
<div class="container"> 
<h2>Here is your result</h2> 
<p style="color: darkblue; font-size: 17px;">Congratulations ! you 
have completed this test successfully.</p> 
<p style="color: darkblue; font-size: 17px;">You have <strong 
style="color: black;">Scored</strong> <?php echo $_SESSION['score']; ?> 
points.</p> 
<?php unset($_SESSION['score']); ?> 
</div> 
<form method="post" action="take_quiz.php" class="row justify-content
center"> 
<div class="col-auto"> 
<button type="submit" class="btn btn-primary" name="retake" 
id="b1">Retake Quiz</button> 
</div> 
</form> 
<form method="post" action="index.php" class="row justify-content-center"> 
<div class="col-auto"> 
<button type="submit" class="btn btn-success" name="logout" 
id="b2">Logout</button> 
</div> 
</form> 
</main> 
</body> 
</html>