<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "filter.css">
    </head>
</html>

<?php
    $query = "SELECT DISTINCT Species FROM pets ORDER BY Species ASC";
    $result = mysqli_query($conn, $query);
?>

<html>
    <form class = 'forma' action = 'adoption.php' method = 'get'><br />
        <table class = 'filter'>
            <tr>
            <td> Choose species: <br />
            <select name = 'selectSp'> <option selected> All </option>
</html>

<?php 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        print("<option value = '$row[Species]'>" . $row['Species'] . "</option>");
    }
?>

<html>
            </select></td>

            <td> Choose sex: <br />
            <span class = 'radio'>
                <input type = 'radio' name = 'sex' value = 'Male' /> Male 
                <input type = 'radio' name = 'sex' value = 'Female' /> Female 
            </span> </td>

            <td> Choose maximal age (in months): <br />
            <input type = 'text' name = 'ageMax' />
            </td>   
</html>

<?php
    $query = "SELECT DISTINCT Location FROM pets ORDER BY Location ASC";
    $result = mysqli_query($conn, $query);
?>

<html>
            <td> Choose location: <br />
            <select name = 'selectLoc'> <option selected> All </option>
</html>

<?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        print("<option value = '$row[Location]'>" . $row['Location'] . "</option>");
    }
?>

<html>
            </select></td></tr></table>
            <div class = 'gumbF'><input class = 'gumbFilter' type = 'submit' value = 'Filter!' /></div>
            </form><br />
</html>