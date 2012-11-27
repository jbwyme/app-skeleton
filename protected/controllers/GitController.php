<?php

/**
 * Created by JetBrains PhpStorm.
 * User: wymetyme
 * Date: 11/24/12
 * Time: 6:32 PM
 * To change this template use File | Settings | File Templates.
 */
class GitController extends \application\controllers\Controller
{

    public function actionIndex() {

    }

    public function actionPull() {
        exec("git pull origin master");
//        try
//        {
//            $payload = json_decode($_REQUEST['payload']);
//        }
//        catch(Exception $e)
//        {
//            exit(0);
//        }
//
//        //log the request
//        file_put_contents('logs/github.txt', print_r($payload, TRUE), FILE_APPEND);
//
//
//        if ($payload->ref === 'refs/heads/master')
//        {
//            // path to your site deployment script
////            exec(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."shell".DIRECTORY_SEPARATOR."integrate.sh");
//            exec("git pull origin master");
//        }
    }
}
