<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyData extends Model
{
  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'company_data';

  /**
   * Get the account associated with this company.
   */
  public function account()
  {
      return $this->belongsTo('App\Account');
  }

  /**
   * Get the applications to this company.
   */
  public function applications()
  {
      return $this->hasMany('App\Application');
  }

  /**
   * Get the trading address associated with this company.
   */
  public function tradingAddress()
  {
      return $this->hasOne('App\Address');
  }

  /**
   * Get the billing address associated with this company.
   */
  public function billingAddress()
  {
      return $this->hasOne('App\Address');
  }

  /**
   * Get all the roles advertised by this company.
   */
  public function roles()
  {
      return $this->hasMany('App\Role');
  }

  /**
   * Get the id of the student data.
   */
  public function id()
  {
      return $this->id;
  }

  /**
   * Get the name of the company.
   */
  public function name()
  {
      return $this->name;
  }

  /**
   * Set the name of the company.
   */
  public function setName($name)
  {
      $this->name = $name;
  }

  /**
   * Get the biography of the company.
   */
  public function biography()
  {
      return $this->biography;
  }

  /**
   * Set the biography of the company.
   */
  public function setBiography($biography)
  {
      $this->biography = $biography;
  }
}
