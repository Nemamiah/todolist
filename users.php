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

$sql = "INSERT INTO users (id, name, nickname, mail, password) VALUES (?, ?, ?, ?, ?)";
$query = $db->prepare($sql);

$userID = (uniqid() . $_POST["email"] . $_POST["name"] . $_POST["nickname"]);
// $userPassword = "6d71adbce43d030d2f58460e0a8d1d20";
$userPassword = $_POST["password"] . "Bon chance pour trouver le mot de passe ! :) Bisou de Thibault en 2021." . $userID;
// $userMail = $_POST["email"];
// var_dump($db_users);
$userMail = "thibault.bouche@gmail.com";
$nosub = uniqid();

foreach($db_users as list($db_userID, $b, $c, $db_userMail, $db_userPassword)){
    echo "<br> <br> mail " . $userMail . " <br>";
    echo "dbmail " . $db_userMail . " <br>";
    // echo "saisie pwd" . $userPassword . " <br>";
    // echo "dbpwd " . $db_userPassword . " <br><br>";
    // echo "<br><br>Mail et mdp dans bdd<br>" . $db_userMail . "<br>";
    // echo $db_userPassword . "<br>";
    if (($db_userMail == $userMail) && ($db_userPassword == $userPassword)){
        echo ("connection ok mail dans la bdd et mdp ok " . $db_userID);
        header("Location:./home/index.php?id=$db_userID");

    } else if ($db_userMail == $userMail){
        var_dump($db_userMail);
        var_dump($userMail);
        echo("BRAVOOOOOOOOO");

    } else if (($db_userMail != $userMail) || ($db_userPassword != $userPassword)){
        $query->bindValue(1, md5(htmlspecialchars($nosub)));
        $query->bindValue(2, htmlspecialchars("n° " . $nosub));
        $query->bindValue(3, htmlspecialchars("n° " . $nosub));
        $query->bindValue(4, htmlspecialchars($nosub));
        $query->bindValue(5, md5(htmlspecialchars($userPassword)));
        header("Location:./connect/log/index.php?key=$userPassword&mail=$nosub");
        echo ("<br>inscription no sub ok");
        var_dump($db_userMail);
        var_dump($userMail) . "    ";
        var_dump($db_userPassword);
        // header("Location:../../connect/signin/index.php?k=mailouIDpasdansBDD");
    } else {
        echo ("t'es pommé");
    };
};

// user no sub
// if (!empty($_GET["q"])) {
//     $query->bindValue(1, md5(htmlspecialchars($_GET["q"])));
//     $query->bindValue(2, htmlspecialchars("n° " . $_GET["q"]));
//     $query->bindValue(3, htmlspecialchars("n° " . $_GET["q"]));
//     $query->bindValue(4, htmlspecialchars($_GET["q"]));
//     $query->bindValue(5, md5(htmlspecialchars($userPassword)));
//     header("Location:./connect/log/index.php?key=$userPassword&mail=$nosub");
// }
    // si mail exists : log ++ penser verif password
// } else if (
//     !empty($_GET["mail"]) &&
//     $db_mailExists
//     ){
//         echo ("Il y a un mail enregistré avec cette adresse. Programmer la connexion à l'index correspondant à l'ID ");
//     // si mail not exists : verif not empty
// }else if (
//     !empty($_POST["name"]) &&
//     !empty($_POST["nickname"]) &&
//     // mail doit être différent de ceux de la bdd
//     !empty($_POST["email"]) &&
//     !empty($_POST["password"]) &&
//     ($_POST["password"] == $_POST["password2"])   
//     ){


//         $query->bindValue(1, md5(htmlspecialchars($userID)));
//         $query->bindValue(2, htmlspecialchars($_POST["name"]));
//         $query->bindValue(3, htmlspecialchars($_POST["nickname"]));
//         $query->bindValue(4, htmlspecialchars($_POST["email"]));
//         $query->bindValue(5, md5(htmlspecialchars($userPassword)));
//     // log
// } else {
//     echo("error user exists plz retape mail ");
//     echo("mail saisi : ");
//     var_dump($_POST["email"]);
//     echo("mail db : ");
//     var_dump($db_userMail);
//     // var_dump($db_users);






if ($query->execute()) {
    echo("ok");
}else{
    echo "nop";
}

// $sql = "UPDATE `users` SET `name` = ? WHERE `users`.`id` = 1;"

    // header("Location:./index.php")
    // Penser à mettre un retour à la page de connexion si l'utilisateur n'est pas inscrit
?>