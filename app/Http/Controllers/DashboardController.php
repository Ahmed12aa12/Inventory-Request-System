<?php

namespace App\Http\Controllers;

use App\Category;
use App\Department;
use App\Faculty;
use App\Item;
use App\Order;
use App\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = array("user" => 0, "category" => 0, "item" => 0);
        $count['faculty']   = Faculty::all()->count();
        $count['dep']   = Department::all()->count();
        $count['user']   = User::all()->count();
        $count['category']  = Category::all()->count();
        $count['item'] = Item::all()->count();
        $count['order']   = Order::all()->count();

        return response()->json($count);
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
        //    return ['message'=>'i have your data']; 
        if (Auth::check()) {
            $id = auth()->user()->id;
        } else {
            $id = 1;
        }
        $order=new Order;
        $order->user_id=$id;
        $order->description=$request->description;
        $order->save();
        $item_id = $request->get('item_id');
        $order->item->sync($request->$item_id);

    // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
