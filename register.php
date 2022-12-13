<?php include 'includes/timeoutable.php' ?>

<body style="background-image: url(images/gallery-bg-1200x900.jpg); background-repeat: no-repeat; background-size: cover;">
    <?php include 'includes/db.php'; ?>
    <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
        echo "<script type='text/javascript'> document.location = 'panel.php'; </script>";
      //  header('Location: panel.php');
    } else { //IF NO USER LOGGED IN
    }
?>
    <?php include 'header.php'; ?>
<div style="height:80px;"></div>


    <?php 
                $date = date('Y-m-d H:i:s'); 
   
    
                    //INVENTOR SUBMIT
                if (isset($_POST['signup_submit'])){
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
                    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $act_no = mysqli_real_escape_string($conn, $_POST['act_no']);
                    $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
                    $state = mysqli_real_escape_string($conn,  $_POST['state']);
                    $account = mysqli_real_escape_string($conn,  $_POST['account']);
                    $swift_code = mysqli_real_escape_string($conn,  $_POST['swift_code']);
                    $currency = mysqli_real_escape_string($conn,  $_POST['currency']);
                    $amount = 0;
                    //$nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
                    $name = mysqli_real_escape_string($conn,$name);
                    $hash = md5( rand(0,1000) );
                    $role = "user";
                    $image = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = 'uploaded_img/'.$image;
                    /* Let's strip some slashes in case the user entered
any escaped characters. */
                    //REFERRAL STARTS
                        
                    //REFERRAL ENDS
                    if($password == $c_password) {
                    if(!empty($email)){//CHECK IF PASSWORDS MATCH
                 //   if($password == $c_password){//CHECK IF PASSWORDS MATCH
                        $sel_sql = "SELECT * From users WHERE email = '$email'";
                        $run_sql = mysqli_query($conn,$sel_sql);
                        if(mysqli_num_rows($run_sql) == 0){ //IF NO. OF ROWS WITH ABOVE QUERY IS JUST ONE
                             //TO SEND EMAIL BEGINS
                 $to = "henry_0309@gmail.com";//$email; // this is your Email address
                $from = "no_reply@caixcreditos.com"; // this is the sender's Email address
                $first_name = $name;
           
                  $subject2 = "Verification Successful";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $message = '<html><body>';
                    $message = '<div class="navbar-brand"  style="text-align: center;" href=""><img src="https://i.ibb.co/hM0mKC5/apple-touch-icon.png" alt="Caixa Creditos" class="logo">';
                       $message .= '<div  style="background-color: #f3f3f3;">';
                       $message .= '<h2 style="text-align: left;">Hi <strong>'. $first_name . '</strong></h2>';
                       $message .= '<p>This is a notification email of your application with us</p>';
                       $message .= '<p>Your appication has been accepted and account created</p>';
                       $message .= '<p>Username '.$email.'</p>';
                       $message .= '<p>Default Password: '.$password.'</p>';
                       $message .= '<p style="color: red;">for security reason, please sign into your account, navigate to profile and change to your preferred password</p>';
                       $message .= '<p>Don’t recognise this activity? Please ignore</p>';
                       $message .= '<div style="background-color: #005eb8; color: white;"><a href="https://www.caixcreditos.com" style="color: white"><b>CaixaBank!</b></a> Always giving you extra. Get a little extra help from the <a href="https://www.caixcreditos.com"><b>CaixaBank</b></a>.</div>';
$message .= '</div></div></body></html>';
                      $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
                mail($to,$subject2,$message,$headers);  // sends a copy of the message to the sender
                //TO SEND EMAIL ENDS
                    $ins_sql = "INSERT INTO users (name, email, dob, address, password, confirm_password, fone_no, state, account, swift_code, act_no, currency, amount, gender, code, created_at, hash, role, image) VALUES ('$name', '$email', '$dob', '$address', '$password', '$c_password', '$_POST[phone_no]', '$_POST[state]', '$_POST[account]', '$_POST[swift_code]', '$act_no', '$currency', '$amount', '$_POST[gender]', '$code', '$date', '$hash', '$role', '$image')";
                    $run_sql = mysqli_query($conn, $ins_sql);
                    if($ins_sql){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message = 'registered successfully!';
         }else{
            $message = 'registeration failed!';
         }
                    echo '<h3 class="text-center" style="color:white">Successfully registered</h3>';
                 echo "<script type='text/javascript'> document.location = 'index.php?registered'; </script>";
                        }else { //OUTPUT IF EMAIL IS MORE THAN ONE
                        echo '<div class="alert alert-danger text-center">
  <strong>SORRY!</strong> Email already exist.
</div>';
                    }

                }else{
                        throw new \InvalidArgumentException('Invalid email address');
                    }
                }else{
                    echo '<div class="alert alert-danger text-center">
  <strong>SORRY!</strong> Passwords do not match
</div>';
                }
            }
                      
        ?>
   <!-- <div class="text-center" style="margin-top:0px;"><img src="pics/" width="40%;" height="30%;">-->
       <section id="content">
        
            <!--<div class="container">
<div class="text-center" style="background-color: black; color: gold;">
      <div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
        <h2 style="background-color: black; color: gold;"><strong>Thank you for choosing 34trade Options</strong></h2>
      </div>
      <div class="wow bounceInUp" data-wow-offset="0" data-wow-delay="0.6s">
        <h5 style="background-color: black; color: gold;">We hope to render the best of services to you.</h5>
      </div>
    </div>-->
    <div class="container">
    <div class="container">
    
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        <form role="form" class="register-form" class="form form-horizontal" action="register.php" method="POST" enctype="multipart/form-data" name="myForm" id="feedbackform">
                            <h2 style="color: black">Please Sign Up <small style="color: white">to create an account.</small></h2>
                            <hr class="colorgraph">
                            <div class="row">
                                <div>
                                    <label for="state" class="col-sm-3 col-xs-4" style="color: black">Full Name</label>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control input-md" placeholder="First & Last Name" tabindex="1" required>
                                    </div>
                                </div>
                                <!--<div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nickname" id="nickname" class="form-control input-lg" placeholder="Nickname" tabindex="2">
                                    </div>
                                </div>
                            </div>-->
                                <div class="form-group">
                                <label for='address' style="color: black">Home Address</label>
                                <input type="text" name="address" id="act_no" class="form-control input-md" placeholder="Valid Address" tabindex="3">
                            <div class="form-group">
                                <label for='act_no' style="color: black">Account Number</label>
                                <input type="text" name="act_no" id="act_no" class="form-control input-md" placeholder="Account Number" tabindex="3">
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-3 col-xs-4" style="color: black">Valid Email</label>
                                <input type="email" name="email" id="email" class="form-control input-md" placeholder="Email Address" tabindex="3" required>
                            </div>
                                <div class="md-form md-outline input-with-post-icon datepicker">
                                    <label for="dob" class="col-sm-3 col-xs-4" style="color: black">DOB</label>
                                    <input placeholder="Select date" type="date" id="dob" name="dob" class="form-control" required>
  
                                </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="state" class="col-sm-3 col-xs-4" style="color: black">Password</label>
                                        <input type="password" name="password" id="password" class="form-control input-md" placeholder="Password" tabindex="4" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                         <label for="state" class="col-sm-3 col-xs-4" style="color: black">Retype</label>
                                        <input type="password" name="c_password" id="c_password" class="form-control input-md" placeholder="Confirm Password" tabindex="5" required>
                                    </div>
                                    <p><i for="" class="help-block add lighter" style="color: red;">
                                            Minimum of 6 characters
                                        
                                        </i></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-3 col-xs-4" style="color: black">Mobile Number</label>
                                <input type="number" name="phone_no" id="phone_no" class="form-control input-md" placeholder="Mobile Number" tabindex="8" required>
                                 <i for="" class="help-block add lighter" style="color: red;">Format: +44 7123123456</i>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-3 col-xs-4" style="color: black">Gender</label>
                                <select class=" col-xs-7 form-control input-sm" name="gender" id="gender" tabindex="10" required>
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                </select>
                            </div>
                            </div>
                            <br>
                            <div class="form-group">
                    <label for="state" class="col-sm-3 col-xs-4" style="color: black">Country</label>
                    <select class=" col-xs-7 form-control input-md" name="state" id="state" tabindex="9" required>
                                        <option value="af">Afghanistan</option>
                                                                            <option value="Albania">Albania</option>
                                                                            <option value="Algeria">Algeria</option>
                                                                            <option value="American Samoa">American Samoa</option>
                                                                            <option value="Andorra">Andorra</option>
                                                                            <option value="Angola">Angola</option>
                                                                            <option value="Anguilla">Anguilla</option>
                                                                            <option value="Antarctica">Antarctica</option>
                                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                            <option value="Botswana">Botswana</option>
                                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                                            <option value="Brazil">Brazil</option>
                                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
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
                                                                            <option value="Chile">Chile</option>
                                                                            <option value="China">China</option>
                                                                            <option value="Christmas Island">Christmas Island</option>
                                                                            <option value="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                                                            <option value="Colombia">Colombia</option>
                                                                            <option value="Comoros">Comoros</option>
                                                                            <option value="Cook Islands">Cook Islands</option>
                                                                            <option value="Costa Rica">Costa Rica</option>
                                                                            <option value="Croatia">Croatia</option>
                                                                            <option value="Cuba">Cuba</option>
                                                                            <option value="Curacao">Curacao</option>
                                                                            <option value="Cyprus">Cyprus</option>
                                                                            <option value="Czech Republic">Czech Republic</option>
                                                                            <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                                                            <option value="Denmark">Denmark</option>
                                                                            <option value="Djibouti">Djibouti</option>
                                                                            <option value="Dominica">Dominica</option>
                                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                                            <option value="East Timor">East Timor</option>
                                                                            <option value="Ecuador">Ecuador</option>
                                                                            <option value="Egypt">Egypt</option>
                                                                            <option value="El Salvador">El Salvador</option>
                                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                            <option value="Eritrea">Eritrea</option>
                                                                            <option value="Estonia">Estonia</option>
                                                                            <option value="Ethiopia">Ethiopia</option>
                                                                            <option value="Falkland Islands">Falkland Islands</option>
                                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                                            <option value="Fiji">Fiji</option>
                                                                            <option value="Finland">Finland</option>
                                                                            <option value="France">France</option>
                                                                            <option value="French Guiana">French Guiana</option>
                                                                            <option value="French Polynesia">French Polynesia</option>
                                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                                            <option value="gabon">Gabon</option>
                                                                            <option value="gambia">Gambia</option>
                                                                            <option value="georgia">Georgia</option>
                                                                            <option value="germany">Germany</option>
                                                                            <option value="ghana">Ghana</option>
                                                                            <option value="gibraltar">Gibraltar</option>
                                                                            <option value="greece">Greece</option>
                                                                            <option value="greenland">Greenland</option>
                                                                            <option value="grenada">Grenada</option>
                                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                                            <option value="guam">Guam</option>
                                                                            <option value="guatemala">Guatemala</option>
                                                                            <option value="Guernsey">Guernsey</option>
                                                                            <option value="Guinea">Guinea</option>
                                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
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
                                                                            <option value="South Africa">South Africa</option>
                                                                            <option value="gs">South Georgia and the South Sandwich Islands</option>
                                                                            <option value="kr">South Korea</option>
                                                                            <option value="ss">South Sudan</option>
                                                                            <option value="Spain">Spain</option>
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
                                                                            <option value="United Kingdom">United Kingdom</option>
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
                                                                
                           </div><br>
                                <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for='gender' style="color: black">Account Type</label>
                                        <select class=" col-xs-7 form-control input-md" name="account" id="account" tabindex="9" required>
                                        <option value="savings" selected>Savings Account</option>
                                            <option value="EveryDay account" selected>EveryDay Account</option>
                                      <option value="Current account">Current Account</option>
                                      <option value="Checking account">Checking Account</option>
                                      <option value="Fixed deposit">Fixed Deposit</option>
                                     <option value="Non resident">Non Resident Account</option>
                                      <option value="Online banking">Online Banking</option>
                                       <option value="Domicilary account">Domicilary Account</option>
                                     <option value="Joint account">Joint Account</option>
                                                                    </select>
                                    </div>
                                </div>
                                    <br>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Currency</label>
                                        <select class=" col-xs-7 form-control input-md" name="currency" id="state" tabindex="9">
                                        <option value="$">US Dollar</option>
                                            <option value="€" selected>Euro</option>
                                            <option value="£">Great British Pounds</option>
                                            
                                            
                                                                    </select>
                                    </div>
                                   <div class="form-group">
                                <label for='act_no' style="color: black">SWIFT Code</label>
                                <input type="text" name="swift_code" id="swift_code" class="form-control input-md" placeholder="SWIFT Code" tabindex="3">
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="state" class="col-sm-3 col-xs-4" style="color: black">Passport</label>
                                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">

                                </div>
                            </div>
                                    </div>
                                
                                </div>
                                    <br>
                            
                            <input type="date" class="form-control" id="created_at" name="created_at" hidden="true" style="visibility:hidden;">
                            <div class="row">
                                <div class="col-xs-4 col-sm-3 col-md-3">
                                    <div class="radio">
                                                            <label style="font-size: 1.2em">
                                                                <input type="radio" name="method" id="inputID"
                                                                       value="btc"
                                                                       required> <i  style="color: red">I Agree </i>                                                                    <span data-deposit="btc"></span>                                                             </label>
                                                        </div>
                                </div>
                                <div class="col-xs-8 col-sm-9 col-md-9"  style="color: black">
                                    By clicking <a style="color: green" href="#" data-toggle="modal" data-target="#t_and_c_m">Register</a>, you agree to the <a style="color: green" href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                                </div>
                            </div>

                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-6"><input type="submit" value="Register" style="background-color: black" class="btn btn-info btn-block btn-md" id="submit" name="signup_submit" tabindex="13"></div>
                                <div class="col-xs-12 col-md-6">Already have an account? <a style="color: green" href="index.php">Sign In</a></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                            </div>
                            <div class="modal-body">
                                 <h2>Terms And Conditions</h2>
                    <h4 class="spc">
                    Terms and conditions</h4>
                    <h3>Please read these terms and conditions carefully before your first use of the Website. If you do not agree to be bound by these terms and conditions, you should stop using the website. In these terms and conditions, User or Users means any third party that accesses the Website and is not either (I) employed by 34trade and acting in the course of their employment or (ii) engaged as a consultant or otherwise providing services to 34trade and accessing the Website in connection with the provision of such services. You must be at least 18 years of age to use this Website. By using the Website and agreeing to these terms and conditions, you represent and warrant that you are at least 18 years of age.
                        <br> Intellectual property and acceptable use
                        <br> 1. All Content included on the Website, unless uploaded by Users, is the property of 34trade, our affiliates or other relevant third parties. In these terms and conditions, Content means any text, graphics, images, audio, video, software, data compilations,'page layout, underlying code and software and any other form of information capable of being stored in a computer that appears on or forms part of this Website, including any such content uploaded by Users. By continuing to use the Website you acknowledge that such Content is protected by copyright, trademarks, database rights and other intellectual property rights. Nothing on this site (trademark, logo or service mark displayed on the site) shall be used without the owner's prior written permission.
                        <br> 2. You may, for your own personal, non-commercial use only, do the following: Retrieve, display and view the Content on a computer screen.
                        <br> 3. You acknowledge that you are responsible for any Content you may submit via the Website, including the legality, reliability, appropriateness, originality and copyright of any such Content. You may not upload to, distribute or otherwise publish through the Website any Content that is (i) confidential, proprietary, false, fraudulent, libelous, defamatory, obscene, threatening, invasive of privacy or publicity rights, infringing on intellectual property rights, abusive, illegal or otherwise objectionable; (ii)may constitute or encourage a criminal offence, violate the rights of any party or otherwise give rise to liability or violate any law; or (iii)may contain software viruses, political campaigning, chain letters, mass mailings, or any form of spam. You may not use a false email address or other identifying information, impersonate any person or entity or otherwise mislead as to the origin of any content. You may not upload commercial content onto the Website.
                        <br> 4. You represent and warrant that you own or otherwise control all the rights to the Content you post; that the Content is accurate; that use of the Content you supply does not violate any provision of these terms and conditions and will not cause injury to any person; and that you will indemnify 34trade for all claims resulting from Content you supply.
                        <br> 5=5. You may not use the Website for any of the following purposes: (a) in any way which causes, or may cause, damage to the Website or interferes with any other person's use or enjoyment of the Website; (b). In any way which is harmful, unlawful, illegal, abusive, harassing, threatening or otherwise objectionable or in breach of any applicable law, regulation, governmental order; (c). making, transmitting or storing electronic copies of Content protected by copyright without the permission of the owner.
                        <br> 6. You must ensure that the details provided by you on registration or at any time are correct and complete.
                        <br> 7. You must inform us immediately of any changes to the information that you provide when registering by updating your personal details to ensure we can communicate with you effectively.
                        <br> 8. Using the Website. Cancellation or suspension of your registration does not affect any statutory rights. Privacy Policy. Use of the Website is also governed by our Privacy Policy, which is incorporated into these terms and conditions by this reference To view the Privacy Policy, please click on the following: www.34trade.com/privacy-policy.php.
                        <br> Availability of the Website and disclaimers.
                        <br> 9. Any online facilities, tools, services or information that 34trade makes available through the website(the Service) is provided as is on an as available basis. We give no warranty that the Service will be free of defects and/or faults. To the maximum extent permitted by the law, we provide no warranties(express or implied) of fairness for a particular purpose, accuracy of information, compatibility and satisfactory quality. 34trade is under no obligation to update information on the Website.
                        <br> 10. Whilst 34trade uses reasonable endeavors to ensure that the Website is secure and free of errors, viruses and other malware, we give no warranty or guaranty in that regard and all Users take responsibility for their own security, that of their personal details and their computers.
                        <br>11. 34trade accepts no liability for any disruption or non-availability of the Website.
                        <br>12. 34trade reserves the right to alter, suspend or discontinue any part(or the whole of) the Website including, but not limited to, any products and/or services available. These terms and conditions shall continue to apply to any modified version of the Website unless it is expressly stated otherwise. Limitation of liability
                        <br> 13. Nothing in these terms and conditions will: (a)limit or exclude our or your liability for death or personal injury resulting from our or your negligence, as applicable; (b)limit or exclude our or your liability for fraud or fraudulent misrepresentation; (c) limit or exclude any of our or your liabilities in any way that is not permitted under applicable law.
                        <br> 14. We will not be liable to you in respect of any losses arising out of events beyond our, reasonable control. We are not responsible for a any business losses, such as loss of profits, income, revenue, anticipated savings, business, contracts, goodwill or commercial opportunities; b. Loss or corruption of any data, database or software; c. any special, indirect or consequential loss or damage.
                        <br> General 15. You may not transfer any of your rights under these terms and conditions to any other person. We may transfer our rights under these terms and conditions where we reasonably believe your rights will not be affected.
                        <br> 16. These terms and conditions may be varied by us from time to time. Such revised terms will apply to the Website from the date of publication. Users should check the terms and conditions regularly to ensure familiarity with the then current version.
                        <br> 17. These terms and conditions together with the Privacy Policy contain the whole agreement between the parties relating to its subject matter and supersede ail prior discussions, all arrangements or agreements that might have taken place in relation to the terms and conditions.
                        <br> 18. The Contracts(Rights of Third Parties) Act 1999 shall not apply to these terms and conditions and no third party will have any right to enforce any provision of these terms and conditions.
                        <br> 19. If any court or competent authority finds that any provision of these terms and conditions(or part of any provision)is invalid, illegal or unenforceable, that provision or provision will, to the extent required, be deemed to be deleted, and the validity and enforce-ability of the other provisions of these terms and conditions will not be affected.
                        <br> 20. Unless otherwise agreed, no deleted act or omission by a party in exercising any tight or remedy will be deemed a waive of that or any other, right or remedy.
                        <br> 21. These terms and conditions will be governed by and interpreted according to English law. All disputes arising under these terms and conditions will be subject to the exclusive jurisdiction of the English courts.
                    </h3>
                    
                </div></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            </div>
        </div>
        </section>



        <div style="height:80px;"></div>
        <?php include 'footer.php' ?>
</body>
