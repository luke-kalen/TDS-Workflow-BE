<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Ads;
use Illuminate\Support\Facades\Storage;
  
class ImageuploadController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function image_upload($file) {
		$ad = Ads::find($id);
		return Storage::disk('s3')->response('images/' . $imageName);
	}
  
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function upload_post_image(Request $request) {
		$request->validate([
			'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		// $ad = Ads::find($id);

		if($request->hasFile('file')) {
			$file = $request->file('file');
			$imageName = time().$file->getClientOriginalName();
			$filePath = 'images/' . $imageName;
			Storage::disk('s3')->put($filePath, file_get_contents($file));
			// $ad->update([ 'url' => $imageName ]);
			return response()->json([
				'message' => "Image Uploaded Successfully"
			], 200);
		}   
	}
}
?>