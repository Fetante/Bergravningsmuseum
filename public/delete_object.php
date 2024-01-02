<?php

include('../config/config.php');
$title = "Delete user";

include('../view/header.php');

$id = $_GET['id'] ?? null;

?>

<h1>Ta bort objektet</h1>



<form method="post" action="delete_object_process.php">
    <fieldset>
        <legend>Ta bort objektet</legend>

        <p>
            <label>Är du helt säker på att du vill ta bort objektet?</label>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Ta bort objektet">
        </p>
    </fieldset>
</form>


<?php

include('../view/footer.php');
