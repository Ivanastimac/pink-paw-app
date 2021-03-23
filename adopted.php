<?php

    //Spremi id vlasnika u db pets  
    include("session.php");
    
    $querry_id = "SELECT id_users FROM users WHERE username = '$_SESSION[login_user]'";
    $querry_num = mysqli_query($conn, $querry_id);
    $row_user = mysqli_fetch_assoc($querry_num);
    $id_animal = $_POST['animal'];
  
    $query = "UPDATE pets SET owner = '$row_user[id_users]' WHERE pets.ID_Pets = '$id_animal'";
    $result = mysqli_query($conn, $query);
    if($result){
        print("<script>alert('Thank you for adopting!'); window.location.href = 'adoption.php'; </script>");
    }
    mysqli_free_result($result);
    mysqli_close($conn);

?>