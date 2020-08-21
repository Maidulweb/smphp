<?php 
session_start();
if (!isset($_SESSION['login_user'])) {
  header('location:login.php');
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
   


    <title>Student Management PHP</title>
    <style>
      .sidebar ul li {
        list-style:none;
      }
    </style>
  </head>
  <body>
    <div class="top-header pt-3">
    <div class="container">
    
      <div class="float-left"><a href="index.php">Logo</a></div>
      <div class="float-right">
        <a class="btn btn-info" href="#">SMS</a>
        <a class="btn btn-info" href="">Add User</a>
        <a class="btn btn-info" href="">Profile</a>
        <a class="btn btn-info" href="logout.php">Logout</a>
      </div>
      <div class="clearfix"></div>
    </div>
    </div>
    
<div class="mainbody pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <h2><a href="index.php?page=dashboard">Dashboard</a></h2>
        <div class="sidebar">
          <ul>
            <li class=""><a href="index.php?page=add-student">Add Student</a></li>
            <li class=""><a href="index.php?page=all-student">All Student</a></li>
            <li class=""><a href="index.php?page=all-user">All Users</a></li>
          </ul>
        </div>
      </div> 
      <div class="col-md-10">
        <div class="container">
          <div class="content">
           <?php 
            if (isset($_GET['page'])) {
             $page = $_GET['page'].'.'.'php';
            }else{
              $page = 'dashboard.php';
            }

            if (file_exists($page)) {
              require_once $page;
            }else{
              require_once '404.php';
            }
           ?>
        </div>

        </div>

      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    

    <script>
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  </body>
</html>