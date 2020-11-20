<?php ob_start() ?>
    <title><?= $category->getName(); ?></title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>

<?php ob_start() ?>
    <section class="mini-text">
        <h1>My-eBook</h1>
    </section>

    <section class="div-big">
        <h2 class="text-author"><?= $category->getName(); ?></h2>
        <section class="row">
            <?php foreach ($books as $bs): ?>
                <article class="col-3 m-12 d6 center book">
                    <a href="index.php?class=book&action=show&id=<?= $bs->getId() ?>"><img src="assets/images/covers/<?= $bs->getImageUrl() ?>" alt="<?= $bs->getName() ?>"></a>
                    <h3><?= $bs->getName() ?></h3>
                </article>
            <?php endforeach; ?>
        </section>
    </section>
<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
<script src="assets/js/validation.js" ></script>
<?php $javascript = ob_get_clean() ?>

<?php include_once "layout.php" ?>

