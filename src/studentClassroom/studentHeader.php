<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/overall.css">
</head>
<body>
<?php
try {
    /*check username and password now*/
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    /*connect database*/
    include "../inc/connect_inc.php";
    /*if has variable, do not query*/
    if (!isset($pq)) {
        $q = mysqli_query($db, "SELECT * FROM student WHERE BINARY username ='$username';");
        if (!$q) {
            throw new Exception($db->error);
        }
        $pq = mysqli_fetch_assoc($q);
        if (!$pq) {
            throw new Exception($db->error);
        }
    }
    if ($pq['password'] != $password) {
        include_once "../loginSystem/logout.php";
        exit();
    }
} catch (Exception $e) {
    require_once "../errorPage/errorPageFunc.php";
    $cls = new errorPageFunc();
    $cls->sendErrMsg($e->getMessage());
}
/*type true: student, false: teacher*/
$type = 1;
?>
<div class="panel">
    <div class="nav">
        <a href="studentMain.php">Home</a>
        / <a href="settingStudent.php">Setting</a>
        / <a href="../loginSystem/logout.php">Logout</a>
    </div>