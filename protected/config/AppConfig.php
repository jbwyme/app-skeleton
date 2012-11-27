<?php
namespace config;
use utils\StringUtils;

require(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."utils".DIRECTORY_SEPARATOR."StringUtils.php");
/**
 * Created by JetBrains PhpStorm.
 * User: wymetyme
 * Date: 11/24/12
 * Time: 3:23 PM
 * This class holds our application configuration/properties loaded from our ini file(s)
 */


class AppConfig
{
    public $dbConnectionString;
    public $dbUsername;
    public $dbPassword;

    // Test specific props
    public $testBaseUrl;

    private static $appConfig;

    public static function getInstance($configFilePath = null, $overrideFilePath = null) {
        if (self::$appConfig == null) {
            if ($configFilePath == null) {
                throw new AppConfigException("You must provide a config file path to create a new instance of AppConfig");
            }

            // this allows us to configure options in ini files and override them on a server by server basis
            $default_options = parse_ini_file($configFilePath);
            $override_options = file_exists($overrideFilePath) ? parse_ini_file($overrideFilePath) : array();

            $options = array_merge($default_options, $override_options);

            self::$appConfig = new AppConfig();
            foreach($options as $key => $value) {
                self::$appConfig->{StringUtils::underscoreToCamel($key)} = $value;
            }
        }


        return self::$appConfig;
    }


}


/**
 * General exception thrown by the AppConfig class on error.
 */
class AppConfigException extends \Exception
{}