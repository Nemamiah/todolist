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
  $date->sub(new DateInterval('P1D'));
  $currentDatetime = $date->getTimestamp();
}
//Inclure une boucle ?

foreach ($db_tasks as $db_task){
  $db_datetime = strtotime($db_task['date']);
  $db_date = db_date($db_datetime);
  $db_day = db_day($db_datetime);
  $db_time = strftime('%H:%M', $db_datetime);

  empty($db_task['place']) ? $db_place = "Aucun lieu" : $db_place  = "à ". $db_task['place'];
  $db_todo = $db_task['task'];
  empty($db_task['description']) ? $db_description = "Aucune description" : $db_description  = $db_task['description'];

  !empty($db_task['project']) ? $db_project = "Projet : " . $db_task['project'] : $db_project = "Aucun projet";
  !empty($db_task['category']) ? $db_category = "Catégorie : " . $db_task['category'] : $db_category = "Aucune catégorie" ;
  $db_checked = $db_task['checked'];
  $db_deleted = $db_task['deleted'];
  
  if (db_date($currentDatetime) == $db_date) {

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
            <div class=\"m1em flex flexE alignS gc2sTab flexETab\">
              <a href=\"#\"
                ><img
                  src=\"https://image.flaticon.com/icons/png/512/1250/1250180.png\"
                  class=\"wh25p mw75p mlr1\"
                  alt=\"Supprimer la tâche\"
                  title=\"Supprimer\"
                  onclick=\"deleteTask()\"
              /></a>
              <a href=\"#\"
                ><img
                  src=\"https://image.flaticon.com/icons/png/512/1250/1250185.png\"
                  class=\"wh25p mw75p mlr1\"
                  alt=\"Tâche traitée\"
                  title=\"Traité\"
                  onclick=\"doneTask()\"
              /></a>
            </div>
          </div>"
    ;
  }
}




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
      <a href="#" onclick="reloadAccueil()"
        ><img
          src="https://www.clipartmax.com/png/full/106-1064080_blue-check-mark-symbol.png"
          alt="Logo Mytotool"
          title="Mytotool"
          class="w50p ml2"
      /></a>

      <div class="flex flexE cgap10 alignC mlrTab">
        <div class="flex alignC shortWay displayTab">
          <a href="#">
            <img
              type="button"
              class="wh50p shortWayWH"
              src="https://cdn-icons-png.flaticon.com/512/1336/1336833.png"
              title="Accès rapides"
              alt="Accès rapides"
            />
          </a>
        </div>

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

    <main class="mlr2 grid gtc2">
      <aside class="menuAside bsd flex flexC ">
        <section class="w15 plr1">
          <div class="flex spaceB alignC static">
            <h2>Accès rapide</h2>
            <input
              class="wh25p ml1"
              onclick="shortWay()"
              type="image"
              title="Personnaliser les accès rapides"
              src="https://image.flaticon.com/icons/png/512/1250/1250194.png"
              alt="Personnaliser les accès rapides"
              value="Personnaliser"
            />
          </div>

          <fieldset class="flex bsdBorder bsd flexCol mb1 whbtn mr10p ml0">
            <legend>Ajout rapide</legend>
            <!-- <input
              class="mtb1 bsd bsdBorder"
              type="text"
              list="addFavList"
              placeholder="Ajouter..."
            /> -->

            <select id="addFavList" class="mtb1 bgWhite bsd bsdBorder">
              <option class="" title="ajouter" value="" selected disabled>
                Ajouter...
              </option>
              <option class="" value="Ajouter une tâche">
                Ajouter une tâche
              </option>
              <option class="" value="Ajouter un projet">
                Ajouter un projet
              </option>
              <option class="" value="Ajouter une catégorie">
                Ajouter une catégorie
              </option>
            </select>
          </fieldset>

          <fieldset class="flex bsdBorder bsd flexCol mb1 whbtn mr10p ml0">
            <legend class="">Afficher par date</legend>
            <!-- <input
              class="mtb1 bsd bsdBorder"
              type="text"
              list="printDate"
              placeholder="Afficher..."
            /> -->

            <select id="printDate" class="mtb1 bgWhite bsd bsdBorder">
              <option class="" value="Aujourd'hui">Aujourd'hui</option>
              <option class="" value="Demain">Demain</option>
              <option class="" value="Cette semaine">Cette semaine</option>
              <option class="" value="La semaine prochaine">
                La semaine prochaine
              </option>
              <option class="" value="Ce mois-ci">Ce mois-ci</option>
              <option class="" value="Afficher toutes les tâches">
                Afficher toutes les tâches
              </option>
            </select>
            
              <input id="calendar" class="mtb1 bsd bsdBorder" type="date" />
            
          </fieldset>

          <fieldset class="flex bsdBorder bsd flexCol mb1 whbtn mr10p ml0">
            <legend>Afficher par projet</legend>
            <input
              type="text"
              class="mtb1 bsd bsdBorder"
              list="printProjet"
              placeholder="Afficher..."
            />

            <datalist id="printProjet">
              <option class="" value="CESI">CESI</option>
              <option class="" value="Projet X">Projet X</option>
              <option class="" value="Devapps">Devapps</option>
              <option class="" value="Piscine 42">Piscine 42</option>
              <option class="" value="Afficher tous les projets">
                Afficher tous les projets
              </option>
            </datalist>
          </fieldset>

          <fieldset class="flex bsdBorder bsd flexCol mb1 whbtn mr10p ml0">
            <legend>Afficher par catégorie</legend>
            <input
              type="text"
              class="mtb1 bsd bsdBorder"
              list="printCategorie"
              placeholder="Afficher..."
            />

            <!-- <input type="color"> -->

            <datalist id="printCategorie">
              <option class="" value="Urgent">Urgent</option>
              <option class="" value="Marketing">Marketing</option>
              <option class="" value="Comptabilité">Comptabilité</option>
              <option class="" value="Prospection">Prospection</option>
              <option class="" value="Afficher toutes les catégories">
                Afficher toutes les catégories
              </option>
            </datalist>
          </fieldset>
        </section>
      </aside>

      <section class="bsd gc2 plr1 mlr1 scroller w75">
        <article class="flex spaceB alignC alignSTab gtr">
          <div>
            <h2 class=""><?= db_day($currentDatetime) . " " . db_date($currentDatetime) ?></h2>

            <h3 class=""><?= " " ?></h3>
          </div>
          <div class="flex flexE spaceB marginH2Tab">
            <a href="#"
              ><img
                type="button"
                class="wh50p ml1"
                onclick="leftButton()"
                src="https://image.flaticon.com/icons/png/512/1250/1250262.png"
                alt="Période prédécente"
                title="Période précédente"
            /></a>
            <a href="#"
              ><img
                type="button"
                class="wh50p ml1"
                onclick="rightButton()"
                src="https://image.flaticon.com/icons/png/512/1250/1250306.png"
                alt="Période suivante"
                title="Période suivante"
            /></a>
          </div>
        </article>

        <article class="flex flexCol">
          <?= $db_taskDisplay ?>

          <div>
            <p class="tac">Vous n'avez pas d'autre tâche pour aujourd'hui.</p>
          </div>
        </article>
      </section>
    </main>
    <footer class="flex flexC">
      <p class="tac bottom m0 ptb10"><?= $js_userID ?><br>
      Développé par Thibault BOUCHE<sup>&copy</sup><br> <em>Tous droits réservés</em></p>
    </footer>
    <script src="../home/main.js"></script>
    <script src="../home/home.js"></script>

  </body>
</html>
