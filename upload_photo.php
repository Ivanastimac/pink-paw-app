<?php
    function function_alert($message, $url) {
        echo "<script>alert('$message'); window.location.href = '$url'; </script>";
        exit();
    } 

    include("config.php");
    include("session.php");

    $query = "SELECT * from users WHERE username = '$_SESSION[login_user]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $image = $_FILES['userImage']['name'];

    if($image){
        $BASEDIR = "./userImages/";
        move_uploaded_file($_FILES['userImage']['tmp_name'], $BASEDIR.$_FILES['userImage']['name']);
        $path = $BASEDIR . $_FILES['userImage']['name'];

        $query = "UPDATE users SET Image = '$path' WHERE username = '$_SESSION[login_user]' ";
        $result = mysqli_query($conn, $query);
        if(!empty($result)){
            function_alert("Submited successfully!", "profile.php");                    
        } else {
            function_alert("Error submiting. Please try again later.", "profile.php");
        }
        mysqli_free_result($result);
        mysqli_close($conn);

    }

    


?>