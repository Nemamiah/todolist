<?php

try {

    $db = new PDO('mysql:host=localhost;dbname=mytotool;port=8889', 'root', 'root');

} catch (\Throwable $error) {

    print_r($error);
    die();
    
}


$sql = "INSERT INTO `users` (`id`, `name`, ``nickname`, `mail`, `password`) VALUES (?, ?, ?, ?, ?)";
$query = $db->prepare($sql);
$query->bindValue(1, "jgvjhgvhgvhgvj", PDO::PARAM_STR);
$query->bindValue(2, $_POST["name"], PDO::PARAM_STR);
$query->bindValue(3, $_POST["nickname"], PDO::PARAM_STR);
$query->bindValue(4, $_POST["mail"], PDO::PARAM_STR);
$query->bindValue(4, $_POST["password"], PDO::PARAM_STR);
if ($query->execute()) {
    "ok";
}

// $sql = "UPDATE `users` SET `name` = ? WHERE `users`.`id` = 1;"

    // header("Location:./index.html")
    // Penser à mettre un retour à la page de connexion si l'utilisateur n'est pas inscrit
?>