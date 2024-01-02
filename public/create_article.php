<?php

include('../config/config.php');
$title = "Ny artikel";

include('../view/header.php');

?>

<h1>Skapa en ny artikel</h1>

<?= getFlashMessage() ?>

<form method="post" action="create_article_process.php">
    <fieldset>
        <legend>Skapa artikel</legend>

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
            <label>Innehåll: <br>
            <textarea name="content" placeholder="Enter new content"></textarea>
            </label>
        </p>

        <p>
        <label>Author: <br>
            <input type="text" name="author" placeholder="Enter author name" >
        </label>
        </p>

        <p>
        <label>Pubdate: <br>
            <input type="date" name="pubdate" placeholder="Enter publication date" value="<?= date('Y-m-d') ?>" required >
        </label>
        </p>

        <p>
            <input type="submit" name="login" value="Create article">
        </p>
    </fieldset>
</form>


<?php

include('../view/footer.php');