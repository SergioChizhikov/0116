<?php

session_start();

header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "oefnbvtr_0116";
$user = "oefnbvtr_0116";
$password = "123456";

$mysqli = mysqli_connect("$host", "$user", "$password", "$db");


if ($mysqli == false) {
  print("error");
} else {
  $inputValue = $_POST["value"]; //Измененные данные
  $item = $_POST["item"]; //Или имя или фамилия
  // var_dump($item);
  $id = $_SESSION["id"]; //У кого меняем

  $mysqli->query("UPDATE `users` SET `$item`='$inputValue' WHERE `id`='$id'");

  $_SESSION[$item] = $inputValue;
}
