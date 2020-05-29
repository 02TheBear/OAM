<?php

if (isset($_POST['login-submit'])) {

    require 'db-inc.php';

    $userid = $_POST['userid'];
    $userpassword = $_POST['userpassword'];

    if (empty($userid) || empty($userpassword)) {
        header('Location: ../chats.php?err=emptyfields&userid='.$userid);
        exit();
    }

    else if (!preg_match('/^[a-zA-Z0-9_]*$/', $userid)) {
        header('Location: ../chats.php?err=invaliduserid');
        exit();
    }

    else{

        $sql = 'SELECT * FROM users WHERE userid=?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: ../chats.php?err=sqlerr1');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 's', $userid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))  {
                $userpasswordcheck = password_verify($userpassword, $row['userpassword']);
                if ($userpasswordcheck == false) {
                    header('Location: ../chats.php?err=incorectuserpassword');
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
                    header('Location: ../chats.php?err=unknown');
                    exit();
                }
            }
            else{
                header('Location: ../chats.php?err=unuseduser');
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else  {
    header('Location: ../chats.php?err=why');
    exit();
}