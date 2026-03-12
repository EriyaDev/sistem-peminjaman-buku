<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Student extends User
{
    protected $guarded = [];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
