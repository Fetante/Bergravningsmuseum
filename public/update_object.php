<?php

include('../config/config.php');
$title = "Uppdatera objektet";

include('../view/header.php');

// Fetch the current data from session
$id = $_GET['id'] ?? null;

// Fetch from db
$dsn = getDsnToDatabaseFile("bmo.sqlite");
$db = connectToDatabase($dsn);

$sql = <<<EOD
SELECT
    *
FROM object
WHERE
    rowid = ?
;
EOD;

// Get the password hash from the database
$stmt = $db->prepare($sql);
$args = [$id];
$stmt->execute($args);
$res = $stmt->fetch();

$category = $res['category'] ?? "";
$title = $res['title'] ?? "";
$text = $res['text'] ?? "";
$owner = $res['owner'] ?? "";
$image = $res['image'] ?? "";

?>

<h1>Change details</h1>

<?= getFlashMessage() ?>

<form method="post" action="update_object_process.php" class="form">
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
            <label>Ägare: </label>
            <input type="text" name="owner" value="<?= $owner ?>" placeholder="Enter owner">
        </p>
        <p>
            <label>image: </label>
            <input type="text" name="image" value="<?= $image ?>" placeholder="Enter link to new avatar">
        </p>

        <p>
        <label>Innehåll: </label>
            <textarea name="text" placeholder="Enter new content"><?= $text ?></textarea>
        </p>

        <p>
            <input type="submit" name="doit" value="Update">
        </p>
    </fieldset>
</form>



<?php

// echo "<pre>", print_r($_SESSION['role'], true), "</pre>";

include('../view/footer.php');