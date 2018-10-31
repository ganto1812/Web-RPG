<?php
    include_once 'dbh.php';
    
    if (isset($_POST['signupBtn'])) {
        require 'dbh.php';
        
        $username = $_POST['username'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd_repeat'];
        $email = $_POST['email'];
        
        if (empty($username) || empty($password) || empty($passwordRepeat) || empty($email)) {
            header('Location: ../index.php?error=emptyfields&user='.$username.'&mail='.$email);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../index.php?error=invalidmailuser");
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../index.php?error=invalidmail&user=".$username);
            exit();
        }
        elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../index.php?error=invaliduser&mail=".$email);
            exit();
        }
        elseif ($password !== $passwordRepeat) {
            header("Location: ../index.php?error=passwordcheck&user=".$username."&mail=".$email);
            exit();
        }
        else {
            
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt =  mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../index.php?error=usertaken&mail=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                    $stmt =  mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../index.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
    }
    else {
        header("Location: ../index.php?didnotworked");
        exit();
    }