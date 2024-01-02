<?php

include('../config/config.php');

$title = "Administratörssida";
include('../view/header.php');

?>

<?= getFlashMessage() ?>


<main class="main">
    <article class="article">
        <div class="admin-home">
            <h1>INSIDAN</h1>
            
            
            <?php if (isset($_SESSION["role"])) : ?>         
                <p>Välkommen till insidan av BMO! Här kan du som har administratörsrättigheter skapa nya objekt och artiklar. Vill du ändra eller ta bort befintligt innehåll så får du gå du in på valfri artikel/objekt.</p>

                <p>Du är inloggad som <?=$_SESSION['role'] ?></p>

                <?php if ($_SESSION["role"] === "admin") : ?>
                    <a href="create_object.php">Skapa nytt objekt</a>
                    <a href="create_article.php">Skapa ny artikel</a>
                <?php endif; ?>

            <?php else : ?>
                <p>Du är ej inloggad. Vänligen logga in om du vill nå materialet på insidan!</p>
            <?php endif; ?>
            
        </div>
    </article>
</main>




<?php

include('../view/footer.php');
