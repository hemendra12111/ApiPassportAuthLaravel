<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\classroom as ClassroomResource;
use App\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
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
        $Classrooms = Classroom::all();
        return ClassroomResource::collection($Classrooms);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Classroom = $request->user()->Classrooms()->create($request->all());
        return new ClassroomResource($Classroom);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $Classroom)
    {
        return new ClassroomResource($Classroom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $Classroom)
    {
        if($request->user()->id !== $Classroom->user_id){
            return response()->json(['error'=>'Unauthorized'],401);
        }

        $Classroom->update($request->all());
        return new ClassroomResource($Classroom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $Classroom)
    {   
        if(request()->user()->id!==$Classroom->user_id){
            return response()->json(['error'=>'Unauthorized'],401);
        }
        $Classroom = $Classroom->delete();
        return response()->json('null',200);
    }
}

