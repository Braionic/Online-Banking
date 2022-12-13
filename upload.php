<?php include 'includes/timeoutable.php' ?>

    <?php include 'includes/db.php'; ?>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>

<?php


// Check if image file is a actual image or fake image
if(isset($_POST["submit_upload"])) {
    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $date = date("l jS \of F Y h:i:s A");
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $description = $_POST['info'];
  if($check !== false) {
      $sql = "INSERT INTO documents (file, userid, username, description, time_uploaded) VALUES ('$target_file', '$_SESSION[id]', '$_SESSION[name]', '$description', '$date')";
      $query_sql = mysqli_query($conn, $sql);
    echo "<script type='text/javascript'> document.location = 'profile.php?upload_status=success'; </script>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "<script type='text/javascript'> document.location = 'profile.php?upload_status=already_exist'; </script>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  "<script type='text/javascript'> document.location = 'profile.php?upload_status=too_large'; </script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  "<script type='text/javascript'> document.location = 'profile.php?upload_status=unsupported_format'; </script>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>