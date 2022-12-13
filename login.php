<?php include 'includes/timeoutable.php' ?>

<body style="background-image: url(https://i.ibb.co/1mCSH4q/technologies-abstract-background-with-plexus-connections-wire-frame-web-seamless-looping-r8eid3614g-thumbnail-full01.png); background-repeat: no-repeat; background-size: cover;">
    <?php 
        include 'includes/db.php';  
    ?>
    <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
        echo "<script type='text/javascript'> document.location = 'panel.php'; </script>";
      //  header('Location: panel.php');
    } else { //IF NO USER LOGGED IN
    }
?>
    <?php include 'header.php'; ?>
    <div class="container">

        <?php //WHAT HAPPENS AFTER CLICKING SEND PASSWORD BEGINS
       // if(isset($_GET['code'])){
       /* if(($_GET['email'] AND $_GET['code'] AND $_GET['user'])){
            $date = date('Y-m-d H:i:s');
            $co = $_GET['code'];
            $em = $_GET['email'];
            $us = $_GET['user'];
                $sel_sql = "SELECT * From users WHERE code = '$co' AND username = '$us'";
                        $do_sql = mysqli_query($conn,$sel_sql);
                        if(mysqli_num_rows($do_sql) == 1){
         $ins_sql = "UPDATE users SET email='$em', updated_at='$date' WHERE code = '$co' and username = '$us'";
                                    $run_sql = mysqli_query($conn,$ins_sql);
                                    echo '<h4 style="color:green;" class="blinking text-center">User Account Registered Successfully! <a href="signin.php">Signin...</a></h4>';
                                         // header('Location: login.php');   
        }else {
                            echo '<h4 style="color:red;" class="blinking text-center">Invalid Credentials!</h4>';
                        }
        }
         */   
    ?>
       <?php
                      if(isset($_GET['registered'])) {
                     echo '<div class="alert alert-success">
  <strong>Registration Successfull!</strong> Please signin to continue.
</div>';
                        }
                        ?>
            <?php
                      if(isset($_GET['invalidrefer'])) {
                     echo '<p style="color:orange;">Successfully registered</p>
                        <p>Referral link not activated because it is spam</p>
                     ';
                        }
                        ?>
                <?php
if(isset($_POST{'signin_submit'})){ //IF LOGIN BTN HAS BEEN CLICKED
    if(!empty($_POST{'user_email'}) && !empty($_POST{'user_password'})){ //CHECK IF EMAIL AND PASSWORD IS EMPTY 
        $get_user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $get_user_email = mysqli_real_escape_string($conn,$get_user_email);
        $get_password = mysqli_real_escape_string($conn, $_POST['user_password']);
        $sql = "SELECT * FROM users WHERE email = '$get_user_email' AND password = '$get_password'"; //FOR USERS
        if($result1 = mysqli_query($conn,$sql)){ //FOR USERS IF THERE IS CONNECTION TO THE DATABASE WHERE EMAIL AND PASSWORD IS AVAILABLE
            if(mysqli_num_rows($result1) == 1){ //IF NO. OF ROWS WITH ABOVE QUERY IS JUST ONE
                 $_SESSION['loggedin'] = true;
                $_SESSION['user_email'] = $get_user_email; // $username coming from the form, such as $_POST['username']
                $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
               // $inno_sql = mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($result1)){ //RETRIEVE INVENTOR DETAILS
                    $_SESSION['name'] = $rows['name'];
                    $_SESSION['nickname'] = $rows['nickname'];
                    $_SESSION['gender'] = $rows['gender'];
                    $_SESSION['bank'] = $rows['bank'];
                    $_SESSION['act_no'] = $rows['act_no'];
                    $_SESSION['phone_no'] = $rows['fone_no'];
                    $_SESSION['state'] = $rows['state'];
                    $_SESSION['walletcode'] = $rows['walletcode'];
                    $_SESSION['role'] = $rows['role'];
                    $_SESSION['id'] = $rows['id'];
                    $_SESSION['created_at'] = $rows['created_at'];
                    $_SESSION['updated_at'] = $rows['updated_at'];
                    $_SESSION['id'] = $rows['id'];
                }
                echo "<script type='text/javascript'> document.location = 'panel.php'; </script>"; 
             //   header('Location: panel.php');
                    
            } else{
                echo "<script type='text/javascript'> document.location = 'signin.php?login_error=wrong'; </script>"; 
              //  header('Location: signin.php?login_error=wrong');
            } //
        } else{
            echo "<script type='text/javascript'> document.location = 'signin.php?login_error=query_error'; </script>"; 
           // header('Location: signin.php?login_error=query_error');
        }
    }else{
        echo "<script type='text/javascript'> document.location = 'signin.php?login_error=empty'; </script>";
     //   header('Location: signin.php?login_error=empty');
    } 
}else{
    $login_err = '';
    
}
        if(isset($_GET['login_error'])){ //TO OUTPUT LOGIN ERROR
    if($_GET['login_error'] == 'empty'){  //LOGIN ERROR FOR EMPTY
        $login_err = "<div class='alert alert-danger'>Email or password was empty!</div>";
    }elseif($_GET['login_error'] == 'wrong'){ //LOGIN ERROR FOR INVALID DETAILS
        $login_err = "<div class='alert alert-warning'>Invalid email or password!</div>";
    }
}
   echo $login_err;    
?>
                    <!--LOGIN INTRO-->
                    <!--FORM FOR LOGIN STARTS HERE-->
                    <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        <form role="form" class="register-form" method="POST" action="login.php" class="form-vertical text-center" enctype="multipart/form-data" role="form" name="myForm">
                            <h2>Sign in <small>manage your account</small></h2>
                            <hr class="colorgraph">

                            <div class="form-group">
                                <input type="email" name="user_email" id="user_email" class="form-control input-md" placeholder="Email Address" tabindex="4">
                            </div>
                            <div class="form-group">
                                <input type="password" name="user_password" class="form-control input-md" id="user_password" placeholder="Password">
                            </div>

                            <div class="row">
                                <div class="col-xs-4 col-sm-3 col-md-3">
                                    <span class="button-checkbox">
                        
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                    </span>
                                </div>
                            </div>

                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-6"><input type="submit" name="signin_submit" value="Signin" id="user_password" class="btn btn-primary btn-block btn-md" tabindex="7"></div>
                                <div class="col-xs-12 col-md-6" style="color: white">Don't have an account? <a href="register.php">Register</a> or <a href="forgot_password.php">Recover password</a></div>
                            </div>
                        </form>
                    </div>
                </div>
    </div></div>
    <div style="height:100px;"></div>
    <?php include 'footer.php' ?>
</body>
