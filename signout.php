<?php
    if(isset($_GET['user_delete'])){ 
        session_start(); //to ensure you are using same session
        session_destroy(); //destroy the session that will be deleted
        header("location: index.php?user_deleted"); //to redirect back to "index.php" after logging out and deleting user
    exit();
    } else{
        session_start(); //to ensure you are using same session
        session_destroy(); //destroy the session
        header("location: index.php"); //to redirect back to "Main Homepage" after logging out
    exit();
    }
?>