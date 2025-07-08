<?

echo '--------------------------------ここからはユーザー情報-----------------------------------------------';
    $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        $sql = 'SELECT * FROM info';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $infos = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $infos[] = $row;
        }
        $statement = null;
        $pdo = null;
?>

<table>
    <?php foreach ($infos as $info) { ?>
    <tr>
        <td><?= htmlspecialchars($info['id'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['name'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['mail'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['password'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($info['login'], ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <?php } ?>
</table>


<?

echo '--------------------------------ここからはメモの中身-----------------------------------------------';
    require '../Sql/memo.php';
    $memos = all_put_memo();
?>
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
            <div>
                <a><?= $memo['time'] ?></a>
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

<?
echo '--------------------------------ここからは現在ログインしてるユーザーの中身-----------------------------------------------';
require '../Sql/personal_info.php';
    $now_date = [];
    $now_date = login_check();
    echo  $now_date[0] . '今ログインしてるユーザーのID';
    echo  $now_date[1] . '現在ログインしてるユーザーの名前';