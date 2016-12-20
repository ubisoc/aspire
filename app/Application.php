<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
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
  public function student()
  {
      return $this->belongsTo('App\StudentData');
  }

  /**
   * Get the title of the role.
   */
  public function company()
  {
      return $this->belongsTo('App\CompanyData');
  }

  /**
   * Get the file name of the resume which was uploaded for this application.
   */
  public function resumeName()
  {
      return $this->resume_name;
  }

  /**
   * Set the file name of the resume which was uploaded for this application.
   */
  public function setResumeName($name)
  {
      $this->resume_name = $name;
  }

  /**
   * Get the file name of the cover letter which was uploaded for this application.
   */
  public function coverLetterName()
  {
      return $this->cover_letter_name;
  }

  /**
   * Set the file name of the cover letter which was uploaded for this application.
   */
  public function setCoverLetterName($name)
  {
      $this->cover_letter_name = $name;
  }
}
