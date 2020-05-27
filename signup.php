<?php
    require "header.php";
?>

        <main>
            <div>
                <p>Signup</p>
                <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 'emptyfields') {
                            echo '<p>You have to fill in all fields</p>';
                        }

                        else if ($_GET['err'] == 'invalidchatkeyanduserid') {
                            echo '<p>Invalid chatkey and username</p>';
                        }

                        else if ($_GET['err'] == 'invalidchatkey') {
                            echo '<p>Invalid chatkey</p>';
                        }

                        else if ($_GET['err'] == 'invaliduserid') {
                            echo '<p>Invalid username</p>';
                        }

                        else if ($_GET['err'] == 'unmatchinguserpassword') {
                            echo '<p>Passwords not matching</p>';
                        }

                        else if ($_GET['err'] == 'useridtaken') {
                            echo '<p>Username taken</p>';
                        }

                        else if ($_GET['err'] == 'sqlerr1' || $_GET['err'] == 'sqlerr2') {
                            echo '<p>Error: '.$_GET['err'].'</p>';
                        }

                    }

                    else if ($_GET['signup'] == 'success') {
                        echo '<p>Signup successful</p>';
                    }
                ?>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="userid" placeholder="Username">
                    <input type="password" name="userpassword" placeholder="password">
                    <input type="password" name="userpasswordrepeat" placeholder="Reapat password">
                    <input type="number" name="chatkey" placeholder="Chat key (8 - 128)">
                    <button type="submit" name="signup-submit"><p>Signup</p></button>
                </form>
            </div>
        </main>

<?php
    require "footer.php";
?>