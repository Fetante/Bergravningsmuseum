<?php

include('../config/config.php');

$title = "Objekt";
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


// Check if there is any object after this one:
$sql2 = <<<EOD
SELECT
    COUNT(*)    
FROM Object
WHERE
     id > ?
;
EOD;

$stmt = $db->prepare($sql2);
$stmt->execute([$id]);
$count = $stmt->fetchColumn();

// echo "<pre>", print_r($res, true), "</pre>";


include('../view/crud/object_view.php');

include('../view/footer.php');
