<?php

namespace App\Model;

use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }
}
