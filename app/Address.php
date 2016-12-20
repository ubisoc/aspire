<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * Get company associated with this address.
   */
  public function company()
  {
      return $this->belongsTo('App\CompanyData');
  }

  /**
   * Get user associated with this address.
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  /**
   * Get the id of the address.
   */
  public function id()
  {
      return $this->id;
  }

  /**
   * Get the first line of the address.
   */
  public function line1()
  {
      return $this->line1;
  }

  /**
   * Set the first line of the address.
   */
  public function setLine1($line)
  {
      $this->line1 = $line;
  }

  /**
   * Get the second line of the address.
   */
  public function line2()
  {
      return $this->line2;
  }

  /**
   * Set the second line of the address.
   */
  public function setLine2($line)
  {
      $this->line2 = $line;
  }

  /**
   * Get the third line of the address.
   */
  public function line3()
  {
      return $this->line3;
  }

  /**
   * Set the third line of the address.
   */
  public function setLine3($line)
  {
      $this->line3 = $line;
  }

  /**
   * Get the city of the address.
   */
  public function city()
  {
      return $this->city;
  }

  /**
   * Set the city of the address.
   */
  public function setCity($city)
  {
      $this->city = $city;
  }

  /**
   * Get the country of the address.
   */
  public function country()
  {
      return $this->country;
  }

  /**
   * Set the country of the address.
   */
  public function setCountry($country)
  {
      $this->country = $country;
  }

  /**
   * Get the postcode of the address.
   */
  public function postcode()
  {
      return $this->postcode;
  }

  /**
   * Set the postcode of the address.
   */
  public function setPostCode($postcode)
  {
      $this->postcode = $postcode;
  }
}
