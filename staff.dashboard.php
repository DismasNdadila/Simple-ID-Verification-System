<?php 

$page = "staff_dashboard";
include("includes/db.connection.php");
include("includes/header.php");


if(!isset($_SESSION['staff'])){

    echo "
        <script>window.open('index.php','_self') </script>
    ";

}

//delete a student

if(isset($_GET['delete'])){

  $delete_id = $_GET['delete'];

  $delete = "DELETE FROM students WHERE student_id='$delete_id' ";
  $run_delete = mysqli_query($conn,$delete);

  if($run_delete){

    echo "
        <script> window.open('staff.dashboard.php','_self') </script>
    ";

  }

}

?>

    <center> <h2 class="mt-3">STUDENTS</h2> </center>

    <table class="table m-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Course</th>
      <th scope="col">Profile</th>
      <th scope="col">ID Status</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php   
    //Get all Students
    $i = 0;
    $get_students = "SELECT * FROM students";
    $run_students = mysqli_query($conn,$get_students);

    while($row_students = mysqli_fetch_array($run_students)){

    $firstname = $row_students['firstname'];
    $lastname = $row_students['lastname'];
    $course = $row_students['course'];
    $student_id = $row_students['student_id'];
    $image = $row_students['image'];
    $i++;
    
    //get student id status

    $get_status = "SELECT * FROM requests WHERE student_id='$student_id'";
    $run_status = mysqli_query($conn,$get_status);
    $check_request = mysqli_num_rows($run_status);

    if($check_request >= 1 ){
    $row_status = mysqli_fetch_array($run_status);

    $student_id_status = $row_status['status'];

    if($student_id_status == "Requested"){

        $IDSTATUS = "<span class='badge bg-danger'> Unverified </span>";

    }
    if($student_id_status == "Rejected"){

      $IDSTATUS = "<span class='badge bg-danger'> Rejected </span>";

    }

    if($student_id_status == "Verified"){

      $IDSTATUS = "<span class='badge bg-success'> Verified </span>";

  }

    }
    
    if($check_request < 1){

      $IDSTATUS = "<span class='badge bg-danger'> Not Requested </span>"; 

    }

    ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $firstname ?></td>
      <td><?= $lastname ?></td>
      <td><?= $course ?></td>
      <td>      <img src="images/<?= $image ?>" class="img-fluid rounded-top student-pic"  alt="Student Picture"> 
            </td>
      <td><?= $IDSTATUS ?></td>
      <td><a href="staff.dashboard.php?delete=<?= $student_id ?>"><i class="fa-solid fa-trash"></i></a></td>
    </tr>
   <?php } ?>
  </tbody>
</table>


<?php
include("includes/footer.php");

?>