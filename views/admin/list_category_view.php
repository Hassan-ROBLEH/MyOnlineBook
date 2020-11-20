<?php include_once "header_view.php" ?>
<main class="container">

    <h1>Liste des catégories</h1>

    <ul class="list-group">
        <?php foreach ($categories as $category):  ?>
           <li class="list-group-item"><a href="index.php?class=category&action=edit&id=<?= $category->getId(); ?>"><span class="i"><i class="fa fa-pencil"></i></a>&nbsp;
               <a href="index.php?class=category&action=delete&id=<?= $category->getId();?>" onclick="return confirm('Etes vous sur de vouloir supprimer ?');"></span> <span class="i"><i class="fa fa-trash"></i></span></a>&nbsp;&nbsp;<?= $category->getName(); ?></li>
        <?php endforeach; ?>
    </ul>
</main>

<?php include_once "footer_view.php"; ?>