<?php

    try {

        $db = new PDO('mysql:host=localhost;dbname=mytotool;port=8889', 'root', 'root');

    } catch (\Throwable $error) {

        print_r($error);
        die();
        
    }