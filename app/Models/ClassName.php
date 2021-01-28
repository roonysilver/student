<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Student;

class ClassName extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name'];

    public function students() {
        return $this->hasMany('App\Models\Student');
    }
}
