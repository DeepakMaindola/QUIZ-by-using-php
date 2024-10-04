<?php 
include 'db.php'; 
session_start(); 
$number = isset($_GET['n']) ? $_GET['n']:1; 
// query for question 
$query = "SELECT * FROM questions WHERE question_no = $number"; 
//get the ques 
$result = mysqli_query($conn,$query); 
$question = mysqli_fetch_assoc($result); 
// get choices 
$query = "SELECT * FROM options WHERE question_num = $number"; 
$choices = mysqli_query($conn,$query); 
//get total ques 
$query = "SELECT * FROM questions"; 
$total_ques = mysqli_num_rows(mysqli_query($conn,$query)); 
?> 
<!DOCTYPE html> 
 
 
<html> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title></title> 
<style type="text/css"> 
.current{ 
padding: 10px; 
background-color:lightgray; 
border: black dotted 1px; 
margin: 20px 0px 10px 0px ; 
font-size: 18px; 
} 
.container{ 
width: 60%; 
margin: 0 auto; 
overflow: auto; 
} 
.question{ 
font-size:19px; 
} 
.choicess{ 
list-style: none; 
font-size: 22px; 
color: black; 
padding: 15px 10px 17px 10px; 
background-color: rgba(0, 30, 30, 0.5); 
} 
.in1{ 
padding:7px 18px 7px 18px; 
background-color: darkolivegreen; 
color: white; 
font-size: 16px; 
border:none; 
} 
</style> 
<script type="text/javascript"> 
   function validateForm() { 
        var selectedOption = 
document.querySelector('input[name="choice"]:checked'); 
            if (!selectedOption) { 
                alert("Please select an option before moving to the next question."); 
                return false; 
            } 
return true; 
} 
</script> 
</head> 
<body> 
<main> 
<div class="container"> 
<div class="current">Question <?php echo $number; ?> of <?php echo 
$total_ques; ?></div> 
<p class="question"> <?php echo $question['question_text']; ?> </p> 
<form method="POST" action="process.php"> 
<ul class="choicess"> 
<?php 
while($row=mysqli_fetch_assoc($choices)){ ?> 
<li><input type="radio" name="choice" value="<?php echo $row['id'];?>"> <?php 
echo $row['options']; ?></li><?php } ?> 
</ul> 
<?php 
// Display error message if exist 
if(isset($_SESSION['error'])) { 
echo '<div class="error">' . $_SESSION['error'] . '</div>';  
unset($_SESSION['error']); 
} 
?> 
<input type="hidden" name="number" value="<?php echo $number; ?>"> 
<input type="submit" name="submit" class= "in1" value="Next"> 
</form> 
</div> 
</main> 
</body> 
</html> 