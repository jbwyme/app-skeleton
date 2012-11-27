<?php
namespace application\components;
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends \CUserIdentity
{
    /**
     * @var \application\services\UserService
     */
    public $userService;

    function __construct($username,$password)
    {
        parent::__construct($username,$password);

        global $DIContainer;
        $DIContainer->inject($this);
    }


    /**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

        $user = $this->userService->getUserByEmailAddress($this->username);

		if($user == null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if($user->password_hash !==  $this->password) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
			$this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}
}