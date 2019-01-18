<?php

namespace App\Exceptions;

use Exception;

class CourseNotBelongsToUser extends Exception
{
    public function render()
    {
    	return ['errors'=>'Course Not Belongs To Faculty'];
    }
}
