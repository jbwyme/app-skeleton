<?php
namespace application\dao;

/**
 *
 */
class UserDao implements IUserDao {

    /**
     * @param integer $userId
     * @return \application\models\User
     */
    public function getUserById($userId)
    {
        $user = new \application\models\User();
        return $user->findByPk($userId);
    }

    /**
     * @param string $emailAddress
     * @return \application\models\User
     */
    public function getUserByEmailAddress($emailAddress)
    {
        $user = new \application\models\User();
        return $user->findByAttributes(array("email_address" => $emailAddress));
    }

    /**
     * @param \application\models\User $user
     * @return \application\models\User
     */
    public function saveUser($user)
    {
        $user->save();
        return $user;
    }

}