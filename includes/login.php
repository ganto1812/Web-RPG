<?php
    include_once 'dbh.php';
    
    if (isset($_POST['loginBtn'])) {
        require 'dbh.php';
        
        $mailuid = $_POST['loginUser'];
        $password = $_POST['loginPwd'];
        
        if (empty($mailuid) || empty($password)) {
            header('Location ../index.html?error=emptyfields');
            exit();
        }
        else {
            $sql = "SELECT * FROM users WHERE uidUsers=? or emailUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.html?error=sqlerror");
                exit();
            }
            else {

                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($password, $row['pwdUsers']);
                    if ($pwdCheck == false) {
                        header("Location: ../index.html?error=wrongpwd");
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        $_SESSION['userUid'] = $row['uidUsers'];
                        header("Location: ../index.html?login=success");
                        exit();
                    }
                    else {
                        header("Location: ../index.html?error=wrongpwd");
                    }
                }
            }
        }
    }
    else {
        header("Location ../index.html?");
        exit();
    }
