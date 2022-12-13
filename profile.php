<?php include 'includes/timeoutable.php' ?>



<body>

    <?php include 'includes/db.php'; ?>

<?php 

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN

    } else { //IF NO USER LOGGED IN

        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";

      //  header('Location: login.php?login_error=wrong');

    }

?>

    <?php include 'header2.php';  ?>

    <div style="height:60px;"></div>

    <img src="https://i.ibb.co/jJFBBBY/Header-Category-2-2-1400x788.jpg" alt="Girl in a jacket" style="width:100%;height:35%;">

    <?php if (isset($_GET['error'])) { ?>

     		<div class="alert alert-warning text-center"><?php echo $_GET['error']; ?></div>

     	<?php } ?>



     	<?php if (isset($_GET['success'])) { ?>

            <p class="alert alert-success text-center"><?php echo $_GET['success']; ?></p>

        <?php } ?>

    <?php

    // print file upload result based on outcome

     if(isset($_GET['upload_status'])){ //TO OUTPUT LOGIN ERROR

    if($_GET['upload_status'] == 'success'){  //LOGIN ERROR FOR EMPTY

        $login_err = "<div class='alert alert-success text-center'>File uploaded succesfully</div>";

    }elseif($_GET['upload_status'] == 'too_large'){ //LOGIN ERROR FOR INVALID DETAILS

        $login_err = "<div class='alert alert-warning text-center'>File too large please check file size!</div>";

    }elseif($_GET['upload_status'] == 'already_exist'){ //LOGIN ERROR FOR INVALID DETAILS

        $login_err = "<div class='alert alert-warning text-center'>File already exists</div>";

    }elseif($_GET['upload_status'] == 'unsupported_format'){ //LOGIN ERROR FOR INVALID DETAILS

        $login_err = "<div class='alert alert-danger text-center'>Unsupported file format</div>";

    }

         echo $login_err;   

}

    

// for otp resend

    ?>

    <?php

                if(isset($_POST["testimony_submit"])){        

                            $date = date('Y-m-d h:1:s');

                            $status = "pending";

                            $ins_sql = "INSERT INTO testimony (body, name, user_id, status, created_at) VALUES ('$_POST[testimony_body]', '$_SESSION[name]', '$_SESSION[id]', '$status',  '$date')";

                            $run_sql = mysqli_query($conn,$ins_sql);

                            echo '

                                       <div class="container alert alert-info text-center"><strong>Verification:</strong> Your account is being reviewed</div>

                                    ';  

                            }

    ?>

    <?php 

                                $date = date('Y-m-d H:i:s'); 

                                    //INVENTOR SUBMIT

                                if (isset($_POST['edit_submit2'])){

                                    $role = "user";



                                  // UPDATE INTO USERS

                                     $ins_sql = "UPDATE users SET nickname='$_POST[nickname]', updated_at='$date' WHERE id = '$_SESSION[id]'";

                                    $run_sql = mysqli_query($conn,$ins_sql);

                                    echo '<div class="alert alert-success text-center">We\'ve received your complaint and will act accordingly, Thank you for choosing Caixa Bank</div>';

                                         // header('Location: login.php');

                            }

                        ?>

    <?php 

                                $date = date('Y-m-d H:i:s'); 

                                    //INVENTOR SUBMIT

                                if (isset($_POST['edit_submit'])){

                                    $fone_no = $_POST['fone_no'];

                                    $role = "user";

                                  // UPDATE INTO USERS

                                    $ssql = "SELECT * FROM users WHERE id='$_SESSION[id]'";

                                    $run_ssql = mysqli_query($conn, $ssql);

                                    if(mysqli_num_rows($run_ssql) == 1){

                                     $ins_sql = "UPDATE users SET fone_no='$fone_no', updated_at='$date'";

                                    $run_sql = mysqli_query($conn,$ins_sql);

                                    echo '<div class="alert alert-success text-center">Your Mobile number has been updated Successful</div>';

                                         // header('Location: login.php');

                            }else{

                                        echo 'no file to update';

                                    }

                                }

                        ?>



    <div style="min-height: 80vh;  margin-top: 20px ">

                                        <section>

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="text-center add margin-bottom-20px">

                        <img src="https://i.ibb.co/18PZkVk/tymebank-thumbnail-05-1080x1080-1.jpg" style="max-width: 100px; max-height: 100px;">

                        <h4 class="remove margin-bottom"><?php echo $_SESSION['name']; ?></h4>

                        <small class="text-warning"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b6dbd3dad9d8cf8685868ff6d1dbd7dfda98d5d9db"><?php echo $_SESSION['email']; ?></a></small>

                        <br>

                        <span class="flag flag-za"></span><p> <?php echo $_SESSION['state']; ?></p>

                    </div>

                </div>

            </div>

            <div style="background-color: 57916" class="container alert alert-info text-center alert-dismissable">

                     <button type="button" class="close" data-dismiss="alert">&times;</button>

                            <p style="color: white">Dear <strong><?php echo $_SESSION['name']; ?></strong>, Thank you for banking with us, if you feel your account may have been compromised, quickly notify us via this section so we can suspend all activities pending verification. Thank you.</p>

                                </div>

            <?php

                    $user_id = $_SESSION['id'];

                     $sel_sql= "SELECT * FROM users WHERE id ='$user_id'";

            $sql= mysqli_query($conn,$sel_sql);

            while($rows = mysqli_fetch_assoc($sql)){

                echo '



                <div style="background-color: #fdc600;" class="container alert alert-success">

                            <form action="profile.php" method="post" class="form-horizontal"

                                  role="form">

                                <input type="hidden" name="_token" value="pR5bHS8BUSwx5IW7DPdW1OFDssZu56m6K3kXnh4z">

                                <div class="input-sm form-group">

                                    <legend>Drop a swift complaint</legend>

                                </div>



                                <div class="form-group">

                                    <label for="" class="col-sm-2 control-label"><p style="color: black">use this field</p></label>

                                    <div class="col-sm-10">

                                        <input type="text" value="'.$rows['nickname'].'" name="nickname" id="nickname" class="form-control"

                                               placeholder="Request account suspension" required>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <div class="col-sm-10 col-sm-offset-2">

                                        <button type="submit" name="edit_submit2" id="edit_submit2" class="btn" style="background-color: black"><p style="color: white">Submit</p></button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    

                        <div class="row">

                <div class="col-md-6">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                     <form action="upload.php" enctype="multipart/form-data"

        method="post"

                                          class="form-horizontal add margin-top-30px">

                                        <input type="hidden" name="_token" value="KCiSz5g26RwvWIWWXlOPCwXIUIONvWzyiv8U4mY8">

                                        <div class="form-group">

                                            <legend>Submit credentials</legend>

                                        </div>



                                        <p>

                                            Submit a valid ID

                                        </p>



                                        <div class="form-group">

                                            <label for="" class="col-sm-2 control-label">ID</label>

                                            <div class="col-sm-10">

                                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" placeholder="ID"

                                                       required>

                                            </div>

                                        </div>



                                                                                    <div class="form-group">

                                                <label for="" class="col-sm-2 control-label">Additional Details</label>

                                                <div class="col-sm-10">

                                                <textarea name="info" rows="4" class="form-control"

                                                          placeholder="Additional Details" required></textarea>

                                                </div>

                                            </div>

                                        

                                        <div class="form-group">

                                            <div class="col-sm-10 col-sm-offset-2">

                                                <button class="btn" name="submit_upload" style="background-color: #fdc600;">Upload Document</button>

                                            </div>

                                        </div>

                                    </form>

                                                                                    </div>

                    </div>

                    

                    

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <form action="np.php" method="post" class="form-horizontal"

                                  role="form">

                                <input type="hidden" name="_token" value="KCiSz5g26RwvWIWWXlOPCwXIUIONvWzyiv8U4mY8">

                                <div class="form-group">

                                    <legend>Change Password</legend>

                                </div>



                                <div class="form-group">

                                    <label for="" class="col-sm-2 control-label">Current Password</label>

                                    <div class="col-sm-10">

                                        <input type="password" name="old_pwd" id="" class="form-control"

                                               placeholder="Current Password" value="" required>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <label for="" class="col-sm-2 control-label">New Password</label>

                                    <div class="col-sm-10">

                                        <input type="password" name="new_pwd" id="" class="form-control"

                                               placeholder="New Password" value="" required>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <label for="" class="col-sm-2 control-label">Confirm New Password</label>

                                    <div class="col-sm-10">

                                        <input type="password" name="new_pwdc" id="" class="form-control"

                                               placeholder="Confirm New Password" value="" required>

                                    </div>

                                </div>



                                <div class="form-group">

                                    <div class="col-sm-10 col-sm-offset-2">

                                        <button type="submit" class="btn" style="background-color: #fdc600;">Change Password</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <form action="profile.php" method="post" class="form-horizontal" role="form">

                        <div class="form-group">

                            <legend>User Account</legend>

                        </div>



                       <input type="hidden" name="_token" value="pR5bHS8BUSwx5IW7DPdW1OFDssZu56m6K3kXnh4z">

                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label"><p>Name</p></label>

                            <div class="col-sm-10">

                                <input type="text" name="name" id="" class="form-control" placeholder="'.$rows['name'].'"

                                       value="'.$rows['name'].'" readonly>

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label"><p>Mobile</p></label>

                            <div class="col-sm-10">

                                <input type="tel"  name="fone_no" id="fone_no" class="form-control" placeholder="'.$rows['fone_no'].'"

                                       value="'.$rows['fone_no'].'">

                            </div>

                        </div>



                                                    <div class="form-group">

                                <label for="" class="col-sm-2 control-label">Currency</label>

                                <div class="col-sm-10">

                                    <div class="col-sm-10">

                                <input type="number"  name="currency" id="currency" class="form-control" placeholder="'.$rows['currency'].'"

                                       value="'.$rows['currency'].'" readonly>

                            </div>

                                </div>

                            </div>

                        

                       

                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label"><p>Gender</p></label>

                            <div class="col-sm-10">

                                <input type="number"  name="gender" id="gender" class="form-control" placeholder="'.$rows['gender'].'"

                                       value="'.$rows['gender'].'" readonly>

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label"><p>Date of Birth</p></label>

                            <div class="col-sm-10">

                                <input type="text" name="state" id="'.$rows['dob'].'" class="form-control" placeholder="'.$rows['dob'].'"

                                       value="" readonly>

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label"><p>Account Number</p></label>

                            <div class="col-sm-10">

                                <input type="number" name="act_no" id="act_no" class="form-control" placeholder="'.$rows['act_no'].'"

                                       value="'.$rows['act_no'].'" readonly>

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label"><p>Sort Code</p></label>

                            <div class="col-sm-10">

                                <input type="text" name="state" id="'.$rows['swift_code'].'" class="form-control" placeholder="'.$rows['swift_code'].'"

                                       value="" readonly>

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label"><p>Address</p></label>

                            <div class="col-sm-10">

                                <input type="text" name="state" id="'.$rows['address'].'" class="form-control" placeholder="'.$rows['address'].'"

                                       value="" readonly>

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="" class="col-sm-2 control-label">Country</label>

                            <div class="col-sm-10">

                                <input type="number" name="country" id="country" class="form-control" placeholder="'.$rows['state'].'"

                                       value="'.$rows['state'].'" readonly>

                            </div>

                        </div>





                        <div class="form-group">

                            <div class="col-sm-10 col-sm-offset-2 text-center">

                                <button type="submit" name="edit_submit" id="edit_submit" class="btn" style="background-color: #fdc600;">Update Mobile Number</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

                    </div>

    </section>

                    

                          ';

            }

                       ?>

                </div>

            </div>

                    </div>

    </section>

    </div>



    <div style="height:100px;"></div>



    <?php include 'footer.php' ?>

</body>

