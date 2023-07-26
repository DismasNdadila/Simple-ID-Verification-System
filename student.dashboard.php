<?php 
$page = "student_dashboard";

include("includes/db.connection.php");
include("includes/header.php");

//check id student has logged in

if(!isset($_SESSION['student'])){

    echo "
        <script>window.open('index.php','_self') </script>
    ";

}

?>


<div class="row mt-3 pt-3 ml-3">

    <div class="col-lg-6 p-3 ">

        <?php 
        //check if a student requested to verify his ID

        if(isset($_GET['request'])){

            $request_id = $_GET['request'];
            $request_status = "Requested";

            //add reques to databse

            $add_request = "INSERT INTO requests (student_id,status) VALUES 
            ('$request_id','$request_status')";
            $run_request = mysqli_query($conn,$add_request);

            if($run_request){
            echo "
                <script> window.open('student.dashboard.php','_self') </script>
            ";
            }
            

        }

    //check if any student has logged in
    if(!isset($_SESSION['student'])){

        echo "
            <script>window.open('index.php','_self') </script>
        ";
    }
//Get the inforamtion of the student who has logged in

if(isset($_SESSION['student'])){

$student_email  = $_SESSION['student'];

$get_student  = "SELECT * FROM students WHERE email='$student_email'";
$run_student  = mysqli_query($conn,$get_student);
$row_student = mysqli_fetch_array($run_student);

$firstname = $row_student['firstname'];
$lastname = $row_student['lastname'];
$course = $row_student['course'];
$year = $row_student['year'];
$email = $row_student['email'];
$status = $row_student['status'];
$student_id  = $row_student['student_id'];
$image = $row_student['image'];


}


?>

        <div class="card border border-primary border-right-0 ">
            <div class="card-header">
                Your Registration
            </div>
            <ul class="list-group list-group-flush">
                <!----Image is Here ---->
            <li class="list-group-item">
              <center>  <img src="images/<?= $image ?>" class="img-fluid rounded-top student-pic"  alt="Student Picture"> </center>
            </li>
            <!-------Images of student on the top-------->
                <li class="list-group-item"> <i class="fa-solid fa-user"></i> <b> NAME:</b> <?= $firstname ?>
                    <?= $lastname ?></li>
                <li class="list-group-item"> <i class="fa-solid fa-book"></i> <b> COURSE:</b> <?= $course ?>
                    Science</li>
                <li class="list-group-item"> <i class="fa-solid fa-clock"></i> <b> YEAR:</b> <?= $course ?></li>
                <li class="list-group-item"> <i class="fa-solid fa-envelope"></i> <b> EMAIL:</b> <?= $email ?></li>
                <li class="list-group-item"> <i class="fa-solid fa-book"></i> <b> REGISTRATION:</b> <span
                        class="badge bg-success"> <?= $status ?> </span> </li>
            </ul>
        </div>

    </div>

    <div class="col-lg-1">

    </div>

    <div class="col-lg-5 p-3">
        <div class="card border border-danger border-right-0 ">
            <div class="card-header">
                Your ID Status
            </div>
            <?php 
            
            //check if user has requested for id 

            $check_request = "SELECT * FROM requests WHERE student_id='$student_id'";
            $run_request = mysqli_query($conn,$check_request);
            $row_request = mysqli_fetch_array($run_request);

            $if_requested = mysqli_num_rows($run_request);

            if($if_requested >= 1){

            $request_status = $row_request['status'];
            }

           
            if($if_requested < 1){

                $request_check= '<span class="badge bg-danger round-pill"> <i class="fa-solid fa-circle-xmark"></i> Not Requested</span>';

                $verified_check = '<span class="badge bg-danger round-pill"> <i class="fa-solid fa-circle-xmark"></i> Not Requested</span>';


            }

            if($if_requested >= 1){

                $request_check = '<span class="badge bg-success round-pill"> <i class="fa-solid fa-check"></i> Requested</span>';

            }

            if($if_requested >= 1){

            if($request_status == "Requested"){

                $verified_check = '<span class="badge bg-danger round-pill"> <i class="fa-solid fa-circle-xmark"></i> Not Verified</span>';

            }

            if($request_status == "Rejected"){

                $verified_check = '<span class="badge bg-danger round-pill"> <i class="fa-solid fa-circle-xmark"></i> Rejected</span>';

            }

            if($request_status == "Verified"){

                $verified_check = '<span class="badge bg-success round-pill"> <i class="fa-solid fa-check"></i> Verified</span>';
 

            }
            
        }
            ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <i class="fa-solid fa-gear"></i> <b> REQUESTED ID:</b>
                    <?= $request_check ?> </li>
                <li class="list-group-item"> <i class="fa-solid fa-circle-exclamation"></i> <b> VERIFICATION:</b>
                    <?= $verified_check ?> </li>

                <?php    if($if_requested < 1){ ?>
                <li class="list-group-item">
                    <center> <a href="student.dashboard.php?request=<?= $student_id ?>"> <button
                                class="btn btn-dark btn-sm"> REQUEST ID </button> </a> </center>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>

</div>


<?php 

include("includes/footer.php");

?>