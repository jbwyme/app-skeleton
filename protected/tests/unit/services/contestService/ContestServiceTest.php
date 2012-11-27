<?php
namespace application\tests\unit\services;

/**
 * Created by JetBrains PhpStorm.
 * User: wymetyme
 * Date: 11/24/12
 * Time: 10:52 AM
 * To change this template use File | Settings | File Templates.
 */
class ContestServiceTest extends \application\tests\unit\BaseTestCase {

    /**
     * @var \application\services\IContestService
     */
    var $contestService;


    public function setUp() {
        $this->contestService = new \application\services\ContestService();
    }

    public function tearDown() {
        // delete your instance
        unset($this->contestService);
    }


}