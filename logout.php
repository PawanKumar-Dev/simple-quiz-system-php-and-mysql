<!-- Coded by https://beproblemsolver.com  Visit for more such code -->
<?php
require_once("connect.php");
session_start();
session_destroy();

header("Location: index.php");
exit();