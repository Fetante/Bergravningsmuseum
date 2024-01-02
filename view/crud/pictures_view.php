<main class="main">
    <article class="article">

        <h1>Galleri</h1>
        <div class="gallery-grid">
            <?php

            foreach ($res as $row) : ?>
                <div class="gallery-object">
                    <a href="../public/picture.php?id=<?= $row['id'] ?>">
                        <img src="img/250x250/<?= $row['image'] ?>" alt="">
                    </a>                    
                </div>                
            <?php endforeach ?>
        </div>

        <a href="?page=1">1</a>
        <a href="?page=2">2</a>
        <a href="?page=3">3</a>
        <a href="?page=4">4</a>
        <a href="?page=5">5</a>

</article>
</main>