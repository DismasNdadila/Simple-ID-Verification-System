<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Id Verification</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.style.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" >
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>

</body>

<div class="row">
    <div class="col-lg-12">
        <nav class="navbar bg-primary">
            <div class="container-fluid">
                <div class="col-lg-8">
                    <span class="navbar-brand mb-0 h1 brand-name-logo">Online ID Verification System</span>
                </div>
                <div class="col-lg-4 login-logout-btn">
                    <?php 
                            if($page=="login"){                          
                    ?>
                  <a href="signup.php" > <button class="btn btn-sm btn-dark">SIGNUP</button> </a>

                    <?php } if($page=="signup"){ ?>

                     <a href="index.php" > <button class="btn btn-sm btn-dark">LOGIN</button> </a>
                        <?php } if($page == "student_dashboard"){ ?>
                                    <span class="badge bg-dark  "> <i class="fa-solid fa-book fa-lg" ></i> STUDENT DASHBOARD</span>
                        <?php } if($page == "staff_dashboard"){ ?>

                            
                                <p class="staff-links"> <a href="staff.dashboard.php">Students</a> | <a href="staff.requests.php">ID Requests</a> | <a href="staff.registerstudent.php">Register Student</a> <span class="badge bg-dark"> <i class="fa-solid fa-sliders"></i> STAFF DASHBOARD </span>  </p>
                                
                            

                            <?php }if (isset($_SESSION['student']) ){ ?>

                   <a href="logout.php">  <button class="btn btn-sm btn-dark">LOGOUT</button> </a>

                     <?php }if (isset($_SESSION['staff']) ){ ?>

                        <a href="logout.php">  <button class="btn btn-sm btn-dark">LOGOUT</button> </a>

                        <?php } ?>
                </div>
            </div>
        </nav>
    </div>
</div>

