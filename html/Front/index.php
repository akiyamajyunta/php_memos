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
    <script></script>

</head>
<body>
    <?
        include '../Front/component/header.php';
    ?>
    <a>こんにちはblue-bird</a>
    <div>
        <?php if (!empty($name)): ?>
            <a><?php echo $name; ?></a>
        <?php endif; ?>
    </div>
    <div>
        <?php if (!empty($message)): ?>
            <a><?php echo $message; ?></a>
        <?php endif; ?>
    </div>
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
        <div class="form">
            <label class="form-text">パスワード再入力</label>
            <input name="password_next" id="password_next" type="password" value=<?php echo $password; ?>>
        </div>
        <div class="form">
            <button class='form-button' type="submit">ログイン</button>
        </div>
    </form>
</div>
    <!-- 新規登録 -->
    <form action="user_entry.php" method="post">
        <div>
            <button type="submit">新規登録</button>
        </div>
    </form>
    <!-- ログアウト -->
    <form action="../PageAction/logout.php" method="post">
        <div>
            <button type="submit">ログアウト</button>
        </div>
    </form>

</body>
</html>

<style>
    .container {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border-radius: 5px;
        }
    .form {
        display: flex;
        flex-direction: column;
    }

    .form-text{
    text-align: center;
    }

    .form-button{
    text-align: center;
    width: 30%;
    margin: auto;
    top: 30%;
    }

</style>