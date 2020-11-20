<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php if(isset($css)) : ?>
        <?= $css ?>
    <?php endif; ?>
</head>
<body>
<!--HEADER-->
<?php $session = new Session(); ?>
<header class="topbar">
    <div class="menu-icon"><i class="fa fa-bars"></i></div>
    <div class="overlay"></div>
    <a class="topbar-logo" href="index.php">My-eBooks</a>
    <nav class="topbar-nav" id="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li class="dropdowns">
                <a href="">Catégories</a>
                <ul class="submenu">
                    <?php $categories_header = Category::list() ?>
                    <?php foreach ($categories_header as $cat) : ?>
                        <li>
                            <a href="index.php?class=book&action=getbycategory&id=<?= $cat->getId() ?> "><?= $cat->getName() ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <?php if(!$session->islogged()) : ?>
                <li><a href="index.php?class=user&action=login">Ajouter un livre</a></li>
            <?php else : ?>
                <li><a href="index.php?class=book&action=addbook">Ajouter un livre</a></li>
            <?php endif; ?>

            <li><a href="index.php?class=contact&action=addcontact">Contact</a></li>
        </ul>
    </nav>

    <div class="topbar-right">
        <form class="form-search" method="post" action="index.php?class=book&action=search">
            <input type="search" class="input-search" id="search" name="search" autocomplete="off" placeholder="Rechercher">
            <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
        </form>

        <?php if($session->islogged()) : ?>
            <a class="btn pseudo" href="index.php?class=user&action=index"><?= ucfirst($_SESSION['user']['pseudo']) ?></a>
        <?php else : ?>
            <a class="btn btn-sign-up" href="index.php?class=user&action=register">S'inscrire</a>
            <a class="btn btn-login" href="index.php?class=user&action=login">Se connecter</a>
        <?php endif; ?>
    </div>

</header>

<!--MAIN CONTENT-->

<main class="container">
    <?= $content ?>
</main>

<!-- FOOTER -->

<footer class="footer">
    <h1>My-eBook</h1>
    <a href="index.php">Accueil</a>
    <a href="index.php?class=book&action=addbook">Ajouter un livre</a>
    <a href="index.php?class=contact&action=addcontact">Contact</a>
</footer>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
-->
<?php if(isset($javascript)) : ?>
    <?= $javascript ?>
<?php endif; ?>
</body>
</html>
