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
    echo "<table style ='text-align: center; border: 1px solid black; border-collapse: collapse; margin-left: auto; margin-right: auto'>";
    echo "<tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<th>" . $row['Field'] . "</th>"; 
    }
    echo "</tr>";
}

    $query = "SELECT * FROM " . $tabella . ";";

    $select = $conn->query($query);

    if ($select->num_rows > 0) {
        
        while ($row = $select->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td style = 'border: 1px solid black>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nessun dato trovato nella tabella " . $tabella . "<p>";
    }





    ?>
</body>
</html>