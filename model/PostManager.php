<?php

/**
 * Cette class manage les fonctions sur les posts
 */
namespace Arthur\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
	
	public function getPosts()
	{	
		// On récupère les 5 derniers billets
		$db= $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
			
		return $req;
	}

	public function getPost($postId)
	{
		// On recupère le post sélectionné grâce à l'id du post
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
	    $req->execute(array($postId));
	    $post = $req->fetch();

	    return $post;
	}
}