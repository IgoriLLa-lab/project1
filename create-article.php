<?php

use public_html\object\Article;

include_once 'config/DataBase.php';
include_once 'object/CreateDifferentEntities.php';
include_once 'object/ReadDifferentEntities.php';
include_once 'object/Article.php';


$database = new Database();
$db = $database->getConnect();

$article = new Article($db);

$page_title = "Сайт для написания статей на любые темы";

require_once "templates/header.php";
?>

<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

<div class='right-button-margin'>
    <a href='index.php' class='btn btn-default pull-right'>Просмотр всех статей</a>
</div>

<!--код для отправки данных из формы в БД-->
<?php
if ($_POST) {
    //устанвливаем свойства статьи
    $article->name = $_POST['name'];
    $article->article = $_POST['article'];
    $article->category = $_POST['category'];

    if ($article->create()) {
        echo "<div class='alert alert-success'>Ваша статья отправлена на проверку модератору!</div>";
    } else {
        echo "<div class='alert alert-danger'>Не могу сохранить Вашу статью!:(</div>";
    }
}
?>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Автор статьи</td>
        <td><input type='text' name='name' class='form-control'/></td>
    </tr>

    <tr>
        <td>Тема статьи</td>
        <td><input type='text' name='category' class='form-control1'/></td>
    </tr>

    <tr>
        <td>Cтатья</td>
        <td><textarea name='article' class='form-control'></textarea></td>
    </tr>

    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-primary">Создать</button>
        </td>
    </tr>
</table>

<script>
    $(document).ready(function () {
        $('button.btn-primary').one('click', function () {
            const formName = $('input.form-control').val();
            const formTextArea = $('textarea.form-control').val();
            const formTextCategory = $('input.form-control1').val();

            $.ajax({
                method: "POST",
                data: {name: formName, category: formTextCategory, article: formTextArea}
            })
                .done(function () {
                    alert("Статья сохранена");
                });

            $('input.form-control').val('');
            $('textarea.form-control').val('');
            $('input.form-control1').val('');
        });
    });
</script>


<?php
require_once "templates/footer.php";
?>
