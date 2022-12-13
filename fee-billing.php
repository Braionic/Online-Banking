<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg">
    <?php include 'includes/db.php'; ?>
<?php include 'header2.php';  ?>
<div style="min-height: 80vh;  margin-top: 100px ">
                                        <section>
        <div class="container">
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
                                     echo "<script type='text/javascript'> document.location = 'billing-process2.php?fundaddress'; </script>";
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
            <div class="row">
                <div class="col-md-4 add">
                                            <div class="panel-group" id="transactionParentPanel">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: black;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#depositPanel"
                                           data-parent="#transactionParentPanel" style="color: orange;">CLEAR FEE</a>
                                    </h4>
                                </div>
                                <div id="depositPanel" class="panel-collapse collapse in">
                                    <form class="form-horizontal prodigal"
                                          action="fee-billing.php" method="POST"
                                          role="form">
                                        <input type="hidden" name="_token" value="8cyx4fMOD0NHU0oI0aV8RBSk2Yg2qHjvToFH8K5s">
                                        <div class="panel-body remove padding-bottom">
                                            <div class="form-group" style="margin-bottom: 0;">
                                                <label for="inputID"
                                                       class="col-xs-2 control-label add price dollar">$</label>
                                                <div class="col-xs-10">
                                                    <input type="number" name="amount" class="form-control"
                                                           placeholder="Amount"
                                                           min="500"
                                                           max="200000"
                                                           value=""
                                                           required id="depositAmount">
                                                </div>
                                            </div>
                                            <div class="form-group add margin-top-10px">
                                                <div class="col-sm-10 col-xs-offset-2">
                                                                                                            <div class="radio">
                                                            <label style="font-size: 1.2em">
                                                                <input type="radio" name="method" id="inputID"
                                                                       value="btc"
                                                                       required> I wish to continue                                                                     <span data-deposit="btc"></span>                                                             </label>
                                                        </div>
                                                                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <button type="submit" name="gh_submit" 
                                                            class="btn btn-primary btn-block btn-sm">
                                                        FUND ACCOUNT <i class="fa fa-chevron-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: black;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#withdrawPanel"
                                           data-parent="#transactionParentPanel" style="color: orange;">WITHDRAW</a>
                                    </h4>
                                </div>
                                <div id="withdrawPanel" class="panel-collapse collapse">
                                    <form action="https://trade.o2tradeoptions.com/billing/create/withdraw" method="POST"
                                          class="form-horizontal prodigal"
                                          role="form">
                                        <input type="hidden" name="_token" value="8cyx4fMOD0NHU0oI0aV8RBSk2Yg2qHjvToFH8K5s">
                                        <div class="panel-body remove padding-bottom">
                                                                                            <div class="alert">
                                                    <strong>Insufficient Account balance!</strong>
                                                </div>
                                                                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                                    </div>
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
                                            <th class="text-center">AMOUNT</th>
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
                                                    <a href="billing-process.php"
                                                       class="btn-link btn-warning">
                                                        <span class="text-uppercase"><i class="fa fa-dollar fa-1x"></i> <?php echo $rows['amount']; ?></span>
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
                        <div class="panel-heading">
                            <h3 class="panel-title">WITHDRAWAL HISTORY</h3>
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
