<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use ClassName;

class Student extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['firstName', 'lastName', 'address','phone','dob'];

    public function class_names() {
        return $this->belongsTo('App\Models\ClassName');
    }
}
