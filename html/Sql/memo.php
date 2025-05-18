<?
    function memo_create_table(){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

        $sql = "CREATE TABLE  IF NOT EXISTS  memo (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            title VARCHAR(60) NOT NULL,
            sentence VARCHAR(255) NOT NULL
            )";

        $pdo->query($sql);

    }

    //全部のメモの出力
    function all_put_memo(){
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
    }
    //メモの出力
    function put_memo($user_id){
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
    }

    //メモの記入
    function write_memos($title,$sentence,$user_id){

                $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql = "INSERT INTO  memo 
                            (title, sentence, user_id) 
                        VALUES 
                            (:title , :sentence, :user_id )";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':title', $title, PDO::PARAM_STR);
                $statement->bindValue(':sentence', $sentence, PDO::PARAM_STR);
                $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                // $statement->execute();
                // exit();
                    
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }


            }
        
