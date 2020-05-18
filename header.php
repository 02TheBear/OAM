<?php
    session_start()
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        
        <header>
            <nav>
                <a href="index.php">
                <img src="img/large_logo.png" alt="logo">
                </a>
                <ul>
                    <li>Sign up</li>
                    <li>Support</li>
                </ul>
                <div>
                <?php
                    if (isset($_SESSION['userid'])) {
                        echo '
                            <form action="includes/logout.inc.php" method="post">
                            <button type="submit" name="loguot-submit"><p>Logout</p></button>
                            </form>
                        ';
                    }
                    else {
                        echo '
                            <form action="includes/login.inc.php" method="post">
                            <input type="text" name="userid" placeholder="Username">
                            <input type="password" name="userpassword" placeholder="Password">
                            <button type="submit" name="login-submit">Login</button>
                            </form>
                        ';
                    }
                ?>
                    
                    <a href="signup.php"><p>Sign up</p></a>
                    
                </div>
            </nav>
        </header>