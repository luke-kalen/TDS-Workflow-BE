<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;



class ProjectController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      return ProjectResource::collection(Project::paginate(10));
    }

		public function show($id) {
			return Project::find($id);
		}

    public function select($id) {
      return ProjectResource::collection(Project::paginate(10))->where('org_id', $id);
    }

    public function store(Request $request) {
      $request->validate([
				'title' => 'required',
			]);
			return Project::create( $request->all() );
    }

		public function update(Request $request, $id) {
      $result = Project::find($id);
			$result->update($request->all());
			return $result;
    }

		public function destroy($id) {
      return Project::destroy($id);
    }
}
