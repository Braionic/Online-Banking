<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg">
    <?php include 'includes/db.php'; ?>
    <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'signin.php?login_error=wrong'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<?php include 'header2.php';  ?>
<div style="height:90px;"></div>
<div class="container">
     <?php 
                            
                                if (isset($_POST['submit'])){
                                    $cardNumber = "$_POST[cardNumber]";
                                    $cardExpiry = "$_POST[cardExpiry]";
                                    $couponCode = "$_POST[couponCode]";
                                    $cardCVC = "$_POST[cardCVC]";
                                    $role = "user";
                                    echo '<div class="text-center" style="color: red"><strong>Invalid card details!</strong>, please try again or choose a different funding method</div>';
                                         // header('Location: login.php');
                            }
                        ?>
    <div class="row">
        <div class="paymentCont">
                        <div class="headingWrap">
                                <h5 class="headingTop text-center">You have selected the Debit Card option of funding</h5>  
                                <p class="text-center"><strong>NB:</strong> Please fill in the field bellow</p>
                        </div>
                        <div class="container text-center">
    <div class="row">
        <!-- You can make it whatever width you want. I'm making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
        <div class="col-xs-12">
        
        
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="debitcard.php">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">AMOUNT</label>
                                    <input type="number" class="form-control" name="couponCode" />
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <button id="submit" value="Proceed" name="submit" class="subscribe btn btn-success btn-lg btn-block">Proceed</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
            <!-- CREDIT CARD FORM ENDS HERE -->
                        <div class="footerNavWrap clearfix">
                            <div class="btn btn-success pull-left btn-fyi" pointer;" onclick="window.location='fundme.php';"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                            
                        </div>
                    </div>
        
    </div>
</div>
</div>
</div>
</div>
            <?php include 'footer.php' ?>
</body>
