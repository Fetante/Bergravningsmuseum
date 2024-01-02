<?php

include('../config/config.php');

$title = "Om";

include('../view/header.php');

    $dsn = getDsnToDatabaseFile("bmo.sqlite");
    $db = connectToDatabase($dsn);
    $sql = "SELECT * FROM article WHERE category = 'about'";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetch();

    include('../view/crud/about_view.php');
    include('../view/footer.php');

    //echo "<pre>", print_r($res, true), "</pre>";
