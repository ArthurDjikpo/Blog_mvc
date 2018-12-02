<?php

/**
 * Cette class manage les fonctions sur les commentaires 
 */
namespace Arthur\Blog\Model;

require_once ("model/Manager.php");

class CommentManager extends Manager
{
	
	public function getComments($postId)
	{
		//On récupère les commentaires du post sélectionné grâce à l'id du post
	    $db = $this->dbConnect();
	    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY id DESC');
	    $comments->execute(array($postId));

	    return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		//permet l'insertion d'un commentaire dans le post sélectionné 
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?,?,?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}

	public function getComment($id)
	{
		//on récupère le commentaire sélectionné pour le modifier 
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, post_id, author FROM comments WHERE id=? ');
		$theComment = $comments->execute(array($id));

		return $theComments;
		
	}
	public function modifyComment( $id, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('UPDATE comments SET comment=:comment, comment_date=NOW() WHERE id=:id');
		$comments->execute(array('comment'=> $comment,'id' => $id ));

		return $comment;		
	}
}