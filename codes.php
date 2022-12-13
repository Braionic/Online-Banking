<?php include 'includes/db.php'; ?>
<?php include 'billing-process.php'; ?>
<?php

if(isset($_POST['int_submit'])){
        $bank_name = $_POST['b_country'];
        $b_name = $_POST['b_name'];
        $b_acct = $_POST['b_acct'];
        $b_country = $_POST['b_country'];
        $swift_code = $_POST['b_country'];
        $routing_number = $_POST['routing_number'];
        $description = $_POST['description'];
        $acct_type = $_POST['acct_type'];
        $code = 123;
        
        $inter_sql = "SELECT * FROM int_transfer WHERE user_id ='$_SESSION[id]'";
        $inter_q = mysqli_query($conn, $inter_sql);
        if(mysqli_num_rows($inter_q) > 0){
              $sql = "UPDATE int_transfer SET bank_name='$bank_name', b_name='$b_name', b_acct='$b_acct'  WHERE userid = '$_SESSION[id]'";
            $sql_q = mysqli_query($conn, $inter_q);
            echo "<script type='text/javascript'> document.location = 'cot-process.php?updated_successfuly'; </script>";
            }else{
            
            $ins_sql1 = "INSERT INTO int_transfer (bank_name, b_name, user_id, b_acct, b_country, swift_code, routing_number, acct_type, code, description) VALUES ('$bank_name', '$b_name', '$_SESSION[id]', '$b_acct', '$b_country', '$swift_code', '$routing_number', '$acct_type', '$code', '$description')";
                    $run_sql2 = mysqli_query($conn,$ins_sql1);
            
        }
        echo "<script type='text/javascript'> document.location = 'cot-process.php?insertsuccess'; </script>";
        
    }else{
        echo 'sorry! One or more fields are empty';
    }

