<?php

include_once("config.php");

// Update - Befehl
if ($_POST['update']) 
{
    $id = $_POST['id'];
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
}
    // Wenn kein Input Feld leer ist
else {
    $sql = "UPDATE schueler
            SET firstname=:firstname, lastname=:lastname,class=:class
            where id= :id";

    $query = $db->prepare($sql);
/*
    $query-> bindparam(':id, $id');
    $query-> bindparam(':firstname, $firstname');
    $query-> bindparam(':lastname, $lastname');
    $query-> bindparam(':class, $class');
    $query->execute();
*/
    $query->execute(array(  ':id' => $id,
                            ':firstname' => $firstname,
                            ':lastname' => $lastname,
                            ':class' => $class));

header("Location:index.php");


}
}
?>


<?php

// ID von DB-Record wird per GET uebermittelt, wir nehmendie ID in Empfang
$id = $_GET['id'];

// DB -Anfrage um Formularfelder zu befuellen

$sql = "SELECT * from schueler where id= :id";
$query = $db->prepare($sql);
$query->execute (array(':id'=> $id));

while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
{
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $class = $row['class'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<a href="index.php">Back to Index</a>

<form action="edit.php" method="POST"></form>

    <label for="firstname">Firstname</label><br>
    <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>

    <label for="lastname">Firstname</label><br>
    <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>

    <label for="class">Firstname</label><br>
    <input type="text" name="class" value="<?php echo $class; ?>"><br>


    <input type="hidden" name="id" value=<?php $_GET['id']; ?>>
    <input type="submit" name = "update" value="Update">
</body>
</html>