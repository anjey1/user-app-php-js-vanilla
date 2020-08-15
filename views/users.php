<!doctype html>
<style>
<?php include 'css/users.css'; ?>
</style>
<title>Users page</title>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p id="userAgent">User Agent Not Available</p>
    <p id="loginCount">Login Count Not Available</p>
    <p id="registerTime">Register Time Not Available</p>
  </div>
</div>
<body onload="fetchUsers()">
<header id="pageHeader">
<?php
    session_start();
    if($_SESSION && $_SESSION["userName"] && $_SESSION["userName"] !== null){
        echo "Welcome " . $_SESSION["userName"] . " ";
    } else {
        header("Location: /login");
    }
?>
  <a id="logout" href="/logout">Logout</a></header>
  <article id="mainArticle"></article>
  <footer id="pageFooter"></footer>
</body>
<script>
<?php include 'js/users.js'; ?>
</script>

