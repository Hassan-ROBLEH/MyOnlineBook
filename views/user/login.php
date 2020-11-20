<?php ob_start() ?>
    <title>Connexion</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>

<?php ob_start() ?>
<!--MAIN CONTENT-->
    <section class="form">
        <h1>Se connecter</h1>
        <h2>Se connecter pour ajouter vos livres préférés.</h2>

        <?php if(!is_null($message)): ?>
            <?= $message; ?>
        <?php endif; ?>

        <section class="contain">
            <form class="form" id="login-form" action="" method="post">
                <div class="row">
                    <div class="col-12 m12 form-control">
                        <label for="mail">E-mail <span class="blue">*</span></label>
                        <input type="email" name="email" id="email" onkeyup="validateEmail()" placeholder="Votre adresse e-mail">
                        <small>Error message</small>
                    </div>

                    <div class="col-12 m12 form-control">
                        <label for="password">Mot de passe <span class="blue">*</span></label>
                        <input type="password" name="password" id="password" onkeyup="validatePassword()" placeholder="Votre mot de passe">
                        <small>Error message</small>
                    </div>

                    <div class="col-12 m12 menu-mini-text">
                        <a href="index.php?class=user&action=register">Pas encore de compte ?</a>
                    </div>

                    <div class="col-12 m12">
                        <button type="submit" class="btn-primary">Se connecter</button>
                    </div>
                </div>
            </form>
        </section>
    </section>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>


<?php $javascript = ob_get_clean() ?>

<?php include_once "template.php" ?>


