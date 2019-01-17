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
            'discount'=>$this->discount,
            
            'totalCost'=>round((1-($this->discount/100))*$this->cost,2),

            'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),2):'No Ratings Submitted',

             'href'=>[
                'reviews'=>route('reviews.index',$this->id)
             ]
        ];
    }
}
