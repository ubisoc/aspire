<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'mobile_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Gets the User's Address.
     */
    public function address()
    {
        return $this->hasOne('App\Address');
    }

    /**
     * Gets the User's Account.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    /**
     * Sets the User's First Name.
     */
    public function setFirstName($name)
    {
        return $this->first_name = $name;
    }

    /**
     * Sets the User's Last Name.
     */
    public function setLastName($name)
    {
        return $this->last_name = $name;
    }

    /**
     * Sets the User's Email.
     */
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    /**
     * Sets the User's First Name.
     */
    public function setNumber($number)
    {
        return $this->mobile_number = $number;
    }
}
