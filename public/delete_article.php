<?php

include('../config/config.php');
$title = "Delete user";

include('../view/header.php');

$id = $_GET['id'] ?? null;

?>

<h1>Ta bort artikel</h1>



<form method="post" action="delete_article_process.php">
    <fieldset>
        <legend>Ta bort artikeln</legend>

        <p>
            <label>Är du helt säker på att du vill ta bort artikeln?</label>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Ta bort">
        </p>
    </fieldset>
</form>


<?php

include('../view/footer.php');
