<?php

include('../config/config.php');

// Get incoming from posted form
$isAdmin    = $_SESSION['role'] ?? null; // Om admin
$category   = $_POST['category'] ?? "";
$title      = $_POST['title'] ?? "";
$text       = $_POST['text'] ?? "";
$owner      = $_POST['owner'] ?? "";
$image      = $_POST['image'] ?? "";
$id         = $_POST['id'] ?? "";




if (empty($category) && empty($title) && empty($text) && empty($owner) && empty($image)) {
    setFlashMessage("warning", "Fail! You did not enter any new information");
    header("Location: admin.php");
    exit();
}


if (!$isAdmin) {
    setFlashMessage("warning", "You must be admin!");
    header("Location: admin.php");
    exit();
}

$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
UPDATE object SET
    category = ?,
    title = ?,
    text = ?,
    image = ?,
    owner = ?
WHERE
    rowid = ?
;
EOD;

$stmt = $db->prepare($sql);
$args = [$category, $title, $text, $image, $owner, $id];
$stmt->execute($args);

// Do a redirect
setFlashMessage("success", "Update was successfull");

if ($_SESSION['role'] === "admin") {
    header("Location: admin.php");
    exit();
}
 header("Location: articles.php");
exit();
