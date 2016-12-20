<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get all the users associated with this account.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the company data associated with this account if this is a company account.
     */
    public function companyData()
    {
        return $this->hasOne('App\CompanyData');
    }

    /**
     * Get the student data associated with this account if this is a student account.
     */
    public function studentData()
    {
        return $this->hasOne('App\StudentData');
    }

    /**
     * Get the id of the account.
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get the type of the account.
     * 'a' = Admin account.
     * 'b' = Company account.
     * 'c' = Student Account.
     */
    public function type()
    {
        return $this->type;
    }
}
