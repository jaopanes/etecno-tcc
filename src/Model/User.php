<?php

/**
 * DataLayer documentation https://packagist.org/packages/coffeecode/datalayer
 */

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

/**
 * Class User
 * @package Source\Model
 */
class User extends DataLayer
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("user", ["name", "email", "passwd"]);
    }

    /**
     * @return array|mixed|null
     */
    public function userEvent()
    {
        return (new Event())->find("id = :uid", "uid={$this->id}")->fetch(true);
    }

    public function userTag()
    {
        return (new Tag())->find("id = {$this->tag_id}")->fetch(true);
    }

    public function userRole()
    {
        return (new Role())->find("id = {$this->access_id}")->fetch(true);
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (
            !$this->validateEmail() ||
            !$this->validatePassword() ||
            !parent::save()
        ) {

            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    protected function validateEmail(): bool
    {
        if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->fail = new Exception("Informe um e-mail válido!");
            return false;
        }

        $userByEmail = null;

        if (!$this->id) {
            $userByEmail = $this->find("email = :email", "email={$this->email}")->count();
        } else {
            $userByEmail = $this->find("email = :email AND id != :id", "email={$this->email}&id={$this->id}")->count();
        }

        if ($userByEmail) {
            $this->fail = new Exception("Este e-mail já existe em nossos registros!");
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    protected function validatePassword(): bool
    {
        if (empty($this->passwd) || strlen($this->passwd) < 5) {
            $this->fail = new Exception("Informe uma senha com mais de 5 caracteres.");
            return false;
        }

        if (password_get_info($this->passwd)['algo']) {
            return true;
        }

        $this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT);
        return true;
    }
}
