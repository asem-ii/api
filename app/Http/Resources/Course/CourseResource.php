<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'=>$this->name,
            'description'=>$this->detail,
            'cost'=>$this->cost,
            'faculty'=>$this->faculty,
            'year'=>$this->year,
            'discount'=>$this->discount
        ];
    }
}
