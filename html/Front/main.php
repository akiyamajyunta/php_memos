<?
    require '../Sql/memo.php';
    require_once '../Sql/personal_info.php';
    
    $now_date = login_check();
    $user_id = $now_date[0] ;//'今ログインしてるユーザーのID';

    $name = $now_date[1]; //'現在ログインしてるユーザーの名前';

    $memos = put_memo($user_id);

    if (isset($_GET['message_main'])) {
        $message = $_GET['message_main'];
        } 
        
    $new_entry_link = 'user_entry.php';
    $log_out_link = '../PageAction/logout.php';

?>


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
    <div>
        <?php if (!empty($message)): ?>
            <a><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></a>
        <?php endif; ?>
    </div>
<button onclick="toggleForm()">フォームを表示/非表示</button>  
    <div class="container" id="formContainer">
        <form action="../PageAction/write_notes.php" method="post" >
            <br>
            <br>
            <div class="form">
                <input class="form-text-title" name="title" id="title" type="text">
                <label>タイトル</label>
            </div>
            <div class="form">
                <input class="form-text-sentence" name="sentence" id="sentence" type="text">
                <label>本文</label>
            </div>
            <div class="form">
                <button class='form-button' type="submit" name ="User_id" value="<?php echo $user_id; ?>">ささやく</button>
            </div>
        </form>
    </div>

    <div class='memo-frame-back'>
        <table>
            <?php foreach ($memos as  $memo) { ?>
                    <div class="memo-frame">
                        <div class="box-title">
                            <?= $memo['title'] ?>
                        </div>
                            <p><?= $memo['sentence'] ?></p>
                        <form action='../PageAction/delete.php' method="post">
                            <div>
                                <button name="delete" value=<?= $memo['id'] ?> type="submit">削除</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                <?php 
                } ?>
        </table> 
    </div>
    </div>    
</body>
</html>

<style>
    .container {
        width: 400px;
        height: 300px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 3px solid #00FFFF;
        border-radius: 5px;
        margin-top: 10%;
        position:absolute;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
        }
    .form {
        display: flex;
        flex-direction: column;
        width: 90%;
    }

    .form-text-title{
    border: 3px solid rgb(0, 0, 0);
    text-align: center;
    color: black;
    margin-top: 1%;
    height: 30px;
    }
    .form-text-sentence{
    border: 3px solid rgb(0, 0, 0);
    text-align: center;
    color: black;
    margin-top: 10%;
    height: 100px;
    }


    .form-button{
    text-align: center;
    width: 30%;
    margin: auto;
    top: 30%;
    color: #fff;
    background-color:rgb(0, 247, 255);
    border-radius: 100vh;
    }
.message{
    text-align: center;
    color: black;
    margin-top: 3%;
}
</style>
<style>
.memo-frame-back{
    position: absolute;
    background-color: rgba(0, 0, 0, 0);
    border: thick double rgb(0, 0, 0);
    left: 50%;
    top: 50%;
    padding-top: 80px;
    z-index: -100;
    transform: translate(-50%, -50%);
    margin: 0 auto;
    width: 60%;
    min-height: 100vh;
}
.memo-frame {
    margin: 0 auto;
    background: #dcefff;
    width: 99%;

}
.memo-frame .box-title {
    font-size: 1.2em;
    background: #5fb3f5;
    padding: 4px;
    color: #FFF;
    font-weight: bold;
    letter-spacing: 0.05em;
}
.memo-frame p {
    padding: 15px 20px;
    margin: 0;
}







</style>

<script>

function toggleForm() {
    const form = document.getElementById("formContainer");
    form.style.display = (form.style.display === "block") ?  "none":"block" ;
}
</script>