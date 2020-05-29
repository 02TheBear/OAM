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

                        $sql = 'SELECT * FROM users WHERE userid=?';
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            header('Location: ../index.php?err=sqlerr1');
                            exit();
                        }§
                        else {
                            mysqli_stmt_bind_param($stmt, 's ', $userid);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if ($row = mysqli_fetch_assoc($result))  {
                                $userid = password_verify($userpassword, $row['userpassword']);
                                if ($userpasswordcheck == false) {
                                    header('Location: ../index.php?err=incorectuserpassword');
                                exit();
                                }
                                else if ($userpasswordcheck == true) {
                                    session_start();
                                    $_SESSION['id'] = $row['id'];
                                    $_SESSION['userid'] = $row['userid'];

                                    header('Location: ../main.php?login=success');
                                    exit();

                                }
                                else {
                                    header('Location: ../index.php?err=unknown');
                                    exit();
                                }
                            }
                            else{
                                header('Location: ../index.php?err=unuseduser');
                                exit();
                            }
                        }
                        
                        
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