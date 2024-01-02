<?php

include('../config/config.php');

// Get incoming from posted form
$isAdmin    = $_SESSION['role'] ?? null; // Om admin
$category   = $_POST['category'] ?? "";
$title      = $_POST['title'] ?? "";
$content    = $_POST['content'] ?? "";
$author    = $_POST['author'] ?? "";
$pubdate    = $_POST['pubdate'] ?? "";
$id         = $_POST['id'] ?? "";




if (empty($category) && empty($title) && empty($content) && empty($author) && empty($pubdate)) {
    setFlashMessage("warning", "Fail! You did not enter any information");
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
UPDATE article SET
    category = ?,
    title = ?,
    content = ?,
    author = ?,
    pubdate = ?
WHERE
    rowid = ?
;
EOD;


$stmt = $db->prepare($sql);
$args = [$category, $title, $content, $author, $pubdate, $id];
$stmt->execute($args);


// Do a redirect
setFlashMessage("success", "Update was successfull");

if ($_SESSION['role'] === "admin") {
    header("Location: admin.php");
    exit();
}
 header("Location: articles.php");
exit();
