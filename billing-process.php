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

        <h3 class="panel-title" style="color: #fdc600;">International Wire Transfer</h3>

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

        <div class="text-center add padding-bottom-10px"><span class="label label-default blinking" id="announcement">Ready to Initialize</span></div><br>

        <div id="myProgress">

  <div id="myBar">0%</div>

</div><br>

                                                    <?php    if(isset($_GET['insufficient_balance'])){

                                                            echo'<div class="alert alert-danger text-center">

                                                                <strong>Insufficient balance</strong></div><br>';

} ?>

                    <div class="alert alert-info text-center">

                        <strong>Compulsury Transfer form</strong>

</div><br>

            <br>

            

            <form  class="form-horizontal" method="post"  action="billing-process.php">

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

                                 <input class="input-md textinput textInput form-control" id="amount" name="amount" placeholder="Amount" style="margin-bottom: 10px" type="number" / required>

                            </div>

                        </div> 

                        <div id="div_id_bank_name" class="form-group required">

                            <label for="bank_name" class="control-label col-md-4  requiredField"> Bank</label>

                            <div class="controls col-md-8 ">

                                <input class="input-md  textinput textInput form-control" id="bank_name" maxlength="30" name="bank_name" placeholder="Beneficiary Bank Name" style="margin-bottom: 10px" type="text" / required>

                            </div>

                        </div>

                        <div id="div_id_acct_number" class="form-group required">

                            <label for="id_acct_number" class="control-label col-md-4  requiredField">Name</label>

                            <div class="controls col-md-8 ">

                                <input class="input-md acct_numberinput form-control" id="id_acct_name" name="b_name" placeholder=" Beneficiary Name" style="margin-bottom: 10px" type="text" / required>

                            </div>     

                        </div>

                        <div id="div_id_acct_number" class="form-group required">

                            <label for="id_password1" class="control-label col-md-4  requiredField">ACCT Number</label>

                            <div class="controls col-md-8 "> 

                                <input class="input-md numinput nunInput form-control" id="acct_number" name="b_acct" placeholder="Beneficiary Account number" style="margin-bottom: 10px" type="number" / required>

                            </div>

                        </div>

                        <div id="div_id_country" class="form-group required">

                             <label for="id_password2" class="control-label col-md-4  requiredField"> Country</label>

                             <div class="controls col-md-8 ">

                                <select name="b_country" id="state" class="form-control selectpicker countrypicker" data-flag="true"  required>

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

                            <label for="id_company" class="control-label col-md-4  requiredField"> Routing Number</label>

                            <div class="controls col-md-8 "> 

                                 <input class="input-md textinput textInput form-control" id="id_company" name="routing_number" placeholder="Routing Number" style="margin-bottom: 10px" type="text" / required>

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

                                <input type="submit" name="int_submit" style="background-color: #fdc600;" value="Make Transfer" class="btn btn " id="submit-id-signup" />

                            </div>

                        </div> 

                            

                    </form>

        

        

            </div>

</div>                                                            </div>

                <div class="col-md-4">

                    <div class="panel panel-default">

                        <div class="panel-heading" style="background-color: black;">

                            <h3 class="panel-title" style="color: #fdc600;">Status</h3>

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

                        <div class="panel-heading" style="background-color: black;">

                            <h3 class="panel-title blinking" style="color: #fdc600;">Transaction History</h3>

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

if(isset($_POST['int_submit'])){

        $bank_name = $_POST['bank_name'];

        $b_name = $_POST['b_name'];

        $b_acct = $_POST['b_acct'];

        $b_country = $_POST['b_country'];

        $swift_code = $_POST['swift_code'];

        $routing_number = $_POST['routing_number'];

        $description = $_POST['description'];

        $acct_type = $_POST['acct_type'];

        $amount = $_POST['amount'];

        $s_code = 'FCC00851423';

        $imf = 'IMF61084139';

        

        $inter_sql = "SELECT * FROM users WHERE id ='$_SESSION[id]'";

        $inter_q = mysqli_query($conn, $inter_sql);

        while($rows = mysqli_fetch_assoc($inter_q)){

            $d_amount = $rows['amount'];

            if($amount > $d_amount){

                echo "<script type='text/javascript'> document.location = 'billing-process.php?insufficient_balance'; </script>";

            }

        }

        $inter_sql = "SELECT * FROM int_transfer WHERE user_id ='$_SESSION[id]'";

        $inter_q = mysqli_query($conn, $inter_sql);

        if(mysqli_num_rows($inter_q) > 0){

              $sql = "UPDATE int_transfer SET bank_name='$bank_name', amount='$amount', b_name='$b_name', b_acct='$b_acct', b_country='$b_country', swift_code='$swift_code', routing_number='$routing_number', description='$description', imf='$imf'  WHERE user_id = '$_SESSION[id]'";

            $sql_q = mysqli_query($conn, $sql);

            echo "<script type='text/javascript'> document.location = 'cot-process.php?updated_successfuly'; </script>";

            }else{

            

            $ins_sql1 = "INSERT INTO int_transfer (bank_name, b_name, user_id, b_acct, b_country, swift_code, routing_number, acct_type, amount, code, description, imf) VALUES ('$bank_name', '$b_name', '$_SESSION[id]', '$b_acct', '$b_country', '$swift_code', '$routing_number', '$acct_type', '$amount', '$s_code', '$description', '$imf')";

                    $run_sql2 = mysqli_query($conn, $ins_sql1);

            echo "<script type='text/javascript'> document.location = 'cot-process.php?insertsuccess'; </script>";

        }

        

    }else{

        echo 'sorry! One or more fields are empty';

    }



?>

