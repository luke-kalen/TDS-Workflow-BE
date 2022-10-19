<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProofResource;
use App\Models\Proof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProofController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return ProofResource::collection(Proof::all());
  }

  public function getImage($id) {
    $ad = Proof::find($id);
    return Storage::disk('s3')->response($ad->url);
  }

  public function show($id) {
    // $this->getImage();
    return Proof::find($id);
  }

  public function select($id) {
    return json_encode(ProofResource::collection(Proof::all())->where('proof_set_id', $id));
  }

  public function store(Request $request) {
    $request->validate([
      'adfile' => 'required|max:500000',
    ]);
    $ad = Proof::create([
      'proof_set_id' => $request->input('proof_set_id'),
      'name' => $request->input('name'),
      'type' => $request->input('type'),
      'status' => $request->input('status'),
      'comment' => $request->input('comment'),
      'description' => $request->input('description'),
      'url' => json_encode($request->input('url')),
    ]);
    
    if ($request->hasFile('adfile')) {
      $file = $request->file('adfile');
      $imageName = time() . '.' . $file->getClientOriginalName();
      $filePath = 'images/' . $ad->proof_set_id . '/' . $ad->id  . '/' .  $imageName;
      $disk = Storage::disk('s3Public');
      $disk->put($filePath, file_get_contents($file));
      $url = $disk->url($filePath);
      $ad->update([ 'url' => $url]);
      return response()->json([
        'message' => "Image Uploaded Successfully"
      ], 200);
    }
    return $ad;
  }

  public function update(Request $request, $id) {
    $result = Proof::find($id);
    $result->update($request->all());
    return $result;
  }

  public function destroy($id) {
    return Proof::destroy($id);
  }
}