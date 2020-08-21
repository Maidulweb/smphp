<?php 
require_once('db.php');
session_start();

if (isset($_SESSION['login_user'])) {
  header('location:index.php');
}

if(isset($_POST['login'])){
  $username   = $_POST['username'];
  $password   = $_POST['password'];

  $query = "SELECT * from users where username='$username'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  if($row['username'] == $username && $row['password'] == md5($password)){
    if ($row['status'] == 'active') {
      $_SESSION['login_user'] = $username; 
      header('location:index.php');
    }else{
    $status_error = 'Please activate your account';
    }
  }else {
    $login_error = 'Wrong information!!!!';
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Student Management PHP</title>
  </head>
  <body>
     <div class="top-header pt-3">
    <div class="container">
    
      <div class="float-left"><a href="">Logo</a></div>
      <div class="float-right">
        
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
      </div>
      <div class="clearfix"></div>
    </div>
    </div>
    <div class="top-header pt-3">
    <div class="container">
    <h1>Login</h1>
    <p class="btn-danger"><?php if(isset($login_error)){echo $login_error;}?></p>
    <p class="btn-danger"><?php if(isset($status_error)){echo $status_error;}?></p>
      <form action="login.php" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name="username" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
     </form>
    </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>