<?php ob_start() ?>
    <title>Dashboard</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>

<?php ob_start() ?>
    <section class="dashboard">
        <h1>Mon compte</h1>

        <section class="contain acount">
            <h2>Vérifier les détails de mon compte.</h2>
            <p>Mon login : <?= ucfirst($user->getFirstName()); ?> </p>
            <p>Mon adresse mail : <?= $user->getEmail(); ?> </p>
            <button class="logout"><a href="index.php?class=user&action=logout">Me déconnecter</a></button>
            <button class="delAcount"><a href="#" onclick="">Supprimer mon compte</a></button>
        </section>

    </section>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>

<?php $javascript = ob_get_clean() ?>

<?php include_once "template.php" ?>
