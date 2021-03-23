<html>
    <head>
        <title>
            Adoption
        </title>
        <link rel = "stylesheet" type = "text/css" href = "adoption.css">
        <link rel = "stylesheet" type = "text/css" href = "avatar.css">
        <link rel="stylesheet" type="text/css" href="footer.css">
    </head>

<?php
    include("config.php");
    include("session.php");
    include("filter.php");   

    $query = "SELECT * from users WHERE username = '$_SESSION[login_user]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

    <body>
        <div class = "container" onClick = "window.location.href = 'profile.php';">
            <img src = "<?php print($row['Image']); ?>" alt = "Avatar" class = "image">
            <div class = "overlay">My profile</div>
        </div>
        <div id="page-container">
            <div id="content-wrap">


<?php
    $query = "SELECT * FROM pets WHERE Owner IS NULL";
    if(isset($_GET['selectSp']) && ($_GET['selectSp'] != 'All')) {
        $speciesF = $_GET['selectSp'];
        $query .= " AND Species = '$speciesF' ";
    }
    if(isset($_GET['sex'])) {
        $sexF = $_GET['sex'];
        $query .= " AND Sex = '$sexF' ";
    }
    if(isset($_GET['ageMax']) && $_GET['ageMax'] != '') {
        $ageF = $_GET['ageMax'];
        $query .= " AND Age <= $ageF";
    }
    if(isset($_GET['selectLoc']) && ($_GET['selectLoc'] != 'All')) {
        $locationF = $_GET['selectLoc'];
        $query .= " AND Location = '$locationF' ";
    }

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        print("<form class = 'animal' action = 'adopted.php' method = 'POST'><table class = 'animals'>");
        print("<tr><td rowspan = 7><img src = '" . $row['Image'] . "' alt = 'pet' /></td>");
        print("<td> NAME: " . $row["Name"] . "</td></tr>");
        print("<tr class = 'crta'><td> AGE: " . $row["Age"] . "</td></tr>");
        print("<tr class = 'crta'><td> SEX: " . $row["Sex"] . "</td></tr>");
        print("<tr class = 'crta'><td> SPECIES: " . $row["Species"] . "</td></tr>");
        print("<tr class = 'crta'><td> SUBSPECIES: " . $row["Subspecies"] . "</td></tr>");
        print("<tr class = 'crta'><td> LOCATION: " . $row["Location"] . "</td></tr>");
        print("<tr class = 'crta'><td> DESCRIPTION: " . $row["Description"] . "</td></tr></table>");
        print("<div class = 'gumb'><input type = 'hidden' name = 'animal' value = '$row[ID_Pets]'>");
        print("<input type = 'submit' class = 'adopt' value = 'Adopt me!' name = 'adopt'></div>");
        print("</form>");
    }
    mysqli_free_result($result);
    mysqli_close($conn);

?>
    </div>
        <div id="footer">
            <div id="left_footer">
            Contact us: <br />
            pink_paw@gmail.com <br />
            +385 98 765 14 32 <br />
            Vukovarska 1, 51000 Rijeka
            </div>
            <div id="center_footer">
            <a href="two-buttons.php">Go back</a>
            </div>
            <div id="right_footer">
            <img src="images/logo_footer.png" />
            </div>
        </div>
    </div>
    </body>
</html>