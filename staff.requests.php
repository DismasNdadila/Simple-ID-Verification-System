<?php 

$page = "staff_dashboard";

include("includes/db.connection.php");
include("includes/header.php");

if(!isset($_SESSION['staff'])){

    echo "
        <script>window.open('index.php','_self') </script>
    ";

}

?>

<?php 
//verify student ID 

if(isset($_GET['verify'])){

    $verify_id = $_GET['verify'];

    //change status to verify

    $verify = "UPDATE requests SET status='Verified' WHERE request_id='$verify_id'";
    $run_verify = mysqli_query($conn,$verify);

    if($run_verify){
            echo "
                    <script> window.open('staff.requests.php','_self') </script>
            ";
    }

}

//Reject Student ID

if(isset($_GET['reject'])){

    $reject_id = $_GET['reject'];

    //change status to verify 

    $reject  = "UPDATE requests SET status='Rejected' WHERE request_id='$reject_id'";
    $run_reject = mysqli_query($conn,$reject);

    if($run_reject){
            echo "
            <script> window.open('staff.requests.php','_self') </script>
            ";
    }

}


?>


    <center> <h2 class="m-3">ID VERIFICATION REQUESTS</h2> </center>


    <table class="table m-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Course</th>
      <th scope="col">Profile</th>
      <th scope="col">Verify</th>
      <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>
<?php  
        //get requests
        $i = 0;
        $get_requests = "SELECT * FROM requests WHERE status='Requested'";
        $run_requests = mysqli_query($conn,$get_requests);

        while($row_request = mysqli_fetch_array($run_requests)){

            $student_id = $row_request['student_id'];
            $request_id = $row_request['request_id'];
           
    $get_students = "SELECT * FROM students WHERE student_id='$student_id'";
    $run_students = mysqli_query($conn,$get_students);

    while($row_students = mysqli_fetch_array($run_students)){

    $firstname = $row_students['firstname'];
    $lastname = $row_students['lastname'];
    $course = $row_students['course'];
    $student_id = $row_students['student_id'];
    $image  = $row_students['image'];
    $i++;
       
?>

    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $firstname ?></td>
      <td><?= $lastname ?></td>
      <td><?= $course ?></td>
      <td>     <img src="images/<?= $image ?>" class="img-fluid rounded-top student-pic"  alt="Student Picture"> 
            </td>
      <td> <a href="staff.requests.php?verify=<?= $request_id ?>"> <button class="btn btn-success btn-sm">Verify</button> </a> </td>
      <td> <a href="staff.requests.php?reject=<?= $request_id ?>"> <button class="btn btn-danger btn-sm">Reject</button> </a> </td>
    </tr>
   
    <?php } 
        }
    ?>
  </tbody>
</table>






    <?php 

include("includes/footer.php");

?>