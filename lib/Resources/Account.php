<?php
/**
 * User: volyanytsky
 * Date: 20.12.17
 * Time: 19:32
 */

namespace StalkerPortal\ApiV1\Resources;
use StalkerPortal\ApiV1\Resources\BaseResource;
use StalkerPortal\ApiV1\Resources\IUser;

class Account extends BaseResource implements IUser
{
    public function getResource()
    {
        return 'accounts';
    }

    public function getFields()
    {
        return [
            'login',
            'password',
            'full_name',
            'account_number',
            'tariff_plan',
            'status',
            'stb_mac',
            'stb_sn',
            'stb_type',
            'online',
            'ip',
            'version',
            'subscribed',
            'comment',
            'end_date',
            'account_balance',
            'last_active'
        ];
    }

    protected $filters = [
        'stb_mac' => FILTER_VALIDATE_MAC,
        'online' => FILTER_VALIDATE_BOOLEAN,
        'ip' => FILTER_VALIDATE_IP
    ];
}