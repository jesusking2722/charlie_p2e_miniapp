<?php
session_start();
if(isset($_POST['login'])){
  if($_POST['login']=='chrlep'){
    if($_POST['password']=='mck&zn10a_99ak12'){
      $_SESSION['admin']="1";
      header("location: /admin/");
    }
  }
}
if(isset($_SESSION['admin'])){
      header("location: /admin/");  
}
?>
<!Doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">
</head>
<style>
   body{font-size:.875rem}.feather{width:16px;height:16px;vertical-align:text-bottom}.sidebar{position:fixed;top:0;bottom:0;left:0;z-index:100;padding:30px 0 0;box-shadow:inset -1px 0 0 rgba(0,0,0,.1)}.sidebar-sticky{position:relative;top:0;height:100%;padding-top:.5rem;overflow-x:hidden;overflow-y:auto}@supports ((position:-webkit-sticky) or (position:sticky)){.sidebar-sticky{position:-webkit-sticky;position:sticky}}.sidebar .nav-link{font-weight:500;color:#333}.sidebar .nav-link .feather{margin-right:4px;color:#999}.sidebar .nav-link.active .feather,.sidebar .nav-link:hover .feather{color:inherit}.sidebar-heading{font-size:.75rem;text-transform:uppercase}[role=main]{padding-top:30px}.navbar-brand{padding-top:.75rem;padding-bottom:.75rem;font-size:1rem;background-color:rgba(0,0,0,.25);box-shadow:inset -1px 0 0 rgba(0,0,0,.25)}
</style>

<body>

      <div class="container" style="width: 400px;margin-top: 2%;">
      <form action="/admin/login.php" method="POST">
        <h2>Admin panel</h2>
          <input type="text" name="login" class="form-control mb-3" placeholder="Enter Login" required>
          <input type="password" name="password" class="form-control mb-3" placeholder="Enter Password" required>
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>
  </body>
</html>
