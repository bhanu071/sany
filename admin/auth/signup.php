<?php
session_start();

$fname = "Bhanu Pratap";
$lname = "Prasad";
$full_name = $fname.' '.$lname;
$email = "pratapbh71@gmail.com";


$_SESSION['first_name'] = $fname;
$_SESSION['last_name'] = $lname;
$_SESSION['full_name'] = $full_name;
$_SESSION['email'] = $email;

echo $_SESSION['first_name']."<br>";
echo $_SESSION['last_name']."<br>";
echo $_SESSION['full_name']."<br>";
echo $_SESSION['email']."<br>";


?>