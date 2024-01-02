<?php

include('../config/config.php');

// Get incoming from posted form
$category   = $_POST['category'] ?? "";
$title      = $_POST['title'] ?? "";
$content    = $_POST['content'] ?? "";
$author     = $_POST['author'] ?? "";
$pubdate    = $_POST['pubdate'] ?? "";

$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
INSERT INTO article
    (category, title, content, author, pubdate)
VALUES
    (?, ?, ?, ?, ?)
;
EOD;

// Get the password hash from the database
$stmt = $db->prepare($sql);
$args = [$category, $title, $content, $author, $pubdate];
$stmt->execute($args);



// Do a redirect
setFlashMessage("success", "User $acronym was created");

if ($_SESSION['role'] === "admin") {
    header("Location: articles.php");
    exit();
}

header("Location: login.php");
exit();
