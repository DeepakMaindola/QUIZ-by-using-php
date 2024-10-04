<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "online_quiz"; 
// Create connection 
$conn = mysqli_connect($servername, $username, $password, $database); 
// Check connection 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['delete_question']) && $_POST['delete_question'] == 1) { 
        if(isset($_POST['id']) && !empty($_POST['id'])){ 
            $id = mysqli_real_escape_string($conn, $_POST['id']);            
            // Delete question 
            $deleteQuestionQuery = "DELETE FROM questions WHERE 
question_no = $id"; 
            $deleteQuestionResult = mysqli_query($conn, $deleteQuestionQuery); 
            // Delete choices 
 
 
            $deleteChoicesQuery = "DELETE FROM options WHERE question_num 
= $id"; 
            $deleteChoicesResult = mysqli_query($conn, $deleteChoicesQuery); 
            if ($deleteQuestionResult && $deleteChoicesResult) { 
                echo "Question and its choices deleted successfully."; 
            } else { 
                echo "Error deleting question and choices: " . mysqli_error($conn); 
            } 
        } else { 
            echo "Please provide a valid question ID"; 
        }    
    } 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Question and Choices Deletion</title> 
    <style type="text/css"> 
        .in1 { 
            padding: 7px 8px 7px 8px; 
            font-size: 15px; 
            color: white; 
            border: none; 
            background-color: darkgreen; 
        } 
        label { 
            font-size: 18px; 
        } 
        .in2 { 
            width: 20%; 
        } 
    </style> 
</head> 
<body> 
    <form method="POST" action="<?php echo 
htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
        <p> 
            <label>Question ID:</label> 
            <input type="number" class="in2" name="id"> 
        </p> 
        <input type="hidden" name="delete_question" value="1"> 
<input type="submit" name="delete" class="in1" value="Delete Question"> 
<input type="submit" name="submit" class="in1" value="Submit"> 
</form> 
</body> 
</html> 