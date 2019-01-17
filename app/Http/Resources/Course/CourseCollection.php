<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\Resource;

class CourseCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' =>$this->title,

            'totalCost'=>round((1-($this->discount/100))*$this->price,2),
            
            'discount'=>$this->discount,

            'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),2):'No Ratings Submitted',

            'href'=>[

                'link'=> route('courses.show',$this->id)
            ]


        ];
    }
}
