<?php
namespace application\tests\unit\services;
use \models,application\tests\unit\BaseTestCase;

class UserServiceTest extends BaseTestCase {


    /**
     * @var \application\services\UserService
     */
    var $userService;


    public function setUp() {
        parent::setUp();

        $this->userService = new \application\services\UserService();
    }

    public function tearDown() {
        parent::tearDown();

        // delete your instance
        unset($this->userService);
    }

    public function testGetUserByEmailAddress() {
        // setup data
        $user = new \application\models\User();
        $user->email_address = "test@test.com";

        // mock user dao
        $userDao = $this->getMock("\\dao\\UserDao", array("getUserByEmailAddress"));
        $userDao->expects($this->once())->method("getUserByEmailAddress")->will($this->returnValue($user));
        $this->userService->userDao = $userDao;

        // run test
        $returnedUser = $this->userService->getUserByEmailAddress("test@test.com");

        // do assertions
        $this->assertInstanceOf("\\application\\models\\User", $returnedUser);
        $this->assertEquals("test@test.com", $returnedUser->email_address);
    }
}
