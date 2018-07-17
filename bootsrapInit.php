<!DOCTYPE HTML>  
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link href="css/bootstrap.css" rel="stylesheet"> 
<style>
.error {color: #FF0000;}

.jumbotron-fluid {
	background-color: grey;
}
</style>
 </head>

<body>  
<?php
session_start();
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$_SESSION['username'] = $_SESSION['password'] = "";
