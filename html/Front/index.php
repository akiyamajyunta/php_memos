<?
    require '../Sql/memo.php';
    require_once '../Sql/personal_info.php';
    //require_once '../Sql/';
    make_table_info();
    memo_create_table();

    if (isset($_GET['message'])) {
    $message = $_GET['message'];
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a>こんにちはblue-birdを利用するにはログインしてください</a>
    
    <div>
        <?php if (!empty($message)): ?>
            <a><?php echo $message; ?></a>
        <?php endif; ?>
    </div>

    <form action='../PageAction/login.php' method="get">
        <div>
            <label>メールアドレス</label>
            <input name="mail" id="mail" type="text">
        </div>
        <div>
            <label>パスワード</label>
            <input name="password" id="password" type="password">
        </div>
        <div>
            <label>パスワード再入力</label>
            <input name="password_next" id="password_next" type="password">
        </div>
        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
    <!-- 新規登録 -->
    <form action="user_entry.php" method="post">
        <div>
            <button type="submit">新規登録</button>
        </div>
    </form>
    <!-- ログアウト -->
    <form action="" method="post">
        <div>
            <button type="submit">ログアウト</button>
        </div>
    </form>
</body>
</html>