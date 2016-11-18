<?php

class AdminModel extends Model
{
    public $table = 'admin';

    public function admin($name, $password)
    {
        if (empty($name)) return false;
        $user = $this->where("name = '" . $name . "'")->ones();
        if (empty($user)) return false;
        if ($user['password'] != md5($password)) return false;
        return $user;
    }
}