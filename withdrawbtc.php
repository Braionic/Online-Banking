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
                                <h3 class="headingTop text-center">This page allows you move your fund off 34Option</h3>  
                                <p class="text-center"><strong style="color: red">NB:</strong> Please click on the image below to continue</p>
                        </div>
                        <div class="paymentWrap">
                            <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                <label class="btn paymentMethod">
                                    <div class="method amex" pointer;" onclick="window.location='cashout.php';"></div>
                                </label>
                            </div>        
                        </div>
                        <div class="footerNavWrap clearfix">
                            <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                            <div class="btn btn-success pull-right btn-fyi">PROCEED<span class="glyphicon glyphicon-chevron-right"></span></div>
                        </div>
                    </div>
        
    </div>
</div>
            <?php include 'footer.php' ?>
</body>
