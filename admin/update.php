<?php
require_once('db.php');
 if(isset($_POST['update_student'])){
  $student_name       = $_POST['student_name'];
  $student_roll   = $_POST['student_roll'];
  $student_photo      = $_POST['student_photo'];

  $photo = explode('.',$_FILES['student_photo']['name']);
  $photo = end($photo);
  $student_photo = $student_roll . '.' .$photo;

  
   $query = "SELECT * from add_student where id='$id'";

    $rows = mysqli_query($db, $query);
    
    if(mysqli_num_rows($rows) == 0){


  $sql = "UPDATE INTO add_student(student_name,student_roll,student_photo)VALUES('$student_name', '$student_roll', '$student_photo')";
                    
	 $result = mysqli_query($db, $sql);

	 if($result){

	   echo "Data inserted successfully";

	   move_uploaded_file($_FILES['student_photo']['tmp_name'], 'img/'.$student_photo);

	   header('location: index.php');

	 }else {

	    echo "Error: " . $sql . "<br>" . mysqli_error($db);
	 }
}else {

	    $roll_exits = "This roll exits!";
	 }
}

?>
<h2>Add Student</h2>
<div class="form-body">
	<form action="add-student.php" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
	    <label>Student Name</label>
	    <input type="text" class="form-control" placeholder="Student Name" name="student_name">
	  </div>
	  <div class="form-group">
	    <label>Student Roll</label>
	    <input type="text" class="form-control" placeholder="Student Roll" name="student_roll">
	    <label class="error"><?php if(isset($roll_exits['student_roll'])) echo $roll_exits['student_roll']; ?></label>
	  </div>
	  <div class="form-group">
	    <label>Student Photo</label>
	    <input type="file" class="form-control" name="student_photo">
	  </div>
	  <button type="submit" class="btn btn-primary" name="add_student">Add Student</button>
	</form>
</div>
          