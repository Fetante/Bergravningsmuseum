<?php

include('../config/config.php');
$title = "Nytt objekt";

include('../view/header.php');

?>

<h1>Skapa ett nytt objekt</h1>

<?= getFlashMessage() ?>

<form method="post" action="create_object_process.php">
    <fieldset>
        <legend>Skapa objekt</legend>

        <p>
            <label>Kategori: <br>
                <input type="text" name="category" placeholder="Enter category">
            </label>
        </p>

        <p>
            <label>Titel: <br>
                <input type="text" name="title" placeholder="Enter title">
            </label>            
        </p>

        <p>
            <label>Text-Innehåll: <br>
                <textarea name="text" placeholder="Enter new content"></textarea>
            </label>
        </p>

        <p>
            <label>Bildlänk: <br>
                <input type="text" name="image" placeholder="Enter owners name" >
            </label>
        </p>

        <p>
        <label>Ägare: <br>
            <input type="text" name="owner" placeholder="Enter owner" >
        </label>
        </p>

        <p>
            <input type="submit" name="doit" value="Create Object">
        </p>
    </fieldset>
</form>


<?php

include('../view/footer.php');