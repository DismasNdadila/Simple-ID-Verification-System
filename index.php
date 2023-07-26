<?php

$page = "login";

include("includes/header.php");
include("includes/db.connection.php");
?>

<br>


<div class="row mt-3">
    <div class="col-lg-4">

    </div>

    <div class="col-lg-4 mb-3">
        <?php

        //cHECK IF Student user has already logged in
        
        if (isset($_SESSION['student'])) {

            echo "
                <script>window.open('student.dashboard.php','_self') </script>
            ";

        }

        if (isset($_POST['login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];


            // Check if user is registerd as a student
        
            $check_student = "SELECT * FROM students WHERE email='$email' AND password='$password'";
            $run_student = mysqli_query($conn, $check_student);
            $if_available = mysqli_num_rows($run_student);

            if ($if_available >= 1) {

                $_SESSION['student'] = $email;

                echo "
                        <script> window.open('student.dashboard.php','_self') </script>
                    ";

            }

        

            //Check if user is a student ends here!
        
            //check if user is registerd as a staff
        
            $check_staff = "SELECT * FROM staff WHERE email='$email' AND password='$password'";
            $run_staff = mysqli_query($conn, $check_staff);
            $if_staff = mysqli_num_rows($run_staff);

            if ($if_staff >= 1) {

                $_SESSION['staff'] = $email;

                echo "
        <script> window.open('staff.dashboard.php','_self') </script>
    ";

            }

            if($if_staff < 1){

                echo "WRONG PASSWORD OR EMAIL";

            }
        }

        ?>
        <form method="post" action="">
            <div class="card">
                <div class="card-header bg-primary">
                    <center>LOGIN</center>
                </div>
                <div class="card-body">
                    <div class="mb-3">

                        <label for="formGroupExampleInput" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="formGroupExampleInput"
                            placeholder="Enter Your Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput2"
                            placeholder="Enter Your Password" required>
                    </div>
                </div>
                <div class="card-footer">
                    <center>
                        <button type="submit" name="login" class="btn btn-lg btn-dark form-button-signup"> <i
                                class="fa-solid fa-paper-plane"></i>
                            LOGIN</button>
                    </center>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-4">

    </div>
</div>



<?php

include("includes/footer.php");

?>