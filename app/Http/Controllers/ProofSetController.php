<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProofSetResource;
use App\Models\ProofSet;
use Illuminate\Http\Request;



class ProofSetController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return ProofSetResource::collection(Set::paginate(10));
  }

  public function show($id) {
    return ProofSet::find($id);
  }

  public function select($id) {
    return ProofSetResource::collection(ProofSet::paginate(10))->where('project_id', $id);
  }

  public function store(Request $request) {
    // $request->validate([
    // 	'title' => 'required',
    // ]);
    return ProofSet::create( $request->all() );
  }

  public function update(Request $request, $id) {
    $result = ProofSet::find($id);
    $result->update($request->all());
    return $result;
  }

  public function destroy($id) {
    return ProofSet::destroy($id);
  }
}