<? 
    require_once '../Sql/personal_info.php';

    session_start();
    // メールアドレスのチェック
    $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);
        // パスワードのチェック
    $password = filter_input(INPUT_GET, 'password');
        // パスワードのチェック(2回目)
    $password_next = filter_input(INPUT_GET, 'password_next');

    if (empty($mail)) {
            $message = 'メールアドレスが入力されてません';
            header("Location: ../Front/index.php?message=$message");
            exit;
    }


    if (empty($password) and empty($password_next)){
            $message = 'パスワードを入力してください';
            header("Location: ../Front/index.php?message=$message");
            exit;
    }elseif ($password !== $password_next) {
            $message = 'パスワードが一致しません';
            header("Location: ../Front/index.php?message=$message");
            exit;
    }

    if(login($mail,$password)){

        header("Location: ../Front/main.php?");
    }else{

        $message = 'ログインできませんでした';
        header("Location: ../Front/index.php?message=$message");

    }


