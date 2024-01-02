<?php

    //Fetch all articles for the sidenavigation links
    $sql = <<<EOD
    SELECT
        rowid,
        *
    FROM Article
    ;
    EOD;

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $allResults = $stmt->fetchAll();
?>

<ul>
    <li><a class="block" href="articles.php">Alla artiklar</a></li>    
    <?php foreach ($allResults as $article) :?>
        <?php
        if ($article['category'] !== "about") {
            ?>
                
                <li><a class="block" href="article.php?id=<?= $article['id'] ?>"><?= $article["title"] ?></a></li>

        <?php }

        ?>        
    <?php endforeach; ?>


    <?php if (isset($_SESSION["role"])) : ?>     
        <?php if ($_SESSION["role"] === "admin") : ?>
            <li><a class="block" href="create_article.php">Skapa ny artikel</a></li>   
        <?php endif; ?>
    <?php endif; ?>

</ul>
