<?php 
require_once('db.php');
session_start();

if (isset($_SESSION['login_user'])) {
  header('location:index.php');
}
if(isset($_POST['register'])){
  $name       = $_POST['name'];
  $username   = $_POST['username'];
  $email      = $_POST['email'];
  $password   = $_POST['password'];
  $c_password = $_POST['c_password'];

  $photo = explode('.',$_FILES['photo']['name']);
  $photo = end($photo);
  $photo = $username . '.' .$photo;

  $input_error = [];
  if(empty($name)){
    $input_error['name'] = "The name field is required!";
  }

  if(empty($username)){
    $input_error['username'] = "The username field is required!";
  }

  if(empty($email)){
    $input_error['email'] = "The email field is required!";
  }

  if(empty($password)){
    $input_error['password'] = "The password field is required!";
  }

  if(empty($c_password)){
    $input_error['c_password'] = "The confirm password field is required!";
  }

  if(count($input_error) == 0){

    $query = "SELECT * from users where username='$username'";

    $rows = mysqli_query($db, $query);
    
    if(mysqli_num_rows($rows) == 0){

      $query = "SELECT * from users where email='$email'";

      $rows = mysqli_query($db, $query);


       if(mysqli_num_rows($rows) == 0){

           if(strlen($username) > 2){

                if(strlen($password) > 3){

                   if($password == $c_password){

                     $password = md5($password);

                     $sql = "INSERT INTO users(name,username,email,password, photo,status)VALUES('$name', '$username', '$email', '$password', '$photo', 'inactive')";
                    
                     $result = mysqli_query($db, $sql);

                     if($result){

                       echo "Data inserted successfully";

                       move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$photo);

                       header('location: login.php');

                     }else {

                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                     }

                   }else {
                       $password_match = "Password does not match";
                   }
 
                }else {
                 $password_chr = "Password must be 6 chracters";
                }
           }else {
             $username_chr = "Username must be 3 chracters";
           }

        }else {
         $email_exits = "This email exits!";
        }

     }else {
      $username_exits = "This email username_exits!";
     }

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
    <style type="text/css">
      .error {
        color: red;
        font-style: italic;
      }
    </style>
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
      <div class="col-md-6 offset-md-3">
    <h1 class="text-center">Register</h1>
<form action="register.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)) echo $name;?>">
    <label class="error"><?php if(isset($input_error['name'])) echo $input_error['name']; ?></label>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($username)) echo $username;?>">
    <label class="error"><?php if(isset($input_error['username'])) echo $input_error['username']; ?></label>
    <label class="error"><?php if(isset($username_exits)) echo $username_exits; ?></label>
    <label class="error"><?php if(isset($username_chr)) echo $username_chr; ?></label>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($email)) echo $email;?>">
    <label class="error"><?php if(isset($input_error['email'])) echo $input_error['email']; ?></label>
    <label class="error"><?php if(isset($email_exits)) echo $email_exits; ?></label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <label class="error"><?php if(isset($input_error['password'])) echo $input_error['password']; ?></label>
    <label class="error"><?php if(isset($password_chr)) echo $password_chr; ?></label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="c_password" class="form-control" id="exampleInputPassword1">
    <label class="error"><?php if(isset($input_error['c_password'])) echo $input_error['c_password']; ?></label>
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" name="photo" class="form-control" id="photo">
  </div>
  <button type="submit" name="register" class="btn btn-primary">Register</button>
</form>
</div>
    </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>