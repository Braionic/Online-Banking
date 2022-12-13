<?php include 'includes/timeoutable.php' ?>

<body background: src="https://preview.ibb.co/d9Fc7U/bg.jpg">
    <?php include 'includes/db.php'; ?>
<?php include 'header.php';  ?>
<div style="height:100px;"></div>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'signin.php?login_error=wrong'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<div class="container">
    <div class="row">
        <div class="paymentCont">
                        <div class="headingWrap">
                                <h3 class="headingTop text-center"><b>DETAILS</b></h3>  
                                <p class="text-center" style="color: red"><strong>NB:</strong> Please fund your selected amount into the wallet details provided below, it may take up to 5 minutes to reflect on your ballance depending on the transfer speed</p>
                        </div>
                        <div class="text-center"><img margin="center" src="https://image.ibb.co/gMoJwp/rsz_download.png"></div>
                        <div class="footerNavWrap clearfix">
                        <div class="paymentWrap"> 
                            <h5 class="text-center"><strong>Your funding ID:</strong> <?php echo $_SESSION['id'];
                                    ?>
                                </h5><br>
                                <?php
                                $my_sql = "SELECT * FROM provide WHERE user_id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$my_sql);
                            if($rows = mysqli_fetch_assoc($run_sql)){
                                echo'
                                <h5><strong>Amount:</strong> <i class="fa fa-dollar fa-1x"></i>' .$rows['amount'] ; 
                            }
                                ?><br>
                                <p style="text-align: left;"><strong>Minimum amount: 0.13</strong></p>
                                <h5><strong>Wallet Address:</strong><input style="text-align: center;cursor: copy;" type="text" style="text-align: center;" class="form-control"  value="12pezuRCz9a9N4TnyC8pt9piZVerWL7iGC"></h5>      
                        </div>
                        <div style="height:50px;"></div>
                         <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <table class="table table-bordered" >
                                <thead>
                                    
                                    <tr style="color: blue;">
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Transaction</th>
                                    
                                    </tr>
                                
                                    <?php
                                    $status = "pending";
                                $my_sql = "SELECT * FROM provide WHERE user_id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$my_sql);
                            if($rows = mysqli_fetch_assoc($run_sql)){ ?>
                                
                                <td style="color: red"><i class="fa fa-dollar fa-1x"></i> <?php echo $rows['amount']; ?> </td> <td style="color: red"> <?php echo $rows['created_at']; ?> </td> <td style="color: red"> <?php echo $status; 
                            ;}
                                ?></td>
                                </thead>
                                <tbody>
                                                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="height:100px;"></div>
                            <div class="btn btn-success pull-left btn-fyi" pointer;" onclick="window.location='fundmeagent.php';"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                            <div class="btn btn-success pull-right btn-fyi" pointer;" onclick="window.location='https://web.facebook.com/kelvin.melokuhle.7';">PROCEED<span class="glyphicon glyphicon-chevron-right"></span></div>
                        </div>
                    </div>
        
    </div>
</div>
            <?php include 'footer.php' ?>
</body>
