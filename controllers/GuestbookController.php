<?php

include_once ROOT. '/models/Guestbook.php';

class GuestbookController
{
	public function actionIndex()
	{
		$guestbookList = array();
		$guestbookList = Guestbook::getGustbookList();
		require_once(ROOT . '/views/index.php');
	}
	
	public function actionSend()
	{
		$errors = array();

		if (count($_POST) > 0){
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $message = htmlspecialchars($_POST["message"]);


            if(empty($name)) {
                $errors['name'] = "Не правильное имя";
            }
			if(0 === preg_match("/.+@.+\..+/", $_POST["email"])){
				$errors['email'] = "Не правильный email";
			}
			if(0 === preg_match("/\S+/", $_POST["email"])){
				$errors['email'] = "Не правильный email";
			}

			if(0 == count($errors)){
				$name = htmlspecialchars($_POST["name"]);
				$email = htmlspecialchars($_POST["email"]);
				$message = htmlspecialchars($_POST["message"]);
				Guestbook::create([
					'name' => $name,
					'email' => $email,
					'message' => $message
				]);
				//$result = $db->query("INSERT INTO form (name, email, message) VALUES ('$name', '$email', '$message')");

			}
		}
        var_dump($errors);
		require_once(ROOT . '/views/index.php');



	}
	
}
