<?php
    session_start();
    include_once('dbconnection.php');
    if(isset($_POST['login_btn'])){
        $uname = trim($_POST['uname']);
        $pass = trim($_POST['password']);
        $qry = "SELECT * FROM user WHERE username=? AND password=?";
        $stmt = mysqli_prepare($con, $qry);
        mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_num_rows($result);
        if($row != 0){
            $rc = mysqli_fetch_array($result);
            $_SESSION['username'] = $rc['username'];
            if($rc['username'] == 'admin' && $rc['password'] == 'admin'){
                header('Location: admin_page.php');
            } else {
                header('Location: user_page.php');
            }
            exit();
        } else {
            echo "<script>alert('User does not exist! Please register.'); window.location.href='homepage.php';</script>";
        }
    }
?>
