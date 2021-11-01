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
$userPassword = md5($_POST["password"] . "Bon chance pour trouver le mot de passe ! :) Bisou de Thibault en 2021." . $userID);
$userMail = $_GET["mail"];
// var_dump($db_users);

$mailTest = ($_GET["q"]);

foreach($db_users as list($a, $b, $c, $db_userMail, $db_userPassword)){
    if ($db_userMail == $userMail){
        $db_mailExists = true;
    };
};

// user no sub
if ($_GET["q"] != "") {
    $query->bindValue(1, md5(htmlspecialchars($_GET["q"])));
    $query->bindValue(2, htmlspecialchars("n° " . $_GET["q"]));
    $query->bindValue(3, htmlspecialchars("n° " . $_GET["q"]));
    $query->bindValue(4, htmlspecialchars($_GET["q"]));
    $query->bindValue(5, md5(htmlspecialchars($userPassword)));
    header("Location:./connect/log/index.php?key=$userPassword&mail=$mailTest");

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

}




if ($query->execute()) {
    echo("ok");
}else{
    echo "nop";
}

// $sql = "UPDATE `users` SET `name` = ? WHERE `users`.`id` = 1;"

    // header("Location:./index.html")
    // Penser à mettre un retour à la page de connexion si l'utilisateur n'est pas inscrit
?>