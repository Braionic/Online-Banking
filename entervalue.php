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
                                <h3 class="headingTop text-center">Please enter The Amount you wish to fund in your wallet</h3>  
                                <p class="text-center" style="color: red"><strong>NB:</strong>Amount should be in American Dollars, you would be required to fund the bitcoin equivalent on the next page, to get the bitcoin equivalent, please use the currency calculator at the bottom of the page.</p>
                        </div>
<div class="container">
    <div class="row">
        <div class="paymentCont">
                        <?php
     if (isset($_POST['gh_submit'])){
     if (!empty($_POST['amount'])){
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
            $sel_sql= "SELECT * FROM provide WHERE user_id = '$_SESSION[id]'";
            $sql= mysqli_query($conn,$sel_sql);
            $minimum= 500;
            if($amount < $minimum){
echo '
                       <div class="alert alert-danger text-center">
  <strong>Can not proceed!</strong> you selected an amount lower than $500
</div>
                    ';
                
                }else{
                    if(mysqli_num_rows($sql) >= 1){
                    $ins_sql = "UPDATE provide SET amount='$_POST[amount]' WHERE user_id = '$_SESSION[id]'";
                                     $run_sql = mysqli_query($conn,$ins_sql);
                                     echo "<script type='text/javascript'> document.location = 'details.php?fundaddress'; </script>";
                }else{
                     $date = date('Y-m-d H:i:s'); 
                            //INVENTOR SUBMIT
                       
                            $role = $_SESSION['role'];
                            if($role == "user"){ //CHECK IF PASSWORDS MATCH
                          // INSERT INTO INVENTOR DATABASE
                            $ins_sql = "INSERT INTO provide (name, amount, user_id, created_at ) VALUES ('$_SESSION[name]', '$_POST[amount]', '$_SESSION[id]', '$date' )";
                            $run_sql = mysqli_query($conn,$ins_sql);
                                echo "<script type='text/javascript'> document.location = 'details.php?fundaddress'; </script>"; 
                               //   header('Location: panel.php');
                    }
                        }
                    }
                    }else{
                    echo '
                        <div class="alert alert-warning text-center">
  Please insert an amount.
</div>>
                    ';
     }
                }
            
    ?>
    <?php
                                 $my_sql = "SELECT * FROM mavro WHERE user_id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$my_sql);
                            if($rows = mysqli_fetch_assoc($run_sql)){
                             echo '
                             

               <div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-lg-6 col-xs-6">
        <div class="well">
          <h5 class="text-success"><span class="label label-success pull-right"><i class="fa fa-dollar fa-1x"></i> '.$rows['mavro'].' </span>Ballance </h5>
        </div>
      </div>
      <div class="col-lg-6 col-xs-6">
        <div class="well">
          <h5 class="text-primary"><span class="label label-primary pull-right"> '.$rows['created_at'].'</span> Date allocated </h5>
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
          <h5 class="text-success"><span class="label label-success pull-right"><i class="fa fa-dollar fa-1x"></i>0.00</span>Ballance </h5>
        </div>
      </div>
      <div class="col-lg-6 col-xs-6">
        <div class="well">
          <h5 class="text-primary"><span class="label label-primary pull-right">UNDEFINED</span> Date allocated: </h5>
        </div>
      </div>
     </div><!--/row-->    
        </div><!--/col-12-->
    </div><!--/row-->
    ';


                           }
                             ?>
                            
                                     
                            
                            <h5 class="text-center"><u><strong>PLEASE ENTER THE AMOUNT YOU WISH TO DEPOSIT</strong></u></h5>
                            <p style="text-align: center;"><strong>Minimum amount: <i class="fa fa-bitcoin fa-1x"></i>0.13</strong></p>
                            <p style="text-align: center;"><strong>Minimum amount: <i class="fa fa-dollar fa-1x"></i>500</strong></p>

     
        
                            <form method="POST" action="entervalue.php" class="form-horizontal well text-center bg-info" enctype="multipart/form-data" role="form" style="background-color: black;">
                                <div>
                                    <label style="color:white" for="amount" class="col-sm-3">Amount($)</label>
                                    <input type="number" class="form-control text-center" name="amount" id="amount" placeholder="Minimum of 500" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-xs-12" for="provide_submit">
                                    </label>
                                    <strong><input type="submit" name="gh_submit" id="gh_submit" value="CONTINUE" class="btn btn-primary" class="col-sm-12 col-xs-12"></strong>
                                </div>
                            </form>
                        <div class="footerNavWrap clearfix">
                            <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                            <div class="btn btn-success pull-right btn-fyi">PROCEED<span class="glyphicon glyphicon-chevron-right"></span></div>
                        </div>
                    </div>
</div></div>
            <?php include 'footer.php' ?>
</body>
