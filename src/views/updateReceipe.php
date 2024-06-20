<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Recipe</title>
</head>

<body>
    <!-- échapement php dans HTML ;) -->
    <?php if (isset($errors)) : ?> 
        <?php foreach($errors as $error) :?>
           <p><?= $error ?></p>
            <?php endforeach; ?>
    <?php endif ?>
<h1>Mise a jour d'une recette</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value=" <?php echo $recipe['id']; ?>">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?php echo $recipe['title']; ?>">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="<?php echo $recipe['description']; ?>">
        <input type="submit" value="Enregistrer">
    </form>


</body>

</html>