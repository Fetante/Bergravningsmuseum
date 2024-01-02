<?php

include('../config/config.php');
$title = "Change Password";

include('../view/header.php');

// Fetch the current data from session
$id = $_GET['id'] ?? null;

// Fetch from db
$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
SELECT
    *
FROM article
WHERE
    rowid = ?
;
EOD;


$stmt = $db->prepare($sql);
$args = [$id];
$stmt->execute($args);
$res = $stmt->fetch();

$category = $res['category'] ?? "";
$title = $res['title'] ?? "";
$content = $res['content'] ?? "";
$author = $res['author'] ?? "";
$pubdate = $res['pubdate'] ?? "";

?>

<h1>Change details</h1>

<?= getFlashMessage() ?>

<form method="post" action="update_article_process.php" class="form">
    <fieldset>
        <legend>Change details</legend>
        
        <p>
            <label>Id: </label>
            <input type="text" name="id" value="<?= $id ?>" readonly="readonly"> 
        </p>

        <p>
            <label>Kategori:</label>
            <input type="text" name="category" value="<?= $category ?>" placeholder="Enter new name">
        </p>

        <p>
            <label>Titel: </label>
            <input type="text" name="title" value="<?= $title ?>" placeholder="Enter link to new avatar">
        </p>
        <p>
            <label>Författare: </label>
            <input type="text" name="author" value="<?= $author ?>" placeholder="Enter Author">
        </p>
        <p>
            <label>Publiseringsdatum: </label>
            <input type="text" name="pubdate" value="<?= $pubdate ?>" placeholder="Enter link to new avatar">
        </p>

        <p>
        <label>Innehåll: </label>
            <textarea name="content" placeholder="Enter new content"><?= $content ?></textarea>
        </p>

        <p>
            <input type="submit" name="doit" value="Update">
        </p>
    </fieldset>
</form>



<?php

// echo "<pre>", print_r($_SESSION['role'], true), "</pre>";

include('../view/footer.php');