## Простой PHP проект - Домашнее заданее № 4:

- Перенесена вся логика из предыдущих заданий в классы, а именно: создан класс Article (статья), данная сущность содержит: Id, имя автора, статью, категорию статьи и дату создания.
- Класс Article содержит конструктор, метод create который создан через Интерфейс CreateSempleArticle, который будет интерфейсом для статей, данный метод создает статьи метод который выводит все статьи readAll.
- Создан класс для подлкючения к базе данных, находящийся по адресу public_html\config\DataBase.php, класс содержит основные настройки и метод getConnect.
- Статьи харнятся в базе данных MySQL 8.0, cтруктура таблицы "articles" подобна классу Article, Передача данных с front на back (база данных) производится посредством ajax-запроса.
- Подключена библиотека jquery 3.6.0.
- Подключена библиотека Bootstrap JavaScript.
- Подключена библиотека BootboxJS.
- Файл index.html содержит все статьи которые выводятся из базы данных и кнопку для создания своей статьи.
- Файл create-article.php содержит форму для написания своей статьи.
- созданы файлы макетов html формы наших страницы, для уменьшения кода, это файлы header  и footer - соотвесвтенно верх и низ нашей страницы. 


# Домашнее задание 4:
#### 1. Перенести всю логику из предыдущих заданий в классы.
#### 2. Написать сущности (например Статья - это сущность) по которой можно работать как с объектом.
#### 3. Добавить минимум 1 абстрактный класс и 1 интерфейс.
#### 4. Обращение к БД вынести в отдельный класс для работы с БД.






