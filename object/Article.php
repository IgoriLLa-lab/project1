<?php

namespace public_html\object;

class Article implements CreateSimpleArticle
{
    private $conn;
    private string $table_name = "articles";

    // свойства объекта
    public int $id;
    public String $name;
    public String $article;
    public String $category;
    public $timestamp;

    public function __construct($db) {
        $this->conn = $db;
    }

    // метод создания статьи
    function create(): bool
    {
        // запрос MySQL для вставки записей в таблицу БД «articles»
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, article=:article, category=:category, created=:created";

        $stmt = $this->conn->prepare($query);

        // опубликованные значения
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->article=htmlspecialchars(strip_tags($this->article));
        $this->category=htmlspecialchars(strip_tags($this->category));

        // получаем время создания записи
        $this->timestamp = date('Y-m-d H:i:s');

        // привязываем значения
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":article", $this->article);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":created", $this->timestamp);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function readAll() {

        // запрос MySQL
        $query = "SELECT
                id, name, article, category
            FROM
                " . $this->table_name . "
            ORDER BY
                name";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}