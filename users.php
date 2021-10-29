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

$query->bindValue(1, md5(htmlspecialchars($userID)));
$query->bindValue(2, $_POST["name"]);
$query->bindValue(3, $_POST["nickname"]);
$query->bindValue(4, $_POST["email"]);
$query->bindValue(5, $_POST["password"]);

var_dump($query);
var_dump($_POST);


if ($query->execute()) {
    echo("ok");
}else{
    echo "nop";
}

// $sql = "UPDATE `users` SET `name` = ? WHERE `users`.`id` = 1;"

    // header("Location:./index.html")
    // Penser à mettre un retour à la page de connexion si l'utilisateur n'est pas inscrit
?>