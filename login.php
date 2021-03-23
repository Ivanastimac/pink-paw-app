<?php
    
    function function_alert($message, $url) {
        echo "<script class='win'>alert('$message'); window.location.href='$url'; </script>";
        
    }
    include("config.php");
    session_start();

   

    $uid = $_POST['username'];
    $pwd = $_POST['pass'];
    $pwd = md5($pwd);
    
    if ((!isset($_POST['username']) || $_POST['username'] == '') && (!isset($_POST['pass']) || $_POST['pass'] == '')){
        function_alert("All fields must be filled. Try again or register.", "login.html");
    }

    $sql = "SELECT * FROM Users WHERE Username = '$uid' ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) > 0){
        if ($row['Password'] == $pwd){
            $_SESSION['login_user'] = $uid;
            $_SESSION['login_id'] = $row['ID_Users'];
            header("location: two-buttons.php");
            function_alert("Successful login!" , "two-buttons.php");
        } else function_alert("Password is incorrect. Try again." , "login.html");
    } else function_alert("Username is incorrect. Try again or register.", "login.html");

    mysqli_free_result($result);
    mysqli_close($conn);
?>