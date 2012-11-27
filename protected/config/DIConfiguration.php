<?php
namespace config;

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."AbstractDIConfiguration.php");
/**
* This class implements my application-specific configuration.
*
* The @property-annotations below will be parsed and used to configure the container.
* @property \config\AppConfig $appConfig AppConfiguration object
* @property \application\services\ContestService $contestService contestService impl
 * @property \application\services\UserService $userService userService impl
 * @property \application\dao\UserDao $userDao userService impl
*/
class DIConfiguration extends \config\AbstractDIConfiguration {
}

$DIContainer = new DIConfiguration();

// APP CONFIGURATION
$DIContainer->appConfig = function() {
    return AppConfig::getInstance();
};

// CONTEST SERVICE
$DIContainer->contestService = function() {
    $contestService = new \application\services\ContestService();
    return $contestService;
};

// USER SERVICE
$DIContainer->userService = function() {
    $userService = new \application\services\UserService();
    return $userService;
};

// USER DAO
$DIContainer->userDao = function() {
    $userDao = new \application\dao\UserDao();
    return $userDao;
};

// configuration container must be sealed before properties can be read:
$DIContainer->seal();
