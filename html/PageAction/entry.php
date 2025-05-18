<? 
    require_once '../sql/personal_info.php';
    //ユーザーの新規登録
    session_start();
    //名前のチェック
    $name = filter_input(INPUT_POST, 'name');
    // メールアドレスのチェック
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
    // パスワードのチェック
    $password = filter_input(INPUT_POST, 'password');
    // パスワードのチェック(2回目)
    $password_next = filter_input(INPUT_POST, 'password_next');


    if (empty($mail)) {
            $message = '名前が入力されてません';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }

    $preg_email = "/\A([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\z/"; 

    if (empty($mail)) {
            $message = 'メールアドレスが入力されてません';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }elseif(preg_match($preg_email,$mail) == 0){
            $message = '@を含む様式に従ったメールアドレスを入力してください';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }elseif(check_email($mail)){
            $message = 'そのメールアドレスは既に使用されてます';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }

    if (empty($password) and empty($password_next)){
            $message = 'パスワードを入力してください';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }elseif ($password !== $password_next) {
            $message = 'パスワードが一致しません';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }elseif(!preg_match("/\A[a-z\d]{8,100}+\z/i", $password)){
            $message = 'パスワードは英数字８文字以上１００文字以下にしてください。';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }
    //これで登録
    if (info_entry($name, $mail, $password)){
            header("Location: ../Front/index.php");
            exit;
    }else{
            $message = '新規登録に失敗しました';
            header("Location: ../Front/user_entry.php?message=$message");
            exit;
    }

