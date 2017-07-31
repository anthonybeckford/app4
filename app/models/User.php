<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    protected $fillable = [
        'id',
        'email',
        'first_name',
        'last_name',
        'password'
    ];

	protected $hidden = array('password', 'remember_token');

    public function payment()
    {
        return $this->hasMany('UserPayment');
    }

    public function hasPaid()
    {
        return $this->payment()->first() ? true : false;
    }


    public function __toString()
    {
        return sprintf('%s %s', trim($this->first_name), trim($this->last_name));
    }
}
