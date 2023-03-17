<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProofSetResource;
use App\Models\ProofSet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class ProofSetController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    if (Auth::user()->isAdmin()) {
        return ProofSetResource::collection(ProofSet::all());
    }
    return  response()->json(["message" => "Forbidden"], 403);
  }

  public function show($id) {
    return ProofSet::find($id);
  }

  public function select($id) {
    return ProofSetResource::collection(ProofSet::paginate(10))->where('campaign_id', $id);
  }

  public function store(Request $request) {
    // $request->validate([
    // 	'title' => 'required',
    // ]);
    return ProofSet::create([
      'campaign_id' => $request['campaignId'],
      'name' => $request['name'],
      'notes' => $request['notes'],
      'type' => $request['type']
    ]);
  }

  public function update(Request $request, $id) {
    $result = ProofSet::find($id);
    $result->update($request->all());
    return $result;
  }

  public function destroy($id) {
    return ProofSet::destroy($id);
  }
  
  public function destroyMultiple(Request $request){
      try {
        ProofSet::destroy($request->ids);
          return response()->json([
              'message'=>"ProofSets Deleted successfully."
          ], 200);
      } catch(\Exception $e) {
          report($e);
      }
  }
}