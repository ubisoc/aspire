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
   * Get the student who sent in this application.
   */
  public function student()
  {
      return $this->belongsTo('App\StudentData', 'student_data_id');
  }

  /**
   * Get the role.
   */
  public function role()
  {
      return $this->belongsTo('App\Role');
  }

  /**
   * Get the file name of the CV which was uploaded for this application.
   */
  public function cvName()
  {
      return $this->cv_name;
  }

  /**
   * Set the file name of the CV which was uploaded for this application.
   */
  public function setCVName($name)
  {
      $this->cv_name = $name;
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
