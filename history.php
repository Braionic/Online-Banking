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
    <?php include 'header2.php';  ?>
        <div style="min-height: 80vh;  margin-top: 100px ">
            
                                        <section class="add margin-top-50px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right add margin-bottom-10px">

                                            Account Type: 
                                            <?php
                                 $my_sql = "SELECT * FROM users WHERE id = '$_SESSION[id]' ORDER BY id DESC";
                            $run_sql = mysqli_query($conn,$my_sql);
                            while($rows = mysqli_fetch_assoc($run_sql)){
                                echo ' '.$rows['account'].' <span class="text-danger add price dollar">'.$rows['currency'].' '.$rows['amount'].' 

                                            </span>
                                            ';
                            }
                             ?>
                                    </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="well well-sm add bg-transparent">
                        <h3 class="add lighter separator">Filter History</h3>
                        <form action="history.php" method="get" class="form-horizontal add margin-top-30px"
                              role="form">
                            <input type="hidden" name="search" value="yes">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">From:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="from" id="" class="form-control" placeholder="From:"
                                           value="2021-12-13" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">To:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="to" id="" class="form-control" placeholder="To:"
                                           value="2022-12-20" required>
                                </div>
                            </div>

                            <div class="col-xs-12 text-center add margin-bottom-10px">
                                <div class="btn-group btn-group-sm text-center" data-toggle="buttons">
                                    <label class="btn btn-footer-color ">
                                        <input type="radio" name="action" value="call"
                                               autocomplete="off" > pending
                                    </label>
                                    <label class="btn btn-footer-color ">
                                        <input type="radio" name="action" value="put"
                                               autocomplete="off" > completed
                                    </label>
                                    <label class="btn btn-footer-color  active">
                                        <input type="radio" name="action" value="all" autocomplete="off"
                                                checked> ALL
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2 text-center">
                                    <button type="submit" class="btn btn-sm" style="background-color: #fdc600;">FILTER</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive wide-table" style="border-color: transparent">
    <table class="table table-hover table-bordered add border-radius">
        <thead style="background-color: #fdc600;">
        <tr>
             
            <th>ID</th>
            <th>Transaction</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
                    </tr>
        </thead>
        
        
            <?php
                    $i = 1;
        
                    $my_sql = "SELECT * FROM transaction WHERE user_id = '$_SESSION[id]'";
                    $run_sql = mysqli_query($conn,$my_sql);
                    if(mysqli_num_rows($run_sql) > 0){
                    while($rows = mysqli_fetch_assoc($run_sql)){ 
       echo '<tr><td>' .$i. '</td><td>' .$rows['transaction']. '</td><td>'.$rows['amount'].'</td><td>'.$rows['created_at'].'</td><td ><button type="button" class="btn btn-success btn-sm">'.$rows['Status']. '</button></td></tr>';
                    $i++;
                    } }else{
                        echo' No table to display';
                        
                    }?>
        
    </table>
</div>
<div class="text-center">
    
</div>                </div>
            </div>
        </div>
    </section>
    </div>
                    <div style="height:500px;"></div>

    <?php include 'footer.php' ?>
</body>
