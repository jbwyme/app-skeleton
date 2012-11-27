<?php
namespace application\tests\unit;

class BaseTestCase extends \PHPUnit_Framework_TestCase {
    // PHPUnit serializes global variables for backup but has a problem with Closures (which we use in DIContainer)
    // so we'll blacklist it here.
    protected $backupGlobalsBlacklist = array('DIContainer');


}
