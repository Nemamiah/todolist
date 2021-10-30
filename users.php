<?php

try {

    $db = new PDO('mysql:host=localhost;dbname=mytotool;port=8889', 'root', 'root');

} catch (\Throwable $error) {

    print_r($error);
    die();
    
}


$sql = "INSERT INTO users (id, name, nickname, mail, password) VALUES (?, ?, ?, ?, ?)";
$query = $db->prepare($sql);

$userID = (uniqid() . $_POST["email"] . $_POST["name"] . $_POST["nickname"]);
$userPassword = md5($_POST["password"] . "Bon chance pour trouver le mot de passe ! :) Bisou de Thibault en 2021." . $userID);

$query->bindValue(1, md5(htmlspecialchars($userID)));
$query->bindValue(2, htmlspecialchars($_POST["name"]));
$query->bindValue(3, htmlspecialchars($_POST["nickname"]));
$query->bindValue(4, htmlspecialchars($_POST["email"]));
$query->bindValue(5, md5(htmlspecialchars($userPassword)));

// $sql = "UPDATE `users` SET `name` = ? WHERE `users`.`id` = 1;"

// header("Location:./index.html")
    // Penser à mettre un retour à la page de connexion si l'utilisateur n'est pas inscrit
?>