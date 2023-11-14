<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management project</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script defer src="./assets/js/main.js"></script>
</head>
<body>
    
    <h1>Let's time to play with SQL !</h1>

    <h1>Exercice 1</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $query = $db_connect->query("SELECT * FROM employe WHERE salaire > 2000 ORDER BY salaire DESC");

    foreach($query as $employe) {
        echo $employe['nom'] . ' ' . $employe['prenom'] . ' : ' . $employe['salaire'] . '' . '<br />';
    }
    ?>

    <h1>Exercice 2</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $a = $db_connect->query("SELECT date_entree, nom, prenom FROM employe WHERE YEAR (date_entree) = 2021");
    foreach($a as $ab) {
        echo $ab['nom'] . ' ' . $ab['prenom'] . ' : ' . $ab['date_entree'] . '' . '<br />' ;
    }
    ?>

    <h1>Exercice 3</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $b = $db_connect->query("SELECT * FROM employe WHERE salaire >2500 OR commission >3 ORDER BY salaire, commission;");
    foreach($b as $abc) {
        echo $abc['nom'] .'' . $abc['prenom'] .' ' . ' : '  . '<br />' ;
    }
    ?>


</body>
</html>
