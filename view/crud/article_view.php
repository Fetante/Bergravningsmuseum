<div class="two-col-layout">
    
    <main class="main">
        <article class="article">
        <h1><?=$res['title']?></h1>
            <?php

            if ($id) :?>                
                    <?php if ($res['category'] === "article" || $res['category'] === "maggy") {
                        ?>
                            <?=$res['content']?>
                            <p class="author"><?=$res['author']?></p>

                    <?php }
                    ?>        

           
            <?php endif; ?>
            
            
            
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") :?>
                    <a href="update_article.php?id=<?= $id ?>">Uppdatera artikeln</a>
                    <a href="delete_article.php?id=<?= $id ?>">Ta bort artikeln</a>
                <?php endif; ?>

            
        </article>
    </main>

    <aside class="aside">
            <?php
                include("article_nav.php");
            ?>
    </aside>
</div>