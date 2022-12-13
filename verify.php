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
    <div style="height:100px;"></div>
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
                        ?> */
                        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                            // Verify data
                            $email = mysql_escape_string($_GET['email']); // Set email variable
                            $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                                          
                            $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
                            $do_sql = mysqli_query($conn, $search);
                            $match  = mysql_num_rows($do_sql);
                                          
                            if($match > 0){
                                // We have a match, activate the account
                               $ins_sql = mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
                                $run_sql = mysqli_query($conn,$ins_sql);
                                echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
                            }else{
                                // No match -> invalid url or account has already been activated.
                                echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
                            }
                                          
                        }else{
                            // Invalid approach
                            echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
                        } ?>
                    <!--LOGIN INTRO-->
                    <!--FORM FOR LOGIN STARTS HERE-->
                    <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        
                    </div>
                </div>
    </div></div>
    <div style="height:100px;"></div>
    <?php include 'footer.php' ?>
</body>
