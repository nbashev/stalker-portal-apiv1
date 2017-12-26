<?php
/**
 * User: volyanytsky
 * Date: 20.12.17
 * Time: 19:32
 */

namespace StalkerPortal\ApiV1\Resources;
use Identifiers\BaseUserId;
use Identifiers\SingleId;
use StalkerPortal\ApiV1\Exceptions\StalkerPortalException;
use StalkerPortal\ApiV1\Interfaces\User as UserInterface;


class User extends BaseResource implements IUser
{
    public function getResource()
    {
        return 'users';
    }

    public function add(UserInterface $user)
    {
        if(empty($user->getLogin()))
        {
            throw new StalkerPortalException($this->resource . ": login is required");
        }

        $data = [];

        $data['stb_mac'] = $user->getMac();
        $data['login'] = $user->getLogin();
        $data['password'] = $user->getPassword();
        $data['status'] = $user->getStatus();
        $data['full_name'] = $user->getFullName();
        $data['account_number'] = $user->getAccountNumber();
        $data['tariff_plan'] = $user->getTariffPlanExternalId();
        $data['comment'] = $user->getComment();
        $data['end_date'] = $user->getExpireDate();
        $data['account_balance'] = $user->getAccountBalance();

        return $this->post($data);
    }

    public function update(UserInterface $user)
    {
        $data = [];

        $data['password'] = $user->getPassword();
        $data['full_name'] = $user->getFullName();
        $data['account_number'] = $user->getAccountNumber();
        $data['tariff_plan'] = $user->getTariffPlanExternalId();
        $data['status'] = $user->getStatus();
        $data['comment'] = $user->getComment();
        $data['end_date'] = $user->getExpireDate();
        $data['account_balance'] = $user->getAccountBalance();

        return $this->put($user->getMac(), $data);
    }

    public function remove(BaseUserId $id)
    {
        return $this->delete($id);
    }

    public function getOne(SingleId $id)
    {
        return $this->get($id->getValue());
    }
}