<?
    require '../Sql/memo.php';
    require_once '../Sql/personal_info.php';
    make_table_info();
    memo_create_table();
    $now_date = login_check();
    // echo  $now_date[0] . '今ログインしてるユーザーのID';
    $name = $now_date[1]; //. '現在ログインしてるユーザーの名前';
    $mail = $now_date[2];//mail
    $password = $now_date[3];//password

    session_start();
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
    }

    $new_entry_link = 'user_entry.php';
    $log_out_link = '../PageAction/logout.php';

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Document</title>
        <script></script>
    </head>
    <body>
        <?
            include '../Front/component/header.php';
            blue_bird_header($log_out_link,'ログアウト',$new_entry_link,'新規登録',$name)
        ?>

        <div class="container">
            <form action='../PageAction/login.php' method="get">
                <div class="form">
                    <label class="form-text">メールアドレス</label>
                    <input name="mail" id="mail" type="text" value=<?php echo $mail; ?>>
                </div>
                <div class="form">
                    <label class="form-text">パスワード</label>
                    <input name="password" id="password" type="password" value=<?php echo $password; ?>>
                </div>
                <br>
                <div class="form">
                    <button class='form-button' type="submit">ログイン</button>
                </div>
            </form>
        </div>
        <div class='message'>
            <?php if (!empty($message)): ?>
            <a><?php echo $message; ?></a>
            <?php endif; ?>
        </div>
    </body>
</html>

<style>
.container {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border: 3px solid #00FFFF;
    border-radius: 5px;
    margin-top: 10%;
}

.form {
    display: flex;
    flex-direction: column;
}

.form-text {
    text-align: center;
    color: black;
}

.form-button {
    text-align: center;
    width: 30%;
    margin: auto;
    top: 30%;
    color: #fff;
    background-color: rgb(0, 247, 255);
    border-radius: 100vh;
}

.message {
    text-align: center;
    color: black;
    margin-top: 3%;
}
</style>