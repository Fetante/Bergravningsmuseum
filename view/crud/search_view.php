
<?php

if ($res) : ?>
    <div class="search-result">
        <h2>Objekt</h2>
        <div class="search-result-objects">
            
            <?php foreach ($res as $object) : ?>
                <a class = "obj" href="object.php?id=<?= $object['id']; ?>">
                    <img src="img/250x250/<?= $object['image']; ?>" alt="<?= $object['title'] ?>">
                    <h4><?= $object['title'] ?></h4>
                </a>
            <?php endforeach; ?>

        </div>
<?php endif; ?>

        <?php if ($res2) : ?>  
        <h2>Artiklar</h2>
        <div class="search-result-articles">
        
            <?php foreach ($res2 as $article) : ?>
                <a class = "art" href="article.php?id=<?= $article['id']; ?>">        
                    <h4><?= $article['title'] ?></h4>            
                </a>
            <?php endforeach; ?>

        </div>
    </div>

        <?php endif; ?>