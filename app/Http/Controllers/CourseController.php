<?php

namespace App\Http\Controllers;

use App\Exceptions\CourseNotBelongsToUser;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\Course\CourseCollection;
use App\Http\Resources\Course\CourseResource;
use App\Model\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
   





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return CourseCollection::collection(Course::paginate(20));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = new Course;
        $course->title=$request->title;
        $course->detail=$request->description;
        $course->cost=$request->cost;
        $course->faculty=$request->faculty;
        $course->discount=$request->discount;
        $course->year=$request->year;
        //$course->user_id=$request->user_id;
        $course->save();


        return response([
            'data' => new CourseResource($course)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $this->CourseUserCheck($course);

        $request['detail'] = $request->description;

        unset($request['description']);

        $course->update($request->all());

        return response([

            'data' => new CourseResource($course)
            
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->CourseUserCheck($course);

        $course->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function CourseUserCheck($course)
    {
        if (Auth::id() !== $course->user_id) {
            throw new CourseNotBelongsToUser;
        }
    }
}
