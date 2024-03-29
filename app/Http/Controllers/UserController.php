<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
			if (Auth::user()->isAdmin()) {
				return UserResource::collection(User::all());
			}
			return  response()->json(["message" => "Forbidden"], 403);
    }

		public function select($id) {
			return UserResource::collection(User::all())->where('org_id', $id);
		}

		public function staff() {
			$id = 1;
			return UserResource::collection(User::all())->where('org_id', $id);
		}

		public function client() {
			return UserResource::collection(User::all())->where('org_id', "!=", 1);
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      if ( Auth::user()->isAdmin() ) {
				$request->validate([
					'name' => 'required',
					'isAdmin' => 'required',
					'email' => [ 'required', 'string', 'email', 'max:255', Rule::unique(User::class), ],
          'password' => [ 'required', 'string', new Password, 'confirmed' ],
				]);
				return User::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'org_id' => $request['orgId'],
          'dept_id' => $request['deptId'],
          'role' => $request['role'],
          'is_admin' => $request['isAdmin'],
          'password' => Hash::make($request['password']),
        ]);
			}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
            return new UserResource(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
      // if ( Auth::user()->isAdmin() ) {
        $result = User::find($id);
        $result->update([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'org_id' => $request->input('orgId'),
          'dept_id' => $request->input('deptId'),
          'role' => $request['role'],
          'avatar' => $request['avatar'],
          'avatar_color' => $request['avatarColor'],
          'is_admin' => $request->input('isAdmin'),
        ]);
        return $result;
      // }
      // return  response()->json(["message" => "Forbidden"], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      return User::destroy($id);
    }

    public function destroyMultiple(Request $request){
      try {
        User::destroy($request->ids);
        return response()->json([
            'message'=>"Users Deleted successfully."
        ], 200);
      } catch(\Exception $e) {
        report($e);
      }
    }

    public function account(Request $request)
    {
        $this->update($request, Auth::user()->id);
    }

    public function setup(Request $request)
    {
      $credentials = [
        'email' => $request->email,
        'password' => $request->password
      ];
    
      if (!Auth::attempt($credentials)) {
        return  response()->json(["message" => "Forbidden", "reason" => "User does not exist"], 403);
        // $user = new \App\Models\User();
    
        // $user->name = 'Admin';
        // $user->email = $credentials['email'];
        // $user->password = Hash::make($credentials['password']);
        // $user->is_admin = true;
    
        // $user->save();
        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();
        //     $token = $user->createToken('token', ['create', 'update', 'delete']);
        //     return $token->plainTextToken;
        // }
      }
      if (Auth::attempt($credentials)) {
          $user = Auth::user();
          $token = $user->createToken('token', ['create', 'update', 'delete']);
          return $token->plainTextToken;
      }
      return 'Setup failed!';
    }
}
