<?php include_once "header_view.php" ?>
<main class="container">
    <h1>Liste des livres</h1>
    <ul class="menu">
        <li><a href="index.php?class=book&action=allbooks">Tous</a></li>
        <li><a href="index.php?class=book&action=bookbyapproved">Approuvés</a></li>
        <li><a href="index.php?class=book&action=bookbynonapproved">Non approuvés</a></li>
    </ul>
    <div class="contain">
        <table class="table">
            <thead>
            <tr>
                <th>Action</th>
                <th>Couverture</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date de parution</th>
                <th>Uploadé par</th>
                <th>Statut</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($all_books as $book): ?>
                <tr>
                    <td width=10%>
                        <a href="index.php?class=book&action=editBook&id=<?= $book->getId(); ?>"><span class="i"><i class="fa fa-pencil"></i>&nbsp;éditer</span></a><br>
                        <a href="index.php?class=book&action=delete&id=<?= $book->getId(); ?>" onclick="return confirm('êtes vous sûr??');"><span class="i"><i class="fa fa-trash"></i>&nbsp;supprimer</span></a>
                    </td>
                    <td width=10%><img src="assets/images/covers/<?= $book->getImageUrl(); ?>" class="img-miniature"></td>
                    <td width=25%><?= $book->getName(); ?></td>
                    <td width=20%><?= $book->getAuthor(); ?></td>
                    <td width=15%><?= $book->getReleaseAt(); ?></td>
                    <?php $user = User::getById($book->getIdClient()); ?>
                    <td width=10%><?= $user->getLastName(); ?></td>
                    <td width=10%>
                    <?php if ($book->getApproved() == 0): ?>
                        <a href="index.php?class=book&action=editApprove&approved=1&id=<?= $book->getId(); ?>"><span class='label-danger'>Non approuvé</span></a>
                    <?php else: ?>
                        <a href="index.php?class=book&action=editApprove&approved=0&id=<?= $book->getId(); ?>"><span class='label-success'>Approuvé</span></a>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include_once "footer_view.php" ?>