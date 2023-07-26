<?php
$page = "signup";
include("includes/db.connection.php");
include("includes/header.php");

?>

<br>


<div class="row mt-3">
    <div class="col-lg-4">

    </div>

    <?php
//check if staff has already logged in
      if(isset($_SESSION['staff'])){

        echo "
            <script>window.open('staff.dashboard.php','_self') </script>
        ";

      }

  //register a new staff
  
  if (isset($_POST['register'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //insert into staff table
    $add_staff = "INSERT INTO staff (firstname,lastname,email,password) VALUES
      ('$firstname','$lastname','$email','$password')";
    $run_staff = mysqli_query($conn, $add_staff);

    if ($run_staff) {
      $_SESSION['staff'] = $email;

      echo "
                <script>window.open('staff.dashboard.php','_self') </script>
          ";
    }

  }

  ?>


    <div class="col-lg-4 mb-3">
        <form method="post" action="">
            <div class="card ">
                <div class="card-header bg-primary">
                    <center>STAFF SIGNUP</center>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="formGroupExampleInput2"
                                placeholder="Enter Your Firstname" required >
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="formGroupExampleInput2"
                                placeholder="Enter Your Lastname" required >
                        </div>
                        <label for="formGroupExampleInput" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="formGroupExampleInput"
                            placeholder="Enter Your Email" required >
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput2"
                            placeholder="Enter Your Password" required >
                    </div>
                </div>
                <div class="card-footer">
                    <center>
                        <button type="submit" name="register" class="btn btn-lg btn-dark form-button-signup"> <i
                                class="fa-solid fa-paper-plane"></i>
                            SIGNUP</button>
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