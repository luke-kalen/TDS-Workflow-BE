<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workflow;
use App\Models\User;
use App\Http\Resources\WorkflowResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WorkflowResource::collection(Workflow::all());
    }

    public function select($id) {
        return WorkflowResource::collection(Workflow::all())->where('user_id', $id);
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
        $request->validate([
            'name' => 'required',
            'email' => [ 'required', 'string', 'email', 'max:255', Rule::unique(User::class), ],
        ]);
        return Workflow::create([
            'name' => $request['name'],
            'url' => $request['url'],
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
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Http\Response
     */
    public function show(Workflow $workflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Http\Response
     */
    public function edit(Workflow $workflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workflow $workflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workflow $workflow)
    {
        //
    }
}
