<?php
    require "header.php";
?>

        <main>
            <?php
                if (isset($_SESSION['userid'])) {
                    echo '<p>Loged in!</p>';
                }
                else {
                    echo '<p>Loged out!</p>';
                }
            ?>
        </main>

<?php
    require "footer.php";
?>