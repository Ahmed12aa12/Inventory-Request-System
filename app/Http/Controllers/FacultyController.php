<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Resources\FacultyResource;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
        /**
     * @var Faculty
     */
    private $faculty;

    function __construct(Faculty $faculty)
    {

        $this->faculty = $faculty;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FacultyResource::collection( $this->faculty->all());
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
        ]);
     $faculty=Faculty::create([
            'Name_En'=>$request->Name_En,
            'Name_Ku'=>$request->Name_Ku,
            'Name_Ar'=>$request->Name_Ar,
        ]);
        return response(['faculty'=>$faculty]);
    }


 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {  
        $request->validate([
            'Name_En'=>'required',
            'Name_Ku'=>'required',
            'Name_Ar'=>'required',
        ]);
        $faculty->update([
            'Name_En'=>$request->Name_En,
            'Name_Ku'=>$request->Name_Ku,
            'Name_Ar'=>$request->Name_Ar,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
    }
}
