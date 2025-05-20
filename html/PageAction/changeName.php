<?
    require '../Sql/personal_info.php';
    $new_name = filter_input(INPUT_POST, 'new-name');
    $now_info = login_check();//ログイン情報のチェック
    
    if($now_info[0] == ''){
        header("Location: ../Front/option.php");
    }//ゲスト(ログインしてないなら、戻す)


    if (empty($new_name)) {
            $message = '名前が入力されてません';
            header("Location: ../Front/option.php");
            exit;
    }else{

            change_mail($new_name);
            header("Location: ../Front/option.php");
    }

