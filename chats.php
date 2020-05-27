<?php
    require "header.php";
?>

        <main>
            <?php
                if (isset($_SESSION['userid'])) {
                    if (){
                        echo'
                            <ul>
                        ';
                        
                        
                        echo'
                            <a href="">
                                <li>
                                    <div>
                                        <p><!--alias--></p>
                                    </div>
                                    <div>
                                        <p><!--Message--></p>
                                    </div>
                                </li>
                            </a>
                        ';
                        
                        echo'
                            </ul>
                        ';
                    }
                    else {
                        echo'
                            <div>
                                <p>No chats found</p>
                            </div>  
                        ';
                    }                    
                    /*Loged in*/
                }
                else {
                    header('Location: index.php?err=notlogedin');
                    /*loged out*/
                }
            ?>
        </main>

<?php
    require "footer.php";
?>