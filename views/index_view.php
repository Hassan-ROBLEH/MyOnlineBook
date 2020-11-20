<?php ob_start() ?>
    <title>My-eBook</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>


<?php ob_start() ?>
    <section class="mini-text">
        <h1>My-eBook</h1>
        <p>Bienvenue sur <span class="text-mini-logo">My-eBook</span>, le numéro 1 de la bibliothèque en ligne de livres libres de droits.</p>
    </section>

    <section class="div-big">
        <h2>Les livres à découvrir :</h2>
        <?php shuffle($books); ?>
        <section class="row">
            <?php foreach ($books as $bs): ?>
                <article class="col-3 m-12 d6 center book">
                    <a href="index.php?class=book&action=show&id=<?= $bs->getId() ?>"><img class="img-bookcover" src="assets/images/covers/<?= $bs->getImageUrl() ?>" alt="<?= $bs->getName() ?>"></a>
                    <h3 class="text-bookcover"><a href="index.php?class=book&action=show&id=<?= $bs->getId() ?>"><?= $bs->getName() ?></a></h3>
                </article>
            <?php endforeach; ?>
        </section>
    </section>
<?php $content = ob_get_clean() ?>


<?php ob_start() ?>
    <script src="assets/js/validation.js" ></script>
<?php $javascript = ob_get_clean() ?>

<?php include_once "layout.php" ?>

