<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Role
 * @package Source\Model
 */
class Role extends DataLayer
{
    /**
     * Role constructor.
     */
    public function __construct()
    {
        parent::__construct("role", ["type"]);
    }
}
