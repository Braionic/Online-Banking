<?
$sql = "SELECT * FROM mavro where user_id= $_SESSION['ID']";
$sql_query = mysqli_query($conn, $sql);
while($rows= mysqli_fech_assoc($sql_query)){
    $amount = $rows['mavro'];
    $amount2 = $rows['mavro2'];
    $currency = $rows['currency'];
    switch($amount, $amount, $currency){
    case $amount > 0.00 && $currency == 'USD':
        $result = echo "many many code $'.amount . 'many many code $'.$amount2 . 'many many code'";
    case $amount > 0.00 && $currency == 'EURO':
        $result = echo "many many code e'.amount . 'many many code e'.$amount2 . 'many many code'";
    case $amount > 0.00 && $currency == 'GBP':
        $result = echo "many many code G'.amount . 'many many code G'.$amount2 . 'many many code'";
    }

}
?>
<?php $result; ?>
