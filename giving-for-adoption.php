<html>
    <head>
        <title>
            Giving up
        </title>
        <link rel = "stylesheet" type = "text/css" href = "giving-for-adoption.css">
        <link rel = "stylesheet" type = "text/css" href = "avatar.css">
        <link rel="stylesheet" type="text/css" href="footer.css">
        <script src = "giving-for-adoption.js"></script>
    </head>

<?php
    include("session.php");

    $query = "SELECT * from users WHERE username = '$_SESSION[login_user]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

    <body>
    <div id="page-container">
        <div id="content-wrap">
        <div class = "container" onClick = "window.location.href = 'profile.php';">
            <img src = "<?php print($row['Image']); ?>" alt = "Avatar" class = "image">
            <div class = "overlay">My profile</div>
        </div>
        <div class = "title">
            FORM FOR ADOPTION
        </div>
        <br /><br />
        <div class = "win">
        <form action = "submit_adoption.php" enctype = "multipart/form-data" method = "POST">
            Species: &nbsp &nbsp
            <input type = "text" name = "species" /> <br /><br />
            Subspecies: &nbsp &nbsp
            <input type = "text" name = "subspecies" /> <br /><br />
            Name: &nbsp &nbsp
            <input type = "text" name = "name" /> <br /><br />
            Sex: &nbsp &nbsp
            <span class = "radio">
                <input type = "radio" name = "sex" value = "male" /> Male 
                <input type = "radio" name = "sex" value = "female" /> Female <br /><br />
            </span>
            Age (in months): &nbsp &nbsp
            <input id = "age" type = "text" name = "age" onkeyup = "ageCheck()"/> <span id = "notNumber"></span> <br /><br />
            Location: &nbsp &nbsp
            <input type = "text" name = "location" /> <br /><br />
            Description: &nbsp &nbsp
            <textarea id = "description" rows = "3" cols = "45" name = "description"></textarea> <br /><br />
            Image: &nbsp &nbsp
            <label class = "userfile">
                <input id = "image" type = "file" name = "petImage" hidden onchange = "check()"/>
                Choose image
            </label>&nbsp 
            <span id = "uploaded"></span>
            <div class = "buttons">
                <a class = "gumbReset" href = "giving-for-adoption.php">
                    Reset
                </a>
                <input class = "gumbPotvrda" type = "submit" name = "gumbLog" value = "Submit" />
            </div>
        </form>
        </div>
        
    
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