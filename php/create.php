

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record</title>
</head>
<body>
    
<?php
    // Interpretiere Einmal
    include_once("config.php");

    $result = $db->query("SELECT * from schueler order by id desc")

    if (isset($_POST['submit'])) 
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $class = $_POST['class'];


        // Pruefe ob Client alle Input-Felder ausgefuellt hat

        if (empty($firstname) || empty($lastname) || empty($class))
        {
             if (empty($firstname)) {
               echo "Please fill in your Firstname";
                                    }
             if (empty($lastname)) {
            echo "Please fill in your Lastname";
                                    }
             if (empty($class)) {
            echo "Please fill in your Class";
                                }
            
        // Wenn kein Input-Feld leer ist:
        } else 
        {
           // Schreibe in SQL

            $sql = "INSERT into schueler (firstname, lastname, class
            Values (:firstname, :lastname, :class)";

            $query = $db-> prepare($sql);

            $query -> bindparam(':firstname', $firstname);
            $query -> bindparam(':lastname', $lastname);
            $query -> bindparam(':class', $class);

            $query-> execute();

            echo "New Record created!";
            echo "<a href='index.php'>Checkout!</a>";

        }

    }
?>


</body>
</html>