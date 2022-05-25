<?php

try {
    $my_sql = new PDO("mysql:host=localhost; dbname=php_db", 'root', 'root');

    $query = "INSERT INTO articles VALUES (NULL, :articles)";

    $msg = $my_sql->prepare($query);

    $msg->execute(['articles' => $_POST["articles"]]);
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}