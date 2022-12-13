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
                <?php include 'header.php';  ?>
<section id="inner-headline">
			
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li><a href="panel.php">Office</a><i class="icon-angle-right"></i></li>
							<li class="active">Purchase Surecoin</li>
						</ul>
					</div>
				</div>
		</section>

                    <?php
     if (isset($_POST['provide_submit'])){
     if (!empty($_POST['amount'])){
            $sel_sql= "SELECT * FROM provide WHERE user_id = '$_SESSION[id]'";
            $sql= mysqli_query($conn,$sel_sql);
                if(mysqli_num_rows($sql) >= 1){
                    echo '
                       <div class="alert alert-danger text-center">
  <strong>Can not proceed!</strong> You still have a pending transaction.
</div>
                    ';
                }else{
                     $date = date('Y-m-d H:i:s'); 
                            //INVENTOR SUBMIT
                       
                            $role = $_SESSION['role'];
                            if($role == "user"){ //CHECK IF PASSWORDS MATCH
                          // INSERT INTO INVENTOR DATABASE
                            $ins_sql = "INSERT INTO provide (name, amount, user_id, created_at ) VALUES ('$_SESSION[name]', '$_POST[amount]', '$_SESSION[id]', '$date' )";
                            $run_sql = mysqli_query($conn,$ins_sql);
                                echo "<script type='text/javascript'> document.location = 'panel.php?provided'; </script>"; 
                               //   header('Location: panel.php');
                    }
                        }
                    }else{
                    echo '
                        <div class="alert alert-warning text-center">
  Please select a package.
</div>
                    ';
     }
                }
            
    ?>

                       
                            <div class="bg-warning" style="height:10px;"></div>

                                     <div class="container alert alert-success text-center alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <p>Welcome to your capital table.
Here you can select your preferred capital to invest.
                                    Please note that only Nigeria Naira and Nigerian investors are allowed to participate in this platform, for BITCOIN and other cryptocurrencies, please refer to Sureplex international website, also note that sometimes, it is possible we may oblige you clear a fellow investor's interest with your capital, this is very normal, when this happens, we advice you request a confirmation of payment from the receiver, your surecoin balance would be updated as soon as your confirmation is made. Click on the X sign to close this dialog</p>
                                </div>
                            
                            <h4 class="text-center"><u><strong>Select an amount</strong></u></h4>
     
        
                            <form method="POST" action="invest_capital.php" class="form-horizontal well text-center bg-info" enctype="multipart/form-data" role="form" style="background-color:#30c1b6;">
                                <div class="form-group">
                                    <label style="color:green" for="amount" class="col-sm-3">Amount</label>
                                    <select class="form-control text-center" name="amount" id="amount" required>
                                     <option value="₦1,000,000" selected>₦1,000,000</option>
                                        <option value="₦500,000">₦500,000</option>
                                        <option value="₦400,000">₦400,000</option>
                                       <option value="₦200,000">₦200,000</option>
                                       <option value="₦100,000">₦100,000</option>
                                       <option value="₦50,000">₦50,000</option>
                                       <option value="₦50,000">₦50,000(+)</option>
                                        <option value="₦20,000">₦20,000</option>
                                      <option value="₦10,000">₦10,000</option>
                                      <!--<option value="₦5,000">₦5,000</option>
                                       <option value="N800,000">₦800,000</option>
                                       <option value="N1,000,000">₦1,000,000</option>-->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 col-xs-12" for="provide_submit">
                                    </label>
                                    <strong><input type="submit" name="provide_submit" id="provide_submit" value="SELECT" class="btn btn-primary" class="col-sm-12 col-xs-12"></strong>
                                </div>
                            </form>
        <div style="height:10%;"></div>
                        <?php include 'footer.php' ?>
    </body>