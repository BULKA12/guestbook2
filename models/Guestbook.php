<?php


class Guestbook
{
	public static $table = 'form';
	
	public static function getGustbookList()
	{
		$db = Db::getConnection();
		$gustbookList = array();
		
		$result = $db->query('SELECT * FROM form ORDER BY id DESC LIMIT 10');
		
		$i = 0;
		while($row = $result->fetch()){
			
			$gustbookList[$i]['id'] = $row['id'];
			$gustbookList[$i]['name'] = $row['name'];
			$gustbookList[$i]['email'] = $row['email'];
			$gustbookList[$i]['message'] = $row['message'];
			$gustbookList[$i]['datetime'] = $row['datetime'];
			$i++;
			
		}
		return $gustbookList;
	}
	
	public static function create($array)
	{
		$db = Db::getConnection();
		$keys = implode(',', array_keys($array));
		$tmpArray = $array;
		foreach ($tmpArray as $key => $value) {
			$tmpArray[$key] = "'$value'";
		}
		$values = implode(',', $tmpArray);
		$sql = "INSERT INTO " . self::$table . " ($keys) VALUES ($values)";

		$db->query($sql);
		header('Location: '.ROOT.'/guestbook');
		
	}

	public static function checkName($name){
        if(strlen($name) >= 2 ){
            return true;
        }
        return false;
    }

    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkMessage($message){
        if(strlen($message) >= 2 ){
            return true;
        }
        return false;
    }

    /*public static function create($name, $email, $message){

        $db = Db::getConnection();

        $sql = 'INSERT INTO form (name, email, message) '
            . 'VALUES (:name, :email, :message)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);

        return $result->execute();

    }*/
}