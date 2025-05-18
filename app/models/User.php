<?php

class User extends Model
{
    public function authenticate($username)
    {
        $sql = "SELECT * FROM user WHERE username = :username;";
        $user = $this->query($sql, ['username' => $username])->fetch();
        return $user;
    }
    public function logout()
    {
        Session::unsetUser();
    }
}
