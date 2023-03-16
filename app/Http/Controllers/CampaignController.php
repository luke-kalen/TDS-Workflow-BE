<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Http\Resources\CampaignResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return CampaignResource::collection(Campaign::all());
        }
        return  response()->json(["message" => "Forbidden"], 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => [ 'required', 'string', 'email', 'max:255', Rule::unique(User::class), ],
        // ]);
        return Campaign::create([
            'org_id' => $request['orgId'],
            'user_id' => $request['account_exec'],
            'website_url' => $request['website_url'],
            'contact_name' => $request['contact_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'billing_contact' => $request['billing_contact'],
            'billing_email' => $request['billing_email'],
            'billing_phone' => $request['billing_phone'],
            'billing_address' => $request['billing_address'],
            'billing_city' => $request['billing_city'],
            'billing_state' => $request['billing_state'],
            'billing_zip' => $request['billing_zip'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CampaignResource(Campaign::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $result = Campaign::find($id);
        $result->update($request->all());
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      return Campaign::destroy($id);
    }

    public function destroyMultiple(Request $request){
      try {
        Campaign::destroy($request->ids);
        return response()->json([
            'message'=>"Campaigns Deleted successfully."
        ], 200);
      } catch(\Exception $e) {
        report($e);
      }
    }
}
