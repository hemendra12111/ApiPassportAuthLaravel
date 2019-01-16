<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\Teacher as TeacherResource;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function __construct(){
        return $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Teachers = Teacher::all();
        return TeacherResource::collection($Teachers);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Teacher = $request->user()->Teachers()->create($request->all());
        return new TeacherResource($Teacher);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $Teacher)
    {
        return new TeacherResource($Teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $Teacher)
    {
        if($request->user()->id !== $Teacher->user_id){
            return response()->json(['error'=>'Unauthorized'],401);
        }

        $Teacher->update($request->all());
        return new TeacherResource($Teacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $Teacher)
    {   
        if(request()->user()->id!==$Teacher->user_id){
            return response()->json(['error'=>'Unauthorized'],401);
        }
        $Teacher = $Teacher->delete();
        return response()->json('null',200);
    }
}
