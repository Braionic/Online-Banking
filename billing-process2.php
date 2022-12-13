<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg" onload="blinktext();">
    <?php include 'includes/db.php'; ?>
<?php include 'header2.php';  ?>
<div style="min-height: 80vh;  margin-top: 100px ">
                                        <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 add">
                                            
                                                    <div class="panel panel-default">
    <div class="panel-heading" style="background-color: blue;">
        <h3 class="panel-title" style="color: white;">BANK/MOBILE TRANSFER</h3>
    </div>
    <div class="panel-body">
        <h3 class="text-center">
            <span class="text-info add price dollar"><?php
                                $my_sql = "SELECT * FROM provide WHERE user_id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$my_sql);
                            if($rows = mysqli_fetch_assoc($run_sql)){
                                echo'
                                <h3>R' .$rows['amount'] ; 
                            }
                                ?></i></span>
        </h3>
        <div class="text-center add padding-bottom-10px"><span class="label label-default blinking" id="announcement">PROCESSING</span></div><br>
                    <span>Method: LUNO PAY</span>
            <br>
            <span><h4 style="color: green;">Funding ID: 34option02<?php echo $_SESSION['id'];
                                    ?></h4><br></span><div class="text-center"><img src="https://img.techpowerup.org/201111/39ee20c8-8ff6-4bf0-9b32-da64a3105155-1.jpg" style="max-width: 300px; max-height: 500px;"></div>
            <p>
                                    <h5><input style="text-align: center;cursor: copy;" type="text" style="text-align: center;" class="form-control"  value="1MSMDSAzNgceSYYnBJ2VKAZoJQ3BwoMPWN"></h5>  
                            </p>
            <div class="alert">
                <strong><i>"If in 30 minutes your ballance is not updated, please contact our customer care Agent via our live chat option. Thank you."</i></strong>
            </div>
        
        
            </div>
</div>                                                            </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: black;">
                            <h3 class="panel-title" style="color: orange;">FEE HISTORY</h3>
                        </div>
                        <div class="panel-body panel-table">
                                                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center" id="announcement">AMOUNT</th>
                                            <th class="text-center">TIME</th>
                                            <th class="text-center">STATUS</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                                                    <tr class="text-center  blink ">
                                                                                        <?php
                                    $status = "PROCESSING";
                                $my_sql = "SELECT * FROM provide WHERE user_id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$my_sql);
                            if($rows = mysqli_fetch_assoc($run_sql)){ ?>
                                                <td class="text-left">
                                                    <a href="fee-billing.php"
                                                       class="btn-link btn-warning">
                                                        <span class="text-uppercase" id="announcement"><i id="announcement"></i> R<?php echo $rows['amount']; ?></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="add price dollar"><?php echo $rows['created_at']; ?></span>
                                                </td>
                                                <td>
                                                                                                            <span class="text-info"><?php echo $status; 
                            ;}
                                ?></span>
                                                                                                    </td>
                                            </tr>
                                                                                </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    
                                </div>
                                                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: black;">
                            <h3 class="panel-title blinking" style="color: orange;">WITHDRAWAL HISTORY</h3>
                        </div>
                        <div class="panel-body panel-table">
                                                            <div class="alert">
                                    <strong>No withdrawal history found!</strong>
                                </div>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
   
            <?php include 'footer.php' ?>
</body>
