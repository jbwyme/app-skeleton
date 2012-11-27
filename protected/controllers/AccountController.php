<?php

/**
 * Created by JetBrains PhpStorm.
 * User: wymetyme
 * Date: 11/24/12
 * Time: 6:32 PM
 * To change this template use File | Settings | File Templates.
 */
class AccountController extends \application\controllers\Controller
{

    public function filters()
    {
        return array_merge(array(
            'loggedIn + index',
        ), parent::filters());
    }

    public function actionIndex() {
        die("hi!");
        $this->render("index");
    }

    public function actionLogin() {
        die("hi!");
		$loginFormModel = new LoginForm();
        $loginFormModel->redirect_url = $_GET['redirect'];

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($loginFormModel);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $loginFormModel->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($loginFormModel->validate() && $loginFormModel->login())
                $this->redirect($loginFormModel->redirect_url ? $loginFormModel->redirect_url : Yii::app()->user->returnUrl);
        }

        // display the login form
        $this->render('login',array('loginFormModel'=>$loginFormModel));
    }
}
