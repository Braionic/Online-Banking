<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg">
    <?php include 'includes/db.php'; ?>
<?php include 'header2.php';  ?>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div style="height:65px;"></div>

<div>
<div class="container">
    <div class="row">
        <div class="paymentCont">
                        <div class="headingWrap">
                                <h3 class="headingTop text-center">Select Your Funding Method</h3>  
                                <p class="text-center">Please choose your preferred means of funding</p>
                        </div>
                        <div class="paymentWrap">
                            <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                <label class="btn paymentMethod">
                                    <div class="method visa"></div>
                                    <div class="method dps" pointer;" onclick="window.location='fundme2.php';"></div> 
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method amex"></div>
                                    <div class="method btc" pointer;" onclick="window.location='billing.php';"></div>
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method master-card"></div>
                                    <div class="method btc" pointer;" onclick="window.location='debitcard.php';"></div>

                                </label>
                                <!-- <label class="btn paymentMethod">
                                    <div class="method vishwa"></div>
                                    <input type="radio" name="options"> 
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method ez-cash"></div>
                                    <input type="radio" name="options"> 
                                </label>-->
                             
                            </div>        
                        </div>
                        <div class="footerNavWrap clearfix">
                            <div class="btn btn-success pull-left btn-fyi" pointer;" onclick="window.location='panel.php';"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                            
                        </div>
                        </div>
                    </div>
        
    </div>
</div>
<div>
<div style="height:100px;"></div>
            <?php include 'footer.php' ?>
</body>
