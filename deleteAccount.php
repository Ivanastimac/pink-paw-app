<?php

    function function_alert($message, $url) {
        echo "<script>alert('$message'); window.location.href = '$url'; </script>";
        exit();
    } 

    include("session.php");

    $query = "SELECT ID_Users FROM users WHERE username = '$_SESSION[login_user]' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row['ID_Users'];

    $query = "DELETE from pets WHERE Owner = '$id'";
    $result = mysqli_query($conn, $query);

    $query = "DELETE from users WHERE username = '$_SESSION[login_user]'";
    $result = mysqli_query($conn, $query);
    
    if(!empty($result)){
        session_destroy();
        function_alert("You successfully deleted your account!", "login.html");                    
    } else {
        function_alert("Error deleting. Please try again later.", "profile.php");
    }

    mysqli_free_result($result);
    mysqli_close($conn);

?>