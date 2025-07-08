<? 
    require_once '../Sql/personal_info.php';

    // メールアドレスのチェック
    $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
        // パスワードのチェック
    $password = filter_input(INPUT_GET,'password');
        // パスワードのチェック(2回目)

    if (empty($mail)) {
            session_start();
            $_SESSION['message'] = 'メールアドレスが入力されてません';
            header("Location: ../Front/index.php");
            exit;
    }

    if (empty($password)){
            session_start();
            $_SESSION['message'] = 'パスワードを入力してください';
            header("Location: ../Front/index.php");
            exit;
    }

    if(login($mail,$password)){
        session_start();
        $_SESSION['message'] = '';
        $_SESSION['message_main'] = 'ログイン成功';
        header("Location: ../Front/main.php");
    }else{
        session_start();
        $_SESSION['message'] =  'ログインできませんでした';
        header("Location: ../Front/index.php");
        exit;
    }


