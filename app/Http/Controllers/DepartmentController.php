<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Resources\DepartmentResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::user()->isAdmin()) {
            return DepartmentResource::collection(Department::all());
        }
        return  response()->json(["message" => "Forbidden"], 403);
    }

    public function show(int $id)
    {
        return new DepartmentResource(Department::find($id));
    }

    public function store(Request $request) {
			$request->validate([
				'name' => 'required',
			]);
			return Department::create( $request->all() );
		}
  
    public function update(Request $request, $id) {
        $result = Department::find($id);
        $result->update($request->all());
        return $result;
    }
  
    public function destroy($id) {
        return Department::destroy($id);
    }
  
    public function destroyMultiple(Request $request){
        try {
          Department::destroy($request->ids);
            return response()->json([
                'message'=>"Departments Deleted successfully."
            ], 200);
        } catch(\Exception $e) {
            report($e);
        }
    }
}
