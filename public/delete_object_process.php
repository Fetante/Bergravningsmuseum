<?php

include('../config/config.php');

// Get incoming from posted form
$id = $_POST['id'] ?? null;


$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
DELETE FROM object
WHERE
    id = ?
;
EOD;

$stmt = $db->prepare($sql);
$args = [$id];
$stmt->execute($args);



// Do a redirect to the logout_process page => login
setFlashMessage("success", "Objektet togs bort");

if ($_SESSION['role'] === "admin") {
    header("Location: admin.php");
    exit();
}

header("Location: logout_process.php");
exit();
