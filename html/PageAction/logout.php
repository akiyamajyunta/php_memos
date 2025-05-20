<?php
    require_once '../Sql/personal_info.php';

        log_out();
        $_SESSION['message'] = 'ログアウトしました';
        header("Location: ../Front/index.php");
        exit;