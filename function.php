<!-- Coded by https://beproblemsolver.com  Visit for more such code -->
<?php

function santize($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function totalquestion($conn)
{
  $sql = "SELECT * FROM questions";
  $result = mysqli_query($conn, $sql);

  return mysqli_num_rows($result);
}