<?php

include_once("config.php");

$result = $db->query("SELECT * from schueler order by id desc");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style.css">
    
    <title>Document</title>
    
</head>
<body>

<a href="create.html"></a>


<table>
    <tr>
        <td>Firstname</td>
        <td>Lastname</td>
        <td>Class</td>
        <td>Actions</td>
    </tr>

<?php

// While -Loop, festch als assoziatives Array
while ($row = $result-> fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['class'] . "</td>";
    echo "<td><a href=\" edit.php?id=$row[id]\">Edit</a></td>";
    echo "</tr>";
}


?>

</table>



</body>
</html>