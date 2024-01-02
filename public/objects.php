<?php

include('../config/config.php');

$title = "Alla Objekt";
include('../view/header.php');

$page = $_GET['page'] ?? 1;

$startId = ($page - 1) * 4 + 1;
$endId = $startId + 3;

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

$sql1 = <<<EOD
SELECT
    rowid,
    *
FROM Object
;
EOD;


$stmt = $db->prepare($sql);

$stmt->execute();
$res = $stmt->fetchAll();


// $stmt = $db->prepare($sql1);

// $stmt->execute();
// $res1 = $stmt->fetchAll();


// echo "<pre>", print_r($res, true), "</pre>";

// Hämta objekt

include('../view/crud/objects_view.php');

include('../view/footer.php');
