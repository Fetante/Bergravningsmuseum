<?php

include('../config/config.php');

$title = "Bilder";

include('../view/header.php');

$page = $_GET['page'] ?? 1;

$startId = ($page - 1) * 6 + 1;
$endId = $startId + 5;

// Ta sig in i databasen
$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);
// Koppla upp

// Create the SQL statement
$sql = <<<EOD
SELECT
    rowid,
    *
FROM Object
WHERE
     id
BETWEEN
    $startId
AND
    $endId
;
EOD;


$stmt = $db->prepare($sql);

$stmt->execute();
$res = $stmt->fetchAll();



include('../view/crud/pictures_view.php');

include('../view/footer.php');
