<?php
    require "header.php";
?>

        <main>
            <?php
                

                $sql = 'SELECT * FROM messages WHERE chatid=?';
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header('Location: ../signup.php?err=sqlerr1');
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, 's', $userid);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultcheck = mysqli_stmt_num_rows($stmt);

                    if ($resultcheck > 0) {
                        header('Location: ../signup.php?err=useridtaken'); 
                        exit();
                    }

                    else{
                        $sql = "INSERT INTO users (userid, userpassword) VALUES (?, ?)";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header('Location: ../signup.php?err=sqlerr2');
                            exit();
                        }
                        else {
                            $hacheduserpassword = password_hash($userpassword, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, 'ss', $userid, $hacheduserpassword);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            header('Location: ../signup.php?signup=success');
                            exit();
                        }
                    }
                }

                for
                    for
                        if


                if () {
                    echo'
                        <ul>
                    ';
                    if (){
                        echo'
                            <a href="">
                                <li>
                                    <div>
                                        <p> .  . </p><!--alias-->
                                    </div>
                                    <div>
                                        <p> .  . </p><!--Message-->
                                    </div>
                                </li>
                            </a>
                        ';
                    }
                    else {
                        echo'
                            <div>
                                <p>No chats found</p>
                            </div>  
                        ';
                        exit();
                    }
                    echo'
                        </ul>
                    ';
                }
                /*Loged in*/
                else {
                    header('Location: index.php?err=notlogedin');
                    
                }/*loged out*/
            ?>
        </main>

<?php
    require "footer.php";
?>