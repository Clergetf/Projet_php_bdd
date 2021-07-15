<?php
require 'class/Login.php';
$title = "Login";
include 'elements/header.php';
$query = (new Login());

?>

    <div class="d-flex justify-content-center mt-5">
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">Login</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required="required"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required="required"/>
                </div>
                <div class="text-center">
                    <button name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                </div>
            </form>
        </div>
    </div>
    </div>
 


<?php
include 'elements/footer.php';
?>