

<main class="main">
    <article class="article">
        <h1><?=$res['category'] ?></h1>
        <div class="object-container">            
            
            <h3><?=$res['title']?></h3>  
            <img src="img/550x550/<?= $res['image']; ?>" alt="">                           
            <p><?= $res['text'] ?></p>
            <p>Ägare: <?= $res['owner'] ?></p>

            <div>
                <?php

                if ($id !== "1") : ?>
                <a href="../public/object.php?id=<?= $previousId ?>">Föregående objekt</a>
                <?php endif; ?>                 
               
                <?php if ($count > 0) : ?>
                    <a href="../public/object.php?id=<?= $nextId ?>">Nästa objekt</a>
                <?php endif; ?>     
            </div>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") :?>
                <div class="remove-item">
                    <a href="update_object.php?id=<?= $id ?>">Uppdatera objektet</a>
                    <a href="delete_object.php?id=<?= $id ?>">Ta bort objektet</a>
                </div>
            <?php endif; ?>

        </div>

    </article>
</main>
