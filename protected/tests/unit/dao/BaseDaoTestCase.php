<?php
namespace application\tests\unit\dao;
/**
 * Created by JetBrains PhpStorm.
 * User: wymetyme
 * Date: 11/24/12
 * Time: 2:55 PM
 * To change this template use File | Settings | File Templates.
 */
abstract class BaseDaoTestCase extends \PHPUnit_Extensions_Database_TestCase   {

    // PHPUnit serializes global variables for backup but has a problem with Closures (which we use in DIContainer)
    // so we'll blacklist it here.
    protected $backupGlobalsBlacklist = array('DIContainer');

    /**
     * @var \config\AppConfig
     */
    protected $appConfig;

    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    function __construct($name = NULL, $data = array(), $dataName = '')
    {
        global $DIContainer;

        parent::__construct($name, $data, $dataName);

        $DIContainer->inject($this, true);

    }

    final public function getConnection()
    {
        echo "getConnection";
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new \PDO($this->appConfig->dbConnectionString, $this->appConfig->dbUsername, $this->appConfig->dbPassword);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, '');
        }

        return $this->conn;
    }



}