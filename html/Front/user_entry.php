<?
// require_once '../CreaTable/personal_info.php';
//     make_table_info();

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
    <a>新規登録</a>
    
    <div>
        <?php if (!empty($message)): ?>
            <a><?php echo $message; ?></a>
        <?php endif; ?>
    </div>

    <form action='../PageAction/entry.php' method="post">
        <div>
            <label>ユーザーネーム</label>
            <input name="name" id="name" type="text">
        </div>
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
            <button type="submit">登録する</button>
        </div>
    </form>

    <form action="index.php" method="post">
        <div>
            <button type="submit">戻る</button>
        </div>
    </form>
</body>
</html>