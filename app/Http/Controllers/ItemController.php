<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Item;
use Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Item::with(['user','category'])->get();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Name_En'=> 'required',
            'Name_Ku'=> 'required',
            'Name_Ar' => 'required',
        ]);
        if (Auth::check()) {
            $id=Auth::user()->id;
            # code...
        } else {
            $id=1;
            # code...
        }
        
        Item::create([
           'Name_En'=>$request->Name_En,
           'Name_Ku'=>$request->Name_Ku,
           'Name_Ar'=>$request->Name_Ar, 
           'user_id'=>$id,
           'cat_id'=>$request->cat_id
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
       $request->validate([
            'Name_En' => 'required',
            'Name_Ku' => 'required',
            'Name_Ar' => 'required',
       ]);
        if (Auth::check()) {
            $id = Auth::user()->id;
            # code...
        } else {
            $id = 1;
            # code...
        }
       $item->update([
            'Name_En' => $request->Name_En,
            'Name_Ku' => $request->Name_Ku,
            'Name_Ar' => $request->Name_Ar,
            'user_id' => $id,
            'cat_id' => $request->cat_id
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
    }
}
