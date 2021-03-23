<?php

    function function_alert($message, $url) {
        echo "<script>alert('$message'); window.location.href='$url'; </script>";
        exit();
    }

    include("config.php");

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $passConf = $_POST['passConf'];
    
    //sva polja moraju biti popunjena
    if (!$name || !$surname || !$username || !$pass || !$passConf){
        function_alert("All fields must be filled.", "register.html");
    } 
    
    //provjerava postoji li username u bazi
    $sqlUID = "SELECT * FROM users WHERE username = '$username'";
    $resultUID = mysqli_query($conn, $sqlUID);

    if (mysqli_num_rows($resultUID) > 0) {
        function_alert("Sorry, that username is already taken. Try again.", "register.html");
    }

    //Jacina passworda
    if (strlen($pass) < 8) {
        function_alert("Password not strong enough!", "register.html");
    }

    //Jednakost passworda
    if ($pass != $passConf){
        function_alert("Passwords have to match. Try again!", "register.html");
    } 
    
    //upisuje podatke
    $pass = md5($pass);
    $query = "INSERT INTO users (Name, Surname, Username, Password) VALUES ('$name', '$surname', '$username', '$pass')";
    $result = mysqli_query($conn, $query);
    if(!empty($result)){
        function_alert("Registered successfully!", "login.html");                    
    } else {
        function_alert("Error registering. Please try again later.", "register.html");
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>