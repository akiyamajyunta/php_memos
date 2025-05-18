<?
    function make_table_info(){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');

            $sql = "CREATE TABLE  IF NOT EXISTS  info (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(60) NOT NULL,
                mail VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                login BOOLEAN NOT NULL
                )";

            $pdo->query($sql);

            } catch (PDOException $e){
                exit ($e->getMessage());
                #echo '接続できません';
            }
    }
    function info_entry($name, $mail, $password){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        
                            $sql = "INSERT INTO info
                                        (name,  mail, password , login) 
                                    VALUES 
                                        (:name , :mail, :password , false)";
                            $statement = $pdo->prepare($sql);
                            $statement->bindValue(':name', $name, PDO::PARAM_STR);
                            $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
                            $statement->bindValue(':password', $password, PDO::PARAM_STR);
                            $statement->execute();

                            return True;
            } catch (PDOException $e){
                            exit ($e->getMessage());
                            return False;
                            #echo '接続できません';
            }
        }
    

    function check_email($mail){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
    
                        $sql = 'SELECT * FROM info WHERE mail = :mail';
                        $statement = $pdo->prepare($sql);
                        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
                        $statement->execute();

                        $check_email = $statement->fetch(PDO::FETCH_ASSOC);
                        $statement = null;
                        $pdo = null;
                        if($check_email){
                            return true;
                        }else{
                            return false;
                        }

            }

    function login($mail,$password){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        $sql = "SELECT * FROM info WHERE mail = :mail AND password = :password";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        $statement = null;
        $pdo = null;
        

        if($result){   
            log_out();
            login_now($mail,$password);
            return True;
        }else{
            return false;
        }
    }

    function log_out(){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        $sql = "UPDATE  info
                SET login = False";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $statement = null;
        $pdo = null;
    }
    
    function login_now($mail,$password){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
            $sql ="update info SET
                    login = true
                        WHERE 
                    mail = :mail AND password = :password";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_INT);
        $statement->execute();
        
        $statement = null;
        $pdo = null;
        
    }
    
    function login_check(){
        $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        $sql = "SELECT * FROM info WHERE login = True";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement = null;
        $pdo = null;
        if($result){   

            return True;
        }else{
            return false;
        }
    }