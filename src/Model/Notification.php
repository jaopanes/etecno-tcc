<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

class Notification extends \CoffeeCode\DataLayer\DataLayer
{
    public function __construct()
    {
        parent::__construct("notification", ["content", "user_id"]);
    }

    /**
     * @return array|mixed|null
     */
    public function notificationUser()
    {
        return (new User())->find("id = :uid", "uid={$this->user_id}")->fetch(true);
    }
}