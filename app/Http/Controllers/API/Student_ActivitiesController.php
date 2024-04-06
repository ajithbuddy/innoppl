<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Student_Activities;
use Validator;
use App\Http\Resources\Student_activitiesResource;

class Student_ActivitiesController extends BaseController
{
    //
    public function index()
    {
        $Student_activities = Student_Activities::all()->where('status', '=', '1');
      
        return $this->sendResponse(Student_activitiesResource::collection($Student_activities), 'student activities retrieved successfully.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
     
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
     
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
     
        $Student_activities = Student_Activities::create($input);
     
        return $this->sendResponse(new Student_activitiesResource($Student_activities), 'activities created successfully.');
    }

    public function show($id)
    {
        $Student_activities = Student_Activities::find($id);
    
        if (is_null($Student_activities)) {
            return $this->sendError('student activities not found.');
        }
     
        return $this->sendResponse(new Student_activitiesResource($Student_activities), 'activities retrieved successfully.');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
     
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $Student_activities = Student_Activities::find($id);
        if(!$Student_activities){
            return response()->json([
                'message'=>'Post Not Found.'
            ],404);
        }

        $Student_activities->name = $input['name'];
        $Student_activities->save();
     
        return $this->sendResponse(new Student_activitiesResource($Student_activities), 'activities updated successfully.');
    }

    public function destroy($id)
    {
        $deleted = Student_Activities::destroy($id);
        if ($deleted) {
            return $this->sendResponse([], 'activities deleted successfully.');
        } else {
            return $this->sendError('Some thing went wrong');
        }
    }
}
