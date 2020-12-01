<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Classroom
 * @package Source\Model
 */
class Classroom extends DataLayer
{
    /**
     * Classroom constructor.
     */
    public function __construct()
    {
        parent::__construct("classroom", ["name", "year"]);
    }
}
