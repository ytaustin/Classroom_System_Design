<?php
$nameErr = $emailErr = $pswdErr = $fnameErr = $lnameErr = $officeErr = $phoneErr = "";
$pswdErr2 = " ";
$username = $email = $phone = $pswd = $pswd2 = $fname = $lname = $address = $office = "";
/*autofocus place*/
$errorArr = array('');
$errorFirstLocation = 'username';
/*text trim*/
include "stringUtils.php";
$strcls = new stringUtils();

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "signUpCodeAssemble/sameCheckCode.php";
        include "signUpCodeAssemble/checkFirstErr.php";
        include "signUpCodeAssemble/postCode4Teacher.php";
    }
} catch (Exception $e) {
    require_once "../errorPage/errorPageFunc.php";
    $cls = new errorPageFunc();
    $cls->sendErrMsg($e->getMessage());
}
