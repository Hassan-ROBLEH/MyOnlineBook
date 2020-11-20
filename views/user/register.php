<?php ob_start() ?>
    <title>Inscription</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>

<?php ob_start() ?>
<!--MAIN CONTENT-->

    <?php if(!is_null($msg)): ?>
        <p><?= $msg; ?></p>
    <?php endif; ?>

    <section class="section-register">
        <h1>Créer mon compte</h1>
        <h2>Créez votre compte pour ajouter vos livres préférés.</h2>
    </section>
    <section class="contain">
        <form id="form" class="form" action="" method="post">
            <div class="row">
                <div class="col-12 m12 form-control" >
                    <label for="email">E-mail </label>
                    <input type="email" name="email" id="email" placeholder="Votre adresse e-mail">
                    <small class="small">Error message</small>
                </div>

                <div class="col-12 m12 form-control">
                    <label for="password">Mot de passe <span class="blue">*</span></label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">
                    <small class="small">Error message</small>
                </div>

                <div class="col-12 m12 form-control">
                    <label for="firstname">Prénom <span class="blue">*</span></label>
                    <input type="text" name="firstName" id="firstname" placeholder="Votre prénom">
                    <small class="small">Error message</small>
                </div>

                <div class="col-12 m12 form-control">
                    <label for="lastName">Nom <span class="blue">*</span></label>
                    <input type="text" name="lastName" id="name" placeholder="Votre nom">
                    <small class="small">Error message</small>
                </div>

                <div class="col-12 m12">
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>

                <div class="col-12 m12">
                    <button type="submit" class="btn-primary">Créer mon compte</button>
                </div>
            </div>
        </form>
        <!--<div class="progress">
            <div class="indeterminate">ok</div>
        </div>-->
    </section>
<?php $content = ob_get_clean() ?>

<?php ob_start() ?>

<?php $javascript = ob_get_clean() ?>

<?php include_once "template.php" ?>


