<?php
//on charge les fonctions du controller frontend
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        //si le if est est vrai alors la fonction listPosts est exécuter et affiche les les posts
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        //si le elseif est vrai et le if aussi cette fonction affiche le post selectionné avec ses commentaires 
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
                
            }
        }
        // ici la fonction appelé permet d'ajouter des commentaires au post sélectionné
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if(!empty($_POST['author']) && !empty($_POST['comment']))
                {
                    addComment($_GET['id'],$_POST['author'],$_POST['comment']);
                }
                else
                {
                    throw new Exception('Erreur: tous les champs ne sont pas remplis !');
                    
                }
            }
            else
            {
                throw new Exception('Erreur: aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'redirectionModif') {
            if (isset($_GET['post']) && $_GET['post'] > 0){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    listComment($_GET['id']);
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
                    
                }

            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] =='newComment') {
           if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
               if (!empty($_POST['comment'])) {
                    newComment($_GET['id'],$_POST['comment'],$_GET['postId']);
               }
               else{
                    throw new Exception('Erreur : aucun identifiant de billet envoyé');
               }
           }
           else{
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
           }
        }
    }
    else {
        listPosts();
    }
    
} catch (Exception $e) {
    echo "Erreur :" . $e->getMessage();
    
}