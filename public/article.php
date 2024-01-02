<?php

include('../config/config.php');

$title = "Artikel";
include('../view/header.php');



// hämta querysträngen
$id = $_GET['id'] ?? null;




// hämta ett resultat från databasen med id från querysträngen
$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

// Fetch certain article
$sql = <<<EOD
SELECT
    rowid,
    *
FROM Article
WHERE
     id = ?
;
EOD;

$stmt = $db->prepare($sql);
$args = [$id];
$stmt->execute($args);
$res = $stmt->fetch();

include('../view/crud/article_view.php');

include('../view/footer.php');
