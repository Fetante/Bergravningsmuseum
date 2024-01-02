<?php

include('../config/config.php');

$title = "Search";

include('../view/header.php');



// Hämta söktermen från queryn, om den inte finns => null
$search = $_GET["query"] ?? null;
$res = $res ?? null;
$res2 = $res2 ?? null;

if ($search) {
    $dsn = getDsnToDatabaseFile("bmo.sqlite");
    $db = connectToDatabase($dsn);
    // Sök bland objekt
    $sql = <<<EOD
    SELECT        
        *
    FROM object
    WHERE
        title LIKE ?
        OR category LIKE ?
        OR text LIKE ?
        ;
    EOD;

    // Sök bland artiklar
    $sql2 = <<<EOD
    SELECT        
        *
    FROM article
    WHERE
        (title LIKE ? 
        OR content LIKE ?)        
        AND category != "about"
        ;
    EOD;

    $searchTerm = "%$search%";

    $stmt = $db->prepare($sql);
    $stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
    $res = $stmt->fetchAll();

    $stmt2 = $db->prepare($sql2);
    $stmt2->execute([$searchTerm, $searchTerm]);
    $res2 = $stmt2->fetchAll();
}

?>

<main class="main">

    <article class="article">
        <h2>Sök</h2>
        <div class="search-wrapper">
            <?php

            include('../view/crud/search_form.php');

            if ($res || $res2) {
                include('../view/crud/search_view.php');
            }

            ?>
        </div>
    </article>

</main>


<?php

include('../view/footer.php');
