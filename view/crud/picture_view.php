

<main class="main">
    <article class="article">       
        <div class="picture-container">
            <h2>Bild</h2>
            <div>
                <?php if ($id !== "1") : ?>
                <a class="pic-navigation" href="../public/picture.php?id=<?= $previousId ?>">Föregående bild</a>
                <?php endif; ?> 
                <?php if ($id !== "30") : ?>
                <a class="pic-navigation" href="../public/picture.php?id=<?= $nextId ?>">Nästa bild </a>
                <?php endif; ?>     
            </div>
            <img class="picture" src="img/550x550/<?= $res['image']; ?>" alt="">        
        </div>

    </article>
</main>
