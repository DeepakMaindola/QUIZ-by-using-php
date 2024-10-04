<?php include 'db.php';?> 
<?php session_start(); ?> 
<?php 
 
 
// score won't be displayed for first ques 
if(!isset($_SESSION['score'])){ 
 $_SESSION['score']= 0; 
} 
 if ($_POST) { 
      // Check if choice is selected 
      if (!isset($_POST['choice'])) { 
           $_SESSION['error'] = "Please select an option before moving to the next 
question."; 
            header("LOCATION: take_quiz.php?n=" . $_POST['number']); // Redirect 
back to the current question 
            exit(); 
        } 
 if($_POST){ 
  // total ques 
  $query = "SELECT * FROM questions"; 
  $total_ques = mysqli_num_rows(mysqli_query($conn,$query)); 
  // capturing ques from where form was submitted 
  $number = $_POST['number']; 
  //storing selected option by user 
  $selected_choice = $_POST['choice']; 
  //next question no 
  $next = $number+1; 
  // determine correct choice for current option 
  $query = "SELECT * FROM options WHERE question_num = 
$number AND is_correct = 1"; 
  $result = mysqli_query($conn,$query); 
  $row = mysqli_fetch_assoc($result); 
  $correct_choice = $row['id']; 
  // increase the score if selected choice is correct 
  if($selected_choice == $correct_choice){ 
   $_SESSION['score']++; 
  } 
  // redirect to next ques or final score page 
  if($number== $total_ques){ 
   header("LOCATION: last.php"); 
  } 
  else{ 
   header("LOCATION: take_quiz.php?n=".$next); 
  } 
 } 
}  
?> 
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title></title> 
</head> 
<body> 
</body> 
</html>