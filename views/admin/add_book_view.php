<?php include_once "header_view.php" ?>

<main class="container">
    <?php if(!is_null($message)): ?>
        <p><?= ($message); ?></p>
    <?php endif; ?>

    <h1>Ajouter un livre</h1>
    <?php $categories_book = Category::list() ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="col-12 m12">
            <label for="name">Titre du livre</label>
            <input type="text" name="name" required>
        </div>

        <div class="col-12 m12">
            <label for="author">Auteur</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="col-12 m12">
            <label for="date">Date de parution</label>
            <input type="date" name="date" required>
        </div>

        <div class="col-12 m12">
            <label for="category">Catégorie </label>
            <select name="category"  required="required">
                <option value="">-- Selectioner --</option>
                <?php foreach ($categories_book as $cat) :?>
                    <option value="<?= $cat->getId() ?>"><?= $cat->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12 m12">
            <label for="description">Description</label>
            <textarea name="description" rows="3" cols="50" required></textarea>
        </div>


        <div class="col-12 m12">
            <label for="image">Image de couverture </label>
            <input type="file" name="image">
        </div>

        <div class="col-12 m12">
            <label for="file">Fichier PDF </label>
            <input type="file" name="file" >
        </div>

        <div class="col-12 m12">
            <button type="submit">Ajouter</button>
        </div>
    </form>
</main>

<?php include_once "footer_view.php"; ?>

