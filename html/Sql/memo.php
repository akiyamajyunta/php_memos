<?
    function memo_create_table(){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

                $sql = "CREATE TABLE  IF NOT EXISTS  memo (
                    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    user_id INT NOT NULL,
                    title VARCHAR(60) NOT NULL,
                    sentence VARCHAR(255) NOT NULL,
                    time     DATETIME
                    )";
                $pdo->query($sql);
            }catch (PDOException $e){
                exit ($e->getMessage());
            }
    }

    //全部のメモの出力
    function all_put_memo(){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

                $sql = 'SELECT * FROM memo';    
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $memos = [];

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $memos[] = $row;
                    }
                        $statement = null;
                        $pdo = null;
                        return $memos;
            }catch (PDOException $e){
                exit ($e->getMessage());
            }
    }
    //メモの出力
    function put_memo($user_id){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql = 'SELECT * FROM memo WHERE user_id = :user_id';    
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                $statement->execute();
                $memos = [];

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $memos[] = $row;
                    }
                        $statement = null;
                        $pdo = null;

                        return $memos;
            }catch (PDOException $e){
                exit ($e->getMessage());
            }
    }

    //メモの記入
    function write_memos($title,$sentence,$user_id){
            try{
                $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                    $sql = "INSERT INTO  memo 
                                (title, sentence, user_id, time) 
                            VALUES 
                                (:title , :sentence, :user_id ,  NOW() )";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(':title', $title, PDO::PARAM_STR);
                    $statement->bindValue(':sentence', $sentence, PDO::PARAM_STR);
                    $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                    if ($statement->execute()) {
                        return true;
                    } else {
                        return false;
                    }
                }catch (PDOException $e){
                    exit ($e->getMessage());
                }
        }
        
