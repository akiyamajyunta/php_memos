<?
  //削除
    $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        session_start();

        $id = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_EMAIL);
        $sql = "DELETE FROM memo WHERE id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $message = '削除しました';
        header("Location: ../Front/main.php?message_main=$message");
        exit();
