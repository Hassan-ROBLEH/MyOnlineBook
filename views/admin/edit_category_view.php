<?php include_once "header_view.php" ?>

<main class="container">
    <?php if(!is_null($message)): ?>
        <p class="success"><?= ($message); ?></p>
    <?php endif; ?>

    <h1>Modifier un livre</h1>

    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Nom de la catégorie</label>
            <input type="text" name="name" required="required" value="<?= $category->getName(); ?>">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="3" cols="50"><?= $category->getDescription(); ?></textarea>
        </div>

        <div class="form-group">
            <label for="url">Url courte</label>
            <input type="text" name="url" class="form-control" required="required" value="<?= $category->getShortUrl(); ?>">
        </div>

        <div class="form-group">
            <button type="submit">Modifier</button>
        </div>
    </form>
</main>

<?php include_once "footer_view.php" ?>

