
<div class="two-col-layout">
    
    <main class="main">
        <article class="article">
        <h1>Artiklar</h1>

        <?php

        foreach ($allResults as $row) : ?> 
            <h2 class="article-h2"><?=$row['title']?></h2>
                    <?php
                        // Extrahera den första meningen från innehållet
                        $content = $row['content'];
                        $first_sentence = substr($content, 0, strpos($content, '.'));
                    ?>
                <p><?= $first_sentence ?>.</p>
                <a class="articles-a" href="article.php?id=<?= $row['id'] ?>">Läs mer <i class="fa-regular fa-arrow-up-right"></i></a>
        <?php endforeach ?>
       
        </article>
    </main>

    <aside class="aside"> 
        <?php
            include("article_nav.php");
        ?>

    </aside>

</div>
<!-- <table>
    <tr>
        <th>Id</th>        
        <th>Kategori</th>
        <th>Titel</th>
        <th>Innehåll</th>
        <th>Ägare</th>
        <th>Publiseringsdatum</th>
    </tr>

    <?php

    foreach ($allResults as $row) : ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['category'] ?></a></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['content'] ?></td>
        <td><?= $row['author'] ?></td>
        <td><?= $row['pubdate'] ?></td>     
    </tr>
    <?php endforeach ?>    
    

</table> -->




