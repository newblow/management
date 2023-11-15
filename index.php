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

    $resultats = $db_connect->query("SELECT * FROM `employe` WHERE salaire >2500 OR commission >3 ORDER BY salaire, commission;");
    foreach($resultats as $employe) {
        echo $employe['nom'] .' '. $employe['prenom'] .' : '. $employe['salaire'] .' : '. $employe['commission'] .' '. '<br />' ;
    }
    ?>

    <h1>Exercice 4</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT * FROM employe ORDER BY salaire DESC LIMIT 3");
    foreach($resultats as $employe) {
        echo $employe['nom'] .' '. $employe['prenom'] .' : '. $employe['salaire'] .' : '. '<br />' ;
    }
    ?>

    <h1>Exercice 5</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT * FROM employe WHERE salaire = (SELECT max(salaire) FROM employe)
    ");
    foreach($resultats as $employe) {
        echo $employe['nom'] .' '. $employe['prenom'] .' : '. $employe['salaire'] .' : '. '<br />' ;
    }
    ?>

    <h1>Exercice 6</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.id_employe, e.nom, e.prenom, s.nom AS nom_service, s.ville, e.date_entree FROM employe e 
	JOIN service s ON e.service_id = s.id_service WHERE s.ville = 'Dijon'");
    foreach($resultats as $employe) {
        echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] . ' ' . $employe['date_entree'] . ' : ' . $employe['nom_service'] . ' '. $employe['ville'] . '<br>' ;
    }
    ?>

    <h1>Exercice 7</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.id_employe , e.nom, e.prenom, e.date_entree, e.salaire, s.nom AS nom_service, s.ville FROM employe e JOIN service s ON e.service_id = s.id_service 	ORDER BY e.salaire DESC LIMIT 5");
    foreach($resultats as $employe) {
        echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] . ' ' . $employe['date_entree'] . ' : ' . $employe['nom_service'] . ' '. $employe['ville'] . ' ' . $employe['salaire'] .'<br>' ;
    }
    ?>

    <h1>Exercice 8</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.nom, e.prenom, e.salaire, s.nom AS nom_service, e.date_entree, s.ville FROM employe e JOIN service s ON e.service_id = s.id_service WHERE s.ville IN('Paris', 'Lyon', 'Dijon') AND e.date_entree < '2022-01-01'");
    foreach($resultats as $employe) {
        echo $employe['nom'] .' '. $employe['prenom'] . ' ' . $employe['date_entree'] . ' : ' . $employe['nom_service'] . ' ' . $employe['ville']  .'<br>' ;
    }
    ?>

    <h1>Exercice 9</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.id_employe, e.nom, e.prenom, e.salaire, s.nom AS nom_service, e.date_entree, s.ville FROM employe e JOIN service s ON e.service_id = s.id_service WHERE s.ville IN('Paris') AND e.salaire BETWEEN 1500 AND 2500");
    foreach($resultats as $employe) {
        echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] .' : '. $employe['salaire'] .' '. $employe['date_entree'] . ' : ' . $employe['nom_service'] . ' ' . $employe['ville']  .'<br>' ;
    }
    ?>

    <h1>Exercice 10</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT COUNT(*)  as total_employes FROM employe");
    $employe = $resultats->fetch();
    echo  $employe['total_employes']  .'<br>' ;
    
    ?>

    <h1>Exercice 11</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT SUM(salaire) AS total_salaire FROM employe;
    ");
    $employe = $resultats->fetch();
    echo  $employe['total_salaire']  .'<br>' ;
    ?>

    <h1>Exercice 12</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT id_employe, nom, prenom, salaire FROM employe WHERE salaire > (SELECT AVG(salaire) FROM employe);");
    foreach($resultats as $employe) {
    echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] .' : '. $employe['salaire']  .'<br>' ;
    }
    ?>

    <h1>Exercice 13</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.id_employe, e.nom, e.prenom, s.nom AS nom_service FROM employe e JOIN service s ON e.service_id = s.id_service WHERE id_service = (SELECT id_service FROM service WHERE nom = 'Accounting')");
    foreach($resultats as $employe) {
    echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] .' : '. $employe['nom_service']  .'<br>' ;
    }
    ?>

    <h1>Exercice 14</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.id_employe, e.nom, e.prenom, s.nom AS nom_service, s.ville FROM employe e JOIN service s ON e.service_id = s.id_service WHERE id_service IN (SELECT id_service FROM service WHERE ville = 'Lyon');");
    foreach($resultats as $employe) {
    echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] .' : '. $employe['nom_service'] . ' ' . $employe['ville']   .'<br>' ;
    }
    ?>

    <h1>Exercice 15</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT id_employe, nom, prenom, salaire FROM employe WHERE salaire = (SELECT MAX(salaire) FROM employe);");
    foreach($resultats as $employe) {
    echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] .' ' . $employe['salaire']   .'<br>' ;
    }
    ?>

    <h1>Exercice 16</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT id_employe, nom, fonction FROM employe WHERE fonction Like 'A%'");
    foreach($resultats as $employe) {
    echo $employe['id_employe'] .' '. $employe['nom'] .' : '. $employe['fonction']  .'<br>' ;
    }
    ?>

    <h1>Exercice 17</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.salaire, s.nom As nom_service FROM employe e JOIN service s ON e.service_id = s.id_service WHERE salaire > (SELECT AVG(salaire) FROM employe);");
    foreach($resultats as $employe) {
    echo $employe['salaire'] .' '. $employe['nom_service'] .'<br>' ;
    }
    ?>

    <h1>Exercice 18</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT s.id_service, s.nom, e.id_employe, e.prenom FROM service s JOIN employe e ON s.id_service = e.service_id WHERE id_service >= 5");
    foreach($resultats as $employe) {
    echo $employe['id_service'] .' '. $employe['nom'] .' '. $employe['id_employe'] .' '. $employe['prenom']  .'<br>' ;
    }
    ?>

    <h1>Exercice 19</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.id_employe, e.nom, e.prenom, s.nom AS nom_service FROM employe e JOIN service s ON e.service_id = s.id_service;");
    foreach($resultats as $employe) {
    echo $employe['id_employe'] .' '. $employe['nom'] .' '. $employe['prenom'] .' '. $employe['nom_service']  .'<br>' ;
    }
    ?>

    <h1>Exercice 20</h1>
    <?php
    require_once('./assets/php/middleware/connect.php');

    $resultats = $db_connect->query("SELECT e.nom, e.prenom, s.nom AS nom_service, s.ville FROM employe e JOIN service s ON e.service_id = s.id_service WHERE s.ville = 'Lyon'");
    foreach($resultats as $employe) {
    echo $employe['ville'] .' '. $employe['nom'] .' '. $employe['prenom'] .' '. $employe['nom_service']  .'<br>' ;
    }
    ?>
</body>
</html>
