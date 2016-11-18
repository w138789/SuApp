<?php
class UserModel extends Model
{
    public $table = 'user';
    public function user_lists()
    {
        $user = $this;
        return $user;
    }
}