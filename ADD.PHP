<?php 
  $servername="localhost"; 
  $username="root"; 
  $password=""; 
  $database="online_quiz"; 
  $conn=mysqli_connect($servername,$username,$password,$database); 
if (!$conn) { 
die("Connection failed: " . mysqli_connect_error()); 
} 
if(isset($_POST['submit'])){ 
$question_no = $_POST['question_no']; 
$question_text = $_POST['question_text']; 
$correct_choice = $_POST['correct_choice']; 
//choice array 
$choice =  array(); 
$choice[1] = $_POST['choice1']; 
$choice[2] = $_POST['choice2']; 
$choice[3] = $_POST['choice3']; 
$choice[4] = $_POST['choice4']; 
// Check if the question number already exists 
$checkQuery = "SELECT * FROM questions WHERE question_no = 
'{$question_no}'"; 
$checkResult = mysqli_query($conn, $checkQuery); 
if(mysqli_num_rows($checkResult) > 0){ 
// Handle duplicate question number 
echo "Question number already exists. Please choose a different number."; 
}  
else{ 
// first query for questions table 
$query = "INSERT INTO questions (question_no, question_text) "; 
$query .= "VALUES ('{$question_no}', '{$question_text}')"; 
$result = mysqli_query($conn,$query); 
// validate first query 
if($result){ 
foreach ($choice as $option => $value) { 
if($value != ""){ 
if($correct_choice == $option){ 
$is_correct = 1; 
} 
else{ 
$is_correct = 0; 
} 
//second query for choices table 
$query = "INSERT INTO options(question_num, is_correct, options) "; 
$query.= "VALUES ('{$question_no}', '{$is_correct}', '{$value}' )"; 
$insert_row = mysqli_query($conn, $query); 
// validate insertion of choices 
if($insert_row){ 
continue; 
} 
else{ 
die("2nd query for choices could not be executed"); 
} 
} 
} 
$message = "Question has been added successfully"; 
}  
$query =  
"SELECT * FROM questions"; 
$questions = mysqli_query($conn,$query); 
$total = mysqli_num_rows($questions); 
$next = $total+1; 
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
.container{ 
margin-left: 300px; 
overflow: auto; 
width: 65%; 
} 
h1{ 
color: darkblue; 
font-size:30px; 
margin-left:180px; 
} 
form input{ 
width: 50%; 
padding: 3px; 
margin-top:2px; 
border-color: darkgray; 
border-style: solid; 
outline:none; 
} 
label{ 
font-size: 16px; 
} 
#b1{ 
margin-top: 9px; 
margin-left: 190px; 
padding: 7px 13px 7px 13px; 
font-weight: bold;   
font-size: 18px; 
} 
#b2{ 
margin-top: 9px; 
margin-right:70px ; 
padding: 7px 13px 7px 13px; 
font-size: 18px; 
font-family: Bell MT; 
font-weight: bold; 
} 
.lab{ 
margin-left: 30px; 
} 
.lab1{ 
margin-left: 10px; 
} 
.lab2{ 
margin-left: 10px; 
} 
</style> 
</head> 
<body> 
<main> 
<div class="container"> 
<h1>Add a Question</h1> 
<?php if(isset($message)){ 
echo "<h4>".$message. "</h4>"; 
} 
?> 
<form method="POST" action="add_qu.php" onsubmit="return validateForm()"> 
<p> 
<label>Question no: </label> 
<input type="number" class="lab2" name="question_no" value="<?php echo 
$next; ?>"> 
</p> 
<p> 
<label>Question text:</label> 
<input type="text" name="question_text"> 
</p> 
<p> 
<label>Choice 1:</label> 
<input type="text" class="lab" name="choice1"> 
</p> 
<p> 
<label>Choice 2:</label> 
<input type="text" class="lab" name="choice2"> 
</p> 
<p> 
<label>Choice 3:</label> 
<input type="text" class="lab" name="choice3"> 
</p> 
<p> 
<label>Choice 4:</label> 
<input type="text" class="lab" name="choice4"> 
</p> 
<p>   
<label>Correct ans:</label>  
<input type="number" class="lab1" name="correct_choice"> 
</p> 
<script> 
function validateForm() { 
let inputs = document.querySelectorAll('input[type="text"], input[type="number"]'); 
for (let input of inputs) { 
if (input.value.trim() === '') { 
alert('Please fill out all fields before submitting the form.'); 
return false; 
} 
} 
return true; 
} 
</script> 
<input type="hidden" name="number" value="<?php echo $number; ?>"> 
<button type="submit" class="btn btn-success" name="submit" 
id="b1">Submit</button> 
<a href="admin.php" class="btn btn-dark" id="b2">Back</a> 
</form> 
</div> 
</main>   
</body> 
</html> 