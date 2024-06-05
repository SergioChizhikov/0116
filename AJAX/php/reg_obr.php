<?php

header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "oefnbvtr_0116";
$user = "oefnbvtr_0116";
$password = "123456";

$mysqli = mysqli_connect("$host", "$user", "$password", "$db");


if ($mysqli == false) {
  print("error");
} else {

  $name = $_POST["name"];
  $lastname = $_POST["lastname"];
  $email = trim(mb_strtolower($_POST["email"]));
  $pass = trim($_POST["pass"]);
  $pass = password_hash($pass, PASSWORD_DEFAULT);

  $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");

  if ($result->num_rows != 0) {
    print("exist");
  } else {
    $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
    print("ok");
  }


  // $sql = "INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES (?,?,?,?)";
  // $stmt = $mysqli->prepare($sql);
  // $stmt->bind_param("ssss", $name, $lastname, $email, $pass);
  // $stmt->execute();
}
