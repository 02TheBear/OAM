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
                    <?php
                        if (isset($_SESSION['userid'])) {
                            echo '
                            <a href="#">
                                <li>
                                    <div>
                                        <p>Chats</p>
                                    </div>
                                </li>
                            </a>
                            ';/*Loged in*/
                        }
                        else {
                            echo '
                            <a href="#">
                                <li>
                                    <div>
                                        <p>Sign up</p>
                                    </div>
                                </li>
                            </a>
                            ';/*loged out Sign up*/
                        }
                    ?>
                
                    <a href="#">
                        <li>
                            <div>
                                <p>About</p>
                            </div>
                        </li>
                    </a>

                    <a href="#">
                        <li>
                            <div>
                                <p>Support</p>
                            </div>
                        </li>
                    </a>

                </ul>
                <div>
                    <?php
                        if (isset($_SESSION['userid'])) {
                            echo '
                                <form action="includes/logout-inc.php" method="post">
                                    <button type="submit" name="loguot-submit">
                                        <p>Logout</p>
                                    </button>
                                </form>
                            ';/*Loged in*/
                        }
                        else {
                            echo '
                                <form action="includes/login-inc.php" method="post">
                                    <input type="text" name="userid" placeholder="Username">
                                    <input type="password" name="userpassword" placeholder="Password">
                                    <button type="submit" name="login-submit">
                                        <p>Login</p>
                                    </button>
                                </form>
                            ';/*loged out*/
                        }
                    ?>
                    
                    <a href="signup.php">
                        <p>Sign up</p>
                    </a>
                </div>
            </nav>
        </header>