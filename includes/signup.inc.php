<?php

if (isset($_POST['signup-submit'])) {

    require 'db.inc.php';

    $userid = $_POST['userid'];
    $userpassword = $_POST['userpassword'];
    $userpasswordrepeat = $_POST['userpasswordrepeat'];
    $chatkey = $_POST['chatkey'];

    if (empty($userid) || empty($userpassword) || empty($userpasswordrepeat) || empty($chatkey)) {
        header('Location: ../signup.php?err=emptyfields&userid='.$userid.'&chatkey='.$chatkey);
        exit();
    }

    else if (!filter_var($chatkey, FILTER_VALIDATE_INT) && (!preg_match('/^[a-zA-Z0-9]*$/', $userid))) {
        header('Location: ../signup.php?err=invalidchatkeyanduserid');
        exit();
    }

    else if (!filter_var($chatkey, FILTER_VALIDATE_INT) && strlen($chatkey) < 8 && strlen($chatkey) > 255 ) {
        header('Location: ../signup.php?err=invalidchatkey&userid='.$userid);
        exit();
    }
    
    else if (!preg_match('/^[a-zA-Z0-9_]*$/', $userid)) {
        header('Location: ../signup.php?err=invaliduserid&chatkey='.$chatkey);
        exit();
    }

    else if ($userpassword !== $userpasswordrepeat) {
        header('Location: ../signup.php?err=unmatchinguserpassword&userid='.$userid.'&chatkey='.$chatkey);
        exit();
    }

    else{

        $sql = 'SELECT userid FROM users WHERE userid=?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: ../signup.php?err=sqlerr1');
            exit();
        }
        else {
            /*$hacheduserid = password_hash($userid, PASSWORD_DEFAULT);*/ 
            mysqli_stmt_bind_param($stmt, 's', $userid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if ($resultcheck > 0) {
                header('Location: ../signup.php?err=useridtaken&chatkey='.$chatkey); 
                exit();
            }

            else{
                $sql = "INSERT INTO users (userid, userpassword, chatkey) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location: ../signup.php?err=sqlerr2');
                    exit();
                }
                else {

                    /*$hacheduserid = password_hash($userid, PASSWORD_DEFAULT);*/
                    $hacheduserpassword = password_hash($userpassword, PASSWORD_DEFAULT);
                    $hachedchatkey = password_hash($chatkey, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, 'sss', $userid, $hacheduserpassword, $hachedchatkey);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header('Location: ../signup.php?signup=success');
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else  {
    header('Location: ../signup.php?err=dont-be-a-dick');
    exit();
}