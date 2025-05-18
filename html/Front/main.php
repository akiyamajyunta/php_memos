<?
    require '../Sql/memo.php';
    $user_id = 2;
    $memos = put_memo($user_id);

    if (isset($_GET['message_main'])) {
        $message = $_GET['message_main'];
        } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php if (!empty($message)): ?>
            <a><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></a>
        <?php endif; ?>
    </div>
    <div>
        <form action="../PageAction/write_notes.php" method="post">
            <div>
                <div>
                    <input name="title" id="title" type="text">
                    <label>タイトル</label>
                </div>
                <div>
                    <input name="sentence" id="sentence" type="text">
                    <label>本文</label>
                </div>
                <div>
                    <input name="User_id" id="User_id" type="text">
                    <label>ID(仮)</label>
                </div>
                <div>
                    <button type="submit">ささやく</button>
                </div>
            </div>
        </form>
    </div>
    <div>
        <table>
            <?php foreach ($memos as  $memo) { ?>
                    <div>
                        <div>
                            <a><?= $memo['user_id'] ?></a>
                        </div>
                        <div>
                            <a><?= $memo['id'] ?></a>
                        </div>
                        <div>
                            <a><?= $memo['title'] ?></a>
                        </div>
                        <div>
                            <a><?= $memo['sentence'] ?></a>
                        </div>
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
    <form action="../PageAction/logout.php" method="post">
        <div>
            <button type="submit">ログアウト</button>
        </div>
    </form>
    </div>    
</body>
</html>

