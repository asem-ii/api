<?php

namespace App\Model;

use App\Model\Course;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
}
