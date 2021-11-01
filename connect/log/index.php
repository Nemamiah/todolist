<?= ("index log <br>------------------<br><br> ");?>

<!-- Pour connection sans inscription : -->
<?php


try {

    $db = new PDO('mysql:host=localhost;dbname=mytotool;port=8889', 'root', 'root');

} catch (\Throwable $error) {

    print_r($error);
    die();
    
}

$sql = "SELECT * FROM users";
$query = $db->prepare($sql);
$query->execute();

$db_users = $query->fetchAll();


$userPassword = md5($_GET["key"]);
$userMail = $_GET["mail"];


echo "log à usage unique :<br>" . $userMail . "<br>";
echo $userPassword . "<br>";

foreach($db_users as list($a, $b, $c, $db_userMail, $db_userPassword)){
    echo "<br><br>Mail et mdp dans bdd<br>" . $db_userMail . "<br>";
    echo $db_userPassword . "<br>";
    // if ($db_userMail == $userMail){
    //     $db_mailExists;
    // };
};

// SI mail dans la base de données
//         vérifier mdp == mdp bdd
//             OK renvoyer vers la todolist de son ID        
//             SINON mdp oublié ?
//                 OK saisir nouveau mdp 
//                 SINON retour connect index
//     SINON mail pas dans la bdd
//         HEADER LOCATION SIGNIN
        
        
        
       
// <!-- JS à remettre en php :

//   } else if (userMail == db_userMail) {
//     messageMail = "";
//     getID("messageMail").innerHTML = messageMail;

//     messageBonjour =
//       "<h2 class='fontSize16p'>Heureux de vous revoir,<br>" +
//       db_userNickname +
//       "</h2>";
//     getID("messageBonjour").innerHTML = messageBonjour;

//     displayHSignin.style.display = "block";
//     displayHLogin.style.display = "none";
//     displaySeparator.style.display = "none";
//     displayLogin.value = "Se connecter";
//   } else {
//     messageMail = "";
//     getID("messageMail").innerHTML = messageMail;

//     messageBonjour = "<h2 class='fontSize16p'>Pas encore inscrit ?</h2>";
//     getID("messageBonjour").innerHTML = messageBonjour;

//     displayHSignin.style.display = "none";
//     displaySeparator.style.display = "none";
//     displayHLogin.style.display = "block";
//     displayLogin.value = "S'inscrire";
//   }
// } -->
        
?>