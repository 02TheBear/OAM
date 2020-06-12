<?php

if (isset($_POST['signup-submit'])) {

    require 'db-inc.php';

    $userid = $_POST['userid'];
    $userpassword = $_POST['userpassword'];
    $userpasswordrepeat = $_POST['userpasswordrepeat'];

    if (empty($userid) || empty($userpassword) || empty($userpasswordrepeat)){
        header('Location: ../signup.php?err=emptyfields&userid='.$userid);
        exit();
    }
    
    else if (!preg_match('/^[a-zA-Z0-9_]*$/', $userid) || strlen($userid) < 511 || strlen($userpassword) < 511 ) {
        header('Location: ../signup.php?err=invaliduserid');
        exit();
    }

    else if ($userpassword !== $userpasswordrepeat) {
        header('Location: ../signup.php?err=unmatchinguserpassword&userid='.$userid);
        exit();
    }

    else{

        $sql = 'SELECT * FROM users WHERE userid=?';
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
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else  {
    header('Location: ../signup.php?err=dont-be-a-dick');
    exit();
}