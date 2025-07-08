<?
    require_once '../Sql/personal_info.php';
    if (isset($_SESSION['message_user_entry'])) {
        $message = $_SESSION['message_user_entry'];
    }
    
    $now_date = login_check();

    $name = $now_date[1]; //. '現在ログインしてるユーザーの名前';
    $mail = $now_date[2];//mail
    $new_entry_link = 'user_entry.php';
    $log_out_link = '../PageAction/logout.php';

    session_start();
    if (isset($_SESSION['message_user_entry'])) {
        $message = $_SESSION['message_user_entry'];
    } 

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?
            include '../Front/component/header.php';
            blue_bird_header($log_out_link,'ログアウト',$new_entry_link,'新規登録',$name)
        ?>
        <div class="container">
            <form action='../PageAction/entry.php' method="post">
                <div class="form">
                    <label class="form-text">ユーザーネーム</label>
                    <input name="name" id="name" type="text">
                </div>
                <div class="form">
                    <label class="form-text">メールアドレス</label>
                    <input name="mail" id="mail" type="text">
                </div>
                <div class="form">
                    <label class="form-text">パスワード</label>
                    <input name="password" id="password" type="password">
                </div>
                <div class="form">
                    <label class="form-text">パスワード再入力</label>
                    <input name="password_next" id="password_next" type="password">
                </div>
                <br>
                <div class="form">
                    <button class='form-button' type="submit">登録する</button>
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