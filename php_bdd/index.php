

<?php 
$title = "Livre d'or";
include 'elements/header.php';
require 'class/Guestbook.php';


$pdo = (new Connexion())->getPDO();
$sth = (new Guestbook())->insert();
$query = (new Guestbook())->post();

?>



<h1>Livre d'or</h1>


<div class="d-flex justify-content-center mt-5">
    <form action="index.php" method="post">
        <div class="form-group">
            <?php 
            if ($_SESSION['name'] != "") {
                $name = $_SESSION['name'];
                echo "<input type='text' name='username' placeholder='Votre pseudo' class='form-control' value='$name'>";
            } else {
                echo '<input type="text" name="username" placeholder="Votre pseudo" class="form-control">';
            }
            ?>            
        </div>
        <div class="form-group">
            <textarea type="text" name="message" placeholder="Votre message" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
</div>


<h3>Vos messages :</h3>

<div class="container">
<?php while ($entry = $query->fetchArray(SQLITE3_ASSOC) )
 {
    echo '<p class="border border-dark">'.'Utilisateur : ' . '<strong>'.htmlentities($entry['username']).'</strong>' . '<br>' .
      'Message : ' . htmlentities($entry['comment']) .'</p>'. '<br>';
} ?></div>
<?php
include 'elements/footer.php';