<? 
    require_once '../Sql/personal_info.php';

    session_start();
    // メールアドレスのチェック
    $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
        // パスワードのチェック
    $password = filter_input(INPUT_GET, 'password');
        // パスワードのチェック(2回目)


    if (empty($mail)) {
            $message = 'メールアドレスが入力されてません';
            header("Location: ../Front/index.php?message=$message");
            exit;
    }


    if (empty($password)){
            $message = 'パスワードを入力してください';
            header("Location: ../Front/index.php?message=$message");
            exit;
    }
    if(login($mail,$password)){

        header("Location: ../Front/main.php?");
    }else{

        $message = 'ログインできませんでした';
        header("Location: ../Front/index.php?message=$message");

    }


