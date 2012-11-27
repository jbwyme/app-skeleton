<?php
namespace application\services;

class ContestService extends BaseService implements IContestService {
    /**
     * @var \application\services\UserService userService
     */
    public $userService;

    public function getContestsCreatedByUser($clientUserId)
    {
        return $this->userService->getUserById(1);
    }

    public function getContestsAppliedTo($designerUserId)
    {
        // TODO: Implement getContestsAppliedTo() method.
    }

    public function saveContest($contestModel)
    {
        // TODO: Implement saveContest() method.
    }

}