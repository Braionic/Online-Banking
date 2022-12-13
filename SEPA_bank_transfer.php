<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg">
    <?php include 'includes/db.php'; ?>
    <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<?php include 'header2.php';  ?>
<div style="height:100px;"></div>
<div class="container">

            <div style="background: gold;color: black;left: 0;"><div class="container"> <marquee behavior="scroll" direction="left" scrollamount="3">COMING<b style='text-transform: uppercase;'> SOON</b></marquee></div></div><br>
            
            <div style="height:200px;"></div>
                        <div class="footerNavWrap clearfix">
                            <div class="btn btn-success pull-left btn-fyi" pointer;" onclick="window.location='fundme2.php';"><span class="glyphicon glyphicon-chevron-left"></span> RETURN</div>
                            
                        </div>
                    </div>
        
    </div>
</div>
</div>
</div>
</div>
            <?php include 'footer.php' ?>
</body>
