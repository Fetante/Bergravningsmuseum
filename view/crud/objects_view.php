

<main class="main">
    <article class="article">

        <h1>Alla Objekt</h1>
        <div class="objects">
            <?php

            foreach ($res as $row) : ?>
                <div class="objects-object">
                    <a href="../public/object.php?id=<?= $row['id'] ?>">
                        <img src="img/250x250/<?= $row['image'] ?>" alt="">
                    </a>
                    <p><?=$row['title']?></p>                   
                </div>
                
            <?php endforeach ?>

        </div>

        <a href="?page=1">1</a>
        <a href="?page=2">2</a>
        <a href="?page=3">3</a>
        <a href="?page=4">4</a>
        <a href="?page=5">5</a>
        <a href="?page=6">6</a>
        <a href="?page=7">7</a>
        <a href="?page=8">8</a>

</article>
</main>