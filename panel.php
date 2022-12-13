<?php include 'includes/timeoutable.php' ?>
        <body  style="background-color: black;" onload="blinktext();">
        <?php include 'includes/db.php'; ?>
            <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
                <?php include 'header2.php';  ?><br>
               <!-- <div style="background-color: black;">-->
                <div style="height:23px;"></div>
                <br><br>
            
                <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<div class="container home">
<p class="text-right" style="color: white;"><?php echo date("d/m/Y h:i:s a", time()); ?></p>
<!--if user clicks the mining activated button-->

    <?php
                      if(isset($_GET['imf_correct'])) {
                     echo '<div class="alert alert-success text-center alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <strong>Request Received successfully!</strong><br> Thank you for chosing CaixaBank</div>';
                        }
                        ?>
    
    <div class="container">
    <?php
                                 $sel_sql = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$sel_sql);
                            while($rows = mysqli_fetch_assoc($run_sql)){
                             echo '
                                    <p class="alert text-center" style="background-color: #005eb8; color: white;">Hi, <strong> '.$rows['name'].' Welcome back</strong></p>
                             ';
                            }
                             ?></div>
<?php
     if (isset($_POST['m_submit'])){
            $sel_sql= "SELECT * FROM mavro WHERE user_id = '$_SESSION[id]'";
            $sql= mysqli_query($conn,$sel_sql);
                if(mysqli_num_rows($sql) <= 0){
                    echo '
                       <div class="alert alert-danger text-center">
  <strong>Sorry!</strong> insufficient funds to purchase Asset.
</div>
                    ';
                }else{
                     $date = date('Y-m-d H:i:s'); 
                            //INVENTOR SUBMIT
                       
                            $role = $_SESSION['role'];
                            if($role == "user"){ //CHECK IF PASSWORDS MATCH
                          // INSERT INTO INVENTOR DATABASE
                            $ins_sql = "INSERT INTO active ( id, name, created_at ) VALUES ('$_SESSION[id]' '$_SESSION[name]', '$date' )";
                            $run_sql = mysqli_query($conn,$ins_sql);
                                echo "<div class='alert alert-success text-center'>
  <b>Asset selected!</b> Please hold...
</div>"; 
                               //   header('Location: panel.php');
                    }
                        }
                    }else{
                    echo '
                       <!-- <div class="alert alert-danger text-center">
  Please select an<strong>"asset"</strong> to trade.
</div>-->
                    ';
     
                }
            
    ?>
    <!--if user clicks the mining activated button-->
                   <?php
                      if(isset($_GET['imf_correct=successful'])) {
                     echo '<div class="alert alert-success text-center alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <strong>Request Received successfully!</strong><br> Thank you for chosing BankRCU</div>';
                        }
                        ?>
                    
                            <!--OLD ONE-->
                            <div class="container home">
                               <!-- <h3 class="text-center" style="margin-top:0px;"><u>MY LOCKER</u></h3>
                                <li class=" text-right"><a href="invest_capital" data-toggle="tooltip" data-placement="top" class=" text-center btn btn-success btn-xm" title="invest capital" style="color:white; background-color: #880000">Fund Account</a>-->
                                
                             
 <?php
                                     $provide_sql = "SELECT * FROM users WHERE id = '$_SESSION[id]' ORDER BY id DESC";
                        $sql = mysqli_query($conn,$provide_sql);
                        if(mysqli_num_rows($sql) == 1){ //IF NO. OF ROWS WITH ABOVE QUERY IS JUST ONE
                        while($rows = mysqli_fetch_assoc($sql)){
                             echo '
                             <div class="panel panel-default style="background-color: #005eb8;">
<div class="alert alert-info text-center"><strong>Account Status: '.$rows['account'].'</strong></div>
    <div class="row container-fluid">
        <div class="col-sm-12">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-6">
                <div class="well" style="background-color: #005eb8;">
                 <h5 style="color: white;"> <b>Main Balance</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].'  '.$rows['amount'].' </span><p class="donationmsg"></p></h5>
                </div>
            </div>
      <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="well" style="background-color: #005eb8;">
          <h5 style="color: white;"><b>Go Easy</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].'  0.00 </span><p class="donationmsg"></p></h5></div>
      </div>
      <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="well" style="background-color: #005eb8;">
          <h5 style="color: white;"><b>Goal save</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].'  0.00</span><p class="donationmsg"></p></h5>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="well" style="background-color: #005eb8;">
          <h5 style="color: white;"><b>Stock</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].' 0.00 </span><p class="donationmsg"></p></h5>
        </div>
          </div>
            </div><!--/row-->    
       </div><!--/col-12-->
    </div><!--/row-->
          </div>
     </div>
     </div>
                                    ';
                           }

                            } ?>
                            
        <div class="container-fluid trade-room-bg"
             style="margin-top: 0px; background-color: black; padding-bottom: 0vh">
            <div class="row">
                <div class="col-sm-12 col-lg-10">
                    <div class="text-right" style="margin-top: 0px; margin-bottom: 0px">
                    </div>
                    <!--<li class="text-right"><a href="fundme.php" data-toggle="tooltip" data-placement="top" class=" text-right btn btn-success btn-xm" style="background-color: blue;" title="Top Up">Deposit</a></li>-->
                                           
                    
                    
                </div>
            </div>
                                </div>
                         <div class="container alert text-center">
                            
         CaixaBank Currency Chart
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Financial Markets</span></a> by CaixaBank</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
  {
  "colorTheme": "dark",
  "dateRange": "12M",
  "showChart": true,
  "locale": "en",
  "width": "100%",
  "height": "100%",
  "largeChartUrl": "",
  "isTransparent": true,
  "showSymbolLogo": true,
  "showFloatingTooltip": false,
  "plotLineColorGrowing": "rgba(255, 217, 102, 1)",
  "plotLineColorFalling": "rgba(255, 0, 0, 1)",
  "gridLineColor": "rgba(240, 243, 250, 0)",
  "scaleFontColor": "rgba(120, 123, 134, 1)",
  "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
  "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
  "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
  "tabs": [
    {
      "title": "Indices",
      "symbols": [
        {
          "s": "FOREXCOM:SPXUSD",
          "d": "S&P 500"
        },
        {
          "s": "FOREXCOM:NSXUSD",
          "d": "US 100"
        },
        {
          "s": "FOREXCOM:DJI",
          "d": "Dow 30"
        },
        {
          "s": "INDEX:NKY",
          "d": "Nikkei 225"
        },
        {
          "s": "INDEX:DEU40",
          "d": "DAX Index"
        },
        {
          "s": "FOREXCOM:UKXGBP",
          "d": "UK 100"
        }
      ],
      "originalTitle": "Indices"
    },
    {
      "title": "Futures",
      "symbols": [
        {
          "s": "CME_MINI:ES1!",
          "d": "S&P 500"
        },
        {
          "s": "CME:6E1!",
          "d": "Euro"
        },
        {
          "s": "COMEX:GC1!",
          "d": "Gold"
        },
        {
          "s": "NYMEX:CL1!",
          "d": "Crude Oil"
        },
        {
          "s": "NYMEX:NG1!",
          "d": "Natural Gas"
        },
        {
          "s": "CBOT:ZC1!",
          "d": "Corn"
        }
      ],
      "originalTitle": "Futures"
    },
    {
      "title": "Bonds",
      "symbols": [
        {
          "s": "CME:GE1!",
          "d": "Eurodollar"
        },
        {
          "s": "CBOT:ZB1!",
          "d": "T-Bond"
        },
        {
          "s": "CBOT:UB1!",
          "d": "Ultra T-Bond"
        },
        {
          "s": "EUREX:FGBL1!",
          "d": "Euro Bund"
        },
        {
          "s": "EUREX:FBTP1!",
          "d": "Euro BTP"
        },
        {
          "s": "EUREX:FGBM1!",
          "d": "Euro BOBL"
        }
      ],
      "originalTitle": "Bonds"
    },
    {
      "title": "Forex",
      "symbols": [
        {
          "s": "FX:EURUSD"
        },
        {
          "s": "FX:GBPUSD"
        },
        {
          "s": "FX:USDJPY"
        },
        {
          "s": "FX:USDCHF"
        },
        {
          "s": "FX:AUDUSD"
        },
        {
          "s": "FX:USDCAD"
        }
      ],
      "originalTitle": "Forex"
    }
  ]
}
  </script>
</div>
<!-- TradingView Widget END -->

      </div>

                          
                                <div>
                                  

                                </div>
                            
<div class="container">
                                   

                            </div></div>
<!--<div style="height:200px;"></div>--></div>

                            <?php include 'footer.php' ?>
    </body>