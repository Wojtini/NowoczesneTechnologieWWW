<?php

session_start();

require_once "config.php";

if(! isset($_SESSION["loggedin"])){
  //echo "nie zalogowany";
  //echo $_SESSION["username"];
  header('Location: projekty.php');
  exit;
}
$sql = "INSERT INTO comments (projectid, username, comment) VALUES (?, ?, ?)";
// $_SESSION["username"]

if($stmt = mysqli_prepare($link, $sql)){
    echo "Test git";
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $param_projectid, $param_userid, $param_comment);

    // Set parameters
    $param_projectid = $_GET["project"];
    $param_userid = $_SESSION["username"];
    $param_comment = $_GET["submittext"];

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Redirect to login page
        header("location: projekty.php");
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}else{
    echo "Test nie git";
}
mysqli_close($link);
//header('Location: projekty.php');
//exit;
 ?>
