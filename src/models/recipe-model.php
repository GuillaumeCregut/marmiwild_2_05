<?php

function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
}

function getAllRecipes(): array|false
{
    $connection = createConnection();

    $statement = $connection->query('SELECT id, title FROM recipe');
    $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $recipes;
}

function getRecipeById(int $id): array|false
{
    $connection = createConnection();

    $query = 'SELECT id,title, description FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $recipe = $statement->fetch(PDO::FETCH_ASSOC);

    return $recipe;
}

function saveRecipe(array $recipe): void
{
    $connection = createConnection();

    $query = 'INSERT INTO recipe(title, description) VALUES (:title, :description)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':title', $recipe['title'], PDO::PARAM_STR);
    $statement->bindValue(':description', $recipe['description'], PDO::PARAM_STR);
    $statement->execute();
}
// DELETE FROM recipe WHERE id = :id;
function deleteRecipeById(int $id) : void 
{
    $connection = createConnection();
    $query = 'DELETE FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id,PDO::PARAM_INT);
    $statement->execute();
}

// UPDATE recipe SET title = :title, description = :description WHERE id = :id; (つ▀¯▀)つ 
function updateReceipeById(int $id, string $title, string $description): void
{
 $connection = createConnection();
 $query = 'UPDATE recipe SET title=:title, description=:description WHERE id=:id';
 $statement = $connection->prepare($query);
 $statement->bindValue(':id', $id,PDO::PARAM_INT);
 $statement->bindValue(':title', $title, PDO::PARAM_STR);
 $statement->bindValue(':description', $description, PDO::PARAM_STR);
 $statement->execute();
}








