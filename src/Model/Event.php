<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Event
 * @package Source\Model
 */
class Event extends DataLayer
{
    /**
     * Event constructor.
     */
    public function __construct()
    {
        parent::__construct("event", ["type", "description", "user_id"]);
    }

    /**
     * @return array|mixed|null
     */
    public function eventUser()
    {
        return (new User())->find("id = :uid", "uid={$this->user_id}")->fetch(true);
    }
}
