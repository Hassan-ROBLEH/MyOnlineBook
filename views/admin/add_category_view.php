<?php include_once "header_view.php" ?>
<main class="container">
    <?php if(!is_null($message)): ?>
        <p class="success"><?= ($message); ?></p>
    <?php endif; ?>

    <h1>Ajouter une catégortie</h1>
    <form method="POST" action="" >
        <div class="col-12 m12">
            <label for="name"> Nom de la catégorie </label>
            <input type="text" name="name" class="form-control" required="required" value="">
            <!-- L'input hidden est utilisé pour voir si l'url de la categorie n'existe pas déjà -->
            <input type="hidden" name="oldname" value="">

        </div>

        <div class="col-12 m12">
            <label for="description">Description </label>
            <textarea class="form-control" name="description" rows="3" cols="50"></textarea>
        </div>

        <div class="col-12 m12">
            <label for="url">Url courte </label>
            <input cols="50" name="url" class="form-control" required="required" value="">
        </div>

        <div class="col-12 m12">
            <button type="submit" class="btn btn-primary" >Ajouter</button>
        </div>
    </form>
</main>
<?php include_once "footer_view.php" ?>