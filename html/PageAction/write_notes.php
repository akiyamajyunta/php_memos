<?
    require '../Sql/memo.php';

    session_start();
    //タイトル
    $title = filter_input(INPUT_POST, 'title');
    // 文章
    $sentence = filter_input(INPUT_POST, 'sentence');
    //id(これは仮の値)
    $user_id = filter_input(INPUT_POST, 'User_id');

    if(empty($title)){
            $message = 'タイトルを記入してください';
            header("Location: ../Front/main.php?message_main=$message");
            exit;
    }elseif(strlen($title)>60){
            $message = 'タイトルは60字以内にしてください';
            header("Location: ../Front/main.php?message_main=$message");
            exit;

    }elseif(empty($sentence)){
            $message = '中身を記入してください';
            header("Location: ../Front/main.php?message_main=$message");
            exit;
    }elseif(strlen($title)>255){
            $message = '文章は255字以内にしてください';
            header("Location: ../Front/main.php?message_main=$message");
            exit;
    }else{
        if(write_memos($title,$sentence,$user_id)){
                $message = '投稿しました';
                header("Location: ../Front/main.php?message_main=$message");
                exit;
        }else{
                $message = '投稿できませんでした';
                header("Location: ../Front/main.php?message_main=$message");
                exit;
        }
    }
