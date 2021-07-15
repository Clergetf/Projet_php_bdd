<?php
    require 'class/Connexion.php';

    Class Login {

        public function createLogin(){
            $pdo= (new Connexion())->getPDO() or die("Unable to open database!");
            $query="CREATE TABLE IF NOT EXISTS `user`(user_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, name TEXT)";	
            $pdo->exec($query);
         
            $query=$pdo->query("SELECT COUNT(*) as count FROM `user`");
            $row=$query->fetchArray();
            $countRow=$row['count'];
         
            if($countRow == 0){
                $pdo->exec("INSERT INTO `user` (username, password, name) VALUES('admin', 'admin', 'Administrator')");
            }
        }

        public function login() {
            $pdo= (new Connexion())->getPDO();
            if(ISSET($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
         
                $query=$pdo->query("SELECT COUNT(*) as count FROM `user` WHERE `username`='$username' AND `password`='$password'");
                $row=$query->fetchArray(SQLITE3_ASSOC);
                $count=$row['count'];

                $name=$pdo->query("SELECT name FROM user WHERE `username`='$username' AND `password`='$password'");
                
                if($count > 0){
                    echo "<div class='alert alert-success'>Login successful</div>";
                    session_regenerate_id();
		            $_SESSION['loggedin'] = TRUE;
		            $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                while ($rname = $name->fetchArray(SQLITE3_ASSOC)) {
                    $_SESSION['name'] = $rname['name'];
                }
                

                    header('Location: connected.php');
                    }else{
                    echo "<div class='alert alert-danger'>Invalid username or password</div>";
                }
            
            
            }
        }
    }



   
?>