<?php

include('../config/config.php');

// Get incoming from posted form
$category   = $_POST['category'] ?? "";
$title      = $_POST['title'] ?? "";
$text       = $_POST['text'] ?? "";
$image      = $_POST['image'] ?? "";
$owner      = $_POST['owner'] ?? "";

$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
INSERT INTO object
    (category, title, text, image, owner)
VALUES
    (?, ?, ?, ?, ?)
;
EOD;

// Get the password hash from the database
$stmt = $db->prepare($sql);
$args = [$category, $title, $text, $image, $owner];
$stmt->execute($args);



// Do a redirect
setFlashMessage("success", "The new object was created");

if ($_SESSION['role'] === "admin") {
    header("Location: objects.php");
    exit();
}

header("Location: login.php");
exit();
