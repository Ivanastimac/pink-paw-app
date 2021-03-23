<html>
    <head>
        <title>
            Profile
        </title>
        <link rel = "stylesheet" type = "text/css" href = "profile.css">
        <link rel = "stylesheet" type = "text/css" href = "avatar_profile.css">
        <link rel="stylesheet" type="text/css" href="footer.css">
        <script src = "profile.js"> </script>
    </head>
    <body>
        <div id="page-container">
            <div id="content-wrap">

<?php
    include("config.php");
    include("session.php");
    
    $query = "SELECT * from users WHERE username = '$_SESSION[login_user]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    print("<div class = 'win'>");
    print("Your profile:<br /><br />");
    if($row) {
        print("<TABLE>");
        print("<TR><TD rowspan = 5>
        <form action = 'upload_photo.php' enctype='multipart/form-data' method = 'POST'>
        <label class = 'userfile'>
            <input id = 'image' type = 'file' name = 'userImage' hidden onchange = 'check();'/>
            <div class = 'container'>
                <img src = '$row[Image]' alt = 'Avatar' class = 'image'>
                <div class = 'overlay'>
                Change profile photo
                </div>
            </div>
        </label>
        <span id = 'uploaded'></span>
        </form>
        </TD></TR>");
        print("<TR><TD> NAME: </TD><TD>" . $row["Name"] . "</TD></TR>");
        print("<TR class = 'crta'><TD> SURNAME: </TD><TD>" . $row["Surname"] . "</TD></TR>");
        print("<TR class = 'crta'><TD> USERNAME: </TD><TD>" . $row["Username"] . "</TD></TR>");
        print("</TABLE>");
    }
?>
  
    <div align = "right">
        <button class = "logout" onclick = "window.location.href = 'logout.php'">
            Logout
        </button>
        <button class = "delete" onclick = "window.location.href = 'deleteAccount.php' ">
            Delete your account
        </button>
    </div>


<?php
    $query = "SELECT DISTINCT pets.* FROM pets INNER JOIN users ON pets.owner = $row[ID_Users]";
    $result = mysqli_query($conn, $query);

    print("</br>Your pets:<br /><br />");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        print("<table class = 'animal'>");
        print("<tr><td rowspan = 6><img src = '" . $row['Image'] . "' alt = 'pet' /></td>");
        print("<td> NAME: <span id = 'name" . $row['ID_Pets'] . "'> " . $row["Name"] . "</span></td></tr>");
        print("<tr class = 'crta'><td> AGE:<span id = 'age" . $row['ID_Pets'] . "'> " . $row["Age"] . "</span></td></tr>");
        print("<tr class = 'crta'><td> SEX: " . $row["Sex"] . "</td></tr>");
        print("<tr class = 'crta'><td> SPECIES: " . $row["Species"] . "</td></tr>");
        print("<tr class = 'crta'><td> SUBSPECIES: " . $row["Subspecies"] . "</td></tr>");
        print("<tr class = 'crta'><td> DESCRIPTION:<span id = 'description" . $row['ID_Pets'] . "'> " . $row["Description"] . "</span></td></tr></table><br /><br />");
        print("<div class = 'conteinerButton'><form>
        <input type = 'button' class = 'update' name = 'id' id = 'updatebutton" . $row["ID_Pets"] . "' value = 'Update'
        onclick = \"update(" . $row["ID_Pets"] . ", 'updatebutton" . $row["ID_Pets"] . "', 'name" . $row["ID_Pets"] . "', 'age" . $row["ID_Pets"] . "', 'description" . $row["ID_Pets"] . "')\" />
        </form></div>");
    }
    print("</div>");
    
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