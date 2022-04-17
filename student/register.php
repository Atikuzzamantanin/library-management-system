<?php 
include '../dbcon.php';
session_start();
if(isset($_SESSION ['student_login'])){
        header('location:index.php');
    }


if(isset($_REQUEST['student_register'])){
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $roll = $_REQUEST['roll'];
    $reg = $_REQUEST['reg'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $phone = $_REQUEST['phone'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $confirmpassword = $_REQUEST['confirmpassword'];

    $input_error = array();
        if(empty($fname)){
            $input_error ['fname']=" First Name Field Is Empty";
        }
        if(empty($lname)){
            $input_error ['lname']=" Last Name Field Is Empty";
        }
        if(empty($roll)){
            $input_error ['roll']=" Roll Field Is Empty";
        }
        if(empty($reg)){
            $input_error ['reg']=" Registration Field Is Empty";
        }
        if(empty($email)){
            $input_error ['email']=" Email Field Is Empty";
        }
        if(empty($username)){
            $input_error ['username']=" Username Field Is Empty";
        }
        if(empty($password)){
            $input_error ['password']=" Password Field Is Empty";
        }
        if(empty($confirmpassword)){
            $input_error ['confirmpassword']=" Confirm Password Field Is Empty";
        }
        if(empty($phone)){
            $input_error ['phone']=" Phone Field Is Empty";
        }
// ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        if(count($input_error)==0){
            $email_check = mysqli_query($con,"SELECT * FROM `students` WHERE `email` ='$email'");
            if(mysqli_num_rows($email_check)==0){
                $username_check = mysqli_query($con,"SELECT * FROM `students` WHERE `username` ='$username'");
                if(mysqli_num_rows($username_check)==0){
                    $phone_check = mysqli_query($con,"SELECT * FROM `students` WHERE `phone` ='$phone'");
                    if(mysqli_num_rows($phone_check)==0){
                        if(strlen($reg)>5){
                            if(strlen($reg)<7){
                                if(strlen($roll)>5){
                                    if(strlen($roll)<7){
                                        if(strlen($phone)>10){
                                            if(strlen($phone)<12){
                                                if(strlen($password)>5){
                                                    if($password == $confirmpassword){
                                                        $query = mysqli_query($con,"INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`,`status`, `phone`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone')");
                                                        if($query){
                                                            $success = "Data Insert Success";
                                                        }else{
                                                            $unseccess = "Data Not Insert";
                                                        }
                                                    }else{ $match_pass = "Conform Password Not Match";}   
                                                }else{ $password_l = " Password Is Too Short";}
                                            }else{ $phone_l = "Must type 11 Digit";}  
                                        }else{$phone_l = "Must type 11 Digit";}  
                                    }else{$roll_l = " Must type 6 digit";}    
                                }else{$roll_l = " Must type 6 digit";}
                            }else{$reg_l = " Must type 6 digit"; }
                        }else{$reg_l = " Must type 6 digit";}
                    }else{ $phone_error = "This Number Already Exits "; }  
                }else{$username_error = "This Username Already Exits";}
            }else{$email_error = "This Email Already Exits";}
            // end email check conditon
        }

}

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>
                <?php
                     if(isset($success)){
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?= $success;?>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        <?php
                     }
                 ?>
                 <?php
                     if(isset($unsuccess)){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $unsuccess;?>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        <?php
                     }
                 ?>
                 
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="" method="POST">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php if(isset($fname)){echo $fname;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($input_error['fname'])){ echo '<span class="input-error">'.$input_error['fname'].'</span>';} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php if(isset($lname)){echo $lname;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($input_error['lname'])){ echo '<span class="input-error">'.$input_error['lname'].'</span>';} ?>
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" name="roll" placeholder="Roll" value="<?php if(isset($roll)){echo $roll;} ?>">
                                <i class="fa fa-fast-forward"></i>
                            </span>
                            <?php if(isset($input_error['roll'])){ echo '<span class="input-error">'.$input_error['roll'].'</span>';} ?>
                             <?php if(isset($roll_l)){ echo '<span class="input-error">'.$roll_l.'</span>';} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" name="reg" placeholder="Reg. No" value="<?php if(isset($reg)){echo $reg;} ?>">
                                <i class="fa fa-fast-forward"></i>
                            </span>
                            <?php if(isset($input_error['reg'])){ echo '<span class="input-error">'.$input_error['reg'].'</span>';} ?>
                            <?php if(isset($reg_l)){ echo '<span class="input-error">'.$reg_l.'</span>';} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php if(isset($input_error['email'])){ echo '<span class="input-error">'.$input_error['email'].'</span>';} ?>
                            <?php if(isset($email_error)){ echo '<span class="input-error">'.$email_error.'</span>';} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($username)){echo $username;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php if(isset($input_error['username'])){ echo '<span class="input-error">'.$input_error['username'].'</span>';} ?>
                            <?php if(isset($username_error)){ echo '<span class="input-error">'.$username_error.'</span>';} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($input_error['password'])){ echo '<span class="input-error">'.$input_error['password'].'</span>';} ?>
                            <?php if(isset($password_l)){ echo '<span class="input-error">'.$password_l.'</span>';} ?>
                        </div>
                         <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" value="<?php if(isset($confirmpassword)){echo $confirmpassword;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php if(isset($input_error['confirmpassword'])){ echo '<span class="input-error">'.$input_error['confirmpassword'].'</span>';} ?>
                            <?php if(isset($match_pass)){ echo '<span class="input-error">'.$match_pass.'</span>';} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" name="phone" placeholder="01***"  value="<?php if(isset($phone)){echo $phone;} ?>">
                                <i class="glyphicon glyphicon-phone-alt"></i>
                            </span>
                            <?php if(isset($input_error['phone'])){ echo '<span class="input-error">'.$input_error['phone'].'</span>';} ?>
                            <?php if(isset($phone_error)){ echo '<span class="input-error">'.$phone_error.'</span>';} ?>
                            <?php if(isset($phone_l)){ echo '<span class="input-error">'.$phone_l.'</span>';} ?>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
