<?php

namespace App\Http\Controllers;

use App;
use App\Department;
use App\Faculty;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\FacultyResource;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    /**
     * @var Department
     */
    private $dep;

    function __construct(Department $dep)
    {

        $this->dep = $dep;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::with('faculty')->get();
        
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
        Department::create([
            'Name_En'=>$request->Name_En,
            'Name_Ku'=>$request->Name_Ku,

            'Name_Ar'=>$request->Name_Ar,
            'faculty_id'=>$request->faculty_id
        ]);
 
        

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'Name_En'=>'required',
            'Name_Ku'=>'required',
            'Name_Ar'=>'required',
            'faculty_id'=>'required'
        ]);
        $department->update([
            'Name_En'=>$request->Name_En,
            'Name_Ku'=>$request->Name_Ku,
            'Name_Ar'=>$request->Name_Ar,
            'faculty_id'=>$request->faculty_id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
         $department->delete();
    }
}
