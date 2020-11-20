<?php ob_start() ?>
    <title>Contactez-moi</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>
<?php ob_start() ?>
    <section class="section-contact">
        <h1>Formulaire de contact</h1>
        <h2>Une question, une suggestion, un bug découvert sur le site ?</h2>
        <p>Contactez-nous via le formulaire ci-dessous :</p>
    </section>

    <section class="contain">
        <form id="contact-form" action="" method="post">
            <div class="row">
                <div class="col-12 m12">
                    <label for="firstname">Prénom <span class="blue">*</span></label>
                    <input id="firstname" type="text" name="firstname" placeholder="Votre prénom">
                    <small class="comments"></small>
                </div>

                <div class="col-12 m12">
                    <label for="name">Nom <span class="blue">*</span></label>
                    <input id="name" type="text" name="name" placeholder="Votre nom">
                    <small class="comments"></small>
                </div>

                <div class="col-12 m12">
                    <label for="email">E-mail <span class="blue">*</span></label>
                    <input id="email" type="email" name="email" placeholder="votre Email">
                    <small class="comments"></small>
                </div>

                <div class="col-12 m12">
                    <label for="content">Message <span class="blue">*</span></label>
                    <textarea id="content" name="content" placeholder="Ecrivez-nous un message"></textarea>
                    <small class="comments"></small>
                </div>

                <div class="col-12 m12">
                    <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                </div>

                <div class="col-12 m12">
                    <input type="submit" class="btn-primary" value="Envoyer" />
                </div>
            </div>
        </form>
    </section>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
    <script src="assets/js/validation.js" ></script>
    <script src="assets/js/ajax.js" ></script>
<?php $javascript = ob_get_clean() ?>

<?php include_once "layout.php" ?>


