<?php
    require_once '../Sql/personal_info.php';

        log_out();
        $message = 'ログアウトしました';
        header("Location: ../Front/index.php?message=$message");
        exit;