<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoryResource;
use App\User;
use Auth;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::with('user')->get();
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
            'Name_Ar'=> 'required',
            'Name_En'=> 'required',
            'Name_Ku'=> 'required',
           ]);

        if (Auth::check()) {
            $id = Auth::user()->id;
        } else {
            $id = 1;
        }
Category::create([
     'user_id' =>$id,
     'Name_Ar'=>$request->Name_Ar,
     'Name_En'=>$request->Name_En,
     'Name_Ku'=>$request->Name_Ku,

 ]);
   

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'Name_Ar' => 'required',
            'Name_En' => 'required',
            'Name_Ku' => 'required',
        ]);

        if (Auth::check()) {
            $id = Auth::user()->id;
        } else {
            $id = 1;
        }
        $category->update([
            'user_id' => $id,
            'Name_Ar' => $request->Name_Ar,
            'Name_En' => $request->Name_En,
            'Name_Ku' => $request->Name_Ku,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
