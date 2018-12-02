<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
 	<h1>Mon super blog !</h1>
 	<p><a href="index.php?action=post&id=<?= htmlspecialchars($_GET['post']) ?>">Retour le billet</a></p>
    <h2><strong><?= htmlspecialchars($_GET['author']) ?></strong></h2>

    <form action="index.php?action=newComment&id=<?= htmlspecialchars($_GET['id']) ?>&postId=<?= htmlspecialchars($_GET['post']) ?>" method="POST">
    		<div>
                <label for="comment">Nouveau commentaire:</label><br />
                <textarea type="text" id='comment' name="comment"></textarea> 
            </div>
            <div class="button">
                <button type="sumbit"> Valider </button>
            </div>
    </form>



<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>