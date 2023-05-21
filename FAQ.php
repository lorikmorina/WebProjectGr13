<?php 
  require_once("dbConfig.php");
  session_start();
  $value = 0;
  $sql = "SELECT id, question, COUNT(*) as frequency
  FROM questions
  GROUP BY LOWER(question)
  ORDER BY frequency DESC
  LIMIT 3;";
  
  $users = $conn->prepare($sql);
  $users->execute();
  
  $questions = $users->fetchAll(PDO::FETCH_ASSOC);
  
  $questionIds = array(); // Create an empty array to store the question IDs
  
  foreach ($questions as $question) {
      $questionIds[] = $question['id'];
  }
  
  $answers = array(); // Create an empty array to store the answers
  
  foreach ($questionIds as $questionId) {
      $answerSql = "SELECT answer FROM answers WHERE question_id = :question_id";
      $answerStmt = $conn->prepare($answerSql);
      $answerStmt->bindParam(':question_id', $questionId);
      $answerStmt->execute();
  
      $answer = $answerStmt->fetch(PDO::FETCH_ASSOC);
  
      if ($answer) {
          $answers[$questionId] = $answer['answer'];
      } else {
          $answers[$questionId] = "No answer found.";
      }  
  }
  
  ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>FAQ</title>
  <link rel="stylesheet" href="./FAQ.css">
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<?php include("header.php") ?>
<?php 
if(isset($_SESSION['access'])){
  if($_SESSION['access']==0){?>
   
    <form action="saveAnswer.php" method="POST">
    <label for="" style="color:white;font-size:30px;">IDs are <?php echo implode(", ", $questionIds); ?></label>
      <input type="text" name="ids" style="color:black;font-size:30px;"><br>

      <label for="" style="color:white;font-size:30px;">Answer</label>
      <input type="text" name="answer" style="color:black;font-size:30px;">
      <input type="submit" name = "submit">
    </form>';
<?php }
} ?>


<div class="containerFluid">
  <h2 style="font-size:20px;">Frequently Asked Questions(FAQs)</h2>
  <?php foreach ($questions as $question) { ?>
  <div class="accordion">
    <div class="icon"></div>
    <h5><?php echo $question['question'];?></h5>
  </div>
  <div class="panel">
    <p>
    <?php echo isset($answers[$question['id']]) ? $answers[$question['id']] : "No answer found."; ?>
    </p>
  </div>
  <?php } ?>
</div>

  <script  src="./FAQ.js"></script>
  <script src="https://kit.fontawesome.com/49b85c6328.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
