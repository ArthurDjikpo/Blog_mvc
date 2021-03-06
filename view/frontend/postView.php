<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>
        <form action="index.php?action=addComment&id=<?= $post['id']?>"  method="POST">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id='author' name="author">
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea type="text" id='comment' name="comment"></textarea> 
            </div>
            <div class="button">
                <button type="sumbit"> Valider </button>
            </div>
            
        </form>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?>( <a href= "index.php?action=redirectionModif&post=<?= $post['id']?>&id=<?= $comment['id']?>&author=<?= $comment['author']?>">modifier</a>)</p>
        <?php
        }
        ?>
<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>