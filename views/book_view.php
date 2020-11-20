<?php ob_start() ?>
    <title><?= $book->getName() ?></title>
    <meta name="description" content="Bibliothéque en book" />
<?php $css = ob_get_clean() ?>
<?php ob_start() ?>
    <h1><?= $book->getName() ?></h1>

    <section class="div-big">
        <h2 class="text-author">Par <?= $book->getAuthor() ?> </h2>
        <section class="row">
            <div class="col-3 m-12 d6 center">
                <p class="img-book"><img class="img-bookcover-big" src="assets/images/covers/<?= $book->getImageUrl() ?>"></p>
            </div>
            <div class="col-6 m-12 d6 description">
                <div class="text-book-description">
                    <?php $cate = Category::getById($book->getIdCategory()) ?>
                    <p><a target="_blank" href="assets/images/files/<?= $book->getFileUrl() ?>">Lire maintenant</a></p>
                    <p class="date">Année de parution : <?= date("Y",(int)$book->getReleaseAt()) ?></p>
                    <h3><?= $cate->getName(); ?></h3>
                    <p><?= $book->getDescription() ?></p>
                </div>
            </div>
        </section>
    </section>
<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
    <script src="assets/js/validation.js" ></script>
<?php $javascript = ob_get_clean() ?>

<?php include_once "layout.php" ?>
