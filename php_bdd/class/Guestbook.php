<?php
require 'class/Connexion.php';

Class Guestbook {

    //insertion donné dans DB
    public function insert() 
    {
        $pdo = (new Connexion())->getPDO();
        if (isset($_POST['username']) and isset($_POST['message']))
        {
            $username = $_POST['username'];
            $message = $_POST['message'];
            $sth = $pdo->prepare("INSERT INTO messages (username,comment) VALUES ('$username','$message')");
            return $sth->execute();
        }   

    }

    //post donné stocké dans DB sur le site + envoie mail notif
    public function post()
    {
        $pdo = (new Connexion())->getPDO();
        $query= $pdo->query("SELECT username, comment FROM messages");
        $to = "florian.clerget@gmail.com";
        $email_subject = "Formulaire rempli";
        $email_body = "Vous avez un nouveau commentaire sur votre livre d'or";
        mail($to,$email_subject,$email_body);
        return $query;
    }
}


?>