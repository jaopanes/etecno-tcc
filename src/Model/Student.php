<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Student
 * @package Source\Model
 */
class Student extends DataLayer
{
    /**
     * Student constructor.
     */
    public function __construct()
    {
        parent::__construct("student", ["user_id", "class_id"]);
    }

    /**
     * @return array|mixed|null
     */
    public function studentUser()
    {
        return (new User())->find("id = :uid", "uid={$this->user_id}")->fetch(true);
    }

    /**
     * @return array|mixed|null
     */
    public function studentClass()
    {
        return (new Classroom())->find("id = :uid", "uid={$this->class_id}")->fetch(true);
    }
}
