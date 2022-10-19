<?php

namespace App\Http\Controllers;

use App\Models\RequestsReview;
use App\Http\Resources\RequestsReviewResource;
use Illuminate\Http\Request;

class RequestsReviewController extends Controller {
	public function index() {
		return RequestsReviewResource::collection(RequestsReview::all());
	}

	public function store(Request $request, $id) {
		return RequestsReview::create($requests->all());
	}
}
