<?php

include('../config/config.php');

$title = "Bild";
include('../view/header.php');

$id = $_GET['id'] ?? null;
$previousId = $id - 1;
$nextId = $id + 1;

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
     id = $id
;
EOD;


$stmt = $db->prepare($sql);

$stmt->execute();
$res = $stmt->fetch();

// echo "<pre>", print_r($res, true), "</pre>";


include('../view/crud/picture_view.php');

include('../view/footer.php');
