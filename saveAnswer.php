<?php
require_once("dbConfig.php");
session_start();
if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@proread.com') {

} else {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $answer = $_POST['answer'];
    $questionForm = $_POST['ids'];

    $checkSql = "SELECT question_id FROM answers WHERE question_id = :question_id";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bindParam(':question_id', $questionForm);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // The question already exists, so update the existing row
        $updateSql = "UPDATE answers SET answer = :answer WHERE question_id = :question_id";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bindParam(':answer', $answer);
        $updateStmt->bindParam(':question_id', $questionForm);
        $updateStmt->execute();
    } else {
        // The question doesn't exist, so insert a new row
        $insertSql = "INSERT INTO answers (question_id, answer) VALUES (:question_id, :answer)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bindParam(':question_id', $questionForm);
        $insertStmt->bindParam(':answer', $answer);
        $insertStmt->execute();
    }

    header("location: FAQ.php");
} else {
    echo "ERROR";
}
?>
