<?
    require '../Sql/memo.php';
    require_once '../Sql/personal_info.php';
    
    $now_date = login_check();

    $user_id = $now_date[0] ;//'今ログインしてるユーザーのID';

    $name = $now_date[1]; //'現在ログインしてるユーザーの名前';

    $memos = put_memo($user_id);

    session_start();
    if (isset($_SESSION['message_main'])) {
        $message = $_SESSION['message_main'];
    } 
    exit;

    $new_entry_link = 'user_entry.php';
    $log_out_link = '../PageAction/logout.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <?
        include '../Front/component/header.php';
        blue_bird_header($log_out_link,'ログアウト',$new_entry_link,'新規登録',$name)
    ?>
    <div class='main-message-form'>
        <?php if (!empty($message)): ?>
            <a class='main-message'><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></a>
        <?php endif; ?>
    </div>
    <div class="pen-position">
        <img onclick="toggleForm()" class="pen-images" src="../../../image/bird-pencil.png" alt="羽ペン">
    </div>
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
                        <hr>
                        <form action='../PageAction/delete.php' method="post">
                            <div class='delete-memo'>
                                <button class='delete-button' name="delete" value=<?= $memo['id'] ?> type="submit">X</button>
                            </div>    <!-- 削除ボタン -->
                        </form>
                    </div>
                <?php 
                } ?>
        </table> 
    </div>
    </div>    
</body>
</html>


<script>
    function toggleForm() {
        const form = document.getElementById("formContainer");
        form.style.display = (form.style.display === "block") ?  "none":"block" ;
    }
</script>