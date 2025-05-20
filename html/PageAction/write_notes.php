<?
    require '../Sql/memo.php';

   
    //タイトル
    $title = filter_input(INPUT_POST, 'title');
    // 文章
    $sentence = filter_input(INPUT_POST, 'sentence');
    //id(これは仮の値)
    $user_id = filter_input(INPUT_POST, 'User_id');

    if(empty($title)){
            session_start();
            $_SESSION['message_main'] = 'タイトルを記入してください';
            header("Location: ../Front/main.php");
            exit;
    }elseif(strlen($title)>60){
            session_start();
            $_SESSION['message_main'] = 'タイトルは60字以内にしてください';
            header("Location: ../Front/main.php");
            exit;

    }elseif(empty($sentence)){
            session_start();
            $_SESSION['message_main'] = '中身を記入してください';
            header("Location: ../Front/main.php");
            exit;
    }elseif(strlen($title)>255){
            session_start();
            $_SESSION['message_main'] = '文章は255字以内にしてください';
            header("Location: ../Front/main.php");
            exit;
    }else{
        if(write_memos($title,$sentence,$user_id)){
            session_start();
            $_SESSION['message_main'] = '投稿しました';
            header("Location: ../Front/main.php");
            exit;
        }else{
            session_start();
            $_SESSION['message_main'] = '投稿できませんでした';
            header("Location: ../Front/main.php");
            exit;
        }
    }
