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


            <div class="form" onclick="ChangeName()">
                <button class='form-button' type="submit">名前を変える</button>
            </div>  
            <div class="new-name" id='new-name'>
                <input class="form-text" name="new-name" type="text">
                <button class='change-button' type="submit">変更</button>
            </div>        



            <div class="form" onclick="ChangePassword()">
                <button class='form-button' type="submit">パスワードを変える</button>
            </div>
            <div class="new-password" id='new-password'>
                <input class="form-text" name="now-password" type="text">
                <label>現在のパスワード</label>
                <input class="form-text" name="new-password" type="text">
                <label>新しいパスワード</label>
                <button class='change-button' type="submit">変更</button>
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
        display:flex;
        flex-direction: column;
    }
    .new-name {
        display: none;
        flex-direction: column;
    }
    .new-password {
        display: flex;
        flex-direction: column;
        display: none;
    }
    .form-text{
    text-align: center;
    color: black;
    width: 100%;
    margin: 5% auto auto auto;
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
    .change-button{
        text-align: center;
        width: 30%;
        margin: 10% auto auto auto;
        top: 30%;
        color: #fff;
        background-color:rgb(0, 247, 255);
        border-radius: 100vh;
    }
</style>

<script>
    const getNameFrom = document.getElementById("new-name");
    const getPasswordFrom = document.getElementById("new-password");

    function ChangeName(){
        getNameFrom.style.display = (getNameFrom.style.display === "flex") ?  "none":"flex" ;
        getPasswordFrom.style.display = "none"; 

    }

    function ChangePassword(){
        getPasswordFrom.style.display = ( getPasswordFrom.style.display === "flex") ?  "none":"flex" ;
        getNameFrom.style.display = "none"; 

        
    }

</script>