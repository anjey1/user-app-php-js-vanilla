<?php
session_start();
$usersObject                      = json_decode(file_get_contents("storage/users.json"));
$userName                         = $_SESSION["userName"];
$usersObject->$userName->status   = "Offline";
file_put_contents("storage/users.json", json_encode($usersObject));

session_destroy();
unset($_SESSION);
header("Location: /login");