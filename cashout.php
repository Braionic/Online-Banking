<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg">
    <?php include 'includes/db.php'; ?>
<?php include 'header2.php';  ?>
<div style="height:100px;"></div>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'signin.php?login_error=wrong'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<div class="headingWrap">
                                <h5 class="headingTop text-center">Please Insert The Amount You Wish To Withdraw</h5>  
                                <p class="text-center">Amount should be in Us Dollar eg "1000" the Bitcoin equivallent would be paid into the address associated with your account.</p>
                        </div>
    <div class="row">
        <div class="paymentCont">
                         <?php
     if (isset($_POST['gh_submit'])){
     if (!empty($_POST['amount'])){
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    
 $sel_sql= "SELECT * FROM mavro WHERE user_id = '$_SESSION[id]'";
            $sql= mysqli_query($conn,$sel_sql);
                   if(mysqli_num_rows($sql) <= 0){
                    echo '
                       <div class="alert alert-danger text-center">
  <strong>Am sorry, you requested an amount lower than your ballance</strong>
</div>
                    ';
                }else{
                  $minimum= 2000;
            $sel_sql= "SELECT * FROM gh WHERE user_id = '$_SESSION[id]'";
            $sql= mysqli_query($conn,$sel_sql);
                  if(mysqli_num_rows($sql) >= 1){
                    echo '
                       <div class="alert alert-danger text-center">
  <strong>Unsuccessful!</strong> Your request has already been received.
</div>
                    ';
                }else{
            $sel_sql= "SELECT * FROM blocked WHERE user_id = '$_SESSION[id]'";
            $sql= mysqli_query($conn,$sel_sql);
            if(mysqli_num_rows($sql) >= 1){
                    echo '
                       <div class="alert alert-danger text-center">
  <strong>Unsuccessful!</strong> You have an outstanding $333(R4,950) of your $4,000 trader fee to be cleared, please clear and then try again. Thank you. 
</div>                   ';
                }else{
                  $minimum= 2000;
                if($amount < $minimum){
                    echo '
                       <div class="alert alert-danger text-center">
  <strong>Can not proceed!</strong> your selected amount was below the minimum amount allowed for withdrawal, cash out must be at least <strong>$2000</b>
</div>                   ';
                }else{
                     $date = date('Y-m-d H:i:s'); 
                            //INVENTOR SUBMIT
                       
                            $role = $_SESSION['role'];
                            if($role == "user"){ //CHECK IF PASSWORDS MATCH
                          // INSERT INTO INVENTOR DATABASE
                            $ins_sql = "INSERT INTO gh (name, amount, user_id, created_at ) VALUES ('$_SESSION[name]', '$_POST[amount]', '$_SESSION[id]', '$date' )";
                            $run_sql = mysqli_query($conn,$ins_sql);
                                echo "<div class='alert alert-success text-center'>
  <b>Payout Successful!</b> Your withdrawal was successful, funds will arrive in 1-3 bussiness days. Thank you for choosing <b>34Trade</b>.
</div>"; 
                               //   header('Location: panel.php');
                    }
                        }
                      }
                    }
                  }
                    }else{
                    echo '
                        <div class="alert alert-warning text-center">
  Please insert an amount.
</div>
                    ';
     }
                }
            
    ?>
    <?php
                                 $my_sql = "SELECT * FROM mavro WHERE user_id = '$_SESSION[id]' ORDER BY id DESC";
                            $run_sql = mysqli_query($conn,$my_sql);
                            if($rows = mysqli_fetch_assoc($run_sql)){
                             echo '
                             

               <div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <div class="well">
          <h5 class="text-success"><span class="label label-success pull-right"><i class="fa fa-dollar fa-1x"></i> '.$rows['mavro'].' </span>USD</h5>
        </div>
      </div>
      <div class="col-lg-6 col-xs-6">
        <div class="well">
          <h5 class="text-primary"><span class="label label-primary pull-right">B '.$rows['mavro2'].'</span> Bitcoin </h5>
        </div>
      </div>
     </div><!--/row-->    
        </div><!--/col-12-->
    </div><!--/row-->

    ';
                            }else{
echo '

<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <div class="well">
          <h5 class="text-success"><span class="label label-success pull-right"><i class="fa fa-dollar fa-1x"></i>0.00</span>USD</h5>
        </div>
      </div>
      <div class="col-lg-6 col-xs-6">
        <div class="well">
          <h5 class="text-primary"><span class="label label-primary pull-right">0.00</span> Bitcoin </h5>
        </div>
      </div>
     </div><!--/row-->    
        </div><!--/col-12-->
    </div><!--/row-->
    ';


                           }
                             ?>
                            }
                                     
                            
                            <h5 class="text-center"><u><strong>PLEASE ENTER Amount</strong></u></h5>
     
        
                            <form method="POST" action="cashout.php" class="form-horizontal well text-center bg-info" enctype="multipart/form-data" role="form" style="background-color:black;">
                                <div class="form-group">
                                    <label style="color:orange" for="amount" class="col-sm-3">Amount(<i class="fa fa-dollar fa-1x"></i>)</label>
                                    <input type="number" class="form-control text-center" name="amount" id="amount" placeholder="e.g 2000" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-xs-12" for="provide_submit">
                                    </label>
                                    <strong style="color: orange"><input type="submit" name="gh_submit" id="gh_submit" value="CONTINUE" class="btn btn-primary" class="col-sm-12 col-xs-12"></strong>
                                </div>
                            </form>
                        <!--<div class="footerNavWrap clearfix">
                            <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                        </div>-->
                    </div>
    </div>
</div>
<div style="height:100px;"></div>
            <?php include 'footer.php' ?>
</body>
