<?php
require_once('db.php');

?>

<h2>Dashboard</h2>
          <div class="new-card pt-5">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="table-body pt-5">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Roll</th>
                <th>Student Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php 
           $query = "SELECT * from add_student";
           $result = mysqli_query($db, $query);
              
           while($students = mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $students['id'];?></td>
                <td><?php echo $students['student_name'];?></td>
                <td><?php echo $students['student_roll'];?></td>
                <td><img style="width: 50px; height: 50px;" src="img/<?php echo $students['student_photo'];?>" alt=""></td>
                <td><a href="update.php?<?php echo $students['id'];?>">Edit</a> <a href="">Delete</a></td>
            </tr>
            <?php } ?>
            
        </tbody>
        
    </table>
          </div>