<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
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
           'Name_En'=>'required',
           'Name_Ku'=>'required',
           'Name_Ar'=>'required',
           'Phone'=>'required',
           'email'=>'required|email',
           'password'=>'required',
        ]);
        $user= User::create([
            'Name_En'=> $request->Name_En,
            'Name_Ar' => $request->Name_Ar,
            'Name_Ku' => $request->Name_Ku,
            'email' => $request->email,
            'Phone' => $request->Phone,
            'Dep_id' => $request->Dep_id,
            'password'=> bcrypt($request->password)
        ]);


        if ($request->has('role')) {
            $user->assignRole($request->role['name']);
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo(collect($request->permissions)->pluck('id')->toArray());
        }

        return response(['message'=>'User Created', 'user'=>$user]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'Name_En' => 'required',
            'Name_Ku' => 'required',
            'Name_Ar' => 'required',
            'Phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user->update([
            'Name_En' => $request->Name_En,
            'Name_Ar' => $request->Name_Ar,
            'Name_Ku' => $request->Name_Ku,
            'email' => $request->email,
            'Phone' => $request->Phone,
            'Dep_id' => $request->Dep_id,
            'password' => bcrypt($request->password)
        ]);

        if ($request->has('role')) {
            $user->syncRoles($request->role['name']);
        }

        if ($request->has('permissions')) {
            $user->syncPermissions(collect($request->permissions)->pluck('id')->toArray());
        }

        return response(['message'=>'User Updated', 'user'=>$user]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}
