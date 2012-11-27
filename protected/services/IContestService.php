<?php
namespace application\services;

interface IContestService {
    public function getContestsCreatedByUser($clientUserId);
    public function getContestsAppliedTo($designerUserId);
    public function saveContest($contestModel);

}