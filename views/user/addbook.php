<?php ob_start() ?>
    <title>Ajouter un livre</title>
    <meta name="description" content="Bibliothéque en ligne" />
<?php $css = ob_get_clean() ?>

<?php ob_start() ?>
    <h1>Proposer un livre</h1>

    <?php if(isset($alert["valid"])): ?>
        <p class="valid"><?= $alert["success"]; ?></p>
    <?php endif; ?>
    <?php if(isset($alert["error"])): ?>
        <p class="comments"><?= $alert["error"]; ?></p>
    <?php endif; ?>

    <h2>Vous pouvez proposer n'importe quel ouvrage open source.</h2>
    <p>Une fois le formulaire rempli, nous vérifierons les données que vous nous avez envoyées. Nous nous reservons le droit de ne modifier ou ne pas accepter l'ouvrage que vous nous avez soumis.</p>
    <?php $categories_book = Category::list() ?>
    <form id="addBook" action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6 m12 form-control">
                <label for="name">Titre du livre <span class="blue">*</span></label>
                <input type="text" name="name" id="name" placeholder="Titre du livre">
                <small>Error message</small>
            </div>

            <div class="col-6 m12 form-control">
                <label for="author">Author <span class="blue">*</span></label>
                <input type="text" name="author" id="author" placeholder="Author">
                <small>Error message</small>
            </div>

            <div class="col-6 m12 form-control">
                <label for="category">Catégorie <span class="blue">*</span></label>
                <select name="category" id="category">
                    <option value="">-- Selectioner --</option>
                    <?php foreach ($categories_book as $cate) : ?>
                        <option value="<?= $cate->getId() ?>"><?= $cate->getName() ?></option>
                    <?php endforeach; ?>
                </select>
                <small>Error message</small>
            </div>

            <div class="col-6 m12 form-control">
                <label for="date">Date de parution <span class="blue">*</span></label>
                <input type="date" name="date" id="date" placeholder="JJ-MM-AAAA">
                <small>Error message</small>
            </div>

            <div class="col-6 m12 form-control">
                <label for="image">Image de couverture <span class="blue">*</span></label>
                <input type="file" name="image" id="image" class="image">
                <small>Error message</small>
            </div>

            <div class="col-6 m12 d6 form-control">
                <label for="file">Fichier PDF <span class="blue">*</span></label>
                <input type="file" name="file" id="file">
                <small>Error message</small>
            </div>

            <div class="col-12 m12 form-control">
                <label for="description">Description <span class="blue">*</span></label>
                <textarea name="description" id="description" placeholder="Votre description"></textarea>
                <small>Error message</small>
            </div>

            <div class="col-12 m12">
                <p class="blue"><strong>* Ces informations sont requises.</strong></p>
            </div>

            <div class="col-12 m12">
                <button type="submit" class="btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>

<?php $javascript = ob_get_clean() ?>

<?php include_once "template.php" ?>

