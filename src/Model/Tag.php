<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

/**
 * Class Tag
 * @package Source\Model
 */
class Tag extends DataLayer
{
    /**
     * Tag constructor.
     */
    public function __construct()
    {
        parent::__construct("tag", ["tag"]);
    }

    public function save(): bool
    {
        if (
            !$this->validateTag() ||
            !parent::save()
        ) {
            return false;
        }

        return true;
    }

    protected function validateTag(): bool
    {
        $tagVerify = null;

        if (!$this->id) {
            $tagVerify = $this->find("tag = :t", "t={$this->tag}")->count();
        } else {
            $tagVerify = $this->find("tag = :t AND id != :i", "t={$this->tag}&i={$this->id}")->count();
        }

        if ($tagVerify) {
            $this->fail = new Exception("Esta tag já existe em nossos registros!");
            return false;
        }

        return true;
    }
}
