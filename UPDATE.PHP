<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "online_quiz"; 
$conn = mysqli_connect($servername, $username, $password, $database); 
if (!$conn) { 
die("Connection failed: " . mysqli_connect_error()); 
} 
if (isset($_POST['submit'])) { 
$question_no = filter_input(INPUT_POST, 'question_no', 
FILTER_SANITIZE_NUMBER_INT); 
$question_text = filter_input(INPUT_POST, 'question_text', 
FILTER_SANITIZE_STRING); 
$correct_choice = filter_input(INPUT_POST, 'correct_choice', 
FILTER_SANITIZE_NUMBER_INT); 
$choices = $_POST['choice']; 
 
 
       if (empty($question_no) || empty($question_text) || empty($correct_choice) 
|| in_array('', $choices)) { 
        $error = "Please fill in all the fields !"; 
    } 
    else{ 
    // Check if the question number already exists 
    $checkQuery = "SELECT * FROM questions WHERE question_no = ?"; 
    $stmt = $conn->prepare($checkQuery); 
    $stmt->bind_param("i", $question_no); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
    $questionExists = $result->num_rows > 0; 
    // Update existing question 
    if ($questionExists) { 
        $updateQuery = "UPDATE questions SET question_text = ? WHERE 
question_no = ?"; 
        $stmt = $conn->prepare($updateQuery); 
        $stmt->bind_param("si", $question_text, $question_no); 
        $stmt->execute(); 
    } 
    // Delete existing choices for the question 
    $deleteQuery = "DELETE FROM options WHERE question_num = ?"; 
    $stmt = $conn->prepare($deleteQuery); 
    $stmt->bind_param("i", $question_no); 
    $stmt->execute(); 
    // Insert new choices for the question 
    for ($i = 1; $i <= 4; $i++) { 
        if (!empty($choices[$i])) { 
            $is_correct = ($i == $correct_choice) ? 1 : 0; 
            $insertQuery = "INSERT INTO options (question_num, is_correct, 
options) VALUES (?, ?, ?)"; 
            $stmt = $conn->prepare($insertQuery); 
            $stmt->bind_param("iis", $question_no, $is_correct, $choices[$i]); 
            $stmt->execute(); 
        } 
    } 
    $message = "Question has been updated successfully"; 
} 
} 
?> 
<!doctype html> 
<html lang="en"> 
<head> 
    <meta charset="utf-8"> 
 
 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Update Question</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+AL
 EwIH" crossorigin="anonymous"> 
    <style type="text/css"> 
        .container { 
            margin-left: 300px; 
            overflow: auto; 
            width: 65%; 
        } 
        h1 { 
            color: darkblue; 
            font-size: 30px; 
            margin-left: 180px; 
        } 
        form input { 
            width: 50%; 
            padding: 3px; 
            margin-top: 2px; 
            border-color: darkgray; 
            border-style: solid; 
            outline: none; 
        } 
        label { 
            color: black; 
            font-size: 16px; 
        } 
        #b1 { 
            margin-top: 9px; 
            margin-left: 190px; 
            padding: 7px 13px 7px 13px; 
            font-weight: bold; 
            font-size: 18px; 
        } 
        #b2 { 
            margin-top: 9px; 
            margin-right: 70px; 
            padding: 7px 13px 7px 13px; 
            font-size: 18px; 
            font-weight: bold; 
        } 
 
 
        .lab { 
            margin-left: 30px; 
        } 
        .lab1 { 
            margin-left: 10px; 
        } 
        .lab2 { 
            margin-left: 10px; 
        } 
    </style> 
</head> 
<body> 
    <main> 
        <div class="container"> 
            <h1>Update Question</h1> 
            <?php if (isset($message)) { 
                echo "<h4>" . $message . "</h4>"; 
            } ?> 
            <form method="POST" action="update.php"> 
                <p> 
                    <label>Question no: </label> 
                    <input type="number" class="lab2" name="question_no"> 
                </p> 
 
                <p> 
                    <label>Question text:</label> 
                    <input type="text" name="question_text"> 
                </p> 
 
                 <?php for ($i = 1; $i <= 4; $i++) { ?> 
                    <p> 
                        <label>Choice <?php echo $i; ?>:</label> 
                        <input type="text" class="lab" name="choice[<?php echo $i; ?>]"> 
                    </p> 
                <?php } ?> 
                <p> 
                    <label>Correct ans:</label> 
                    <input type="number" class="lab1" name="correct_choice"> 
                </p> 
                <?php if (isset($error)): ?> 
                <p style="color:red; font-weight: bold;"> <?php echo $error; ?> </p> 
                <?php endif; ?> 
                <button type="submit" class="btn btn-success" name="submit" 
id="b1">Update</button> 
 
 
                <a href="admin.php" class="btn btn-dark" id="b2">Back</a> 
            </form> 
        </div> 
    </main> 
</body> 
</html>