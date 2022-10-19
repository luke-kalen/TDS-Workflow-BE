<?php

namespace App\Http\Controllers;

use App\Models\RequestsDate;
use App\Http\Resources\RequestsDateResource;
use Illuminate\Http\Request;

class RequestsDateController extends Controller {
	
	public function index() {
		return RequestsDateResource::collection(RequestsDates::all());
	}

	public function store(Request $request) {
		return RequestsDates::create([$requests->all()]);
	}

	public function update(Request $request) {
		return RequestsDates::update($request->all());
	}
}
