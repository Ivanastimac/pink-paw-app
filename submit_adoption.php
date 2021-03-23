<?php

    function function_alert($message, $url) {
        echo "<script>alert('$message'); window.location.href = '$url'; </script>";
        exit();
    }  

    include("config.php");

    $species = $_POST['species'];
    $subspecies = $_POST['subspecies'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $image = $_FILES['petImage']['name'];

    $BASEDIR = "./petsImages/";

    if (!$species || !$subspecies || !$name || !$sex || !$age || !$location || !$description || !$image){
        function_alert("All fields must be filled.", "giving-for-adoption.php");
    } 

    $_FILES['petImage']['name'] = explode(' ', $_FILES['petImage']['name']);
    $_FILES['petImage']['name'] = implode('_', $_FILES['petImage']['name']);

    $BASEDIR = $BASEDIR . strtolower($species) . "/";
    if (!file_exists($BASEDIR)) {
           mkdir($BASEDIR, 755);
    } 

    if (!file_exists($BASEDIR.$_FILES['petImage']['name'])) {
        move_uploaded_file($_FILES['petImage']['tmp_name'], $BASEDIR.$_FILES['petImage']['name']);
    } else {
        function_alert("Image already exist!", "giving-for-adoption.php");
    }

    $path = $BASEDIR . $_FILES['petImage']['name'];

    $species = ucfirst(strtolower($species));
    $subspecies = ucfirst(strtolower($subspecies));
    $name = ucfirst(strtolower($name));
    $sex = ucfirst($sex);
    $location = ucfirst(strtolower($location));
    $description = strtolower($description);

    $query = "INSERT into pets (Species, Subspecies, Name, Sex, Age, Location, Description, Image) VALUES ('$species', '$subspecies', '$name', '$sex', '$age', '$location', '$description', '$path')";
    $result = mysqli_query($conn, $query);
    if(!empty($result)){
        function_alert("Submited successfully!", "giving-for-adoption.php");                    
    } else {
        function_alert("Error submiting. Please try again later.", "giving-for-adoption.php");
    }
    mysqli_free_result($result);
    mysqli_close($conn);

?>