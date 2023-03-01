<!-- Coded by https://beproblemsolver.com  Visit for more such code -->
<?php
require_once("connect.php");
session_start();

if (isset($_POST['answer-submit'])) {

  // Checking if our Questions are even attempted
  if (!empty($_POST['checkanswer'])) {
    
    // Set a flag for correct answers
    $correctAnswers = 0;
    $selected = $_POST['checkanswer'];

    $sql = "SELECT * FROM questions";
    $result = mysqli_query($conn, $sql);

    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      // Matching Database Answerid with User selected answer id
      // If ans_id are matched our flag value is updated
      if ($row['ans_id'] == $selected[$i]) {
        $correctAnswers++;
      }
      $i++;
    }

    // Stored our score and attempted question value in session to be used on Result page
    $_SESSION['attempted'] = count($_POST['checkanswer']);
    $_SESSION['score'] = $correctAnswers;


    header("Location: result.php");
    exit();

  } else {
    // If Question not attempted set these variable like this
    $_SESSION['attempted'] = 0;
    $_SESSION['score'] = 0;
    header("Location: result.php");
    exit();
  }
}