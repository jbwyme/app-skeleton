<?php
namespace application\services;

interface IUserService {
    public function saveUser($userModel);
    public function getUserById($userId);
    public function getUserByEmailAddress($emailAddress);
}