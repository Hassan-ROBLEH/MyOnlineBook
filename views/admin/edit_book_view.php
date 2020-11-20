<?php include_once "header_view.php" ?>

<main class="container">
    <?php if(!is_null($message)): ?>
        <p><?= ($message); ?></p>
    <?php endif; ?>

    <h1>Modifier un livre</h1>
    <?php
        //$c = Category::getById($b->getIdCategory()); //"c" => ,
        $categories_book = Category::list();
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Titre du livre</label>
            <input type="text" name="name" required value="<?= $b->getName() ?>">
        </div>

        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" class="form-control" required value="<?= $b->getAuthor() ?>">
        </div>

        <div class="form-group">
            <label for="date">Date de parution</label>
            <input type="date" name="date" required value="<?= $b->getReleaseAt() ?>">
        </div>

        <div class="form-group">
            <label for="category">Catégorie </label>
            <select name="category"  required>
                <?php foreach ($categories_book as $cat) :?>
                    <option value="<?= $cat->getId() ?>" <?php if($c->getId() == $cat->getId()) { echo "selected"; }?>><?= $cat->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="3" cols="50" required><?= $b->getDescription() ?></textarea>
        </div>

        <h3>Image :</h3>
        <img src="assets/images/covers/<?= $b->getImageUrl() ?>" class="img-miniatures">
        <div class="form-group">
            <label for="image">Changer l'image </label>
            <input type="file" name="image" >
        </div>

        <strong>Livre :</strong><br>
        <strong><?= $b->getFileUrl() ?></strong><br>
        <div class="form-group">
            <label for="file">Changer le fichier PDF </label>
            <input type="file" name="file" >
        </div>

        <div class="form-group">
            <button type="submit">Modifier</button>
        </div>
    </form>
</main>

<?php include_once "footer_view.php" ?>