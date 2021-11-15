<?php
  try {

    $db = new PDO('mysql:host=localhost;dbname=mytotool;port=8889', 'root', 'root');

} catch (\Throwable $error) {

    print_r($error);
    die();
    
}

$userID = $_GET["id"];
$displayPeriod = $_GET["display"];
$currentDatetime = time();
$db_date = db_date($currentDatetime);
$db_day = db_day($currentDatetime);
$db_time = strftime('%H:%M', $currentDatetime);
$editTask = $_GET["task"];

$sql = "SELECT tasks.*, users.nickname FROM tasks 
JOIN users ON tasks.userID = users.id
WHERE tasks.userID LIKE '$userID' 
AND tasks.date";

$query = $db->prepare($sql);
$query->execute();

$db_tasks = $query->fetchAll(PDO::FETCH_ASSOC);

// foreach ($db_tasks as $db_task){
//   print_r($db_task['userID']);
//   print_r($db_task['project'] . "<br>");
// }
// die();
// setlocale(LC_TIME, 'fr_FR.utf8','fra'); 
// date_default_timezone_set("Europe/Paris");

$sql = "SELECT * FROM users WHERE id LIKE '$userID'";

$query = $db->prepare($sql);
$query->execute();

$db_user = $query->fetch(PDO::FETCH_ASSOC);

$db_nickname = $db_user['nickname'];

function db_date($db_dt){
  $day = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"); 
  $month = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"); 
  $date = explode('|', date( "w|d|n", $db_dt ));

  return $date[1] . ' ' . $month[$date[2]-1] . ' ' . $date[3] ;
}

function db_day($db_dt){
  $day = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"); 
  $month = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"); 
  $date = explode('|', date( "w|d|n", $db_dt ));

  return $day[$date[0]] ;
}

if ($displayPeriod == 'next') {
  $date = new DateTime();
  $date->add(new DateInterval('P1D'));
  $currentDatetime = $date->getTimestamp();
    
} else if ($displayPeriod == 'previous') {
  $date = new DateTime();
  $date->add(new DateInterval('P1D'));
  $currentDatetime = $date->getTimestamp();
}
//Inclure une boucle ?
$db_taskDisplay .= 
"<div class=\"grid gtc cgap10 bsdB\">
        <p class=\"\">" . $db_time . "</p>
        <p class=\"gc2sTab\">" .  $db_todo . "</p>
        <p class=\"tac tacMob gc2sTab gcr2\">" . $db_place . " <br /></p>
        <p class=\"gc2s gr\">
        " .  $db_description . "

            <br /><br />
            " .  $db_project . " <br />
            " .  $db_category . " <br /><br />
        </p>
        </div>"
;




$js_userID = '<span class="dnone" id="userID">' . $userID . '</span>';
?>

<!DOCTYPE html>
<html class="" lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/color.css" />
    <link rel="stylesheet" href="../css/typo.css" />
    <link rel="stylesheet" href="../css/query.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"/>
      

    <title>Mytotool : La todolist de <?= $db_nickname?></title>
  </head>

  <body class="">
    <header class="flex spaceB alignC mlr2 fixed headerFixed bgWhite top left">
      <a href="../home/index.php?id=<?= $userID ?>" onclick="reloadAccueil()"
        ><img
          src="https://www.clipartmax.com/png/full/106-1064080_blue-check-mark-symbol.png"
          alt="Logo Mytotool"
          title="Mytotool"
          class="w50p ml2"
      /></a>

      <div class="flex flexE cgap10 alignC mlrTab">

        <div class="flex alignC searchTab displayTab">
          <a href="#" onclick="searchBar()"
            ><img
              type="button"
              title="Recherche"
              class="wh50p mlr1"
              src="https://image.flaticon.com/icons/png/512/1250/1250312.png"
              alt="Recherche"
          /></a>
          <input
            class="whbtn pr35 bsd bsdBorder searchText"
            autocomplete="off"
            placeholder="Recherche"
            value=""
          />
        </div>

        <nav class="navMob mlr2">
          <a class="flex" href="../connect/index.php">
            <img
              src="https://image.flaticon.com/icons/png/512/1250/1250272.png"
              alt="Menu Mobile"
              class="wh50p mlr1 p10p"
              title="Menu"
              type="image"
            />
          </a>
        </nav>

        <nav class="displayTab">
          <a href="#" onclick="addTask()"
            ><img
              type="button"
              class="wh50p mlr1"
              title="Ajouter une tâche"
              src="https://image.flaticon.com/icons/png/512/1250/1250151.png"
              alt="Ajouter une tâche"
          /></a>
          <a href="#" onclick="openNotif()"
            ><img
              type="button"
              class="wh50p mlr1"
              src="https://image.flaticon.com/icons/png/512/1250/1250165.png"
              alt="Notifications"
              title="Notifications"
          /></a>
          <a href="#" onclick="openProfil()"
            ><img
              type="button"
              class="wh50p mlr1"
              src="https://image.flaticon.com/icons/png/512/1250/1250296.png"
              title="Profil"
              alt="Profil"
          /></a>
          <a href="../connect/index.php" onclick="deconnect()"
            ><img
              type="button"
              class="wh50p"
              src="https://image.flaticon.com/icons/png/512/1250/1250257.png"
              title="Déconnexion "
              alt="Déconnexion "
          /></a>
        </nav>
      </div>
    </header>

    <h1 class="tac mlr2 mtPage">Bonjour <?= $db_nickname?>.</h1>

    <main class="mlr2 ">

      <section class="bsd gc2 mlr1 scroller w75">
        <article class="mtb1 plr5">
            <h2 class="">Ajoutez une tâche.</h2>
                <form  action="./traitement.php?action=add" method="post">
                    <div class="grid gtcR cgap20">
                        <div class="flex flexCol">
                            <p>Titre de la tâche</p>
                            <input class="mtb5 ptb5 plr15" type="text" placeholder="Titre de votre tâche" name="title">
                            <p>Date et heure</p>
                            <input class="mtb5 ptb5 plr15" type="date" placeholder="" name="date">
                            <input class="mtb5 ptb5 plr15" type="time" placeholder="" name="time">
                        </div>
                        <div class="flex flexCol">
                            <p>Informations complémentaires</p>
                            <input class="mtb5 ptb5 plr15" type="text" placeholder="Lieu" name="place">
                            <input class="mtb5 ptb5 plr15" type="text" placeholder="Projet associé" name="project">
                            <input class="mtb5 ptb5 plr15" type="text" placeholder="Catégorie associée" name="category">
                        </div>
                        <div class="flex flexCol">
                            <p>Description de la tâche</p>
                            <input class="mtb5 ptb5 plr15 h100 mh150" type="text" placeholder="Description de la tâche" name="content">
                        </div>
                    </div>
                    <div class="tac">
                        <input class="mtb2 ptb10 plr15" type="submit">
                    </div>
                                     
                </form>
        </article>
      </section>
    </main>
    <footer class="flex flexC">
      <p class="tac bottom m0 ptb10"><?= $js_userID ?><br>
      Développé par Thibault BOUCHE<sup>&copy</sup><br> <em>Tous droits réservés</em></p>
    </footer>
    <script src="../home/main.js"></script>

  </body>
</html>
