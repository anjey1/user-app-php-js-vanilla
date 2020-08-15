<?php
    session_start();
    if($_SESSION && $_SESSION["userName"] && $_SESSION["userName"] !== null){
        header("Location: /users");
    }
?>

<h1>Login Page</h1>
<style>
<?php include 'css/login.css'; ?>
</style>
<form action="auth" method="POST" class="myForm">
  <label for="userName">Username </label>
  <input type="text" name="userName" id="userName" value="John" required>
  <label for="password">Password </label>
  <input type="password" name="password" id="password" value="john" required>
  <input type = "submit" />
</form>