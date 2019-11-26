<?php

if (isset($_POST['login-submit'])) {

    require 'database.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid || $password)) {
        header("Location: ../Loginpage.php?error=emptyfields");
        exit();
    } 
    else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Loginpage.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../Loginpage.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['wallet'] = $row['wallet'];

                    header("Location: ../catalog.php");
                    exit();
                }
                else {
                    header("Location: ../Loginpage.php?error=wrongpwd");
                    exit();
                }
            }
            else {
                header("Location: ../Loginpage.php?error=nouser");
                exit();
            }
        }

    }

}
else {
    header("Location: ../Loginpage.php");
    exit();
}