<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
	$PostManager = new \Arthur\Blog\Model\PostManager(); // Création d'un objet
    $posts = $PostManager->getPosts(); //Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
	$PostManager = new \Arthur\Blog\Model\PostManager();
	$CommentManager = new \Arthur\Blog\Model\CommentManager();

    $post = $PostManager->getPost($_GET['id']);
    $comments =  $CommentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
	$CommentManager = new \Arthur\Blog\Model\CommentManager();
	$affectedLines = $CommentManager->postComment($postId, $author, $comment);

	if ($affectedLines === fasle)
	{
		throw new Exception('Impossible d\'ajouter le commentaire !');
		
	}
	else
	{
		header('Location: index.php?action=post&id='. $postId);
	}
}

function listComment($id)
{
	$CommentManager = new \Arthur\Blog\Model\CommentManager();
	$theComment = $CommentManager->getComment($_GET['id']);

	require('view/frontend/modifyPostView.php');
}

function newComment($id, $newcomment, $postId)
{
	$CommentManager = new \Arthur\Blog\Model\CommentManager();
	$comment = $CommentManager->modifyComment($id, $newcomment);

	header('Location: index.php?action=post&id='. $postId);
}