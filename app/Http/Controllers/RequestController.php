<?php

namespace App\Http\Controllers;

use App\Models\TimeoffRequest;
use App\Http\Resources\RequestResource;
use Illuminate\Http\Request;

class RequestController extends Controller {
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function index() {
		return RequestResource::collection(TimeoffRequest::paginate(30));
	}

	public function show($id) {
		return new RequestResource(TimeoffRequest::findOrFail($id));
	}

	public function store(Request $request) {
		$req_body = TimeoffRequest::create([
			'user_id' => $request->input('user_id'),
			'status' => $request->input('status'),
			'comment' => $request->input('comment')
		]);
		$req_body->reviews()->createMany([
			[
				'reviewer_id' => 1,
				'status' => $request->input('status'),
				'comment' => $request->input('review_comment')
			],
			[
				'reviewer_id' => 1,
				'status' => $request->input('status'),
				'comment' => $request->input('review_comment')
			]
		]);

		$var = $request->input('request_date');
		for ( $i = 0; $i < count($var); $i++ ) {
			$req_body->dates()->create($var[$i]);
		}
		return $req_body;
	}

	public function destroy(Request $request, $id) {
		return TimeoffRequest::destroy($id);
	}

	public function update(Request $request, $id) {
		$new_req = TimeoffRequest::findOrFail($id);
		$var = $request->input('request_date');
		$new_req->dates()->delete();
		for ( $i = 0; $i < count($var); $i++ ) {
			$new_req->dates()->create($var[$i]);
		}
		return $new_req;
	}

}
