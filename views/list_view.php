<?php ob_start() ?>
    <title>Bibliothèque</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>

<?php ob_start() ?>
<section class="section-search">
    <h1>Rechercher un livre</h1>

    <?php if (isset($_POST['search']) && empty($_POST['search'])) : ?>

        <section>
            <h2>Recherche par titre :</h2>
            <form action="" method="post">
                <div class="div-search-big">
                    <input name="search" type="search" class="form-control" id="search">
                    <button>rechercher</button>
                </div>
            </form>
        </section>

        <h2>Parcourir par catégoeris</h2>
        <section class="search-category"></section>
    <?php else : ?>

    <p>Résultat de la recherche :</p>
    <section class="row">
        <?php foreach ($search_book as $books) : ?>
            <article class="col-3 m-12 d6 center book">
                <a href="index.php?class=book&action=show&id=<?= $books->getid() ?>"><img src="assets/images/covers/<?= $books->getImageUrl() ?>" alt="<?= $books->getName() ?>"></a>
                <h3><?= $books->getname() ?></h3>
            </article>
        <?php endforeach; ?>
    </section>
    <?php endif; ?>
</section>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
<script src="assets/js/validation.js" ></script>
<?php $javascript = ob_get_clean() ?>

<?php include_once "layout.php" ?>
