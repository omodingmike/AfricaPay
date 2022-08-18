<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $guarded = ['id'];

    public function withdraw_method()
    {
        return $this->hasOne(WithdrawMethod::class,'id', 'method_id')->withDefault();
    }

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id')->withDefault();
    }
}
