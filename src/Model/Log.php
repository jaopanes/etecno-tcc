<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Log
 * @package Source\Model
 */
class Log extends DataLayer
{
    /**
     * Log constructor.
     */
    public function __construct()
    {
        parent::__construct("log", ["description", "action", "user_id"]);
    }
}
