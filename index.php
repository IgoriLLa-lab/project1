<?php

use public_html\object\Article;

$page = $_GET['page'] ?? 1;

// подключаем файлы, необходимые для подключения к базе данных и файлы с объектами
include_once 'config/database.php';
include_once 'object/CreateSimpleArticle.php';
include_once 'object/Article.php';

// получили соединение с БД
$database = new Database();
$db = $database->getConnect();

// создадаем экземпляр класса Article
$article = new Article($db);

$stmt = $article->readAll();
$num = $stmt->rowCount();

$page_title = "Сайт статей";

require_once "header.php";
?>

<div class='right-button-margin'>
    <a href='create-article.php' class='btn btn-default pull-right'>Создать свою статью</a>
</div>

<?php
if ($num > 0) {
    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Автор</th>";
    echo "<th>Статья</th>";
    echo "<th>Тема статьи</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$article}</td>";
        echo "<td>{$category}</td>";

        echo "</tr>";

    }

    echo "</table>";

}else {
    echo "<div class='alert alert-info'>Статей пока нет!Вы можете стать первым!</div>";
}
?>

<?php
require_once "footer.php";
?>
