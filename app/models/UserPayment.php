<?php

class UserPayment  extends Eloquent
{

    public $timestamps = true;
    protected $fillable = ['user_id', 'amount', 'payment_id'];



    public function user()
    {
        return $this->belongsTo('User');
    }

}