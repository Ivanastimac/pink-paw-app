<?php
    include("session.php");

    $query = "SELECT * from users WHERE username = '$_SESSION[login_user]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<html>
    <head>
        <title>
            Buttons
        </title>
        <link rel = "stylesheet" type = "text/css" href = "two-buttons.css">
        <link rel = "stylesheet" type = "text/css" href = "avatar.css">
    </head>
    <body>
        <div class = "container" onClick = "window.location.href = 'profile.php';">
            <img src = "<?php print($row['Image']); ?>" alt = "Avatar" class = "image">
            <div class = "overlay">My profile</div>
        </div>
        
        <div class = "win">
            <button onClick = "window.location.href = 'adoption.php';">
                I want to adopt a pet!
            </button>

            <button onClick = "window.location.href = 'giving-for-adoption.php';">
                I want to give up my pet for adoption!
            </button>
        </div>
    </body>
</html>