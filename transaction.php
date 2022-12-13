<?php include 'includes/timeoutable.php' ?>

<body background="pics/image.jpg">
    <?php include 'includes/db.php'; ?>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
    <?php include 'header2.php';  ?>
    <div style="background-color: black;">
    <div style="height:100px;"></div>
    
        <div>
                                <h3 class="headingTop text-center" style="text-decoration: underline color: white;">Transaction History</h3>  
                        
     <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    
                                    <tr style="color: white;">
                                        <th style="font-weight: normal;"> Transaction:</th>
                                        <th style="font-weight: normal;">Amount:</th>
                                        <th style="font-weight: normal;">Date:</th>
                                        <th style="font-weight: normal;">Status:</th>
                                    <?php
                                $my_sql = "SELECT * FROM transaction WHERE user_id = '$_SESSION[id]' ORDER BY id DESC";
                            $run_sql = mysqli_query($conn,$my_sql);
                            while($rows = mysqli_fetch_assoc($run_sql)){ ?>

                                    </tr>
                                
                                    
                                
                                <td style="color: green"> <?php echo $rows['transaction']; ?> </td> <td style="color: green"><i class="fa fa-bitcoin fa-1x"></i><?php echo $rows['amount']; ?> </td> <td style="color: green"> <?php echo $rows['created_at']; ?> </td> <td style="color: green"> <?php echo $rows['Status']; 
                            ;}
                                ?></td>><br>
                                </thead>
                                <tbody>
                                                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <div style="height:500px;"></div>

    <?php include 'footer.php' ?>
</body>
