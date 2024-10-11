<?php
    /**
     * Template du formulaire d'update/creation d'un article.
     */
?>

<form action="index.php" method="post" class="foldedCorner">
    <h2><?= $article->getId() == -1 ? "Création d'un article" : "Modification de l'article "?></h2>
    <div class="formGrid">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?= $article->getTitle() ?>" required>
        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="30" rows="10" required><?= $article->getContent() ?></textarea>
        <input type="hidden" name="action" value="updateArticle">
        <input type="hidden" name="id" value="<?= $article->getId() ?>">
        <button class="submit"><?= $article->getId() == -1 ? "Ajouter" : "Modifier" ?></button>
    </div>
</form>

<div class="comments">
    <h2 class="commentsTitle">Vos Commentaires</h2>
    <?php if (empty($comments)) { ?>
        <p class="info">Aucun commentaire pour cet article.</p>
    <?php } else { ?>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="deleteComments">
            <ul>
                <?php foreach ($comments as $comment) { ?>
                    <li>
                        <input type="checkbox" name="commentIds[]" value="<?= $comment->getId() ?>">
                        <div class="smiley">☻</div>
                        <div class="detailComment">
                            <h3 class="info">
                                Le <?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?>,
                                <?= Utils::format($comment->getPseudo()) ?> a écrit :
                            </h3>
                            <p class="content"><?= Utils::format($comment->getContent()) ?></p>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <!-- Bouton pour supprimer les commentaires sélectionnés -->
            <button type="submit" class="delete">Supprimer</button>
        </form>
    <?php } ?>
</div>

<script>




</script>
