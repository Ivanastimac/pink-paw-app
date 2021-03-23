<?php
    $id = $_GET["id"];
    $name = $_GET["name"];
    $age = $_GET["age"];
    $description = $_GET["description"];
    
    include("config.php");

    $query = "UPDATE pets SET Name = '$name', Age = $age, Description = '$description' WHERE ID_Pets = $id";

    $result = mysqli_query($conn, $query);
    if (!empty($result)) {
        echo "<script>alert('Updated successfully!'); window.location.href='profile.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong, please try later!'); window.location.href='profile.php'; </script>";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>