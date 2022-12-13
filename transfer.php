<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg">
    <?php include 'includes/db.php'; ?>
<?php include 'header2.php';  ?>
<div style="height:100px;"></div>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<div class="container">
    <div class="row">
        <div class="paymentCont">
                        <div class="headingWrap">
                                <h3 class="headingTop text-center">Please select</h3>  
                                <p class="text-center">1. SEPA Transfer 2. International Wire Transfer 3. Electronic Bank Transfer</p>
                        </div>
                        <div class="paymentWrap">
                            <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                               <label class="btn paymentMethod">
                                    <div class="method eu" pointer;" onclick="window.location='intrabank.php';"></div>
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method nai" pointer;" onclick="window.location='billing-process.php';"></div>
                                    <input type="radio" name="options">
                                </label>
                                                                                                                <label class="btn paymentMethod">
                                    <div class="method eft"></div>
                                    <div class="method dps" pointer;" onclick="window.location='#';"></div> 
                                </label>
                            </div>        
                        </div>
                        <div class="footerNavWrap clearfix">
                            <div class="btn pull-left btn-fyi" style="background-color: #005eb8; color: white;" pointer;" onclick="window.location='panel.php';"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                            <div class="btn pull-right btn-fyi" style="background-color: #005eb8; color: white;">PROCEED<span class="glyphicon glyphicon-chevron-right"></span></div>
                        </div>
                    </div>
        
    </div>
</div>
            <?php include 'footer.php' ?>
</body>
