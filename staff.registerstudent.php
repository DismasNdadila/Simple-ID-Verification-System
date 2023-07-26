<?php

$page = "staff_dashboard";

include("includes/db.connection.php");
include("includes/header.php");


if (!isset($_SESSION['staff'])) {

    echo "
        <script>window.open('index.php','_self') </script>
    ";

}

?>



<center>
    <h3 class="m-3">Register Student</h3>
</center>


<div class="row mt-3">
    <div class="col-lg-4">

    </div>



    <div class="col-lg-4 mb-3">
        <div class="card ">
            <?php
            if (isset($_POST['register'])) {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $course = $_POST['course'];
                $year = $_POST['year'];
                $email = $_POST['email'];
                $password = $_POST['password'];


                $image = $_FILES['profile']['name'];
                $tmp_image = $_FILES['profile']['tmp_name'];



                $add_student = "INSERT INTO students (firstname,lastname,year,course,email,password,image) VALUES
                    ('$firstname','$lastname','$year','$course','$email','$password','$image')";
                $run_student = mysqli_query($conn, $add_student);


                if ($run_student) {

                    move_uploaded_file($tmp_image, "images/$image");

                     echo "
                        <script>window.open('staff.dashboard.php','_self') </script>
                    ";
                }

            }


            ?>
            <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="formGroupExampleInput2"
                                placeholder="Enter Student Firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="formGroupExampleInput2"
                                placeholder="Enter Student Lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Course</label>
                            <input type="text" name="course" class="form-control" id="formGroupExampleInput2"
                                placeholder="Enter Student Course" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Year</label>
                            <input type="number" name="year" class="form-control" id="formGroupExampleInput2"
                                placeholder="Enter Student Year" required>
                        </div>
                        <label for="formGroupExampleInput" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="formGroupExampleInput"
                            placeholder="Enter Student Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput2"
                            placeholder="Enter Student Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Profile Picture</label>
                        <input type="file" name="profile" class="form-control" id="formGroupExampleInput2"
                            placeholder="Enter Student Password" required>
                    </div>

            </div>
            <div class="card-footer">
                <center>
                    <button type="submit" name="register" class="btn btn-md btn-dark form-button-signup"> <i
                            class="fa-solid fa-paper-plane"></i>
                        Register</button>
                </center>
            </div>
            </form>

        </div>
    </div>



    <div class="col-lg-4">

    </div>
</div>







<?php

include("includes/footer.php");

?>