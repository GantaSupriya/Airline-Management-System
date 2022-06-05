<?php

namespace App\Models;

class User{
    //
    public $user;
    public function setFirstName($firstName){
        $this->user = $firstName;

    }

    public function getFirstName(){
        return 'Billy';
    }
}