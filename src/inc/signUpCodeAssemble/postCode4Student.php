<?php
/*if no error*/
if ($nameErr == '' && $emailErr == '' && $pswdErr == '' && $pswdErr2 == '' && $fnameErr == '' && $lnameErr == '' && $phoneErr == '') {
    $sql = "INSERT INTO student (id, username, fname, lname, email, phone, address, password) VALUE(NULL, '$username', '$fname', '$lname', '$email', '$phone', '$address', '$password');";
    $qr = mysqli_query($db, $sql);
    if (!$qr) {
        throw new Exception($db->error);
    }
    setcookie('username', $username, null, '/');
    setcookie('type', 1, null, '/');
    setcookie('fname', $fname, null, '/');
    setcookie('lname', $lname, null, '/');
    header("Location: " . "../studentClassroom/studentMain.php");
    exit();
}