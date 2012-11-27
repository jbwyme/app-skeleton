<?php
namespace application\dao;

interface IUserDao {
    public function getUserById($userId);
    public function getUserByEmailAddress($emailAddress);
    public function saveUser($user);
}