<?php

include('../config/config.php');

$title = "Om";

include('../view/header.php');

?>

<main class="main">
    <article class="article">


        <h1>Dokumentation</h1>

        <p>Kodstrukturen följer direkt ur det vi lärt oss från tidigare kursmoment. Jag har sidokontroller för varje sida med tillhörande vyer som ligger samlat under view mappen. Sidokontrollerna hanterar logiken och vyerna ansvarar för layouten. På så sätt separeras ansvaret och strukturen blir tydlig.</p>

        <p>I fallen med objekt och artiklar har jag valt att använda mig av två olika typer av sidokontrollers. </p>

        <p>Sidokontrollerna articles.php samt objects.php ansvarar för att hämta samtliga objekt/artiklar från databasen. Informationen formateras och skrivs sedan ut i vyerna till bägge dessa. När användaren klickar på enskilda objekt/artiklar så skickas man vidare till sidokontrollerna article.php eller object.php. Dessa hämtar i sin tur det enskilda objektet/artikeln ur databasen. Vyerna inkluderas i filerna och informationen formateras och relevant data skriv ut.</p>

        <p>För att få tag på rätt objekt/artikel har jag använt mig av querysträngen. När man klickar på ett valt objekt så skickar man med en querysträng som fångas upp med superglobalen _GET. Samma objekt man klickade på har ett id som är unikt i databasen vilket jag tyckte var en smart lösning vid sql frågan. </p>

        <p>Jag har flera sidokontroller enbart för att hantera logiken för en administratör. En sida med formulär, (tex inloggning eller skapandet av nya objetk/artiklar) samt en processing-sida där POST formuläret hanteras.</p>

        <p>För att åstadkomma en responsiv layout har jag arbetat mobiel first och har använt mig av olika passande brytpunkter för mina media-queries i de olika CSS-filer.</p> 

        <p>I navbaren har till exempel en brytpunkt vid 770 pixlar(Ipad mini) där menyn byts ut till en hamburgarmeny. Hamburgarn är dold vid större storlekar och man kan enkelt navigera sig fram till önskade sidor på mindre skärmar. Överlag tycker jag att varje sida flyter på bra i alla storlekar och det är först när man når skrämar under 200 pixlar som det blir svårt att få ett bra helhetsintryck.            
        </p>

    </article>
</main>
<?php

include('../view/footer.php');
