<?php

namespace App\Model;

use App\Model\Course;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
		'star','student','review'
	];


    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
}
