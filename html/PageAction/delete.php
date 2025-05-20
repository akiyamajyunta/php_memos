<?
  //削除
    $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $id = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_EMAIL);
        $sql = "DELETE FROM memo WHERE id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        session_start();
        $_SESSION['message_main'] = '削除しました';
        header("Location: ../Front/main.php");
        exit;
