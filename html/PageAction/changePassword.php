<?   
    require_once '../Sql/personal_info.php';

    $now_info = login_check();//ログイン情報のチェック

     // 今のパスワード
    $now_password = filter_input(INPUT_POST, 'now-password');
    // 変えたいパスワード
    $new_password = filter_input(INPUT_POST, 'new-password');

    // echo $now_password;
    // echo $new_password;

    // echo $now_info[3];//今ログインしてるパスワード

    if($now_info[0] == ''){
        session_start();
        $_SESSION['message_option'] =  'ログインしてください';
        header("Location: ../Front/option.php");
    }//ゲスト(ログインしてないなら、戻す)

    if (empty($now_password) or empty($new_password)){
        session_start();
             $_SESSION['message_option'] =  'パスワードを入力してください';
            header("Location: ../Front/option.php");
            exit;
    }elseif ($now_password !== $now_info[3]) {
        session_start();
             $_SESSION['message_option'] =  'パスワードが一致しません';
            header("Location: ../Front/option.php");
            exit;
    }elseif(!preg_match("/\A[a-z\d]{8,100}+\z/i", $new_password)){
        session_start();
             $_SESSION['message_option'] =  'パスワードは英数字８文字以上１００文字以下にしてください。';
            header("Location: ../Front/option.php");
            exit;
    }else{
        session_start();
         $_SESSION['message_option'] = 'パスワードを変えました';
            change_password($new_password);
            header("Location: ../Front/option.php");
    }