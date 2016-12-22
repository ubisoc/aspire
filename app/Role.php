<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * Get the company associated with this role.
   */
  public function company()
  {
      return $this->belongsTo('App\CompanyData', 'company_data_id');
  }

  /**
   * Get the title of the role.
   */
  public function title()
  {
      return $this->title;
  }

  /**
   * Set the title of the role.
   */
  public function setTitle($title)
  {
      $this->title = $title;
  }

  /**
   * Get the description of the role.
   */
  public function description()
  {
      return $this->description;
  }

  /**
   * Set the description of the role.
   */
  public function setDescription($description)
  {
      $this->description = $description;
  }

  /**
   * Get the start date of the role.
   */
  public function startDate()
  {
      return $this->start_date;
  }

  /**
   * Set the start date of the role.
   */
  public function setStartDate($startDate)
  {
      $this->start_date = $startDate;
  }

  /**
   * Get the end date of the role.
   */
  public function endDate()
  {
      return $this->end_date;
  }

  /**
   * Set the end date of the role.
   */
  public function setEndDate($endDate)
  {
      $this->end_date = $endDate;
  }

  /**
   * Get the salary of the role.
   */
  public function salary()
  {
      return $this->salary;
  }

  /**
   * Set the salary of the role.
   */
  public function setSalary($salary)
  {
      $this->salary = $salary;
  }

  /**
   * Get the skills of the role.
   */
  public function skills()
  {
      return $this->skills;
  }

  /**
   * Set the skills of the role.
   */
  public function setSkills($skills)
  {
      $this->skills = $skills;
  }

  /**
   * Get the qualifications of the role.
   */
  public function qualifications()
  {
      return $this->qualifications;
  }

  /**
   * Set the qualifications of the role.
   */
  public function setQualifications($qualifications)
  {
      $this->qualifications = $qualifications;
  }

  /**
   * Get the name of the company who are advertising this role.
   */
  public function companyName()
  {
      return $this->company_name;
  }

  /**
   * Set the name of the company who are advertising this role.
   */
  public function setCompanyName($name)
  {
      $this->company_name = $name;
  }
}
