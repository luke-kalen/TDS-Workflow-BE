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
            'user_id' => $request['userId'],
            'website_url' => $request['websiteUrl'],
            'contact_name' => $request['contactName'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'billing_contact' => $request['billingContact'],
            'billing_email' => $request['billingEmail'],
            'billing_phone' => $request['billingPhone'],
            'billing_address' => $request['billingAddress'],
            'billing_city' => $request['billingCity'],
            'billing_state' => $request['billingState'],
            'billing_zip' => $request['billingZip']
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
        $result->update([
            'org_id' => $request['orgId'],
            'user_id' => $request['userId'],
            'website_url' => $request['websiteUrl'],
            'contact_name' => $request['contactName'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip'],
            'billing_contact' => $request['billingContact'],
            'billing_email' => $request['billingEmail'],
            'billing_phone' => $request['billingPhone'],
            'billing_address' => $request['billingAddress'],
            'billing_city' => $request['billingCity'],
            'billing_state' => $request['billingState'],
            'billing_zip' => $request['billingZip'],
            'can_approve' => $request['canApprove'],
            'status' => $request['status']
        ]);
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
