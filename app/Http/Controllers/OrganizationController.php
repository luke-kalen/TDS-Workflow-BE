<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Http\Request;



class OrganizationController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      return OrganizationResource::collection(Organization::paginate(10));
    }

		public function show($id) {
			return Organization::find($id);
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
}
