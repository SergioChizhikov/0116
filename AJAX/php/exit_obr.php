<?php

session_start();
unset($_SESSION["id"], $_SESSION["email"], $_SESSION["name"], $_SESSION["lastname"]);

session_destroy();
header("Location: ../auth.html");
die();
