<?php

include_once ROOT. '/models/Users.php';

class DashboardController
{

    public function actionIndex(){

        $userId = Users::checkLogged();

        echo $userId;
        require_once(ROOT . '/views/dashboard/index.php');

        return true;
    }


}