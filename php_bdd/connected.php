<?php 
$title = "Profil";
require 'class/Login.php';
include 'elements/header.php';


$username = (new Login($username));
$pdo = (new Connexion)->getPDO();

if (!isset($_SESSION['loggedin'])) {
    header('Location: loginform.php');
    exit;
}

$id = $_SESSION['username'];
$query = $pdo->query("SELECT * FROM user WHERE username='$id'");
$row = $query->fetchArray();
if($_POST["currentPassword"] == $row["password"] and $_POST["newPassword"] == $_POST["confirmPassword"])
{
	$newpass = $_POST["newPassword"];
	$pdo->exec("UPDATE user SET password='$newpass' WHERE username='$id'");
	$message = "<div class='alert alert-success'>Password modifié avec succès </div>";
} else {
	$message = "<div class='alert alert-danger'> Password incorrect </div>";
}

?>

<h1>Bienvenue sur vote espace personnel <?php echo $_SESSION['username']; ?></h1>

<div><button href="logout.php">Logout</button></div>

<div>
	<p>Your account details are below:</p>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">Username</th>
					<th scope="col">Password</th>
					<th scope="col">Name</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$_SESSION['username']?></td>
					<td><?=$_SESSION['password']?></td>
					<td><?=$_SESSION['name']?></td>
				</tr>
			</tbody>
		</table>
</div>

<button id="b1">Change password</button>

<div><?php if(isset($message)) { echo $message; } ?></div>
<div id='changepass'>
<form method="post" action="">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit">
</form>
</div>



<?php
include 'elements/footer.php';
?>
