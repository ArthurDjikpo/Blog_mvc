<?php
/**
 * Connexion à la base de données
 * Remplacer mdp par le mot de passe de votre base données
 * dbname est test
 */

namespace Arthur\Blog\Model;


class Manager
{
	
	protected function dbConnect()
	{
		try
	    {
	        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', '***', '***');
	        return $db;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	}
}