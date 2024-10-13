<?php
    /**
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun.
     * Et un formulaire pour ajouter un article.
     */
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<h2>Édition des articles</h2>


<!-- Liste des articles -->
<div class="adminArticle">
    <table class="tableau">
        <thead class="header">
            <tr class="header2">
              <th>
                <p>Titre</p>
                <a href="index.php?action=admin&sort=title&order=asc"><i class="fa-solid fa-arrow-up"></i></a> |
                <a href="index.php?action=admin&sort=title&order=desc"><i class="fa-solid fa-arrow-down"></i>
                </a>
              </th>
              <th>
                <p>Commentaires</p>
                <a href="index.php?action=admin&sort=comments&order=asc"><i class="fa-solid fa-arrow-up"></i></a> |
                <a href="index.php?action=admin&sort=comments&order=desc"><i class="fa-solid fa-arrow-down"></i> </a>
              </th>
              <th>
                <p>Vues</p>
                <a href="index.php?action=admin&sort=views&order=asc"><i class="fa-solid fa-arrow-up"></i></a> |
                <a href="index.php?action=admin&sort=views&order=desc"><i class="fa-solid fa-arrow-down"></i></a>
              </th>
              <th>
                <p>Date</p>
                <a href="index.php?action=admin&sort=date&order=asc"><i class="fa-solid fa-arrow-up"></i></a> |
                <a href="index.php?action=admin&sort=date&order=desc"><i class="fa-solid fa-arrow-down"></i> </a>
              </th>
              <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) { ?>
                <tr class="oneontwo">
                    <td><?= htmlspecialchars($article->getTitle()) ?></td>
                    <td class="tbody"><?= htmlspecialchars($article->getTotalComments()) ?></td>
                    <td class="tbody"><?= htmlspecialchars($article->getVues()) ?></td>
                    <td class="tbody"><?= htmlspecialchars($article->getDateCreation()->format('d-m-Y')) ?></td>
                    <td class="button">
                        <a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a> |
                        <a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>
