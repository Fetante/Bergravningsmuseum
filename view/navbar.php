<?php

$requestUri = $_SERVER["SCRIPT_NAME"];
$pageController = basename($requestUri);

$user = htmlentities($_SESSION["user"] ?? "");
$role = htmlentities($_SESSION["role"] ?? "");

?>
<nav id="hamnav">
    <label for="hamburger">&#9776;</label>
    <input type="checkbox" id="hamburger">
    <div id="hamitems">
        <ul>
            <li class="<?= $pageController === "home.php" ? "active" : "" ?>"><a href="home.php">Hem</a></li>
            <li class="<?= $pageController === "articles.php" ? "active" : "" ?>"><a href="articles.php">Artiklar</a></li>
            <li class="<?= $pageController === "objects.php" ? "active" : "" ?>"><a href="objects.php">Objekt</a></li>
            <li class="<?= $pageController === "about.php" ? "active" : "" ?>"><a href="about.php">Om</a></li>
            <li class="<?= $pageController === "pictures.php" ? "active" : "" ?>"><a href="pictures.php">Bilder</a></li>
            <li class="<?= $pageController === "search.php" ? "active" : "" ?>"><a href="search.php">Sök</a></li>

            <?php if (isset($_SESSION["role"])) : ?>           
                <li class="<?= $pageController === "logout_process.php" ? "active" : "" ?>"><a href="logout_process.php">Logout</a></li>

                <?php if ($_SESSION["role"] === "admin") : ?>
                    <li class="<?= $pageController === "admin.php" ? "active" : "" ?>"><a href="admin.php">Admin</a></li>
                <?php endif; ?>

            <?php else : ?>
                <li class="<?= $pageController === "login.php" ? "active" : "" ?>"><a href="login.php">Log in</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
