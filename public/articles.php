<?php

include('../config/config.php');

$title = "Artiklar";
include('../view/header.php');

// Get the querystring
$id = $_GET['id'] ?? null;

// echo "<pre>", print_r($id, true), "</pre>";

// Ta sig in i databasen
$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

//Fetch all articles for the sidenavigation links
$sql = <<<EOD
SELECT
    rowid,
    *
FROM Article
WHERE
    category IN ('article', 'maggy')
;
EOD;

$stmt = $db->prepare($sql);
$stmt->execute();
$allResults = $stmt->fetchAll();

include('../view/crud/articles_view.php');

include('../view/footer.php');
// echo "<pre>", print_r($allResults, true), "</pre>";
