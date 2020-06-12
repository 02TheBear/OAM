<?php
    require "header.php";
?>

        <main>
            <?php
                if (isset($_SESSION['userid'])) {
                    echo '
                        <p>Loged in!</p>
                    ';/*Loged in*/
                }
                else {
                    echo '
                        <p>Loged out!</p>
                    ';/*loged out*/
                }
            ?>
        </main>

<?php
    require "footer.php";
?>