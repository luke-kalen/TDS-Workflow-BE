<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class OrganizationController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
			if (Auth::user()->isAdmin()) {
        return OrganizationResource::collection(Organization::all());
			}
			return  response()->json(["message" => "Forbidden"], 403);
    }

		public function show($id) {
      return new OrganizationResource(Organization::find($id));
		}

    public function store(Request $request) {
      $request->validate([
				'name' => 'required',
			]);
			return Organization::create( $request->all() );
    }

		public function update(Request $request, $id) {
      $result = Organization::find($id);
			$result->update($request->all());
			return $result;
    }

		public function destroy($id) {
      return Organization::destroy($id);
    }

    public function destroyMultiple(Request $request){
      try {
        Organization::destroy($request->ids);
        return response()->json([
            'message'=>"Organizations Deleted successfully."
        ], 200);
      } catch(\Exception $e) {
        report($e);
      }
    }
}
