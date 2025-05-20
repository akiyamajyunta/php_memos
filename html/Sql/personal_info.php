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
            }
    }

    function info_entry($name, $mail, $password){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
        
                $sql = "INSERT INTO info
                            (name,  mail, password , login) 
                        VALUES 
                            (:name, :mail, :password , false)";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':name', $name, PDO::PARAM_STR);
                $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
                $statement->bindValue(':password', $password, PDO::PARAM_STR);
                $statement->execute();

                            return True;
            } catch (PDOException $e){
                            exit ($e->getMessage());
                            return False;
            }
        }
    

    function check_email($mail){
        try{
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
            }catch (PDOException $e){
                    exit ($e->getMessage());
                        
            }

        }

    function login($mail,$password){
        try{
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
            }catch (PDOException $e){
                    exit ($e->getMessage());
            }
    }

    function log_out(){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql = "UPDATE info
                            SET 
                        login = False";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $statement = null;
                $pdo = null;
            }catch (PDOException $e){
                    exit ($e->getMessage());
            }
    }
    
    function login_now($mail,$password){
        try{
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
            }catch (PDOException $e){
                    exit ($e->getMessage());
            }
    }
    
    function login_check(){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql = "SELECT * FROM info WHERE login = True";
                $statement = $pdo->prepare($sql);
                $statement->execute();

                $result = [];
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                                $result[] = $row;
                            }
                    $statement = null;
                    $pdo = null;
                if($result){   
                    return array($result[0]['id'],$result[0]['name'],$result[0]['mail'],$result[0]['password']);
                }else{
                    return array('','ゲスト','','');
                }

            }catch (PDOException $e){
                exit ($e->getMessage());
            }
    }

//名前の変更
    function change_mail($mail){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql ="update info SET
                        name = :name
                            WHERE 
                        login = true";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':name', $mail, PDO::PARAM_STR);
                $statement->execute();
                
                $statement = null;
                $pdo = null;
            }catch (PDOException $e){
                exit ($e->getMessage());
            }
    }

//パスワードの変更
    function change_password($password){
        try{
            $pdo = new PDO('mysql:host=mysql; dbname=mydatas; charset=utf8','root','root');
                $sql ="update info SET
                        password = :password
                            WHERE 
                        login = true";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':password', $password, PDO::PARAM_STR);
            $statement->execute();
            
            $statement = null;
            $pdo = null;
            }catch (PDOException $e){
                exit ($e->getMessage());
            }
    }