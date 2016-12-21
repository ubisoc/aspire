<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentData extends Model
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
  protected $table = 'student_data';

  /**
   * Get the account associated with this student data.
   */
  public function account()
  {
      return $this->belongsTo('App\Account');
  }

  /**
   * Get the applications sent by this account.
   */
  public function applications()
  {
      return $this->hasMany('App\Application');
  }

  /**
   * Get the id of the student data.
   */
  public function id()
  {
      return $this->id;
  }

  /**
   * Get the university id of the student.
   */
  public function universityId()
  {
      return $this->university_id;
  }

  /**
   * Set the university id of the student.
   */
  public function setUniversityId($id)
  {
      $this->university_id = $id;
  }

  /**
   * Get the biography of the student.
   */
  public function biography()
  {
      return $this->biography;
  }

  /**
   * Set the biography of the student.
   */
  public function setBiography($biography)
  {
      $this->biography = $biography;
  }

  /**
   * Get the location preferences of the student.
   */
  public function locationPref()
  {
      return $this->location_pref;
  }

  /**
   * Set the location preferences of the student.
   */
  public function setLocationPref($pref)
  {
      $this->location_pref = $pref;
  }

  /**
   * Get the job preferences of the student.
   */
  public function jobPref()
  {
      return $this->job_pref;
  }

  /**
   * Set the job preferences of the student.
   */
  public function setJobPref($pref)
  {
      $this->job_pref = $pref;
  }
}
