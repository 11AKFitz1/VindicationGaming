<?php
if (isset($_POST['signup-submit'])) {

    require 'database.php';

    $username  = $_POST['uid'];
    $email  = $_POST['mail'];
    $password  = $_POST['pwd'];
    $passwordrepeat  = $_POST['pwd-repeat'];

    //Error Message for empty 
    if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
        header("Location: ../Landingpage.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)){
        header("Location: ../Landingpage.php?error=invalidmailuid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../Landingpage.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
        header("Location: ../Landingpage.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if ($password !== $passwordrepeat) {
        header("Location: ../Landingpage.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {
        //no repeat users
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Landingpage.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../Landingpage.php?error=usertaken&mail=".$email);
                exit();

            }
            else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../Landingpage.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Loginpage.php?signup=success");
                    exit();

                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location ../Landingpage.php");
    exit();
}