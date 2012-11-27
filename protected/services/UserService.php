<?php
namespace application\services;

class UserService extends BaseService implements IUserService {

    /**
     * @var \application\dao\UserDao
     */
    public $userDao;

    /**
     * @param \application\models\User $user
     * @return \application\models\User
     */
    public function saveUser($user)
    {
        $savedUser = $this->userDao->saveUser($user);
        return $savedUser;
    }


    /**
     * @param $userId
     * @return \application\models\User
     */
    public function getUserById($userId)
    {
        return $this->userDao->getUserById($userId);
    }

    /**
     * @param $emailAddress
     * @return \application\models\User
     */
    public function getUserByEmailAddress($emailAddress)
    {
        return $this->userDao->getUserByEmailAddress($emailAddress);
    }

}