<?php

include_once ROOT. '/models/Users.php';

class UserController
{
	public function actionRegister()
	{
	    $name = '';
	    $password = '';
	    $email = '';
	    $result = false;


		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			
			if(!Users::checkName($name)){
			    $errors[] = 'Имя не должно быть короче 2-х символов';
            }
			
			if (!Users::checkEmail($email)){
			    $errors[] = 'Не правильный Email';
            }

			if (!Users::checkPassword($password)){
			    $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (Users::checkEmailExists($email)){
			    $errors[] = 'Такой Email уже зарегестрирован';
            }

            if ($errors == false){
                $result = Users::register($name, $email, $password);
            }
		}
		
		require_once(ROOT . '/views/register.php');
		
		return true;
	}


	public function actionLogin(){

        $password = '';
        $email = '';

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!Users::checkEmail($email)){
                $errors[] = 'Не правильный Email';
            }

            if (!Users::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = Users::checkUserDate($email, $password);

            if($userId == false){
                $errors[] = 'Неправильный данные для входа на сайт';
            } else {
                Users::auth($userId);

                header("Location: /dashboard/");
            }


        }

        require_once(ROOT . '/views/login.php');

        return true;
    }

    public function actionLogout(){
	    unset($_SESSION['user']);
	    header("Location: /login");
    }
	
	
	
	
	
}