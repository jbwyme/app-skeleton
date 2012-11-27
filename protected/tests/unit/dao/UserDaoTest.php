<?php
namespace application\tests\unit\dao;
use application\dao\UserDao;
use application\models\User;

class UserDaoTest extends BaseDaoTestCase {

    /**
     * @var \application\dao\UserDao
     */
    protected $userDao;

    public function setUp() {
        parent::setUp();

        $this->userDao = new UserDao();
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        $dataSet = new \PHPUnit_Extensions_Database_DataSet_CsvDataSet();
        $dataSet->addTable('user', 'fixtures/users.csv');
        return $dataSet;
    }


    public function tearDown() {
        parent::tearDown();

        // delete the instance
        unset($this->userDao);
    }

    public function testGetUserById() {
        $user = $this->userDao->getUserById(1);
        $this->assertInstanceOf("\\application\\models\\User", $user);
        $this->assertEquals("Test", $user->getAttribute("first_name"));
    }

    public function testGetUserByEmailAddress() {
        $user = $this->userDao->getUserByEmailAddress("malmalc@itm.com");
        $this->assertInstanceOf("\\application\\models\\User", $user);
        $this->assertEquals(2, $user->getAttribute("user_id"));
    }

    public function testSaveValidUser() {

        $user = new User();
        $user->first_name = "Test";
        $user->last_name = "User";
        $user->email_address = "test_".time()."@test.com";
        $savedUser = $this->userDao->saveUser($user);
        $this->assertInstanceOf("\\application\\models\\User", $savedUser);
        $this->assertGreaterThan(0, $user->user_id);

    }

    public function testSaveInvalidUser() {

        $user = new User();
        $user->first_name = "Test";
        $user->last_name = "User";
//        $user->email_address = "test_".time()."@test.com";  invalidate this user model
        $savedUser = $this->userDao->saveUser($user);

        $this->assertInstanceOf("\\application\\models\\User", $savedUser);
        $this->assertEquals(0, $user->user_id);
        $this->assertGreaterThan(0, sizeof($user->errors));

    }



}