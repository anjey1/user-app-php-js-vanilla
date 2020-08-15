<?php
   if($_SERVER['REQUEST_METHOD'] === 'POST'&& $_REQUEST["userName"] && $_REQUEST["password"] ) {

      $userName = $_REQUEST["userName"];
      $password = $_REQUEST["password"];
   
      $usersObject = json_decode(file_get_contents("storage/users.json"));
      
      if ($usersObject === false) {
          echo "Service is currently Down Come Back Later";
      }

      if (
        isset($usersObject->$userName) && 
        isset($usersObject->$userName->name) && 
        $userName === $usersObject->$userName->name && 
        $password === $usersObject->$userName->password){
        session_start();
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
          
        $_SESSION['userName']     = $userName;
        $_SESSION['IP']           = $ip;
        $_SESSION['loginTime']    = date("d/m/Y h:i:sa");
        

      $usersObject->$userName->IP         = $ip;
      $usersObject->$userName->userAgent  = $_SERVER['HTTP_USER_AGENT'];
      $usersObject->$userName->loginCount++;
      $usersObject->$userName->loginTime  = date("d/m/Y h:i:sa");
      $usersObject->$userName->status     = "Online";
      
      file_put_contents("storage/users.json", json_encode($usersObject));
      header("Location: /users");
   } else {
      header("Location: /login");
   }
   } else {
     header("Location: /login");
   }
   