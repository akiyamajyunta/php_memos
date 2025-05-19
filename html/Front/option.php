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

    $new_entry_link = 'user_entry.php';
    $log_out_link = '../PageAction/logout.php';
?>

<? ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?
        include '../Front/component/header.php';
        blue_bird_header($log_out_link,'ログアウト',$new_entry_link,'新規登録',$name)
    ?>

    <div class="container">
        <p>ユーザー情報</p>
        <p><? echo $name ?></p>
        <p><? echo $mail ?></p>
            <div class="form">
                <button class='form-button' type="submit" name ="User_id" value="<?php echo $user_id; ?>">メールアドレスを変える</button>
            </div>          
            <div class="form">
                <button class='form-button' type="submit" name ="User_id" value="<?php echo $user_id; ?>">パスワードを変える</button>
            </div>
        <br>

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
        /* display: none; */
    }

    .form-text{
    text-align: center;
    color: black;
    }

    .form-button{
    text-align: center;
    width: 70%;
    margin: 10% auto auto auto;
    top: 30%;
    color: #fff;
    background-color:rgb(0, 247, 255);
    border-radius: 100vh;
    }
</style>

<script>
    function toggleOption() {
        const form = document.getElementById("OptionContainer");
        form.style.display = (form.style.display === "block") ?  "none":"block" ;
    }

</script>