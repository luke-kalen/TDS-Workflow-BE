<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Resources\DepartmentResource;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DepartmentResource::collection(Department::paginate(10));
    }

    public function show(int $id)
    {
        return new DepartmentResource(Department::findOrFail($id));
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
}
