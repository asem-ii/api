<?php

namespace App\Model;

use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

	protected $fillable = [
		'title','detail','cost','faculty','discount','year'
	];


    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }
}
