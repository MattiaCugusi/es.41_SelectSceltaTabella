<?php
include ('connessione.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $tabella = $_POST["tabelle"];

    $sql = "SHOW COLUMNS FROM " . $tabella . ";";

    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Intestazioni dei campi della tabella '$tabella':<br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['Field'] . "<br>"; 
    }
}
    ?>
</body>
</html>